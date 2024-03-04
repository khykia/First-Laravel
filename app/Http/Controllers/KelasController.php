<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index() {
        return view('kelas.all',
        [
            'title' => 'kelas',
            'active' => 'kelas',
            "kelas" => Kelas::all()
        ]
    );
    }

    public function kelasShow($kelas) {
        return view('kelas.detail', [
            "title" => "Kelas Details",
            "kelas" => Kelas::find($kelas)
        ]);
    }

    public function KelasEdit($kelas)
    {
        return view('kelas.edit',[
            "title" => "edit-kelas",
            "kelas" => $kelas
        ]);
    }

    public function kelasUpdate(Request $request, $kelas)
    {
        $validateData = $request->validate([
            "nama" => "required",
        ]);

        $result = Kelas::where('id', $kelas->id)->update($validateData);

        if ($result) {
            return redirect('dashboard/kelas/all')->with('success', 'Data kelas berhasil diperbarui.');
        }
    }

    public function kelasDestroy(Kelas $kelas)
    {
        $result = Kelas::destroy($kelas->kelas_id);

        if ($result) {
            return redirect('dashboard/kelas/all')->with('success', 'Data kelas berhasil dihapus.');
        }
    }

    public function kelasCreate()
    {
        return view('kelas.create', [
            'title' => 'Add Kelas',
            'kelas' => Kelas::all(), 
        ]);
    }

    public function kelasStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
        ]);

        $result = Kelas::create($validatedData);
    
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data kelas berhasil ditambahkan.');
        }
    }
}