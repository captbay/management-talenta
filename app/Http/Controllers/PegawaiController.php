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
