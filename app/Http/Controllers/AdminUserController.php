<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{
    public function index()
{
    $users = User::where('status', 'en attente')->get();
    return view('admin.users.index', ['users' => $users]);
}

public function approve($id)
{
    $user = User::find($id);
    $user->status = 'approuvé';
    $user->save();
    return redirect()->back()->with('success', 'L\'utilisateur a été approuvé avec succès.');
}


}
