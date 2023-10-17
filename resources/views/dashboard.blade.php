<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-light-lavender dark:text-gray-200 leading-tight">
            {{ __('Ваши комиксы') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-somber-green dark:bg-somber-green overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-red-900">
                    <div class="cards">
                    @foreach ($comics as $single_comics)
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
                                    <div class="card__author">{{ App\Models\User::where('id', $single_comics->user_id)->first()->name }}</div>
                                    <!-- Описание комикса -->
                                    <a class="card__description">
                                    {{ $single_comics->comics_description }}
                                    </a>
                                    <!-- Кнопка "Подробнее", ссылается полную страницу с комиксом -->
                                    <button class="card__add">Подробнее</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
