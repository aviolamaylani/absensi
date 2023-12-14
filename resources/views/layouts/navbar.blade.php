<section>
    <div class="py-2 border-b px-8">
        <div class="flex justify-between gap-4 px-1 text-lg font-bold">
            <div class="w-20"></div>
            <div class="flex gap-3">
                <a href="{{ route('absen.index') }}" class="btn bg-sky-700 text-white hover:bg-sky-800">Absensi</a>
                <a href="{{ route('guru.index') }}" class="btn bg-sky-700 text-white hover:bg-sky-800">Guru</a>
            </div>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn bg-sky-700 text-white hover:bg-sky-800">Logout</button>
            </form>
        </div>
</section>
