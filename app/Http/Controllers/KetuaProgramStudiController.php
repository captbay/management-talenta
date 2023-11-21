<?php

namespace App\Http\Controllers;

use App\Models\ketuaProgramStudi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KetuaProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the
        $ketuaProgramStudi = ketuaProgramStudi::all();

        // Return the response
        return response()->json([
            'success' => true,
            'message' => 'Daftar data ketuaProgramStudi',
            'data'    => $ketuaProgramStudi
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
        // Find the resource
        $ketuaProgramStudi = ketuaProgramStudi::find($id);

        // If the resource is not found, return the response 404
        if (!$ketuaProgramStudi) {
            return response()->json([
                'success' => false,
                'message' => 'Data ketuaProgramStudi tidak ditemukan!'
            ], 404);
        }

        // If the resource is found, return the response 200
        return response()->json([
            'success' => true,
            'message' => 'Detail data ketuaProgramStudi',
            'data'    => $ketuaProgramStudi
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
