<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movie = Movie::all();
        return response()->json($movie);
              
    }
    public function store(StoreMovieRequest $request){
          $movie = new Movie();

          $movie->name = $request->name;
          $movie->description = $request->description;
          $movie->category_id = $request->category_id;
          $movie->file = $request->file;
          $movie->thumbnail = $request->thumbnail;
          $movie->rating = $request->rating;
          $movie->serie_id = $request->serie_id;
          $movie->date = now();

          $movie->save();
    }
    public function show($id){
        $movie =  Movie::findorFail($id);

        return response()->json($movie);
    }
    public function destroy($id){
        $movie =  Movie::findorFail($id);

        $movie->delete();

        return response()->json([
            'message'=>'Movie was delete'
        ]);
    }
    public function update(UpdateMovieRequest $request,$id){
        $movie =  Movie::findorFail($id);
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category_id = $request->category_id;
        $movie->file = $request->file;
        $movie->thumbnail = $request->thumbnail;
        $movie->rating = $request->rating;
        $movie->serie_id = $request->serie_id;
        $movie->date = now();
      
        $movie->update();

        return response()->json([
            'message'=>'Movie was updated'
        ]);
    }
}
