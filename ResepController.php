<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index()
    {
        $reseps = Resep::all();
        return view('reseps.index', compact('reseps'));
    }

    public function create()
    {
        return view('reseps.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bahan' => 'required|string',
            'langkah' => 'required|string',
        ]);

        Resep::create($validated);

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    public function edit(Resep $resep)
    {
        return view('reseps.edit', compact('resep'));
    }

    public function update(Request $request, Resep $resep)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bahan' => 'required|string',
            'langkah' => 'required|string',
        ]);

        $resep->update($validated);

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy(Resep $resep)
    {
        $resep->delete();

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil dihapus!');
    }

    public function downloadPDF()
    {
        $reseps = Resep::all();

        $pdf = Pdf::loadView('reseps.pdf', compact('reseps'));
        return $pdf->download('daftar_resep.pdf');
    }
}
