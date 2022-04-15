<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use App\Workplace;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        $query = $slug ? Workplace::whereSlug($slug)->firstOrFail()->dashboards() : Dashboard::query();
        $dashboards = $query->oldest('name')->paginate(7);
        $workplaces = Workplace::all();
       /* $dashboards = Dashboard::whereHas('workplace', function($q) {
            $q->where('workplace_id', );
        })->get();*/

        return view('Dashboard.index', compact('dashboards', 'workplaces', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workplaces = Workplace::all();
        return view('Dashboard.create', compact('workplaces'));
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
            'workplace_id' => 'required|numeric',
        ]);
        Dashboard::create($validatedData);
   
        return redirect('/dashboards')->with('success', 'Show is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // Delete dashboard that exist
        $dashboard = Dashboard::findOrFail($id);
        $dashboard->delete();

        return redirect()->route('dashboards.index')->with('success', 'Espace de travail supprimé');
    }
}
