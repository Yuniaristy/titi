<?php

namespace App\Http\Controllers;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk=Penduduk::all();
        $title="Data Penduduk";
        return view('admin.berandapenduduk',compact('title','penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Input Penduduk";
        return view('admin.inputpenduduk',compact('title'));
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
                'nama'=>'required|unique:penduduks|max:255',
                'nik'=>'required',
                'tanggal'=>'required',
                'jk'=>'required',
                'alamat'=>'required',
            ],$message);
            $validasi['user_id']=Auth::id();
            penduduk::create($validasi);
            return redirect('penduduk')->with('success','Data Berhasil Tersimpan');
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
        
        $penduduk=Penduduk::find($id);
        $title="Edit penduduk";
        return view('admin.inputpenduduk',compact('title','penduduk'));
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
                'nama'=>'required|unique:penduduks|max:255',
                'nik'=>'required',
                'tanggal'=>'required',
                'jk'=>'required',
                'alamat'=>'required',
            ],$message);
                $penduduk=Penduduk::find($id);
                Storage::delete($penduduk);
            $validasi['user_id']=Auth::id();
            Penduduk::where('id',$id)->update($validasi);
            return redirect('penduduk')->with('success','Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penduduk=Penduduk::find($id);
        if($penduduk != null){
            Storage::delete($penduduk);
            $penduduk=Penduduk::find($penduduk->id);
            Penduduk::where('id',$id)->delete();
        }
        return redirect('penduduk')->with('sucess','Data berhasil terhapus');
    }
    
}
