<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $file->from_email[0]->email }} sent you some files</title>
    <style>
        body,
        html {
            margin: 0;
            font-family: Helvetica, Roboto, RobotoDraft, Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #222222;
        }

        h3 {
            margin: 0;
            padding: 10px 0;
        }

        .msg {
            padding: 20px;
            background-color: #f5f5f5;
        }

        p,
        a,
        span {
            outline: none;
            width: 100%;
            color: #6a6d70;
            font-family: 'Fakt Pro', Helvetica, 'Segoe UI', 'SanFrancisco Display', Arial, sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: normal;
            line-height: 23px;
            word-spacing: 0;
            margin: 0;
        }

        .down-link {
            color: #409fff;
            font-weight: normal;
            text-decoration: underline;
            word-wrap: break-word;
        }

        .container-fluid {
            padding: 30px;
            background-color: #ffffff;
            border: 1px #cccccc solid;
        }

        .title-lg {
            color: #17181a;
            font-family: 'FreightSans Pro', 'Segoe UI', 'SanFrancisco Display', Arial, sans-serif;
            font-size: 25px;
            font-weight: 500;
        }

        .title-md {
            color: #17181a;
            font-family: 'FreightSans Pro', 'Segoe UI', 'SanFrancisco Display', Arial, sans-serif;
            font-size: 16px;
            font-weight: 500;
        }

        a {
            text-decoration: none;
            color: #409fff !important;
        }

        .link-lg {
            color: #409fff !important;
            font-size: 28px;
        }

        .link-md {
            color: #409fff !important;
            font-size: 16px;
        }

        .section {
            margin: 30px 0;
        }

        .text-center {
            text-align: center;
        }

        .get-btn {
            background-color: rgb(64, 159, 255);
            color: #ffffff !important;
            font-family: "Fakt Pro Medium", "Segoe UI", "SanFrancisco Display", Arial, sans-serif;
            font-size: 14px;
            font-style: normal;
            text-align: center;
            text-decoration: none;
            word-spacing: 0px;
            border-radius: 25px;
            padding: 15px 20px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">

        <div class="section text-center">
            <a class="link-lg" href="mailto:{{ $file->from_email[0]->email }}">{{ $file->from_email[0]->email }}</a>
            <h3 class="title-lg">Sent you some files</h3>
        </div>

        <div class="section text-center">
            <span>
                {{ count($file->items) }} item(s), {{ round($file->size / 100000, 2) }} MB in total.
            </span>
        </div>

        <div class="section msg">
            <p>{{ $file->message }}</p>
        </div>

        <div class="section text-center">
            <a class="get-btn" href="{{ env('APP_URL').'download/'.$file->_id }}">
                Get your files
            </a>
        </div>

        <div class="section">
            <h3 class="title-md">Download link</h3>
            <p class="link-md down-link">
                <a href="{{ env('APP_URL').'download/'.$file->_id }}">
                    {{ env('APP_URL').'download/'.$file->_id }}
                </a>
            </p>
        </div>

        <div class="section">
            <h3 class="title-md">{{ count($file->items) }} item(s)</h3>
            @foreach ($file->items as $item)
            <p>
                <span>{{ $item->name }}</span>
                <br>
                <span>{{ round($item->size / 100000, 2) }} MB</span>
            </p>
            @endforeach
        </div>

    </div>

</body>

</html>