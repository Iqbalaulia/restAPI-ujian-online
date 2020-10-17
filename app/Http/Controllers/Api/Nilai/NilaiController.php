<?php

namespace App\Http\Controllers\Api\Nilai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Nilai\NilaiResource;
use App\Nilai;
use App\Soal;
use App\User;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return NilaiResource::collection(Nilai::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($android_id)
    {
         $users = DB::table('tbl_nilais')
         ->join('users','users.id', '=', 'tbl_nilais.user_id')
         ->where('android_id',$android_id)
         ->select(
             'tbl_nilais.benar', 'tbl_nilais.salah', 'tbl_nilais.kosong', 'tbl_nilais.score',
             'users.android_id','users.name', 'users.jenis_kelamin','users.kelas',
             'users.email','users.nik'
         )
         ->get();

         return response()->json([
             'data' => $users
         ]);
    }

    public function dashboard(){

        $lulus = Nilai::where('keterangan','LULUS')->count();
        $tidak_lulus = Nilai::where('keterangan','TIDAK LULUS')->count();
        $total_user = User::all()->count();
        $total_soal = Soal::all()->count();
        return response()->json([
            'lulus' => $lulus,
            'tidak lulus' => $tidak_lulus,
            'total siswa' => $total_soal,
            'total soal' => $total_soal,
        ], 202);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
