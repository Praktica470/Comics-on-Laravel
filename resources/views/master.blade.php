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

                        @foreach ($comics as $single_comics)
                            <div class="card">
                                <!-- Верхняя часть -->
                                <div class="card__top">
                                    <!-- Изображение-ссылка комикса -->
                                    <a href=project/{{ $single_comics->id }} class="card__image">
                                    <img
                                        src={{ $single_comics->comics_cover_image_path }}
                                        alt={{ $single_comics->comics_title }}
                                    />
                                    </a>
                                    <!-- Жанр, тэг -->
                                    <div class="card__label">
                                        {{ App\Models\GenresToComics::where('genres_to_comics.id', $single_comics->id)
                                            ->join('genres', 'genres.id', '=', 'genres_to_comics.genre_id')->first()->genre_name }}
                                    </div>
                                </div>
                                <!-- Нижняя часть -->
                                <div class="card__bottom">
                                    <!-- Название комикса-->
                                    <div class="card__elements">
                                        <div class="card__title">
                                            <a href=project/{{ $single_comics->id }} class="text_link">
                                                {{ $single_comics->comics_title }}
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Автор комикса -->
                                    <div class="card__author">{{ $single_comics->user->name }}</div>
                                    <!-- Описание комикса -->
                                    <div class="description_container">
                                        <p class="card__description">
                                        {{ $single_comics->comics_description }}</p>
                                    </div>
                                    <!-- Кнопка "Подробнее", ссылается полную страницу с комиксом -->
                                    <button class="card__add">Редактировать</button>
                                </div>
                            </div>
                            @endforeach
                </div>
        </body>
</html>
