<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Lavora con noi</h1>
            </div>
        </div>
    </div>
    <div class="container my-5 ">
        <div class="row">
            <div class="col-12 col-md-6 ">
                <form action="{{ route('careers.submit') }}" method="POST" class="card bg-body-secondary p-5 shadow">
                    @csrf

                    <div class="mb-3 ">
                        <label for="role" class="form-label">Scegli il ruolo:</label>
                        <select name="role" id="role" class="form-control">
                            <option value="" selected disabled>Seleziona un ruolo</option>
                            @if (!Auth::user()->is_admin)
                            <option value="admin">Amministratore</option>
                            @endif
                            @if (!Auth::user()->is_revisor)
                            <option value="revisor">Revisore</option>
                            @endif
                            @if (!Auth::user()->is_writer)
                            <option value="writer">Redattore</option>
                            @endif
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Messaggio:</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-outline-primary">Invia</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 p-5">
                <h2 class="h2-custom">Ciao {{ Auth::user()->name }}:</h2>
                <p>siamo lieti che tu voglia unirti al nostro team, scegli il tuo ruolo che più ti si addice, tenendo conto della descrizione sottostante.
                    <br>
                    Allegaci anche un breve testo di presentazione e dicci cosa ti spinge a lavorare con coi, un nostro admin prenderá in carico la tua richiesta e valuterá se sei idoneo.
                </p>
                <h2>Lavorare come Amministratore</h2>
                <p>Scegliendo di lavore come amministratore, ti occuperari di gestire le richieste di lavoro oltre a modificare/aggiungere le categorie.</p>
                <h2>Lavorare come Revisore</h2>
                <p>Sceglando di lavorare come revisore, ti occuperari di revisionare gli articoli e deciderai se un articolo potrá essere pubblicato o meno sulla piattaforma.</p>
                <h2>Lavorare come Redattore</h2>
                <p>Scegliendo di lavorare come redattore, ti occuperari di scrivere gli articoli che saranno pubblicati.</p>
            </div>
        </div>
    </div>

</x-layout>
