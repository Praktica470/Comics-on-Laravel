@foreach ($single_comics->chapters as $chapter)
    <details class="detail_ch">
        <summary class="chapters">{{$chapter->title}}</summary>
        <p style="padding: 10px 10px; font-style: italic;">{{ $chapter->description }}</p>
        @foreach ($chapter->pages as $page)
        <div style="display:block; background: #798593;">
            <a style="margin-right: 10px; margin-left: 10px; margin-bottom: 5px;" href="/comics{{ $single_comics->id }}/chapter{{ $chapter->id }}/page{{ $page->id }}">
            {{ $loop->iteration }} страница
            </a>
        </div>
        @endforeach
    </details>
@endforeach