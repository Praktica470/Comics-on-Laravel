<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>{{ $single_comics->comics_title }}</title>
            <link rel="stylesheet" href="css/comics_page_style.css"/>
        </head>

        <body>
            <div class = "page_comics_container">
                <div class = "page_comics_cover_container">
                    <img src = {{ $single_comics->comics_cover_image_path }}
                    alt={{ $single_comics->comics_title }} >
                </div>
                <div class= "page_comics_description_container">
                    <h1>{{ $single_comics->comics_title }}</h1>
                </div>
            </div>
        </body>
    </html>