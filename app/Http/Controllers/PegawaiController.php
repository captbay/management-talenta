<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the resource
        $pegawai = pegawai::all();

        // Return the response
        return response()->json([
            'success' => true,
            'message' => 'Daftar data pegawai',
            'data'    => $pegawai
        ], 200);
    }

    public function countJabatanFungsional()
    {
        // Get data pegawai, group by jabatan_fungsional and grup same name jabatan_fungsional, and count the occurrences of each jabatan_fungsional
        $pegawais = pegawai::select('jabatan_fungsional')->get()->groupBy('jabatan_fungsional')->map(function ($item) {
            return [
                // slice "Jabatan Fungsional" from the jabatan_fungsional name
                'jabatan_name' => $item->first()->jabatan_fungsional,
                'jumlah' => $item->count(), // Count occurrences of the jabatan_fungsional
            ];
        })->values(); // Convert the map to indexed array

        // Return the structured API response
        return response()->json([
            "message" => "Berhasil mendapatkan semua data pegawai",
            "data" => $pegawais
        ], 200);
    }

    public function countStatus()
    {
        // Get data pegawai, group by status and grup same name status, and count the occurrences of each status
        $pegawais = pegawai::select('status')->get()->groupBy('status')->map(function ($item) {
            return [
                // slice "Status" from the status name
                'status_name' => $item->first()->status,
                'jumlah' => $item->count(), // Count occurrences of the status
            ];
        })->values(); // Convert the map to indexed array

        // Return the structured API response
        return response()->json([
            "message" => "Berhasil mendapatkan semua data pegawai",
            "data" => $pegawais
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
        // Get the
        $pegawai = pegawai::find($id);

        // If the resource is not found, return the response 404
        if (!$pegawai) {
            return response()->json([
                'success' => false,
                'message' => 'Data pegawai tidak ditemukan!'
            ], 404);
        }

        // If the resource is found, return the response 200
        return response()->json([
            'success' => true,
            'message' => 'Detail data pegawai',
            'data'    => $pegawai
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
