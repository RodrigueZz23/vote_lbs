<?php

namespace App\Http\Controllers;
use App\Models\Candidat2;
use Illuminate\Http\Request;
use App\Models\Vote;
class Votec2Controller extends Controller
{

    public function votec2()
    {

    if (auth()->check()) {
        return view('votec2');
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

        $candidat2 = new Candidat2();

        $candidat2->save();

        $vote = new Vote();
        $vote->user_id = $userId;
        $vote->save();

        return back()->with('success', 'Votre réponse a été bien enrégistré');
    }
        public function show(){
            $data=Candidat2::all();
            $count = Candidat2::count();

            return view('listc2', ['Candidat2s' => $data, 'count' => $count]);
        }
}
