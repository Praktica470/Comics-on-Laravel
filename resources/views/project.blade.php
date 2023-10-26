<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Project: {{ $single_comics->comics_title }}</title>
            <link rel="stylesheet" href="../css/project_style.css"/>
        </head>

        <body>
            @include('comics.head_menu')

            <div>
                <h1> {{$single_comics->comics_title}}</h1>
            </div>

            <div id="openModal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Новая страница</h3>
                             <a href="#close" title="Close" class="close">×</a>
                        </div>
                        <div class="modal-body">    
                            <form id="page_form" method="PUT" action= enctype="multipart/form-data">
                            @csrf
                                <p style="color: #aca1a1; background: #5e7186;">Файл с изображением страницы</p>
                                <input form="page_form" type="file" class="my" id="foo" name="file" :value="__('File')">
                                <p style="color: #aca1a1; background: #5e7186;">Описание страницы, комментарии</p>
                                <textarea for="description" name="description" :value="__('Description')" form="page_form" rows=10 required></textarea>
                                <input form="page_form" for="ch" type="hidden" name="ch" :value="__('Ch')" id="ch_inp"/>
                                <input form="page_form" type="submit" class="btn__add" value="Создать">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                @foreach ($single_comics->chapters()->get() as $chapter)
                <details id={{$chapter->id}}>
                    <summary>{{ $chapter->title }}</summary>
                        <div class="description">{{ $chapter->description }}</div>
                        <div class=cards>
                            @foreach ($chapter->pages()->get() as $page)
                                <div class="card">
                                    <div class="card__top">
                                        <div class="card__image">
                                            <img 
                                                src={{ "." . $page->image_path }}
                                                alt="Создание комикса"/>
                                        </div>
                                    </div>
                                    <div class="card__bottom">
                                        <p class="number">{{ $page->id }}</p>
                                    </div>
                                </div>
                            @endforeach 
                                <div id="make_page" class="card empty">
                                        <div class="card__top">
                                            <div class="card__image">
                                            </div>
                                        </div>
                                        <div class="card__bottom">
                                            <p class="number">
                                                <a href="\project\{{$single_comics->id}}\page\{{$chapter->id}}" onclick="getCh(this)">Создать новую страницу</a>
                                            </p>
                                        </div>
                                    </div>           
                        </div>
                </details>
                @endforeach
                <details class="new">
                    <summary class="new_summary">+ Добавить новую главу</summary>
                    <form id="chapter_form" method="POST" action={{ route('project.chapter', $single_comics->id) }} enctype="multipart/form-data">
                        @csrf
                        <p class="form_label">Название главы</p>
                        <input form="chapter_form" for="title" type="text" name="title" :value="__('Title')" id="title" placeholder="Название главы" required/>
                        <p class="form_label">Описание/комментарии к главе</p>
                        <textarea for="description" name="description" :value="__('Description')" form="chapter_form" rows=10 required></textarea>
                        <input form="chapter_form" type="submit" class="btn__add" value="Создать"/>                  
                    </form>
                        <!-- <div class="card">
                            <div class="card__top">
                                <div class="card__image">
                                    <img 
                                        src={{ $page->image_path }}
                                        alt="Создание комикса"/>
                                </div>
                            </div>
                            <div class="card__bottom">
                                <p class="number">{{ $page->id }}</p>
                            </div>
                        </div> -->
                </details>
            </div>

            <script>
                function getCh(elem){
                    document.getElementById('ch_inp').value = elem.parentNode.parentNode.parentNode.parentNode.parentNode.id;
                    console.log(document.getElementById('ch_inp').value);
                }         
            </script>
        </body>
    </html>