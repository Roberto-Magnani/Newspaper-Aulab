<x-layout>
    <div class="container-fluid">
        <div class="row vh-100 align-content-center justify-content-center">
            <div class="col-12 col-md-6 myclass bg-body-secondary rounded-4 mt-5 bordercustom">
                <div class="display-1">
                    Registrati
                </div>
                <br>
                {{-- inizio form di registrazione --}}
                <form method="POST" action="{{route ('register')}}" > 
                    @csrf
                    <div class="mb-3">
                        <label  class="form-label">Indirizzo Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror                           
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Conferma Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    
                    <button type="submit" class="btn btn-outline-danger">Registrati</button>
                </form>
                <div class="mt-4 mb-4">
                    <p>Sei giá registrato? Allora torna indietro ed effettua l'accesso:</p>
                    <a href="{{route('login')}}" class="btn btn-outline-danger">Torna al login</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>