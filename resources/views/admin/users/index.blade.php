@extends('layouts.app')
@section('title', 'Data User')
@section('content')
    <h2 class="mb-4">Data User</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($user->foto)
                                    <img src="{{ asset('storage/'.$user->foto) }}" class="rounded-circle me-2" width="35" height="35" style="object-fit:cover;">
                                @else
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width:35px; height:35px; font-weight:bold;">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                @endif
                                {{ $user->name }}
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @php
                                $badge = ['admin' => 'danger', 'customer' => 'info'];
                            @endphp
                            <span class="badge bg-{{ $badge[$user->role] }} text-uppercase">{{ $user->role }}</span>
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection