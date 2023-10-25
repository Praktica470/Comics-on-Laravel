<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Project: page {{ $ch }}</title>
            <link rel="stylesheet" href="../css/project_style.css"/>
        </head>
        <body>
            <form id="page_form" method="POST" action={{ route('project.page', ['id' => $id,'ch' => $ch]) }} enctype="multipart/form-data">
            @csrf
                <p style="color: #aca1a1; background: #5e7186;">Файл с изображением страницы</p>
                <input form="page_form" type="file" class="my" id="foo" name="file" :value="__('File')">
                <p style="color: #aca1a1; background: #5e7186;">Описание страницы, комментарии</p>
                <textarea for="description" name="description" :value="__('Description')" form="page_form" rows=10></textarea>
                <input form="page_form" for="ch" type="hidden" name="ch" :value="(__Ch)" value={{ $ch}} id="ch_inp"/>
                <input form="page_form" type="submit" class="btn__add" value="Создать">
                <h1>{{ $ch }}</h1>
            </form>
        </body>
    </html>