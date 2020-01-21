<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Mail\FileSaved;
use App\Mail\FileSent;
use Illuminate\Support\Facades\Mail;
use PhpParser\JsonDecoder;

class FileController extends Controller
{
    public function download($id)
    {
        return Storage::disk('public')->download('sample.zip');
    }

    public function transfer(Request $request)
    {
        // $path = Storage::disk('public')->putFile('transfers', $request->file('file'), 'public');
        $path = 'transfers/sample.zip';
        $file = File::create([
            'message' => $request->message,
            'from_email' => $request->from_email,
            'to_email' => $request->to_email,
            'file_path' => $path,
            'size' => Storage::disk('public')->size($path),
            'items' => $request->items
        ]);
        Mail::to($file->to_email)->send(new FileSent(json_decode($file)));
        Mail::to($file->from_email)->send(new FileSaved(json_decode($file)));
        return response()->json(['info' => $file], 200);
    }
}
