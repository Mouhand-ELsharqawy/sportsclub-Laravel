<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\League;
use App\Models\Team;
use App\Models\Sport;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::join('sports','teams.sports_id','=','sports.id')
        ->join('leagues','teams.leagues_id','=','leagues.id')
        ->join('fixtures','teams.fixtures_id','=','fixtures.id')
        ->select('teams.name','sports.FirstDay','sports.LastDay','leagues.name',
        'leagues.phone','fixtures.matchDate', 'fixtures.homeAwayMatch', 
        'fixtures.resault', 'fixtures.score',
        'teams.league_division', 'teams.captin_name', 'teams.GoalKeeper', 'teams.AltGoalkeeper',
        'teams.CenterBack', 'teams.AltCenterBack', 'teams.RightBack', 'teams.AltRightBack', 
        'teams.LeftBack', 'teams.AltLeftBack', 'teams.RightWingBack','teams.AltRightWingBack',
        'teams.LeftWingBack', 'teams.AltLeftWingBack', 'teams.CenterDefensiveMidfeilder',
        'teams.AltCenterDefensiveMidfeilder', 'teams.CenterMidfeilder', 'teams.AltCenterMidfeilder',
        'teams.RightMidfeilder','teams.AltRightMidfeilder','teams.LeftMidfeilder', 
        'teams.AltLeftMidfeilder', 'teams.CentralAttackingMidfeilder', 'teams.AltCentralAttackingMidfeilder', 
        'teams.Striker', 'teams.AltStriker', 'teams.CenterForword', 'teams.AltCenterForword', 
        'teams.RightWing', 'teams.AltRightWing', 'teams.LeftWing', 'teams.AltLeftWing', 
        'teams.RightForward', 'teams.AltRightForward', 'teams.LeftForward', 'teams.AltLeftForward')
        ->paginate(6);
        return response()->json(['teams' => $teams]);
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
            'name' => 'required', 
            'firstday' => 'required' , 
            'leaguename' => 'required', 
            'fixturedate' => 'required', 
            'leaguedivision' => 'required' , 
            'captinname' => 'required',
            'goalkeeper' => 'required', 
            'altgoalkeeper' => 'required', 
            'centerback' => 'required', 
            'altcenterback' => 'required', 
            'rightback' => 'required', 
            'altrightback' => 'required', 
            'leftback' => 'required', 
            'altLeftback' => 'required', 
            'rightwingback' => 'required', 
            'altrightwingback' => 'required', 
            'leftwingback' => 'required', 
            'altleftwingback' => 'required', 
            'centerdefensivemidfeilder' => 'required', 
            'altcenterdefensivemidfeilder' => 'required', 
            'centermidfeilder' => 'required', 
            'altcentermidfeilder' => 'required', 
            'rightmidfeilder' => 'required', 
            'altrightmidfeilder' => 'required', 
            'leftmidfeilder' => 'required', 
            'altleftmidfeilder' => 'required', 
            'centralattackingmidfeilder' => 'required', 
            'altcentralattackingmidfeilder' => 'required', 
            'striker' => 'required', 
            'altstriker' => 'required', 
            'centerforword' => 'required', 
            'altcenterforword' => 'required', 
            'rightwing' => 'required', 
            'altrightwing' => 'required', 
            'leftwing' => 'required', 
            'altleftwing' => 'required', 
            'rightforward' => 'required', 
            'altrightforward' => 'required', 
            'leftforward' => 'required', 
            'altleftforward' => 'required'
        ]);

        $sportId = Sport::where('sports.FirstDay' , $request->firstday)->first()->id;
        $leagueId = League::where('leagues.name',$request->leaguename)->first()->id;
        $fixtureId = Fixture::where('fixtures.matchDate' , $request->fixturedate)->first()->id;

        Team::create([
            'name' => $request->name, 
            'sports_id' => $sportId, 
            'leagues_id' => $leagueId, 
            'fixtures_id' => $fixtureId, 
            'league_division' => $request->leaguedivision , 
            'captin_name' => $request->captinname,
            'GoalKeeper' => $request->goalkeeper, 
            'AltGoalkeeper' => $request->altgoalkeeper, 
            'CenterBack' => $request->centerback, 
            'AltCenterBack' => $request->altcenterback, 
            'RightBack'=> $request->rightback, 
            'AltRightBack' => $request->altrightback, 
            'LeftBack' => $request->leftback, 
            'AltLeftBack' => $request->altLeftback, 
            'RightWingBack' => $request->rightwingback, 
            'AltRightWingBack' => $request->altrightwingback, 
            'LeftWingBack' => $request->leftwingback, 
            'AltLeftWingBack' => $request->altleftwingback, 
            'CenterDefensiveMidfeilder' => $request->centerdefensivemidfeilder, 
            'AltCenterDefensiveMidfeilder' => $request->altcenterdefensivemidfeilder, 
            'CenterMidfeilder' => $request->centermidfeilder, 
            'AltCenterMidfeilder' => $request->altcentermidfeilder, 
            'RightMidfeilder' => $request->rightmidfeilder, 
            'AltRightMidfeilder' => $request->altrightmidfeilder, 
            'LeftMidfeilder' => $request->leftmidfeilder, 
            'AltLeftMidfeilder' => $request->altleftmidfeilder, 
            'CentralAttackingMidfeilder' => $request->centralattackingmidfeilder, 
            'AltCentralAttackingMidfeilder' => $request->altcentralattackingmidfeilder, 
            'Striker' => $request->striker, 
            'AltStriker' => $request->altstriker, 
            'CenterForword' => $request->centerforword, 
            'AltCenterForword' => $request->altcenterforword, 
            'RightWing' => $request->rightwing, 
            'AltRightWing' => $request->altrightwing, 
            'LeftWing' => $request->leftwing, 
            'AltLeftWing' => $request->altleftwing, 
            'RightForward' => $request->rightforward, 
            'AltRightForward' => $request->altrightforward, 
            'LeftForward' => $request->leftforward, 
            'AltLeftForward' => $request->altleftforward
        ]);

        return response()->json('team created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::join('sports','teams.sports_id','=','sports.id')
        ->join('leagues','teams.leagues_id','=','leagues.id')
        ->join('fixtures','teams.fixtures_id','=','fixtures.id')
        ->select('teams.name','sports.FirstDay','sports.LastDay','leagues.name',
        'leagues.phone','fixtures.matchDate', 'fixtures.homeAwayMatch', 
        'fixtures.resault', 'fixtures.score',
        'teams.league_division', 'teams.captin_name', 'teams.GoalKeeper', 'teams.AltGoalkeeper',
        'teams.CenterBack', 'teams.AltCenterBack', 'teams.RightBack', 'teams.AltRightBack', 
        'teams.LeftBack', 'teams.AltLeftBack', 'teams.RightWingBack','teams.AltRightWingBack',
        'teams.LeftWingBack', 'teams.AltLeftWingBack', 'teams.CenterDefensiveMidfeilder',
        'teams.AltCenterDefensiveMidfeilder', 'teams.CenterMidfeilder', 'teams.AltCenterMidfeilder',
        'teams.RightMidfeilder','teams.AltRightMidfeilder','teams.LeftMidfeilder', 
        'teams.AltLeftMidfeilder', 'teams.CentralAttackingMidfeilder', 'teams.AltCentralAttackingMidfeilder', 
        'teams.Striker', 'teams.AltStriker', 'teams.CenterForword', 'teams.AltCenterForword', 
        'teams.RightWing', 'teams.AltRightWing', 'teams.LeftWing', 'teams.AltLeftWing', 
        'teams.RightForward', 'teams.AltRightForward', 'teams.LeftForward', 'teams.AltLeftForward')
        ->where('teams.id',$id)
        ->get();
        return response()->json(['team' => $team]);
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
            'name' => 'required', 
            'firstday' => 'required' , 
            'leaguename' => 'required', 
            'fixturedate' => 'required', 
            'leaguedivision' => 'required' , 
            'captinname' => 'required',
            'goalkeeper' => 'required', 
            'altgoalkeeper' => 'required', 
            'centerback' => 'required', 
            'altcenterback' => 'required', 
            'rightback' => 'required', 
            'altrightback' => 'required', 
            'leftback' => 'required', 
            'altLeftback' => 'required', 
            'rightwingback' => 'required', 
            'altrightwingback' => 'required', 
            'leftwingback' => 'required', 
            'altleftwingback' => 'required', 
            'centerdefensivemidfeilder' => 'required', 
            'altcenterdefensivemidfeilder' => 'required', 
            'centermidfeilder' => 'required', 
            'altcentermidfeilder' => 'required', 
            'rightmidfeilder' => 'required', 
            'altrightmidfeilder' => 'required', 
            'leftmidfeilder' => 'required', 
            'altleftmidfeilder' => 'required', 
            'centralattackingmidfeilder' => 'required', 
            'altcentralattackingmidfeilder' => 'required', 
            'striker' => 'required', 
            'altstriker' => 'required', 
            'centerforword' => 'required', 
            'altcenterforword' => 'required', 
            'rightwing' => 'required', 
            'altrightwing' => 'required', 
            'leftwing' => 'required', 
            'altleftwing' => 'required', 
            'rightforward' => 'required', 
            'altrightforward' => 'required', 
            'leftforward' => 'required', 
            'altleftforward' => 'required'
        ]);

        $sportId = Sport::where('sports.FirstDay' , $request->firstday)->first()->id;
        $leagueId = League::where('leagues.name',$request->leaguename)->first()->id;
        $fixtureId = Fixture::where('fixtures.matchDate' , $request->fixturedate)->first()->id;
        $team = Team::find($id);


        $team->name = $request->name;
        $team->sports_id = $sportId; 
        $team->leagues_id = $leagueId;
        $team->fixtures_id = $fixtureId; 
        $team->league_division = $request->leaguedivision;
        $team->captin_name = $request->captinname;
        $team->GoalKeeper = $request->goalkeeper; 
        $team->AltGoalkeeper = $request->altgoalkeeper; 
        $team->CenterBack = $request->centerback;
        $team->AltCenterBack = $request->altcenterback;
        $team->RightBack = $request->rightback;
        $team->AltRightBack = $request->altrightback; 
        $team->LeftBack = $request->leftback;
        $team->AltLeftBack = $request->altLeftback;
        $team->RightWingBack = $request->rightwingback; 
        $team->AltRightWingBack = $request->altrightwingback; 
        $team->LeftWingBack = $request->leftwingback;
        $team->AltLeftWingBack = $request->altleftwingback; 
        $team->CenterDefensiveMidfeilder = $request->centerdefensivemidfeilder;
        $team->AltCenterDefensiveMidfeilder = $request->altcenterdefensivemidfeilder; 
        $team->CenterMidfeilder = $request->centermidfeilder;
        $team->AltCenterMidfeilder = $request->altcentermidfeilder; 
        $team->RightMidfeilder = $request->rightmidfeilder; 
        $team->AltRightMidfeilder = $request->altrightmidfeilder; 
        $team->LeftMidfeilder = $request->leftmidfeilder; 
        $team->AltLeftMidfeilder = $request->altleftmidfeilder; 
        $team->CentralAttackingMidfeilder = $request->centralattackingmidfeilder; 
        $team->AltCentralAttackingMidfeilder = $request->altcentralattackingmidfeilder; 
        $team->Striker = $request->striker; 
        $team->AltStriker = $request->altstriker; 
        $team->CenterForword = $request->centerforword; 
        $team->AltCenterForword = $request->altcenterforword; 
        $team->RightWing = $request->rightwing; 
        $team->AltRightWing = $request->altrightwing; 
        $team->LeftWing = $request->leftwing; 
        $team->AltLeftWing = $request->altleftwing; 
        $team->RightForward = $request->rightforward;
        $team->AltRightForward = $request->altrightforward; 
        $team->LeftForward = $request->leftforward; 
        $team->AltLeftForward = $request->altleftforward;
        $team->update();
        return response()->json('team updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::find($id);
        $team->delete();
        return response()->json('team deleted');
    }
}
