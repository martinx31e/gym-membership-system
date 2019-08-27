<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $members = Member::all()->paginate(1);
        $members = Member::orderBy('firstName', 'asc')->paginate(10);
        return View('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    public function reports(Request $request)
    {
        $month = $request->input('month');
        $month_name = date("F", mktime(0, 0, 0, $month, 10)); 

        if ($month == 0) {
            $members = Member::orderBy('firstName', 'asc')->paginate(10);
            $count = Member::all()->count();
            $month_name = 'this year';
        } else {
            $members = Member::whereMonth('created_at', $month)->get();
            $count = Member::whereMonth('created_at', $month)->count();
            
        };

        return view('members.reports')->with('members', $members)
        ->with('count', $count)->with('month', $month)->with('month_name', $month_name);     
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Provide form validation
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required',
            'address' => 'required',
            'addressTown' => 'required',
            'addressPostcode' => 'required',
        ]);
        // Create a member
        $member = new Member;
        $member->firstName = $request->input('firstName');
        $member->lastName = $request->input('lastName');
        $member->emailAddress = $request->input('emailAddress');
        $member->address = $request->input('address');
        $member->addressTown = $request->input('addressTown');
        $member->addressPostcode = $request->input('addressPostcode');
        $member->dateOfBirth = $request->input('dateOfBirth');
        $member->telephoneNumber = $request->input('telephoneNumber');
        $member->subscriptionType = $request->input('subscriptionType');
        $member->save();

        return redirect('/members')->with('success', 'Member Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit')->with('member', $member);
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
         // Provide form validation
         $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required',
            'address' => 'required',
            'addressTown' => 'required',
            'addressPostcode' => 'required',
        ]);
        // Create a member
        $member = Member::find($id);
        $member->firstName = $request->input('firstName');
        $member->lastName = $request->input('lastName');
        $member->emailAddress = $request->input('emailAddress');
        $member->address = $request->input('address');
        $member->addressTown = $request->input('addressTown');
        $member->addressPostcode = $request->input('addressPostcode');
        $member->dateOfBirth = $request->input('dateOfBirth');
        $member->telephoneNumber = $request->input('telephoneNumber');
        $member->subscriptionType = $request->input('subscriptionType');
        $member->save();

        return redirect('/members')->with('success', 'Member Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/members')->with('success', 'Member deleted');
    }
}
