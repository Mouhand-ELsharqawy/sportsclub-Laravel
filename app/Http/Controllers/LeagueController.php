<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leagues = League::paginate(6);
        return response()->json(['leagues'=>$leagues]);
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
        $request->validate([
            'name' => 'required|string', 
            'phone' => 'required|String'
        ]);
        League::create($request->all());
        return response()->json(['league created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $league = League::find($id);
        return response()->json(['league'=>$league]);
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
        $request->validate([
            'name' => 'required|string', 
            'phone' => 'required|String'
        ]);
        $league = League::find($id);
        $league->name = $request->name;
        $league->phone = $request->phone;
        $league->update();
        return response()->json('League updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $league = League::find($id);
        $league->delete();
        return response()->json('League deleted');
    }
}
