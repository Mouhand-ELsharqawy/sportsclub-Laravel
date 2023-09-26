<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\FixtureStatus;
use App\Models\Member;
use App\Models\Sport;
use Illuminate\Http\Request;

class FixtureStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $fixturesstatus = FixtureStatus::join('fixtures','fixture_statuses.fixtures_id','=','fixtures.id')
        ->join('members','fixture_statuses.members_id','=','members.id')
        ->join('sports','fixture_statuses.sports_id','=','sports.id')
        ->select('fixture_statuses.status','fixtures.matchDate', 'fixtures.homeAwayMatch', 
        'fixtures.resault', 'fixtures.score', 'members.FirtName', 'members.LastName', 
        'members.address', 'members.PostCode', 'members.HomePhone', 'members.MobilePhone', 
        'members.DOB', 'members.method', 'members.SubsAmount','sports.FirstDay', 'sports.LastDay'
        ,'fixture_statuses.NoOf_fixture', 'fixture_statuses.captain')
        ->paginate(6);
        return response()->json(['fixturesstatus' => $fixturesstatus]);
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
            'status'=>'required|string',
            'fix' => 'required',
            'member' => 'required',
            'sport' => 'required',
            'number' => 'required',
            'captain' => 'required'
        ]);
        $fixId = Fixture::where('fixtures.score',$request->fix)->first()->id;
        $memberId = Member::where('members.FirtName',$request->member)->first()->id;
        $sportId = Sport::where('sports.FirstDay',$request->sport)->first()->id;
        FixtureStatus::create([
            'status' => $request->status, 
            'fixtures_id' => $fixId, 
            'members_id' => $memberId, 
            'sports_id' => $sportId, 
            'NoOf_fixture' => $request->number, 
            'captain' => $request->captain
        ]);
        return response()->json('user created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fixturestatus = FixtureStatus::join('fixtures','fixture_statuses.fixtures_id','=','fixtures.id')
        ->join('members','fixture_statuses.members_id','=','members.id')
        ->join('sports','fixture_statuses.sports_id','=','sports.id')
        ->select('fixture_statuses.status','fixtures.matchDate', 'fixtures.homeAwayMatch', 
        'fixtures.resault', 'fixtures.score', 'members.FirtName', 'members.LastName', 
        'members.address', 'members.PostCode', 'members.HomePhone', 'members.MobilePhone', 
        'members.DOB', 'members.method', 'members.SubsAmount','sports.FirstDay', 'sports.LastDay'
        ,'fixture_statuses.NoOf_fixture', 'fixture_statuses.captain')
        ->where('fixture_statuses.id',$id)
        ->get();
        return response()->json(['fixturestatus' => $fixturestatus]);   
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
            'status'=>'required|string',
            'fix' => 'required',
            'member' => 'required',
            'sport' => 'required',
            'number' => 'required',
            'captain' => 'required'
        ]);
        $fixId = Fixture::where('fixtures.score',$request->fix)->first()->id;
        $memberId = Member::where('members.FirtName',$request->member)->first()->id;
        $sportId = Sport::where('sports.FirstDay',$request->sport)->first()->id;
        $fixtureStatus = FixtureStatus::find($id);
        $fixtureStatus->status = $request->status; 
        $fixtureStatus->fixtures_id = $fixId;
        $fixtureStatus->members_id = $memberId;
        $fixtureStatus->sports_id = $sportId; 
        $fixtureStatus->NoOf_fixture = $request->number;
        $fixtureStatus->captain = $request->captain;
        $fixtureStatus->update();
        return response()->json('user updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fixtureStatus = FixtureStatus::find($id);
        $fixtureStatus->delete();
        return response()->json('user deleted');
    }
}
