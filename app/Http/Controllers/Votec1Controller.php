<?php

namespace App\Http\Controllers;
use App\Models\Candidat1;
use Illuminate\Http\Request;
use App\Models\Vote;


class Votec1Controller extends Controller
{
    public function votec1()
{
    if (auth()->check()) {
        return view('votec1');
    } else {

        return view('non_authentifie');
    }
}


public function votePost(Request $request)
{

    $userId = auth()->id();

        $hasVoted = Vote::where('user_id', $userId)->exists();

        if ($hasVoted) {
            return back()->with('error', 'Vous avez déjà voté. Une seule tentative est autorisée.');
        }

        $candidat1 = new Candidat1();

        $candidat1->save();

        $vote = new Vote();
        $vote->user_id = $userId;
        $vote->save();

        return back()->with('success', 'Votre réponse a été bien enrégistré');
    }
        public function show(){
            $data=Candidat1::all();
            $count = Candidat1::count();

            return view('listc2', ['Candidat2s' => $data, 'count' => $count]);
        }
}

