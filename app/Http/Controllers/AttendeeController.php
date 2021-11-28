<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return Attendee::where('event_id', $id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('attendees.form', ['event_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required_without:phone|nullable|email|max:100',
            'phone' => 'required_without:email|nullable|string|max:100',
            'wishlist' => 'nullable|url|max:255',
            'notes' => 'nullable|string',
        ]);

        Attendee::create([
            'event_id' => $id,
            'name' => $request->input('name'),
            'email' => $request->input('email') ?? null,
            'phone' => $request->input('phone') ?? null,
            'wishlist' => $request->input('wishlist') ?? null,
            'notes' => $request->input('notes') ?? null,
        ]);

        $flash['type'] = 'success';
        $flash['message'] = 'Your attendee has been created.';

        session()->flash('flash', $flash);

        return redirect()->route('attendees.create', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $attendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $attendee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $attendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $attendee)
    {
        //
    }
}
