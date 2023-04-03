@foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>
            @if ($user->approved)
                Approuvé
            @else
                <a href="/approve/{{ $user->id }}">Approuver</a>
            @endif
        </td>
    </tr>
@endforeach
