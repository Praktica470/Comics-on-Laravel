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
                            @include('comics.comics_card_component')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
