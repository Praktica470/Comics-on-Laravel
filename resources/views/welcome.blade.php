<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Main</title>
            <link rel="stylesheet" href="css/style_dictionary.css"/>
        </head>

        <body>
            @include('comics.head_menu')

            <div>
                <h1>Новые комиксы</h1>
            </div>
                <div class="cards">
                    @foreach ($comics as $single_comics)
                        @include('comics.comics_card_component')
                    @endforeach
                </div>
            </div>
        </body>
    </html>