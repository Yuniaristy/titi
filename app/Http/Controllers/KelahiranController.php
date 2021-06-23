<?php

namespace App\Http\Controllers;
use App\Models\Kelahiran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelahiran=Kelahiran::all();
        $title="Data kelahiran";
        return view('admin.berandakelahiran',compact('title','kelahiran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Input kelahiran";
        return view('admin.inputkelahiran',compact('title'));
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
                'namaibu'=>'required|unique:kelahirans|max:255',
                'namabapak'=>'required',
                'namaanak'=>'required',
                'tanggal'=>'required',
                'agama'=>'required',
                'alamat'=>'required',
            ],$message);
            $validasi['user_id']=Auth::id();
            Kelahiran::create($validasi);
            return redirect('kelahiran')->with('success','Data Berhasil Tersimpan');
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
        
        $kelahiran=Kelahiran::find($id);
        $title="Edit kelahiran";
        return view('admin.inputkelahiran',compact('title','kelahiran'));
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
                'namaibu'=>'required|unique:kelahirans|max:255',
                'namabapak'=>'required',
                'namaanak'=>'required',
                'tanggal'=>'required',
                'agama'=>'required',
                'alamat'=>'required',
            ],$message);
                $kelahiran=kelahiran::find($id);
                Storage::delete($kelahiran);
            $validasi['user_id']=Auth::id();
            kelahiran::where('id',$id)->update($validasi);
            return redirect('kelahiran')->with('success','Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelahiran=Kelahiran::find($id);
        if($kelahiran != null){
            Storage::delete($kelahiran);
            $kelahiran=Kelahiran::find($kelahiran->id);
            Kelahiran::where('id',$id)->delete();
        }
        return redirect('kelahiran')->with('sucess','Data berhasil terhapus');
    }
    
}
