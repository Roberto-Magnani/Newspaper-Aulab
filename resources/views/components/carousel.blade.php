{{-- carousel --}}
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner p-0 rounded bordercustom">
        
        @foreach ($categories as $key => $category)
            <div class="carousel-item container-custom2 {{ $loop->first ? 'active' : '' }} ">
                <div class="d-block bg-body-secondary text-center mb-3">
                    <h2 class="h2-custom">Ultime notizie</h2>
                    <h2 class="h2-custom">{{ $category->name }}</h2>
                </div>
                @if ($category->articles->isEmpty())
                    <div class="d-block align-items-center">
                        <p>Non sono ancora presenti articoli per questa categoria</p>
                    </div>
                @endif
                @if ($category->articles->isNotEmpty())
                    <a href="{{ route('article.show', $category->articles->last()) }}" class="btn">
                        <div class="card carousel-card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($category->articles->last()->title, 20) }}</h5>
                                <img class="card-img-bottom"
                                    src="{{ Storage::url($category->articles->last()->image) }}"
                                    alt="Immagine dell'articolo {{ $category->articles->last()->title }}">
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- carousel end --}}
