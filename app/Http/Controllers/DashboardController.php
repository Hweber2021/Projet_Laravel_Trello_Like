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
        //return view("Dashboard.index");
        //$query = $slug ? Workplace::whereSlug($slug)->firstOrFail()->dashboards() : Dashboard::query();
        //$dashboard = $query->withTrashed()->oldest('name')->paginate(5);
        $workplaces = Workplace::all();
        return view('Dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workplaces = Workplace::all();
        //return view('Dashboard.create', compact('workplaces'))->with(Dashboard::all());
        return view('Dashboard.create');
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
        $dashboard = Dashboard::create($validatedData);
   
        return redirect('/dashboard')->with('success', 'Show is successfully saved');
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
    public function delete($id)
    {
        // Delete dashboard that exist

        $dashboard = Dashboard::find($id);
        $dashboard->delete();

        Dashboard::destroy($id);
    }
}
