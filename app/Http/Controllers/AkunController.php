<?php

namespace App\Http\Controllers;

use App\JabatanModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan seluruh data
        $data = User::all();
        return view("akun.index", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mangambil data seeluruh jabatan
        $jabatan = JabatanModel::all();
        // menapilkan form tambah data
        return view("akun.create", ["jabatan" => $jabatan]);
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
            'name' => ['required', 'string', 'max:255'],
            'id_role' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            // error message
            'name.required' => 'nama harus di isi',
            'id_role.required' => 'Harap Pilih jabatan',
            'email.required' => 'Email Harap diisi',
            'email.unique' => 'Email sudah ada',
            'password.required' => 'Harap isi password'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'id_role' => $request['id_role'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect("/akun")->with('status', 'data berhasil disimpan'); // dengan flashdata flash session
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // menampilkan detail
        return view("akun.show", ["data" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // mangambil data seeluruh jabatan
        $jabatan = JabatanModel::all();
        // menapilkan form edit
        return view("akun.edit", ["data" => $user, "jabatan" => $jabatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // validasi request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'id_role' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            // error message
            'name.required' => 'nama harus di isi',
            'id_role.required' => 'Harap Pilih jabatan',
            'email.required' => 'Email Harap diisi',
            'email.unique' => 'Email sudah ada',
            'password.required' => 'Harap isi password'
        ]);

        // menyimpan perubahan 
        User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'id_role' => $request->id_role,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        return redirect("/akun")->with('status', 'data berhasil diubah'); // dengan flashdata / flash session
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // menghapus data
        User::destroy($user->id);
        return redirect("/akun")->with('status', 'data berhasil dihapus'); // dengan flashdata / flash session
    }
}
