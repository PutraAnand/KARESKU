<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function cetak()
    {
        $reseps = Resep::all();
        $pdf = PDF::loadView('reseps.report', compact('reseps'));
        return $pdf->download('reseps-report.pdf');
    }
    public function show($id)
    {
        $resep = Resep::findOrFail($id);
        return view('reseps.show', compact('resep'));
    }
}
