<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Main</title>
            <link rel="stylesheet" href="css/style_dictionary.css"/>
        </head>

        <body>
            <div>
                <h1>Новые комиксы</h1>
                </div>

                <div class="cards">
                    @foreach ($comics as $single_comics)
                        <!-- Карточка комикса -->
                        <div class="card">
                            <!-- Верхняя часть -->
                            <div class="card__top">
                                <!-- Изображение-ссылка комикса -->
                                <a href="#" class="card__image">
                                <img
                                    src={{ $single_comics->comics_cover_image_path }}
                                    alt={{ $single_comics->comics_title }}
                                />
                                </a>
                                <!-- Жанр, тэг -->
                                <div class="card__label">Мистика</div>
                            </div>
                            <!-- Нижняя часть -->
                            <div class="card__bottom">
                                <!-- Название комикса-->
                                <div class="card__elements">
                                    <div class="card__title">{{ $single_comics->comics_title }}</div>
                                </div>
                                <!-- Автор комикса -->
                                <div class="card__author">{{ App\Models\User::where('id', $single_comics->user_id)->first()->name }}</div>
                                <!-- Описание комикса -->
                                <a href="#" class="card__description">
                                {{ $single_comics->comics_description }}
                                </a>
                                <!-- Кнопка "Подробнее", ссылается полную страницу с комиксом -->
                                <button class="card__add">Подробнее</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </body>
    </html>