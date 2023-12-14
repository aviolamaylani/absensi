<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::all();
        
        return view('pages.admin.guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $validateData['nama'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'email_verified_at' => now(),
        ]);

        Guru::create([
            'user_id' => $user->id,
            'jabatan' => $validateData['jabatan'],
        ]);

        $user->assignRole('guru');

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('pages.admin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $validateData = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'email' => 'required|string',
            'password' => 'nullable|string',
        ]);

        $guru->user->update([
            'name' => $validateData['nama'],
            'email' => $validateData['email'],
            'password' => isset($validateData['password']) ? Hash::make($validateData['password']) : $guru->user->password,
        ]);

        $guru->update([
            'jabatan' => $validateData['jabatan'],
        ]);

        return redirect()->route('guru.index')->with('warning', 'Data guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus');
    }
}
