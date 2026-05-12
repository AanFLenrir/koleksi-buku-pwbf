<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Http;

class WilayahController extends Controller
{
    private $base = 'https://emsifa.github.io/api-wilayah-indonesia/api';

    public function provinsi()
    {
        $response = Http::get($this->base . '/provinces.json');
        return response()->json($response->json());
    }

    public function kota($provinsi_id)
    {
        $response = Http::get($this->base . '/regencies/' . $provinsi_id . '.json');
        return response()->json($response->json());
    }

    public function kecamatan($kota_id)
    {
        $response = Http::get($this->base . '/districts/' . $kota_id . '.json');
        return response()->json($response->json());
    }

    public function kelurahan($kecamatan_id)
    {
        $response = Http::get($this->base . '/villages/' . $kecamatan_id . '.json');
        return response()->json($response->json());
=======
use App\Models\ProvinsiModel;
use App\Models\KotaModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;

class WilayahController extends Controller
{
    public function getProvinsi(Request $request)
    {
        $provinsi = ProvinsiModel::all();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => [
                'provinsi' => $provinsi
            ]
        ]);
    }

    public function getKota(Request $request)
    {
        $id_provinsi = $request->post('id_provinsi');
        $kota = KotaModel::where('province_id', $id_provinsi)->get();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => [
                'kota' => $kota
            ]
        ]);
    }

    public function getKecamatan(Request $request)
    {
        $id_kota = $request->post('id_kota');
        $kecamatan = KecamatanModel::where('regency_id', $id_kota)->get();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => [
                'kecamatan' => $kecamatan
            ]
        ]);
    }

    public function getKelurahan(Request $request)
    {
        $id_kecamatan = $request->post('id_kecamatan');
        $kelurahan = KelurahanModel::where('district_id', $id_kecamatan)->get();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => [
                'kelurahan' => $kelurahan
            ]
        ]);
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
    }
}