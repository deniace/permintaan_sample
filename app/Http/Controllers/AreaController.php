<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan seluruh data
        $data = Area::all();
        return view("areas.index", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // menapilkan form tambah data
        return view("areas.create");
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
            'nama_area' => 'required',
            'singkatan_area' => 'required'
        ], [
            // error message
            'nama_area.required' => 'nama area harus di isi',
            'singkatan_area.required' => 'singkatan area harus di isi'
        ]);

        Area::create($request->all());

        return redirect("/areas")->with('status', 'data berhasil disimpan'); // dengan flashdata flash session
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        // menampilkan 1 area
        return view("areas.show", ["data" => $area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        // menampilkan form edit
        return view("areas/edit", ["data" => $area]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        // validasi input
        $request->validate([
            'nama_area' => 'required',
            'singkatan_area' => 'required'
        ], [
            // error message
            'nama_area.required' => 'nama area harus di isi',
            'singkatan_area.required' => 'singkatan area harus di isi'
        ]);

        // menyimpan perubahan
        Area::where("id_area", $area->id_area)->update([
            "nama_area" => $request->nama_area,
            "singkatan_area" => $request->singkatan_area
        ]);
        return redirect("/areas")->with('status', 'data berhasil diubah'); // dengan flashdata / flash session
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        Area::destroy($area->id_area);
        return redirect("/areas")->with('status', 'data berhasil dihapus'); // dengan flashdata / flash session
    }
}
