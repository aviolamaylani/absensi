@extends('layouts.app')

@section('content')
    <div class="mt-20">
        <div class="border rounded-xl overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absens as $absen)
                        <tr>
                            <td>{{ $absen->created_at }}</td>
                            <td>{{ $absen->guru->user->name }}</td>
                            <td>{{ $absen->guru->user->email }}</td>
                            <td>
                                <div class="badge badge-primary">{{ $absen->keterangan }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
