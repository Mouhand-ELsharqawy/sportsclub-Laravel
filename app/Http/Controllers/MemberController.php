<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MembershipType;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::join('membership_types','members.membership_types_id','=','membership_types.id')
        ->select('membership_types.type', 'membership_types.SubAmount','members.FirtName', 
        'members.LastName', 'members.address', 'members.PostCode', 'members.HomePhone', 
        'members.MobilePhone', 'members.DOB', 'members.method', 'members.SubsAmount')
        ->paginate(6);
        return response()->json(['members'=>$members]);
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
            'membership' => 'required|string', 
            'firstname' => 'required', 
            'lastname' => 'required', 
            'address' => 'required', 
            'postcode' => 'required', 
            'phone' => 'required', 
            'mobile' => 'required', 
            'date' => 'required', 
            'method' => 'required', 
            'amount' => 'required'
        ]);

        $memshipId = MembershipType::where('membership_types.type',$request->membership)->first()->id;

        Member::create([
            'membership_types_id' => $memshipId, 
            'FirtName' =>$request->firstname, 
            'LastName' => $request->lastname, 
            'address' => $request->address, 
            'PostCode' => $request->postcode, 
            'HomePhone' => $request->phone, 
            'MobilePhone' => $request->mobile, 
            'DOB' => $request->date, 
            'method' => $request->method, 
            'SubsAmount' => $request->amount
        ]);
        return response()->json('member created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::join('membership_types','members.membership_types_id','=','membership_types.id')
        ->select('membership_types.type', 'membership_types.SubAmount','members.FirtName', 
        'members.LastName', 'members.address', 'members.PostCode', 'members.HomePhone', 
        'members.MobilePhone', 'members.DOB', 'members.method', 'members.SubsAmount')
        ->where('members.id',$id)
        ->get();
        return response()->json(['member' => $member ]);
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
            'membership' => 'required|string', 
            'firstname' => 'required', 
            'lastname' => 'required', 
            'address' => 'required', 
            'postcode' => 'required', 
            'phone' => 'required', 
            'mobile' => 'required', 
            'date' => 'required', 
            'method' => 'required', 
            'amount' => 'required'
        ]);

        $memshipId = MembershipType::where('membership_types.type',$request->membership)->first()->id;
        $member = Member::find($id);
        $member->membership_types_id = $memshipId; 
        $member->FirtName = $request->firstname;
        $member->LastName = $request->lastname;
        $member->address = $request->address;
        $member->PostCode = $request->postcode;
        $member->HomePhone =  $request->phone;
        $member->MobilePhone = $request->mobile;
        $member->DOB = $request->date;
        $member->method = $request->method;
        $member->SubsAmount = $request->amount;
        $member->update();
        return response()->json('member updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::find($id);
        $member->delete();
        return response()->json('member deleted');
    }
}
