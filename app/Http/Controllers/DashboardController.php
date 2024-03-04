<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function all() 
    {
        if(!Auth::check()) return redirect()->route('login.index');

        return view ('dashboard.all.all', [
            "title" => "Dashboard",
        ]);
    }

    public function student(Request $request) 
    {
        if(!Auth::check()) return redirect()->route('login.index');

        $students = Student::latest()->filter(request(['search']))->paginate(8);
        return view('dashboard.student.all', [
            "title" => "Dashboard",
            "students" => $students,
            "kelass" => Kelas::all()
        ]);
    }

    public function studentShow($student)
    {
        if(!Auth::check()) return redirect()->route('login.index');

        return view ('student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student),
        ]);
    }

    public function studentCreate() 
    {
        if(!Auth::check()) return redirect()->route('login.index');

        return view ('dashboard.student.create', [
            "title" => "Students",
            "kelass" => Kelas::all()
        ]);
    }

    public function studentStore(Request $request)
    {
        if(!Auth::check()) return redirect()->route('login.index');

        $validateData = $request->validate([
            'nis'           => 'required|max:255',
            'nama'          => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id'      => 'required',
            'alamat'        => 'required',
        ]);

        $result = Student::create($validateData);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil ditambahkan !');
        }
    }

    public function studentDestory(Student $student) 
    {
        if(!Auth::check()) return redirect()->route('login.index');

        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function studentEdit(Student $student)
    {
        if(!Auth::check()) return redirect()->route('login.index');

        return view ('dashboard.student.edit', [
            "title" => "edit-data",
            "student" => $student,
            "kelass" => kelas::all()
        ]);
    }

    public function studentUpdate(Request $request, Student $student)
    {
        if(!Auth::check()) return redirect()->route('login.index');

        $validateData = $request->validate([
            'nis'           => 'required|max:255',
            'nama'          => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id'      => 'required',
            'alamat'        => 'required',
        ]);

        $result = Student::where('id', $student->id)->update($validateData);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil diubah !');
        }
    }

    public function kelas() 
    {
        if(!Auth::check()) return redirect()->route('login.index');
 
        return view ('dashboard.kelas.all', [
            "title" => "Dashboard",
            "kelass" => kelas::all(),
        ]);
    }

    public function kelasShow($kelas)
    {
        if(!Auth::check()) return redirect()->route('login.index');

        return view ('dashboard.kelas.detail', [
            "title" => "detail-kelas",
            "kelas" => kelas::find($kelas),
        ]);
    }

    public function kelasCreate() 
    {
        if(!Auth::check()) return redirect()->route('login.index');

        return view ('dashboard.kelas.create', [
            "title" => "Kelas",
            "kelas" => kelas::all()
        ]);
    }

    public function kelasStore(Request $request)
    {
        if(!Auth::check()) return redirect()->route('login.index');

        $validateData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        $result = kelas::create($validateData);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil ditambahkan !');
        }
    }

    public function kelasDestory(kelas $kelas) 
    {
        if(!Auth::check()) return redirect()->route('login.index');

        $result = kelas::destroy($kelas->id);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function kelasEdit(kelas $kelas)
    {
        if(!Auth::check()) return redirect()->route('login.index');

        return view ('dashboard.kelas.edit', [
            "title" => "edit-data",
            "nama" => $kelas,
        ]);
    }

    public function kelasUpdate(Request $request, kelas $kelas)
    {
        if(!Auth::check()) return redirect()->route('login.index');

        $validateData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        $result = kelas::where('id', $kelas->id)->update($validateData);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil diubah !');
        }
    }
}