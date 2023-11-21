<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Login a user and create a new token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {


            $validatedData = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ]);

            //response error validation
            if ($validatedData->fails()) {
                return response()->json(['message' => $validatedData->errors()->all()], 422);
            }

            $user = User::where('username', $request->username)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Password false or user Not Found',
                ], 404);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            // if password is correct
            if (Hash::check($request->password, $user->password, [])) {
                // check role
                if ($user->role == 'Dosen') {
                    // get data Dosen
                    $dosen = $user->dosen;

                    return response()->json([
                        'data' => $dosen,
                        'username' => $user->username,
                        'message' => 'Authenticated as a Dosen active',
                        'role' => 'Dosen',
                        'token_type' => 'Bearer',
                        'access_token' => $token
                    ], 200);
                } else if ($user->role == 'Pegawai') {
                    // get data Pegawai
                    $data = $user->pegawai;

                    // return
                    return response()->json([
                        'data' => $data,
                        'username' => $user->username,
                        'message' => 'Authenticated as a Pegawai active',
                        'role' => 'Pegawai',
                        'token_type' => 'Bearer',
                        'access_token' => $token
                    ], 200);
                } else if ($user->role == 'Kepala Urusan Sumber Daya') {
                    // get data Kepala Urusan Sumber Daya
                    $data = $user->kepalaUrusanSumberDaya;

                    // return
                    return response()->json([
                        'data' => $data,
                        'username' => $user->username,
                        'message' => 'Authenticated as a Kepala Urusan Sumber Daya active',
                        'role' => 'Kepala Urusan Sumber Daya',
                        'token_type' => 'Bearer',
                        'access_token' => $token
                    ], 200);
                } else if ($user->role == 'Ketua Kelompok Keahlian') {
                    // get data Ketua Kelompok Keahlian
                    $data = $user->ketuaKelompokKeahlian;

                    // return
                    return response()->json([
                        'data' => $data,
                        'username' => $user->username,
                        'message' => 'Authenticated as a Ketua Kelompok Keahlian active',
                        'role' => 'Ketua Kelompok Keahlian',
                        'token_type' => 'Bearer',
                        'access_token' => $token
                    ], 200);
                } else if ($user->role == 'Ketua Program Studi') {
                    // get data Ketua Program Studi
                    $data = $user->kaprodi;

                    // return
                    return response()->json([
                        'data' => $data,
                        'username' => $user->username,
                        'message' => 'Authenticated as a Ketua Program Studi active',
                        'role' => 'Ketua Program Studi',
                        'token_type' => 'Bearer',
                        'access_token' => $token
                    ], 200);
                } else if ($user->role == 'Bidang II') {
                    // get data Bidang II
                    $data = $user->bidangII;

                    // return
                    return response()->json([
                        'data' => $data,
                        'username' => $user->username,
                        'message' => 'Authenticated as a Bidang II active',
                        'role' => 'Bidang II',
                        'token_type' => 'Bearer',
                        'access_token' => $token
                    ], 200);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Password false or user Not Found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // change password
    public function changePassword(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'username' => 'required',
                'new_password' => 'required',
            ]);

            //response error validation
            if ($validatedData->fails()) {
                return response()->json(['message' => $validatedData->errors()->all()], 422);
            }

            $user = User::where('username', $request->username)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'username user Not Found',
                ], 404);
            }

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Password changed successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Password failed to change',
                ], 409);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Logout a user (revoke the token).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out',
        ], 200);
    }

    public function userLogin()
    {
        try {
            $user = Auth::user();

            switch ($user->role) {
                case 'Dosen':
                    $data = $user->dosen;
                    $message = 'Profile Dosen';
                    break;

                case 'Pegawai':
                    $data = $user->pegawai;
                    $message = ' Profile Pegawai';
                    break;

                case 'Kepala Urusan Sumber Daya':
                    $data = $user->kepalaUrusanSumberDaya;
                    $message = ' Profile Kepala Urusan Sumber Daya';
                    break;

                case 'Ketua Kelompok Keahlian':
                    $data = $user->ketuaKelompokKeahlian;
                    $message = ' Profile Ketua Kelompok Keahlian';
                    break;

                case 'Ketua Program Studi':
                    $data = $user->kaprodi;
                    $message = ' Profile Ketua Program Studi';
                    break;

                case 'Bidang II':
                    $data = $user->bidangII;
                    $message = ' Profile Bidang II';
                    break;

                default:
                    $data = null;
                    $message = 'Unknown role';
                    break;
            }

            return response()->json([
                'data' => $data,
                'username' => $user->username,
                'message' => $message,
                'role' => $user->role,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    // updateUserLogin
    public function updateUserLogin(Request $request)
    {
        try {
            $user = Auth::user();

            switch ($user->role) {
                case 'Dosen':
                    $data = $user->dosen;
                    $message = 'Berhasil Edit Data Dosen';
                    break;

                case 'Pegawai':
                    $data = $user->pegawai;
                    $message = ' Berhasil Edit Data Pegawai';
                    break;

                case 'Kepala Urusan Sumber Daya':
                    $data = $user->kepalaUrusanSumberDaya;
                    $message = ' Berhasil Edit Data Kepala Urusan Sumber Daya';
                    break;

                case 'Ketua Kelompok Keahlian':
                    $data = $user->ketuaKelompokKeahlian;
                    $message = ' Berhasil Edit Data Ketua Kelompok Keahlian';
                    break;

                case 'Ketua Program Studi':
                    $data = $user->kaprodi;
                    $message = ' Berhasil Edit Data Ketua Program Studi';
                    break;

                case 'Bidang II':
                    $data = $user->bidangII;
                    $message = ' Berhasil Edit Data Bidang II';
                    break;

                default:
                    $data = null;
                    $message = 'Unknown role';
                    break;
            }

            $data->update($request->all());

            return response()->json([
                'data' => $data,
                'message' => $message
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
