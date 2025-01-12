<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center ">
            <div class="col-12">
                <h1 class="display-1">Inserisci un articolo:</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{ route('article.store') }}" class="card p-5 shadow"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" class="form-control" name="title" placeholder="Titolo*" id="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input type="text" class="form-control" name="subtitle" placeholder="Sottotitolo*"
                            id="subtitle" value="{{ old('subtitle') }}">
                        @error('subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Seleziona una immagine:</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Seleziona una categoria:</label>
                        <select class="form-control" name="category" id="category">
                            <option selected-disabled>Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input type="text" class="form-control" name="tags" id="tags" value="{{ old('tags') }}">
                        <span class="small text-muted fst-italic">dividi ogni tag con una virgola</span>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Testo:</label>
                        <textarea class="form-control" name="body" placeholder="Titolo*" id="body" cols="30" rows="7">{{ old('body') }}</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-outline-danger">Inserisci articolo</button>
                        <a href="{{ route('homepage') }}" class="text-secondary mt-2">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-layout>
