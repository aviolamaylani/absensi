@extends('layouts.app')

@section('content')
    <div class="mt-20 flex flex-col w-full items-center rounded-xl">
        <form method="post" action="{{ route('guru.store') }}" class="border flex flex-col w-1/2 gap-4 p-6 rounded-xl">
			@csrf
            <div class="text-center mb-4">
                <h2 class="text-primary font-bold text-3xl">Tambah guru</h2>
            </div>
            <div class="form-control">
                <input type="text" name="nama" placeholder="Nama guru" class="input input-bordered w-full" />
            </div>
            <div class="form-control">
                <input type="text" name="jabatan" placeholder="Jabatan guru" class="input input-bordered w-full" />
            </div>
            <div class="form-control">
                <input type="text" name="email" placeholder="Email" class="input input-bordered w-full" />
            </div>
            <div class="form-control mb-4">
                <input type="password" name="password" placeholder="Password" class="input input-bordered w-full" />
            </div>
            <button class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
@endsection
