@extends('layouts.app')
@section('title', 'Daftar Pengaduan')
@section('content')
    <h2 class="mb-4">💬 Daftar Semua Pengaduan</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light"><tr><th>#</th><th>Pelapor</th><th>Judul</th><th>Foto</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead>
                <tbody>
                    @foreach($pengaduan as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->judul }}</td>
                        <td>
                            @php
                                $fotoBukti = collect([$p->foto_bukti])->merge($p->fotoBukti->pluck('path'))->filter();
                            @endphp
                            @if($fotoBukti->isNotEmpty())
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($fotoBukti as $path)
                                    <a href="{{ asset('storage/'.$path) }}" target="_blank" rel="noopener">
                                        <img src="{{ asset('storage/'.$path) }}" alt="Foto bukti pengaduan" class="img-thumbnail" style="width: 56px; height: 48px; object-fit: cover;">
                                    </a>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-muted small">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.pengaduan.status', $p) }}" method="POST" class="d-flex gap-2">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm" aria-label="Status pengaduan {{ $p->judul }}">
                                    <option value="belum" @selected($p->status === 'belum')>Belum Ditangani</option>
                                    <option value="sedang" @selected($p->status === 'sedang')>Sedang Ditangani</option>
                                    <option value="sudah" @selected($p->status === 'sudah')>Sudah Ditangani</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-outline-success">Simpan</button>
                            </form>
                        </td>
                        <td>{{ $p->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.pengaduan.edit', $p) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.pengaduan.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengaduan ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection