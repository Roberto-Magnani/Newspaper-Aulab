<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center container-custom2">
        <div class="row justify-content-center">
            <div class="col-12 text-custom">
                <h1 class="display-1">Modifica l'articolo</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('article.update', $article) }}" method="POST" class="card p-5 shadow" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- subtitle --}}
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                            value="{{ $article->subtitle }}">
                        @error('subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- image --}}
                    <div class="mb-3">
                        <label >Immagine Attuale</label>
                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="d-flex w-50">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Seleziona una immagine</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- category --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Seleziona una categoria</label>
                        <select class="form-select" id="category" name="category">
                            <option selected value="{{ $article->category->id }}">{{ $article->category->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $article->category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- tags --}}
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags" value="{{ $article->tags->implode('name', ',') }}">
                        <span class="small text-muted fst-italic">dividi ogni tag con una virgola</span>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- contenuto dell'articolo --}}
                    <div class="mb-3">
                        <label for="body" class="form-label">Contenuto dell'articolo</label>
                        <textarea class="form-control" id="body" name="body" rows="10">{{ $article->body }}</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- submit button --}}
                    <div class="d-flex justify-content-center flex-column align-items-center mt-3">
                        <button type="submit" class="btn btn-warning">Modifica</button>
                        <a href="{{ route('homepage') }}" class="text-secondary mt-2">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>