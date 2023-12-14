<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Http\Requests\StoreAbsenRequest;
use App\Http\Requests\UpdateAbsenRequest;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absens = Absen::all();

        return view('pages.admin.absen.index', compact('absens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // find absen by today date between 06.00 to 00.00 where guru_id = auth()->user()->guru->id
        $absen = Absen::where('guru_id', auth()->user()->guru->id)
            ->whereDate('created_at', today())
            ->whereTime('created_at', '>=', '07:15')
            ->whereTime('created_at', '<=', '17:00')
            ->first();

        return view('pages.guru.absen.create', compact('absen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'ket' => 'required|string',
        ]);

        Absen::create([
            'guru_id' => auth()->user()->guru->id,
            'keterangan' => $validateData['ket'],
        ]);
        
        return redirect()->route('absen.create')->with('success', 'Data absen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absen $absen)
    {
        return view('pages.admin.show', compact('absen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsenRequest $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
