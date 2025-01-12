<div class="card card-custom mx-auto bordercustom" style="width: 18rem;">
    <img src="{{ Storage::url($article->image) }}" class="card-img-top  height-custom"
        alt="immagine dell'articolo {{ $article->title }}">
    <div class="card-body">
        <h4 class="card-title">{{ Str::limit($article->title, 20) }}</h4>
        <h6 class="card-subtitle">{{ Str::limit($article->subtitle, 30) }}</h6>
        <p class="card-text">{{ Str::limit($article->body, 60) }}</p>
        @if ($article->category)
            <p class="small text-muted"> Categoria:
                <a href="{{ route('article.ByCategory', $article->category) }}"
                    class="text-capitalize text-muted">{{ $article->category->name }}</a>
            </p>
        @else
            <p class="small text-muted">Nessuna categoria</p>
        @endif
        <p class="small text-muted my-0">
            @foreach ($article->tags as $tag)
                #{{ $tag->name }}
            @endforeach
        </p>
        <p class="card-subtitle text-muted fst-italic small">tempo di lettura {{ $article->readDuration() }} min.</p>
        <br>
        <p> Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
            da <a href="{{ route('article.ByUser', $article->user) }}">{{ $article->user->name }}</a>
        </p>
        <a href="{{ route('article.show', $article) }}" class="btn btn-outline-primary">Leggi</a>
    </div>
</div>
