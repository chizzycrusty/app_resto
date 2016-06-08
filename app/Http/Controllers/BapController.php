<?php

namespace App\Http\Controllers;

use App\Models\Bap;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BapController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Bap::orderBy('created_at', 'desc')->paginate(10);

        return view('bap.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this -> validate($request, [
            'name' => 'required',
            'NomPrenomCHEF' => 'required',
            'fonctionCHEF' => 'required',
            'adresseCHEF' => 'required',
            'emailCHEF' => 'required',
            'telCHEF' => 'required',
            'NomPrenomCON' => 'required',
            'fonctionCON' => 'required',
            'adresseCON' => 'required',
            'emailCON' => 'required',
            'telCON' => 'required',
            'social' => 'required',
            'type' => 'required',
            'raison' => 'required',
            'contexte' => 'required',
            'objectif' => 'required',
            'contraintes' => 'required'
        ]);

        $bap = new Bap;
        $input = $request -> input();
        $bap -> fill($input) -> save();

        return redirect() -> route('bap.create') -> with('success', 'Votre projet a été soumis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bap = Bap::findOrFail($id);

        return view('bap.show', compact('bap'));
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
        $this -> validate($request, [
            'accepted' => 'required'
        ]);

        $bap = Bap::findOrFail($id);
        $input = $request->input();
        $bap->fill($input)->save();

        return redirect() -> route('bap.index') -> with('success', 'Statut changé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bap = Bap::findOrFail($id);
        $bap->delete();

        return redirect() -> route('bap.index') -> with('success', 'Projet refusé');
    }
}
