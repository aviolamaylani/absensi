@extends('layouts.app')

@section('content')
    <div class="mt-20 flex flex-col w-full items-center rounded-xl">
        <form method="post" action="{{ route('guru.update', $guru) }}" class="border flex flex-col w-1/2 gap-4 p-6 rounded-xl">
			@method("put")
			@csrf
            <div class="text-center mb-4">
                <h2 class="text-primary font-bold text-3xl">Edit guru</h2>
            </div>
            <div class="form-control">
                <input type="text" name="nama" placeholder="Nama guru" class="input input-bordered w-full" value="{{ $guru->user->name }}" />
            </div>
            <div class="form-control">
                <input type="text" name="jabatan" placeholder="Jabatan guru" class="input input-bordered w-full" value="{{ $guru->jabatan }}" />
            </div>
            <div class="form-control">
                <input type="text" name="email" placeholder="Email" class="input input-bordered w-full" value="{{ $guru->user->email }}" />
            </div>
            <div class="form-control mb-4">
                <input type="password" name="password" placeholder="Password? Kosongkan jika tidak diubah" class="input input-bordered w-full" />
            </div>
            <button class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
@endsection
