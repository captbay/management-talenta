<?php

namespace App\Http\Controllers;

use App\Models\BidangII;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BidangIIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show data
        $bidangII = BidangII::all();

        //response
        return response()->json([
            'success' => true,
            'message' => 'Daftar data bidangII',
            'data' => $bidangII
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
        // find the resource
        $bidangII = BidangII::find($id);

        // if resource not found, response 404
        if (!$bidangII) {
            return response()->json([
                'success' => false,
                'message' => 'Data bidangII tidak ditemukan!'
            ], 404);
        }

        // if resource found, response 200
        return response()->json([
            'success' => true,
            'message' => 'Detail data bidangII',
            'data' => $bidangII
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
