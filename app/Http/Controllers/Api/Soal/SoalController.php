<?php

namespace App\Http\Controllers\Api\Soal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Soal\SoalResource;
use App\Soal;
use Illuminate\Http\Response;

class SoalController extends Controller
{
   
    public function index()
    {
        // $soal = Soal::all();

        // return $soal;

        return  SoalResource::collection(Soal::latest()->get());

    } 

    public function store(Request $request)
    {
        $soal = Soal::create($request->all());

        return response(new SoalResource($soal), Response::HTTP_CREATED);
    }

    
    public function show(Soal $soal)
    {
        return new SoalResource($soal);
    }

    public function update(Request $request, $id)
    {
        $soal = Soal::find($id);

        // dd($soal);

        $soal->update($request->all());    
        
        // dd($request->all());

        return response(new SoalResource($soal), Response::HTTP_CREATED);

    }

    public function destroy(Soal $soal)
    {
        $soal->delete();

        return response('Deleted', Response::HTTP_OK);
    }
}
