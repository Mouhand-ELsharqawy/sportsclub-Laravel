<?php

namespace App\Http\Controllers;

use App\Models\Opponent;
use Illuminate\Http\Request;

class OpponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opponents = Opponent::paginate(6);
        return response()->json(['opponents'=>$opponents]);
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
            'phone' => 'required|string', 
            'ContactFirstname' => 'required|string', 
            'ContactLastname' => 'required|string', 
            'club' => 'required|string'
        ]);

        Opponent::create($request->all());

        return response()->json('opponent created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $opponent = Opponent::find($id);
        return response()->json(['opponent' => $opponent]);
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
            'phone' => 'required|string', 
            'ContactFirstname' => 'required|string', 
            'ContactLastname' => 'required|string', 
            'club' => 'required|string'
        ]);

        $opponent = Opponent::find($id);
        $opponent->name = $request->name;
        $opponent->phone = $request->phone;
        $opponent->ContactFirstname = $request->ContactFirstname;
        $opponent->ContactLastname = $request->ContactLastname;
        $opponent->club = $request->club;
        $opponent->update();

        return response()->json('opponent updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $opponent = Opponent::find($id);
        $opponent->delete();
        return response()->json('opponent deleted');
    }
}
