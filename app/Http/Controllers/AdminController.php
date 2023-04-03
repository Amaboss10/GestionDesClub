<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('approved', false)->get();
        return view('admin.index', ['users' => $users]);
    }

    public function approveAccount($id)
{
    $user = User::findOrFail($id);
    $user->approved = true;
    $user->save();

    return redirect()->back()->with('success', 'Compte utilisateur approuvé avec succès !');
}


    public function approve(User $user)
    {
        $user->approved = true;
        $user->save();
        return redirect()->route('admin.index');
    }
}
