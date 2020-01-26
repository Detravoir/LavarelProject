<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Music;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::with('users')->get();
//        dd($musics);

        $genres = Music::select(['genre'])->distinct()->get();
//        dd($genres);

        return view('music', ['musics' => $musics, 'genres' => $genres]);
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
        $validation = $request->validate([
           'musicname' => 'required',
           'musicurl' => 'required',
           'genre'  => 'required'
        ]);

        $music = new Music;

        $music->music_name = $validation['musicname'];
        $music->music_url = $validation['musicurl'];
        $music->genre = $validation['genre'];
        $music->userid = Auth::id();

        $music->save();

        return view('upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
//        $this->authorize('delete', Music::class);
        $music = Music::find($id);
        $music->delete;

        return redirect()->back();
    }

    public function search(Request $request){
        $validateData = $request->validate([
            'search' => 'max: 225'
        ]);

        if(!empty($request->search)){
            $music = Music::where('music_name', 'like', '%' . $request->search . '%')->get();
            $genre = null;
        }else{
            $music = null;
        }
        if (!empty($request->genre)){
            $genre = Music::where('genre', 'like', '%' .$request->genre. '%')->get();
            $music = null;
        }else {
            $genre = null;
        }


        return view('musicsearch', [
            'genre' => $genre,
            'music_name' => $music
        ]);
    }
}
