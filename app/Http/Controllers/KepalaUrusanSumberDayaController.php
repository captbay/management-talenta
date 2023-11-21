<?php

namespace App\Http\Controllers;

use App\Models\kepalaUrusanSumberDaya;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KepalaUrusanSumberDayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all data kepalaUrusanSumberDaya
        $kepalaUrusanSumberDaya = kepalaUrusanSumberDaya::all();

        // return api
        return response()->json([
            'success' => true,
            'message' => 'Daftar data kepalaUrusanSumberDaya',
            'data'    => $kepalaUrusanSumberDaya
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
        // find kepalaUrusanSumberDaya by id
        $kepalaUrusanSumberDaya = kepalaUrusanSumberDaya::find($id);

        // if kepalaUrusanSumberDaya not found, response json api
        if (!$kepalaUrusanSumberDaya) {
            return response()->json([
                'success' => false,
                'message' => 'Data kepalaUrusanSumberDaya tidak ditemukan!'
            ], 404);
        }

        // return data kepalaUrusanSumberDaya
        return response()->json([
            'success' => true,
            'message' => 'Detail Data kepalaUrusanSumberDaya',
            'data'    => $kepalaUrusanSumberDaya
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
