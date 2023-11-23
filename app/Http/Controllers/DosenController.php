<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show nama, kode_dosen, jfa, prodi, pendidikan_terakhir data dosen
        $dosens = dosen::select('id', 'nama', 'kode_dosen', 'jfa', 'prodi', 'pendidikan_terakhir', 'kelompok_keahlian')->get();

        // return api
        return response()->json([
            "message" => "Berhasil mendapatkan semua data dosen",
            "data" => $dosens
        ], 200);
    }

    // display daya for graph count prodi with same name and grup them for result
    public function countProdi()
    {
        // Get data dosen, group by prodi and grup same name prodi, and count the occurrences of each prodi
        $dosens = dosen::select('prodi')->get()->groupBy('prodi')->map(function ($item) {
            return [
                // slice "Prodi" from the prodi name and "(FRI)" from the prodi name
                // 'prodi_name' => str_replace('PRODI', '', str_replace('(FRI)', '', $item->first()->prodi)),
                'prodi_name' => $item->first()->prodi, // Get the prodi name from the first item in the group
                'jumlah' => $item->count(), // Count occurrences of the prodi
            ];
        })->values(); // Convert the map to indexed array

        // Return the structured API response
        return response()->json([
            "message" => "Berhasil mendapatkan semua data dosen",
            "data" => $dosens
        ], 200);
    }

    public function countKelompokKeahlian()
    {
        // Get data dosen, group by kelompok_keahlian and grup same name kelompok_keahlian, and count the occurrences of each kelompok_keahlian
        $dosens = dosen::select('kelompok_keahlian')->get()->groupBy('kelompok_keahlian')->map(function ($item) {
            return [
                // slice "Kelompok Keahlian" from the kelompok_keahlian name
                'kelompok_keahlian_name' => $item->first()->kelompok_keahlian,
                'jumlah' => $item->count(), // Count occurrences of the kelompok_keahlian
            ];
        })->values(); // Convert the map to indexed array

        // Return the structured API response
        return response()->json([
            "message" => "Berhasil mendapatkan semua data dosen",
            "data" => $dosens
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //find  data dosen
        $dosen = dosen::find($id);

        // if dosen not found, response json api
        if (!$dosen) {
            return response()->json([
                'success' => false,
                'message' => 'Data dosen tidak ditemukan!',
            ], 404);
        }

        // return api
        return response()->json([
            "message" => "Berhasil mendapatkan data dosen dengan id: $id",
            "data" => $dosen
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
