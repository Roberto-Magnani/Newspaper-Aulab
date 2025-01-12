<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <p class="p-custom">The Aulab Post</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Categorie</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('article.ByCategory', $category->id) }}">{{ $category->name }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Ciao {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @if (Auth::user()->is_admin)
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Pannello
                                        Amministratore
                                        @if (\App\Models\User::toBeRevisedCount() > 0)
                                            <span class="badge bg-danger">{{ \App\Models\User::toBeRevisedCount() }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a href="{{ route('revisor.dashboard') }}" class="dropdown-item">Pannello Revisore
                                        @if (\App\Models\Article::toBeRevisedCount() > 0)
                                            <span
                                                class="badge bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->is_writer)
                                <li>
                                    <a class="dropdown-item" href="{{ route('writer.dashboard') }}">Pannello
                                        Redattore</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('article.create') }}">Aggiungi un articolo</a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    <li class="nav-item">
                        <a href="{{ route('careers') }}" class="nav-link active" aria-current="page">Lavora con noi</a>
                    </li>
                    </li>
                @endauth

                @guest
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Benvenuto ospite</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
            <!-- Button trigger modal -->
            @auth
                @if (Auth::user()->is_writer)
                    <button type="button" class="btn btn-transparent me-3 notify" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fa-regular fa-bell"></i>
                        <i class="fa-solid fa-bell"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">{{ \App\Models\Article::tobeNotifiedCount(Auth::user()->id) }}</span>
                    </button>
                @endif

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-3" id="exampleModalLabel">Notifiche</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @foreach (\App\Models\Article::getArticles(Auth::user()->id) as $article)
                                    @if ($article->user_id == Auth::user()->id)
                                        <a href="{{ $article->is_accepted ? route('article.show', $article) : route('writer.dashboard') }}" class="text-decoration-none">
                                            <div
                                                class="alert alert-custom alert-{{ $article->is_accepted ? 'success' : 'danger' }}">
                                                <p class="ms-1">il tuo articolo {{ Str::limit($article->title, 20) }} è
                                                    stato
                                                    {{ $article->is_accepted ? 'accettato' : 'rifiutato' }}</p>
                                                <p class="text-muted text-end me-1">
                                                    {{ $article->updated_at->setTimezone('Europe/Rome')->format('d/m/Y H:i') }}
                                                </p>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
            
            <form action="{{ route('article.search') }}" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="query"
                    placeholder="Cerca tra gli articoli..." aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Cerca</button>
            </form>
        </div>
    </div>
</nav>
