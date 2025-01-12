<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center container-custom2">
        <div class="row justify-content-center">
            <div class="col-12 text-custom">
                <h1 class="display-1">Risultati della ricerca per: {{ $query }}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $index => $article)
                <div class="col-12 col-md-3 align-content-center {{ $index >= 4 ? 'mt-3' : '' }}">
                    <div class="card card-custom mx-auto bordercustom" style="width: 18rem;">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top  height-custom"
                            alt="immagine dell'articolo {{ $article->title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ Str::limit($article->title, 20) }}</h4>
                            <h6 class="card-subtitle">{{ Str::limit($article->subtitle, 20) }}</h6>
                            <p class="card-text">{{ Str::limit($article->body, 60) }}</p>
                            <p class="small text-muted"> Categoria:
                                <a href="{{ route('article.ByCategory', $article->category) }}"
                                    class="text-capitalize text-muted">{{ $article->category->name }}</a>
                            </p>
                            <p class="small text-muted my-0">
                                @foreach ($article->tags as $tag)
                                    #{{ $tag->name }}
                                @endforeach
                            </p>
                            <br>
                            <p class="card-subtitle text-muted fst-italic small">tempo di lettura {{ $article->readDuration() }} min.</p>
                            <div>
                                <p> Redatto il {{ $article->created_at->format('d/m/Y') }} <br> da
                                    <a
                                        href="{{ route('article.ByUser', $article->user) }}">{{ $article->user->name }}</a>
                                </p>
                            </div>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-primary">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>