<div class="genres_container">
    @foreach($genres as $genre)
    <div class="genre_label" name="genre_btn">{{ $genre->genre_name }}</div>
    @endforeach
</div>