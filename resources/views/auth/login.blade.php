<x-layout>
    <div class="container-fluid">
        <div class="row vh-100 align-content-center justify-content-center">
            <div class="col-12 col-md-6 myclass bg-body-secondary rounded-4 bordercustom">
                <div class="display-1">
                    Accedi:
                </div>
                {{-- inizio form di registrazione --}}
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label  class="form-label">Indirizzo Email:</label>
                        <input type="email" class="form-control"  name="email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-outline-danger">Accedi</button>
                </form>
                <div class="mt-5 mb-5">
                    <p>Non sei ancora registrato? Allora che aspetti, fallo subito:</p>
                    <a href="{{route('register')}}" class="btn btn-outline-danger">Registrati</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>


