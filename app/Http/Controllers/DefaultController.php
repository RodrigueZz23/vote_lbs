<?php

namespace App\Http\Controllers;

use App\Models\Candidat2;
use Illuminate\Http\Request;
use App\Models\Candidat1;
use App\Models\Bulletin_null;
use App\Models\Null_vote;

class DefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showResults(){
        $votesCandidat1 = Candidat1::count();
        $votesCandidat2 = Candidat2::count();
        $Bulletin_null  = Null_vote::count();
        return view('listes', ['Candidat2' => $votesCandidat2, 'Candidat1' => $votesCandidat1 , 'Null_vote' => $Bulletin_null]);


    }
}
