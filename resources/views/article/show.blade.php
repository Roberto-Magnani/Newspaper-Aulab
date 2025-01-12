<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center container-custom3">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1-custom">{{ $article->title }}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            <div class="col-10 col-md-3 justify-content-between carousel-css" >
                {{-- carousel --}}
                <x-carousel />
            </div>
            <div class="col-12 col-md-8 d-flex flex-column align-items-center">
                <img src="{{ Storage::url($article->image) }}" class="card-img-top mb-5 img-show" alt="immagine dell'articolo {{ $article->title }}">
                <div class="text-center">
                    <h2>{{ $article->subtitle }}</h2>
                    <p class="fs-5">Categorie:
                        <a href="{{ route('article.ByCategory', $article->category) }}" class="text-capitalize fw-bold text-muted">{{ $article->category->name }}</a></a>
                    </p>
                    <p class="small text-muted my-0">
                        @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                        @endforeach
                    </p>
                    <p class="card-subtitle text-muted fst-italic small">tempo di lettura {{ $article->readDuration() }} min.</p>
                    <br>
                    <div class="text-muted">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} da <a href="{{ route('article.ByUser', $article->user) }}">{{ $article->user->name }}</a></p>
                    </div>
                </div>
                <hr>
                <p class="p-show">{{ $article->body }}</p>
                @if (Auth::check() && Auth::user()->is_revisor)
                    <div class="container my-5">
                        <div class="row ">
                            <div class="col-12 d-flex justify-content-center">
                                <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success">Approva l'articolo</button>
                                </form>
                                <form action="{{route('revisor.rejectArticle', $article)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Rifiuta l'articolo</button></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="text-center">
                    <a href="{{ route('article.index') }}" class="text-secondary">Vai alla lista degli articoli</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
