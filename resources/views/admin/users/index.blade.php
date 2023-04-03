@extends('layouts.app')

@section('content')
    <h1>Liste des utilisateurs en attente d'approbation</h1>

    @if($users->isEmpty())
        <p>Aucun utilisateur en attente.</p>
    @else
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
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.users.approve', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit">Approuver</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
