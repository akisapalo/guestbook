<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GuestCollection;
use App\Guest;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new GuestCollection(Guest::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guest = new Guest;
        return view('guests.create', compact('guest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',
            'gender'=>'required',
            'address'=>'required',
            'phone_number'=>'required|regex:/[0-9]{7}/'
        ]);

        $guest = new Guest([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address')
        ]);
        $guest->save();
        return response()->json(['success'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guest = Guest::find($id);
        return response()->json($guest); 
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',
            'gender'=>'required',
            'address'=>'required',
            'phone_number'=>'required|regex:/[0-9]{7}/'
        ]);

        $guest = Guest::find($id);
        $guest->first_name =  $request->get('first_name');
        $guest->last_name = $request->get('last_name');
        $guest->email = $request->get('email');
        $guest->phone_number = $request->get('phone_number');
        $guest->gender = $request->get('gender');
        $guest->address = $request->get('address');
        $guest->save();
        return response()->json(['success'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $guest = Guest::find($id);
        $guest->delete();
        return response()->json(['success'=>'successfully deleted']);
    }
}
