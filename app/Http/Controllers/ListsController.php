<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Lists;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    /**
     * Display a listing of the Lists.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listes = Lists::all();
        return view("Lists.index", compact('listes'));
    }

    /**
     * Show the form for creating a new List.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dashboards = Dashboard::all();
        return view('Lists.create', compact('dashboards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Dashboard $dashboard)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'dashboard_id' => 'required|numeric',
        ]);
        $list = Lists::create($validatedData);
        $dashboard = Dashboard::with('lists')->where('dashboard_id', '=', $list->dashboard_id)->firstOrFail();
   
        return redirect()->route('dashboards.show', [$dashboard])->with('success', 'Liste créer avec succès');
    }

    /**
     * Display the specified list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lists $list)
    {
        return view('Lists.edit', compact('list'));
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
     * Remove the specified List from storage and redirect to dashboard.
     *
     * @param Dashboard $dashboard
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard, $id)
    {
        $liste = Lists::findOrFail($id);
        $dashboard = Dashboard::with('lists')->where('dashboard_id', '=', $liste->dashboard_id)->firstOrFail();
        $liste->delete();

        return redirect()->route('dashboards.show', [$dashboard])->with('success', 'Liste supprimée');
    }
}
