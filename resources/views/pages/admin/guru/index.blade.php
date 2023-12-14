@extends('layouts.app')

@section('content')
    <div class="mt-20">
        <div class="flex justify-end mb-3">
            <a href="{{ route("guru.create") }}" class="btn btn-primary w-32">Create</a>
        </div>
        <div class="border rounded-xl overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($gurus as $guru)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $guru->user->name }}</td>
                            <td>{{ $guru->jabatan }}</td>
                            <td>{{ $guru->user->email }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('guru.edit', $guru) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                                <form method="post" action="{{ route("guru.destroy", $guru) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-error btn-sm text-white">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
