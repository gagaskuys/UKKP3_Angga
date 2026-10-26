<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Kategori;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = [
            'total_pengaduan' => $user->isAdmin()
                ? Pengaduan::count()
                : Pengaduan::where('user_id', $user->id)->count(),
            'pengaduan_belum' => $user->isAdmin()
                ? Pengaduan::where('status', 'belum')->count()
                : Pengaduan::where('user_id', $user->id)->where('status', 'belum')->count(),
        ];

        if ($user->isAdmin()) {
            $data['total_user']     = User::count();
            $data['total_kategori'] = count(Kategori::OPTIONS);
        }

        return view('dashboard', $data);
    }
}