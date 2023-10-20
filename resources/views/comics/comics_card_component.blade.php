
        <!-- Карточка комикса -->
        <div class="card">
            <!-- Верхняя часть -->
            <div class="card__top">
                <!-- Изображение-ссылка комикса -->
                <a href=comics{{ $single_comics->id }} class="card__image">
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
                        <a href=comics{{ $single_comics->id }} class="text_link">
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
                <button class="card__add">Подробнее</button>
            </div>
        </div>