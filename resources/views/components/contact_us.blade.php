<!-- section contact_us -->
<section class="container" id="contact_us">
    <div class="row justify-content-center">
        <div class="col-12 text-center my-5">
            <h2>CONTATTACI</h2>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>           
        @endif
        
        <div class="col-12 col-md-6">

            <form class="bg-body-secondary rounded-4 p-3 bordercustom" method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="userName" class="form-label">Nome:</label>
                    <input type="text" name="name" class="form-control"  placeholder="Nome*">
                </div>
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Indirizzo Email:</label>
                    <input type="email*" name="email" class="form-control" id="userEmail" placeholder="E-mail*">
                    <div id="emailHelp" class="form-text text-danger">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="userText" class="form-label">Esponoci il tuo quesito o la tua richiesta:</label>
                    <textarea type="text" name="description" class="form-control" cols="30" rows="5" id="userText" placeholder="Inserisci un testo!"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-dark">Invia</button>
            </form>
        </div>
    </div>
</section>