<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index(){
        $series = Serie::all();
        return response()->json($series);
              
    }
    public function store(StoreSerieRequest $request){
          $series = new Serie();
          $series->name = $request->name;
          $series->description = $request->description;

          $series->save();
    }
    public function show($id){
        $series =  Serie::findorFail($id);

        return response()->json($series);
    }
    public function destroy($id){
        $series =  Serie::findorFail($id);

        $series->delete();

        return response()->json([
            'message'=>'Series was delete'
        ]);
    }
    public function update(UpdateSerieRequest $request,$id){
        $series =  Serie::findorFail($id);
        $series->name = $request->name;
        $series->description = $request->description;
        
        $series->update();

        return response()->json([
            'message'=>'Series was updated'
        ]);
    }
}
