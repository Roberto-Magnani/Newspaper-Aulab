<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Utente</th>
            <th scope="col">Ruolo</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($acceptedRoles as $user)
        <tr>
            
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name}}</td>
            <td>
                @if($user->is_admin)
                Amministratore
                @elseif($user->is_revisor)
                Revisore
                @elseif($user->is_writer)
                Redattore
                @endif
            </td>
            <td>
                <form action="{{ route('admin.updateRole', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="new_role" class="form-control">
                            <option value="admin" {{ $user->is_admin ? 'selected' : '' }}>Amministratore</option>
                            <option value="revisor" {{ $user->is_revisor ? 'selected' : '' }}>Revisore</option>
                            <option value="writer" {{ $user->is_writer ? 'selected' : '' }}>Redattore</option>
                            <option value="none" {{ !$user->is_admin && !$user->is_revisor && !$user->is_writer ? 'selected' : '' }}>Nessun ruolo</option>
                        </select>
                        <button type="submit" class="btn btn-secondary">Modifica ruolo</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>