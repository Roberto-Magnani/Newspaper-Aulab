<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center container-custom2">
        <div class="row justify-content-center">
            <div class="col-12 text-custom">
                <h1 class="display-1">Bentornato, revisore {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>           
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli da revisionare</h2>
                <x-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli accettati</h2>
                <x-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli rifiutati</h2>
                <x-articles-table :articles="$rejectArticles"/>
            </div>
        </div>
    </div>
</x-layout>