<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mengabil data dari input search
        $search = $request->search;
        // memanggil libraries BaseApi method nya index dengan menirim parameter1 berupa path data dari API nya, parameter2 data untuk mengisi search_nama API nya 
        // fungsi new BaseApi memangggil libraries api nya kenapa pakai new si BaseApi itu nama class 
        // pemanggilan kedua BaseApi bisa paka BaseApi::index 
        // search_nama untuk mengirim request ke BaseApi nya 
        $data = (new BaseApi)->index('/api/students', ['search_nama' => $search]);
        // untuk mengambil response si jsonnya 
        $students = $data->json();
        // dd($students);
        // kirim hasil pengambilan data ke blade index
        // 'students' sama dengan index
        return view('index')->with(['students' => $students['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];
        
        $proses = (new BaseApi)->store('/api/students/store', $data);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil Menambah Data ke student API!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // proses ambil data api ke route rest api nya bagian students/id
        $data = (new BaseApi)->edit('/api/students/'. $id);
        if ($data->failed()) {
            // kalau data gagal di proses data diatas ambil deskripsi error dari json property data
            $errors = $data->json(['data']);
            // balikin ke halaman awal sama errors nya 
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            // kalau berhasil ambil data dari jsonnya 
            $student = $data->json(['data']);
            // alihin ke blade edit dengan mengririm data $student diatas agar bisa digunakan pada blade 
            return view('edit')->with(['student' => $student] );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
     $payloadd = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
     ];

     // panggil method update dari BaseApi kirim endpoint
     $proses = (new BaseApi)->update('/api/students/update/'. $id, $payloadd);
    //  dd($proses);
     if ($proses->failed()){
        //kalau gagal balikin lagi sama pesan errors dari json nya 
        $errors = $proses->json('data');
        return redirect()->back()->with(['Errors' => $errors]);
     }else{
        // kalau berhasil akan di arahkan ke / lalau ada pesan berhasil 
        return redirect('/')->with('success', 'Berhasil Mengubah Data student API!');
     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // proses ambil data api ke route rest api nya bagian students/destroy
        $proses = (new BaseApi)->destroy('/api/students/delete/'. $id);
        if($proses->failed()){
            // kalau gagal di balikin lagi dan sama ada pesan errors dari json nya 
            $errors = $proses->json('data');
            return redirect()->back()->with(['Errors' => $errors]);
        }else {
            // kalau berhasil di hapus akan di arahak ke home dan akan memunculkan pesan berhasil 
            return redirect('/')->with('success', 'Berhasil Menghapus Data Api!');
        }
    }

    public function trash()
    {
          // proses ambil data api ke route rest api nya bagian students/trash
        $data = (new BaseApi)->trash('/api/students/show/trash',);
        // untuk mengambil data dari json
        $trash = $data->json();
        // kirim hasil data ke trash 
        return view('trash')->with(['trash' => $trash['data']]);
    }

    public function restore($id)
    {
        // proses ambil data api ke route rest api nya bagian students/restore
        $proses = (new BaseApi)->restore('/api/students/trash/restore/'. $id);
        if ($proses->failed()){
            //kalau gagal balikin lagi sama pesan errors dari json nya 
            $errors = $proses->json('data');
            return redirect()->back()->with(['Errors' => $errors]);
         }else{
            // kalau data berhasil akan di arahkan ke halaman nya lagi dan akan memunculkan tulisan berhasil
            return redirect('/')->with('success', 'Berhasil mengrestore Data student API!');
         }
    }

    public function permanenDelete($id){
        // proses ambil data api ke route rest api nya bagian students/delete/permanent
        $proses = (new BaseApi)->permanenDelete('/api/students/trash/delete/permanen/'. $id);
        // dd($proses);

        if($proses->failed()){
            //kalau gagal balikin lagi sama pesan errors dari json nya 
            $errors = $proses->json('data');
            return redirect()->back()->with(['Errors' => $errors]);
        }else {
            // kalo berhasil di arahkan ke /trash all dan ada massage berhasil 
            return redirect()->back()->with('success', 'Berhasil Menghapus Data Permanent API!');
        }
    }
}