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
        $dosens = dosen::select('id', 'nama', 'kode_dosen', 'jfa', 'prodi', 'pendidikan_terakhir')->get();

        // return api
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
