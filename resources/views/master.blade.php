<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Master</title>
            <link rel="stylesheet" href="css/style_dictionary.css"/>
        </head>

        <body>
            @include('comics.head_menu')

            <div>
            <h1>Мастерская</h1>
            </div>

            <div class="cards">
                <!-- Карточка комикса -->
                <div class="card">
                    <!-- Верхняя часть -->
                    <div class="card__top">
                        <!-- Изображение-ссылка комикса -->
                        <a href={{ route('new_project') }} class="card__image">
                        <img 
                            src="./image/cover_image_sample2.jpg"
                            alt="Создание комикса"
                        />
                        </a>
                        <!-- Жанр, тэг -->
                        <div class="card__label">
                            +
                        </div>
                    </div>
                    <!-- Нижняя часть -->
                    <div class="card__bottom">
                        <!-- Название комикса-->
                        <div class="card__elements">
                            <div class="card__title">
                                <a href={{ route('new_project') }} class="text_link">
                                    Создать новый комикс
                                </a>
                            </div>
                        </div>
                        <!-- Автор комикса -->
                        <div class="card__author"></div>
                        <!-- Описание комикса -->
                        <a class="card__description">
                        </a>
                        <!-- Кнопка "Подробнее", ссылается полную страницу с комиксом -->
                        <!-- <button class="card__add">Подробнее</button> -->
                    </div>
                </div>
            </div>
        </body>
</html>
