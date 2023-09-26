<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\Opponent;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fixtures = Fixture::join('opponents','fixtures.opponents_id','=','opponents.id')
        ->select('opponents.name', 'opponents.phone','opponents.ContactFirstname',
        'opponents.ContactLastname', 'opponents.club','fixtures.matchDate', 
        'fixtures.homeAwayMatch', 'fixtures.resault', 'fixtures.score')
        ->paginate(6);

        return response()->json(['fixtures'=>$fixtures]);
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
        $validate = $request->validate([
            'name' => 'required',
            'date' => 'required', 
            'home' => 'required', 
            'result' => 'required', 
            'score' => 'required'
        ]);
        $opponentId = Opponent::where('name',$request->name)->first()->id;

        Fixture::create([
            'opponents_id' => $opponentId,
            'matchDate' => $request->date, 
            'homeAwayMatch' => $request->home, 
            'resault' => $request->result, 
            'score' => $request->score
        ]);
        return response()->json('User Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fixture = Fixture::join('opponents','fixtures.opponents_id','=','opponents.id')
        ->select('opponents.name', 'opponents.phone','opponents.ContactFirstname',
        'opponents.ContactLastname', 'opponents.club','fixtures.matchDate', 
        'fixtures.homeAwayMatch', 'fixtures.resault', 'fixtures.score')
        ->where('fixtures.id',$id)
        ->get();

        return response()->json(['fixture'=>$fixture]);
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
        $validate = $request->validate([
            'name' => 'required',
            'date' => 'required', 
            'home' => 'required', 
            'result' => 'required', 
            'score' => 'required'
        ]);
        $opponentId = Opponent::where('name',$request->name)->first()->id;

        $fixture = Fixture::find($id);
        $fixture->opponents_id = $opponentId;
            $fixture->matchDate = $request->date; 
            $fixture->homeAwayMatch = $request->home;
            $fixture->resault = $request->result;
            $fixture->score = $request->score;
            $fixture->update();
        return response()->json('User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fixture = Fixture::find($id);

        if($fixture !== null){
        $fixture->delete();
        return response()->json('User deleted');
        }else{
            return response()->json('User Not Found');
        } 
    }
}
