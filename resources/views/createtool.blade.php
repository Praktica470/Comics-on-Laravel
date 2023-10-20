<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">


            <title>Create</title>
            <!-- <link rel="stylesheet" href="css/createtool_style.css"/> -->
            @vite(['resources/css/createtool_style.css', 'resources/js/file_uploaded.js'])
        </head>

        <body>
            @include('comics.head_menu')

            <form id="comics_form" method="POST" action={{ route('new_project.store') }} enctype="multipart/form-data">
                @csrf

            <div class = "page_comics_container">
                <div class = "page_comics_cover_container">
                    <img src = "./image/cover_image_sample.jpg"
                    alt="Создание комикса">
                    <!-- <label for="cover" class="card__add">Загрузить свою обложку</label> -->
                    <input type="file" class="my" id="foo" name="file" :value="__('File')">

                </div>
                <div class= "page_comics_description_container">
                    <div class="page_comics_input_fields_container">
                        <input for="title" type="text" name="title" :value="__('Title')" id="title" placeholder="Название произведения" required/>
                        <textarea for="description" name="description" :value="__('Description')" form="comics_form" rows=10 required></textarea>
                    </div>
                    <div>
                        <input for="genre" type="hidden" name="genre" :value="__('Genre')" id="name_inp"/>
                    </div>
                    <div class="genres_container">
                        @foreach($genres as $genre)
                        <div flag="true" onclick="includeId(this)" genre_id_div={{ $genre->id }} class="genre_label" name="genre_btn">{{ $genre->genre_name }}</div>
                        @endforeach
                    </div>
                    <div class="submit_container">
                        <input type="submit" class="btn__add" value="Далее"/>
                    </div>
                </div>
            </div>
            </form>
        </body>

        <script>
            function includeId(btn) {
                if(btn.getAttribute('flag') == "true"){
                    btn.style.background = "var(--rusty_crimson)";
                    document.getElementById('name_inp').value += btn.getAttribute('genre_id_div');
                    console.log(document.getElementById('name_inp').value);
                    btn.setAttribute('flag', "false");
                }
                else {
                    btn.style.background = "var(--darkest_blue)";
                    input_string = document.getElementById('name_inp').value;
                    input_array = Array.from(input_string);
                    console.log(input_array);
                    index = input_array.find(element => {
                        return element.includes(btn.getAttribute('genre_id_div'));
                    });
                    var new_value = document.getElementById('name_inp').value.replace(index, "");
                    document.getElementById('name_inp').value = new_value;
                    console.log(document.getElementById('name_inp').value);
                    btn.setAttribute('flag', "true");
                }
            }
        </script>
    </html>