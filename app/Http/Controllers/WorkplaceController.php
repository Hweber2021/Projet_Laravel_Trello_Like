<?php

namespace App\Http\Controllers;

use App\Workplace;
use App\Dashboard;
use App\User;
use Illuminate\Http\Request;


class WorkplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
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
        $users = User::all();
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
    public function show($id)
    {
        return view('Workplace.show',compact('workplaces'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workplace = Workplace::findOrFail($id);
        return view('edit', compact('workplace'));
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
        Workplace::whereId($id)->update($validatedData);

        return redirect('/workplaces')->with('success', 'Espace de travail modifié avec succès');
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
