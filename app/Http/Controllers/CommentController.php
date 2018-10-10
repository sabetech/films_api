<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    //

	public function save(Request $request){

		if (! Auth::user()){
			return redirect()->route('login');
		}

		$posted = $request->input();

		$validatedData = $request->validate([
            'name' => 'required|max:255',
            'comment' => 'required'
        ]);

		$film = \App\Film::find($posted['film_id']);
		if ($film){

			//the user_id is enough to specify who typed the comment however, the instruction to this task requires a name field ...
			$comment = new \App\Comment([
									'name' => $posted['name'],
									'user_id' => Auth::user()->id,
									'comment' => $posted['comment'],
									'film_id' => $film->id
										]);

			$comment->save();

			return redirect()->route('films.index');
		}else{
			
			//return an error that says film not found ...
			return redirect()->back()
					->with('errors', [''])
		}

	}

}
