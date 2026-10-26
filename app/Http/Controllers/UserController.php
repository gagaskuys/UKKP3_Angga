<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // ADMIN: lihat SEMUA user
    public function adminIndex()
    {
        $users = User::select('id', 'name', 'email', 'role', 'foto', 'created_at')->latest()->get();
        return view('admin.users.index', compact('users'));
    }
}
