<?php
// helpers itu sama kaya servis yang nanti property method yang bakal di panggil di controller (cuman 1 method) 
// kalo libraries method nya lebih dari satu
// mengatur posisi file
namespace App\Http\Libraries;

use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Array_;
use PhpParser\Node\Expr\Cast\String_;

class BaseApi
{
    // variable yang ucman bisa di akses di class ini dan turunannya 
    protected $baseUrl;
    // fungsi __construct  menyiapkan isi data dijalan otomatis tanpa di panggil 
    public function __construct()
    {
        // var $baseUrl yang diatas diisi nilai nya dari isian file .env bagian API_HOST
        // var ini diisi otomatis ketika file/class BaseApi dipanggil di controller 
        $this->baseUrl = "http://127.0.0.1:3333";
    }
    private function client()
    {
        // koneksikan ip dari var $baseUrl ke depedency Http
        // menggunakan depedency Http karena project API nya berbasis web ( protocol Http)
        return Http::baseUrl($this->baseUrl);
    }
    public function index(String $endpoint, Array $data = [])
    {
        // menggil ke function client yang diatas, terus menggil path yang dari $endpoint yang dikirm controllernya kalau ada data yang mau di cari ( params si postman ) diambil dari parameter2 $data
        return $this->client()->get($endpoint, $data);
    }
    public function store(String $endpoint, Array $data = [])
    {
        // method nya di sama in kaya di restapi nya 
        return $this->client()->post($endpoint, $data);
    }
    public function edit(String $endpoint, Array $data = [])
    {
        // method nya di sama in kaya di restapi nya 
        return $this->client()->get($endpoint, $data);
    }
    public function update(String $endpoint, Array $data = [])
    {
        // method nya di sama in kaya di restapi nya 
        return $this->client()->patch($endpoint, $data);
    }
    public function destroy(String $endpoint, Array $data = [])
    {
        // method nya di sama in kaya di restapi nya 
        return $this->client()->delete($endpoint, $data);
    }
    public function trash(String $endpoint, Array $data = [])
    {
        // method nya di sama in kaya di restapi nya 
        return $this->client()->get($endpoint, $data);
    }
    public function restore(String $endpoint, Array $data = [])
    {
        // method nya di sama in kaya di restapi nya 
        return $this->client()->get($endpoint, $data);
    }
    public function permanenDelete(String $endpoint, Array $data = [])
    {
        // method nya di sama in kaya di restapi nya 
        return $this->client()->get($endpoint, $data);
    }

}
