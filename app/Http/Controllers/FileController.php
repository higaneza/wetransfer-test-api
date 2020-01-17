<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Mail\FileSaved;
use App\Mail\FileSent;
use Illuminate\Support\Facades\Mail;

class FileController extends Controller
{

    public function download($id)
    {
        $file = File::find($id);
        return Storage::disk('public')->download($file->compressed_file_path);
    }

    public function transfer(Request $request)
    {
        $path = Storage::disk('public')->putFile('transfers', $request->file('file'), 'public');
        $file = File::create([
            'message' => $request->message,
            'from_email' => json_decode($request->from_email),
            'to_email' => json_decode($request->to_email),
            'compressed_file_path' => $path,
            'compressed_file_size' => Storage::disk('public')->size($path),
            'compressed_file_items' => json_decode($request->compressed_file_items)
        ]);
        Mail::to(json_decode($request->to_email))->send(new FileSent($file));
        Mail::to(json_decode($request->from_email))->send(new FileSaved($file));
        return response()->json(['info' => $file], 200);
    }
}
