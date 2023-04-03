<h1>Demandes d'inscription en attente</h1>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Date d'inscription</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
@foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('admin.approve', $user->id) }}">Approuver</a>
                    <a href="{{ route('admin.reject', $user->id) }}">Rejeter</a>
                </td>
    </tr>
@endforeach
</tbody>
</table>