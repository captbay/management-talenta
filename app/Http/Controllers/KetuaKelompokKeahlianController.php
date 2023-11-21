<?php

namespace App\Http\Controllers;

use App\Models\ketuaKelompokKeahlian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KetuaKelompokKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all data ketuaKelompokKeahlian
        $ketuaKelompokKeahlian = ketuaKelompokKeahlian::all();

        // return api
        return response()->json([
            'success' => true,
            'message' => 'Daftar data ketuaKelompokKeahlian',
            'data'    => $ketuaKelompokKeahlian
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
        // get all data ketuaKel
        $ketuaKelompokKeahlian = ketuaKelompokKeahlian::find($id);

        // if ketuaKelompokKeahlian not found, response json api
        if (!$ketuaKelompokKeahlian) {
            return response()->json([
                'success' => false,
                'message' => 'Data ketuaKelompokKeahlian tidak ditemukan!'
            ], 404);
        }

        // return data ketuaKelompokKeahlian
        return response()->json([
            'success' => true,
            'message' => 'Detail Data ketuaKelompokKeahlian',
            'data'    => $ketuaKelompokKeahlian
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
