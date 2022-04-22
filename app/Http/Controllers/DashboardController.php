<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Lists;
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
     * Store a newly created resource in storage and redirectt to specified Workplace.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Workplace $workplace)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'workplace_id' => 'required|numeric',
        ]);
        $dashboard = Dashboard::create($validatedData);
        $workplace = Workplace::with('dashboard')->where('workplace_id', '=', $dashboard->workplace_id)->firstOrFail();
        
        return redirect()->route('workplaces.show', [$workplace])->with('success', 'Tableau créer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        $dashboard = Dashboard::with('lists')->where('dashboard_id', '=', $dashboard->dashboard_id)->firstOrFail();
        $lists = Lists::with('cards')->firstOrFail();
        return view('Dashboard.show', compact('dashboard', 'lists'));
    }

    /**
     * Show the form for editing the specified dashboard.
     *
     * @param  Dashboard dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        return view('Dashboard.edit', compact('dashboard'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        Dashboard::where('dashboard_id', 'LIKE', $id)->update($validatedData);
        return redirect()->route('dashboards.show')->with('success', 'Tableau modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workplace $workplace, $id)
    {
        $dashboard = Dashboard::findOrFail($id);
        $workplace = Workplace::with('dashboard')->where('workplace_id', '=', $dashboard->workplace_id)->firstOrFail();
        $dashboard->delete();

        return redirect()->route('workplaces.show', [$workplace])->with('success', 'Tableau supprimé');
    }
}
