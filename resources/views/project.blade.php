<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>{{ $single_comics->comics_title }}</title>
            <link rel="stylesheet" href="css/style_dictionary.css"/>
        </head>

        <body>
            @include('comics.head_menu')

            <div>
                <h1> {{$single_comics->comics_title}}</h1>
            </div>
            </div>
        </body>
    </html>