<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $students = student::where('nama','LIKE','%'.$request->search.'%')
                ->orWhere('nim','LIKE','%'.$request->search.'%')
                ->orWhere('jurusan','LIKE','%'.$request->search.'%')
                ->get();
        }
        else {
            $students = student::all();
        }
        return view('students/index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students/create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $student = new Student;
        // $student->nama = $request->nama;
        // $student->nim = $request->nim;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;

        // $student->save();

        // student::create([
        //     'nama' => $request->nama,
        //     'nim' => $request->nim,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan
        //     ]);
        
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|size:10',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        student::create($request->all());
        return redirect('/students')->with('status', 'Data Mahasiswa berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {

        // return view('students/show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        return view('students/edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|size:10',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        student::where('id', $student->id)
            ->update([
                'nama'=> $request->nama,
                'nim'=> $request->nim,
                'email'=> $request->email,
                'jurusan'=> $request->jurusan
            ]);
        return redirect('/students')->with('status', 'Data Mahasiswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        student::destroy($student->id);
        return redirect('/students')->with('status', 'Data Mahasiswa berhasil dihapus!');
    }

}
