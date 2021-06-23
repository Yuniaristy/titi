<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai=Pegawai::all();
        $title="DATA PEgawai";
        return view('admin.berandapegawai',compact('title','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="INPUT Pegawai";
        return view('admin.inputpegawai',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'nama'=>'required',
                'alamat'=>'required',
                'jk'=>'required',
                'no_telp'=>'required',
                'email'=>'required',
            ],$message);
            $validasi['user_id']=Auth::id();
            Pegawai::create($validasi);
            return redirect('pegawai')->with('success','Data Berhasil Tersimpan');
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
        
        $pegawai=Pegawai::find($id);
        $title="Edit Pegawai";
        return view('admin.inputpegawai',compact('title','pegawai'));
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
        $message=[
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'nama'=>'required',
                'alamat'=>'required',
                'jk'=>'required',
                'no_telp'=>'required',
                'email'=>'required',
            ],$message);
        $validasi['user_id']=Auth::id();
        Pegawai::where('id',$id)->update($validasi);
        return redirect('pegawai')->with('success','Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai=Pegawai::find($id);
        if($pegawai != null){
            Storage::delete($pegawai->gambar);
            $pegawai=Pegawai::find($pegawai->id);
            Pegawai::where('id',$id)->delete();
        }
        return redirect('pegawai')->with('sucess','Data berhasil terhapus');
    }
}
