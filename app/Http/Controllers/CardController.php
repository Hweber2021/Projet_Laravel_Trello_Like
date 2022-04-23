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
    public function store(Request $request, Lists $list, Dashboard $dashboard)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'label' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required|numeric',
            'num_list' => 'required|numeric',
        ]);
        Card::create($validatedData);
        return redirect()->route('workplaces.index')->with('success', 'Carte créer avec succès');
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
     * @param  Card $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        $lists = Lists::all();

        return view('Card.edit', compact('card', 'lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $request->validate([
            'num_list' => 'required|numeric',
        ]);
        $card->update($request->all());

        return redirect()->route('workplaces.index')->with('success', 'Carte mise à jour');
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
        //$dashboard = Dashboard::with('lists')->where('dashboard_id', '=', $card->lists->dashboard_id)->firstOrFail();
        $card->delete();

        return redirect()->route('workplaces.index')->with('success', 'Carte supprimé');
    }
}
