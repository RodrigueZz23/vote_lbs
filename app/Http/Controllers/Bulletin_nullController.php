<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Null_vote;
use Carbon\Carbon;
class Bulletin_nullController extends Controller
{

    public function bulletin_null()
    {
        if (auth()->check()) {
            return view('bulletin_null');
        } else {

            return view('non_authentifie');
        }
    }

      public function null_votePost(Request $request)
    {
        $userId = auth()->id();

        $hasVoted = Vote::where('user_id', $userId)->exists();

        if ($hasVoted) {
            return back()->with('error', 'Vous avez déjà voté. Une seule tentative est autorisée.');
        }


        $null_vote = new Null_vote();

        $null_vote ->save();


        $vote = new Vote();
        $vote->user_id = $userId;
        $vote->save();

        return back()->with('success', 'Votre réponse a été bien enrégistré');
    }

    public function show(){
        $data=null_vote ::all();
        $count =null_vote ::count();

        return view('listes', ['Null_votes ' => $data, 'count' => $count]);

    }


}
