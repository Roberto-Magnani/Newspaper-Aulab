<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center container-custom2">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Bentornato, Amministratore {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
    @if (session('accept'))
        <div class="alert alert-success">
            {{ session('accept') }}
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session('reject'))
        <div class="alert alert-danger">
            {{ session('reject') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di Amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="Amministratore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Amministratori già accettati</h2>
                <x-requests-edit-table :acceptedRoles="$acceptedAdmin" role="Amministratore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di Revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="Revisore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Revisori già accettati</h2>
                
                <x-requests-edit-table :acceptedRoles="$acceptedRevisor" role="Revisore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di Redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="Redattore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Redattori già accettati</h2>
                <x-requests-edit-table :acceptedRoles="$acceptedWriter" role="Redattore"/>
            </div>
        </div>
    </div>
    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Tutti i tags:</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Tutte le categorie:</h2>
                <div class="bg-body-secondary">
                    <form action="{{ route('admin.storeCategory') }}" method="POST" class="w-50 d-flex m-3">
                        @csrf
                        <input type="text" name="name" class="form-control me-3 mt-3"
                            placeholder="Inserisci una nuova categoria*">
                        <button type="submit" class="btn btn-outline-primary me-3 mt-3">Aggiungi</button>
                    </form>
                    <x-metainfo-table :metaInfos="$categories" metaType="categories" />
                </div>
            </div>
        </div>
    </div>
</x-layout>
