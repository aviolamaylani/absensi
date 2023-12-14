@extends('layouts.app')

@php
    // Get the current time
    $currentTime = now();
    
    // Define the start and end times for the condition
    $startTime = now()
        ->setHour(07)
        ->setMinute(15)
        ->setSecond(0);
    $endTime = now()
        ->setHour(17)
        ->setMinute(0)
        ->setSecond(0);
    
    // Check if the current time is within the specified range
    $isWithinRange = $currentTime >= $startTime && $currentTime <= $endTime;
@endphp

@section('content')
    <div class="flex flex-col justify-center items-center h-screen">

        @if ($absen == null)
            @if (!$isWithinRange)
                <div class="flex items-center justify-center bg-base-200 p-20 rounded-full text-5xl h-20 w-20 mb-3">
                    <i class="fa fa-question"></i>
                </div>
                <span class="text-xl mb-2">{{ Auth::user()->name }}</span>
                <span class="text-xl font-bold">Kamu alfa hari ini</span>
            @else
                <div class="flex items-center justify-center bg-base-200 p-20 rounded-full text-5xl h-20 w-20 mb-3">
                    <i class="fa fa-question"></i>
                </div>
                <span class="text-xl mb-2">{{ Auth::user()->name }}</span>
                <span class="text-xl font-bold mb-6">Kamu belum absen hari ini, yuk absen dulu.</span>

                <form method="post" action="{{ route('absen.store') }}" class="flex gap-4">
                    @csrf
                    <select class="select select-bordered rounded-full focus:outline-none w-full" name="ket">
                        <option value="hadir">
                            Hadir
                        </option>
                        <option value="sakit">
                            Sakit
                        </option>
                        <option value="izin">
                            Izin
                        </option>
                    </select>
                    <button class="btn rounded-full btn-primary">Submit</button>
                </form>
            @endif
        @else
            <div class="flex items-center justify-center bg-green-200 p-20 rounded-full text-5xl h-20 w-20 mb-3">
                <i class="fa fa-check"></i>
            </div>
            <span class="text-xl mb-2">{{ Auth::user()->name }}</span>
            <span class="text-xl font-bold mb-6">Kamu udh absen hari ini.</span>
            <span class="bg-primary px-4 py-2 text-white rounded-full font-bold">{{ $absen->keterangan }}</span>
        @endif
        <form method="post" action="{{ route('logout') }}" class="mt-20">
            @csrf
            <button type="submit" class="btn btn-primary rounded-full text-white hover:bg-sky-800">Logout</button>
        </form>

    </div>
@endsection
