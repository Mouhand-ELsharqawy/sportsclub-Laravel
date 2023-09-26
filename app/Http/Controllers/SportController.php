<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::paginate(6);
        return response()->json(['sports' => $sports]);
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
            'FirstDay' => 'required|date', 
            'LastDay' => 'required|date'
        ]);
        Sport::create($request->all());
        return response()->json('sport created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sport = Sport::find($id);
        return response()->json(['sport' => $sport]);
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
            'FirstDay' => 'required|date', 
            'LastDay' => 'required|date'
        ]);
        $sport = Sport::find($id);
        $sport->FirstDay = $request->FirstDay;
        $sport->LastDay = $request->LastDay;
        $sport->update();
        return response()->json('sport updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sport = Sport::find($id);
        $sport->delete();
        return response()->json('sport deleted');
    }
}
