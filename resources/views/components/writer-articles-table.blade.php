<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th class="d-none d-md-table-cell" scope="col">Categoria</th>
            <th class="d-none d-md-table-cell" scope="col">Tags</th>
            <th class="d-none d-md-table-cell" scope="col">Inserito il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ Str::limit($article->title, 30)}}</td>
                <td class="d-none d-md-table-cell">{{ $article->category->name ?? 'nessuna categoria'}}</td>
                <td class="d-none d-md-table-cell">
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </td>   
                <td class="d-none d-md-table-cell">{{ $article->created_at-> format('d/m/Y') }}</td>
                <td>
                        <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary mb-2 mb-lg-0">Leggi l'articolo</a>
                        <a href="{{ route('article.edit', $article) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>