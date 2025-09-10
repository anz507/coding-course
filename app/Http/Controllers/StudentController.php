<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        $students = \App\Models\Student::all();

        return Inertia::render('Students/Index', [
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        // validation block
        $request->validate([
            'kelas_id' => 'required|numeric',
            'nama' => 'required|string',
            'alamat' => 'string',
            'jenis_kelamin' => 'required|string',
            'nama_orang_tua' => 'required|string',
        ]);

        $student = new Student();
        $student->kelas_id = $request->input('kelas_id');
        $student->nama = $request->input('nama');
        $student->alamat = $request->input('alamat');
        $student->jenis_kelamin = $request->input('jenis_kelamin');
        $student->nama_orang_tua = $request->input('nama_orang_tua');
        $student->save();

        return back();
    }

    public function update(Request $request, $id)
    {
        // validation block
        $request->validate([
            'kelas_id' => 'required|numeric',
            'nama' => 'required|string',
            'alamat' => 'string',
            'jenis_kelamin' => 'required|string',
            'nama_orang_tua' => 'required|string',
        ]);

        $student = Student::find($id);
        $student->kelas_id = $request->input('kelas_id');
        $student->nama = $request->input('nama');
        $student->alamat = $request->input('alamat');
        $student->jenis_kelamin = $request->input('jenis_kelamin');
        $student->nama_orang_tua = $request->input('nama_orang_tua');
        $student->save();

        return back();
    }

    public function destroy(Request $request, $id)
    {
        $student = Student::destroy($id);
        return back();
    }
}
