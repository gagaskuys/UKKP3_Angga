<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PengaduanController extends Controller
{
    // CUSTOMER: buat pengaduan
public function create()
{
    $kategori = Kategori::OPTIONS;
    return view('customer.pengaduan.create', compact('kategori'));
}

public function store(Request $request)
{
    $data = $request->validate([
        'judul'      => 'required|min:5',
        'kategori'   => ['required', Rule::in(Kategori::OPTIONS)],
        'keluhan'    => 'required|min:10',
        'foto_bukti' => 'nullable|array|max:5',
        'foto_bukti.*' => 'image|max:2048',
    ]);

    $fotoBukti = $request->file('foto_bukti', []) ?? [];
    unset($data['foto_bukti']);
    $data['user_id'] = auth()->id();

    $pengaduan = Pengaduan::create($data);
    $fotoPaths = [];
    foreach ($fotoBukti as $foto) {
        $fotoPaths[] = ['path' => $foto->store('pengaduan', 'public')];
    }
    $pengaduan->fotoBukti()->createMany($fotoPaths);
    return redirect()->route('customer.pengaduan.index')->with('success', 'Pengaduan berhasil dikirim!');
}

    // CUSTOMER: lihat pengaduan sendiri
    public function customerIndex()
    {
        $pengaduan = Pengaduan::with('fotoBukti')->where('user_id', auth()->id())->latest()->get();
        return view('customer.pengaduan.index', compact('pengaduan'));
    }

    // ADMIN: lihat semua pengaduan
    public function adminIndex()
    {
        $pengaduan = Pengaduan::with(['user', 'fotoBukti'])->latest()->get();
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    // ADMIN: edit & hapus pengaduan
    public function edit(Pengaduan $pengaduan)
    {
        return view('admin.pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $data = $request->validate([
            'judul'   => 'required|min:5',
            'keluhan' => 'required|min:10',
            'status'  => 'required|in:belum,sedang,sudah',
        ]);

        $pengaduan->update($data);
        return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil diupdate!');
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $data = $request->validate([
            'status' => 'required|in:belum,sedang,sudah',
        ]);

        $pengaduan->update($data);
        return redirect()->route('admin.pengaduan.index')->with('success', 'Status pengaduan berhasil diubah!');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $fotoPaths = $pengaduan->fotoBukti()->pluck('path')->all();
        if ($pengaduan->foto_bukti) $fotoPaths[] = $pengaduan->foto_bukti;
        Storage::disk('public')->delete($fotoPaths);
        $pengaduan->delete();
        return back()->with('success', 'Pengaduan berhasil dihapus!');
    }

}