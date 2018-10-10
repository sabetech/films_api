<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class FilmController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list films here ...

        $films = Film::paginate(1);

        return view('films')
            ->with('films', $films);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return a form for user to fill to create a film ... 
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'release_date' =>'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'genre' => 'required',
            'picture' => 'required'
        ]);


        //save a film instance ...
        $path = $request->file('picture')->store('public/movie_photo');

        //generate a url_slug ... 
        $url_slug = str_slug($request->input('name') .' '.date("Y-m-d H-i-s")); //for unique slugs

        $film = Film::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'release_date' => self::convertToUnixTimeStamp($request->input('release_date')),
                'rating' => $request->input('rating'),
                'ticket_price' => $request->input('ticket_price'),
                'country' => $request->input('country'),
                'genre' => $request->input('genre'),
                'photo' => $path,
                'url_slug' => $url_slug

                    ]);

        //saved ...

        ///show currently  stored films ..

        return redirect()->route('films.index');



    }

    public static function convertToUnixTimeStamp($dateString){
        $_date = new \DateTime($dateString);
        
        $_date->format("U");
        
        return $_date->getTimestamp();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url_slug)
    {
        //get film frm url_slug
        $film = Film::where('url_slug','=', $url_slug)->first();

        return view('show_details')
                ->with('film', $film);

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
