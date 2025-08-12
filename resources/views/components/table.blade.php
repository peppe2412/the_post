<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequest as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @switch($role)
                        @case('amministratore')
                            <form action="{{ route('set-admin', $user) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Attiva {{ $role }}</button>
                            </form>
                        @break

                        @case('revisore')
                            <form action="{{ route('set-revisor', $user) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Attiva {{ $role }}</button>
                            </form>
                        @break

                        @case('writer')
                            <form action="{{ route('set-writer', $user) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Attiva {{ $role }}</button>
                            </form>
                        @break

                        @default
                    @endswitch
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
