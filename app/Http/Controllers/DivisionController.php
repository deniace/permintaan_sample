<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan seluruh data
        $data = Division::all();
        return view("division.index", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // menapilkan form tambah data
        return view("division.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'nama_division' => 'required'
        ], [
            // error message
            'nama_division.required' => 'nama Division harus di isi'
        ]);

        Division::create($request->all());

        return redirect("/division")->with('status', 'data berhasil disimpan'); // dengan flashdata flash session
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        // menampilkan 1 division
        return view("division.show", ["data" => $division]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        // menampilkan form edit
        return view("division/edit", ["data" => $division]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        // validasi input
        $request->validate([
            'nama_division' => 'required'
        ], [
            // error message
            'nama_division.required' => 'nama Division harus di isi'
        ]);

        // menyimpan perubahan
        Division::where("id_division", $division->id_division)->update([
            "nama_division" => $request->nama_division
        ]);
        return redirect("/division")->with('status', 'data berhasil diubah'); // dengan flashdata / flash session
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        //
        Division::destroy($division->id_division);
        return redirect("/division")->with('status', 'data berhasil dihapus'); // dengan flashdata / flash session
    }
}
