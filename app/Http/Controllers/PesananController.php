<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pesanan')
            ->join('users', 'pesanan.user_id', '=', 'users.id')
            ->select('pesanan.*', 'users.name as user_name')
            ->get();
    
        return view('pesanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $users = User::all(); // Assuming you have a User model

    return view('pesanan.create', compact('users'));
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_cucian' => 'required',
            'status' => 'required',
            'tanggal_pemesanan' => 'required',
            'berat' => 'required',
            'user_id' => 'required' // Assuming you have a field in the form to select the user
        ]);
    
        DB::insert("INSERT INTO `pesanan` (`id_pesanan`, `user_id`, `jenis_cucian`, `status`, `tanggal_pemesanan`, `berat`)
            VALUES (uuid(), ?, ?, ?, ?, ?)",
            [$request->user_id, $request->jenis_cucian, $request->status, $request->tanggal_pemesanan, $request->berat]);
    
        return redirect()->route('pesanan.index')->with(['success' => 'data berhasil disimpan']);
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
    public function edit($id)
    {
        $data=DB::table('pesanan')->where('id_pesanan',$id)->first();
        return view('pesanan.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'jenis_cucian' => 'required',
            'status' => 'required',
            'tanggal_pemesanan' => 'required',
            'berat' => 'required'
            
    ]);

    DB::update("UPDATE `pesanan` SET `jenis_cucian`=?, `status`=?, `tanggal_pemesanan`=?, `berat`=? WHERE id_pesanan =?",
    [$request->jenis_cucian,$request->status,$request->tanggal_pemesanan,$request->berat,$id]);
    return redirect()->route('pesanan.index')->with(['success' => 'data berhasil di update!']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pesanan')->where('id_pesanan',$id)->delete();

        //redirect to index
        return redirect()->route('pesanan.index')->with(['success'=>' data berhasil dihapus']);
    }
    
    
}