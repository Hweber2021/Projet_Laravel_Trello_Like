<?php

namespace App\Http\Controllers;

use App\Workplace;
use App\Dashboard;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;


class WorkplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workplaces = Workplace::getWithUser();
        return view('Workplace.index', compact('workplaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::getAuthenticateUser();
        return view('Workplace.create', compact('users'));
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
            'user_id' => 'required|numeric',
        ]);

        Workplace::create($validatedData);
   
        return redirect('/workplaces')->with('success', 'Les modifications ont été sauvegardés.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Workplace $workplace)
    {
        $workplace = Workplace::with('dashboard')->where('workplace_id', '=', $workplace->workplace_id)->firstOrFail();
        //$dashboard_name = DB::table('dashboards')->select('name')->where('workplace_id', '=', $workplace->workplace_id)->get();
        //$dashboard_update = DB::table('dashboards')->select('updated_at')->where('workplace_id', '=', $workplace->workplace_id)->get();

        return view('Workplace.show',compact('workplace'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Workplace $workplace)
    {
        return view('Workplace.edit', compact('workplace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workplace $workplace)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $workplace->update($request->all());
        return redirect()->route('workplaces.index')->with('success', 'Espace de travail modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workplace = Workplace::findOrFail($id);
        $workplace->delete();

        return redirect()->route('workplaces.index')->with('success', 'Espace de travail supprimé');
    }

    public function getUser()
    {
        $user = $this->getUser();
    }
}
