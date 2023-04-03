<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'en attente')->get();
        return view('admin.index', compact('users'));
    }
    
    public function approve(User $user)
{   
    $this->authorize('approve', $user);

    $user->status = 'approuvé';
    $user->save();

    return redirect()->back()->with('status', 'Utilisateur approuvé.');
}

}
