<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\student;
use App\Models\User;

class PagesController extends Controller
{
    
    public function home()
    {
        return view('index');
    }
    
    public function mahasiswa(Request $request)
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
        return view('/mahasiswa', ['students' => $students]);
    }

    public function dosen(Request $request)
    {
        if ($request->has('search')) {
            $dosens = Dosen::where('nama','LIKE','%'.$request->search.'%')
                ->orWhere('jurusan','LIKE','%'.$request->search.'%')
                ->get();
        }else{
            $dosens = Dosen::all();
        }
        return view('/dosen', ['dosens' => $dosens]);
    }
}