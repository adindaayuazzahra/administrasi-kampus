<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $dosens = Dosen::where('nama','LIKE','%'.$request->search.'%')
                ->orWhere('jurusan','LIKE','%'.$request->search.'%')
                ->get();
        }else{
            $dosens = Dosen::all();
        }
        return view('dosens/index', ['dosens' => $dosens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosens/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        Dosen::create($request->all());
        return redirect('/dosens')->with('status', 'Data Dosen berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('dosens/edit', ['dosen' => $dosen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        Dosen::where('id', $dosen->id)
            ->update([
                'nama'=> $request->nama,
                'email'=> $request->email,
                'jurusan'=> $request->jurusan
            ]);
        return redirect('/dosens')->with('status', 'Data dosen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);
        return redirect('/dosens')->with('status', 'Data Dosen berhasil dihapus!');
    }
}
