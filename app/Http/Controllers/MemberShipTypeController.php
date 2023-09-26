<?php

namespace App\Http\Controllers;

use App\Models\MembershipType;
use Illuminate\Http\Request;

class MemberShipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membershiptypes = MembershipType::paginate(6);
        return response()->json(['memberships'=>$membershiptypes]);
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
            'type' => 'required', 
            'SubAmount' => 'required'
        ]);
        MembershipType::create($request->all());
        return response()->json('membership type created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = MembershipType::find($id);
        return response()->json(['member' => $member]);
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
            'type' => 'required', 
            'SubAmount' => 'required'
        ]);
        $member = MembershipType::find($id);
        $member->type = $request->type;
        $member->SubAmount = $request->SubAmount;
        $member->update();
        return response()->json('membership type updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = MembershipType::find($id);
        $member->delete();
        return response()->json('membership type deleted');
    }
}
