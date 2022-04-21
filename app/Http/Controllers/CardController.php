<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use App\User;
use App\Lists;
use App\Dashboard;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        return view('Card.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::getAuthenticateUser();
        $lists = Lists::all();
        return view('Card.create', compact('users', 'lists'));
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
            'label' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required|numeric',
            'num_list' => 'required|numeric',
        ]);
        Card::create($validatedData);
   
        return redirect('/cards')->with('success', 'Carte créer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return view('Card.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('Card.edit', compact('card'));
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
    public function destroy(Dashboard $dashboard ,$id)
    {
        $card = Card::findOrFail($id);
        //$dashboard = Dashboard::with('lists')->where('num_list', '=', $card->num_list)->firstOrFail();
        $card->delete();

        return redirect()->route('cards.index')->with('success', 'Carte supprimé');
    }
}
