<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = auth()->user()->events->sortBy('date');

        if(auth()->user()->email_verified_at == null) {
            $flash['type'] = 'info';
            $flash['message'] = 'Please verify your email address.';
            $flash['link'] = route('verification.send');
            $flash['buttonText'] = 'Resend Email';

            session()->flash('flash', $flash);
        }

        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.form');
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
            'name' => 'required|string|max:100',
            'date' => 'required|date',
        ]);

        Event::create([
            'owner' => auth()->user()->id,
            'name' => $request->input('name'),
            'date' => $request->input('date'),
        ]);

        $flash['type'] = 'success';
        $flash['message'] = 'Your event has been created.';

        session()->flash('flash', $flash);

        return redirect()->route('events.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.form', ['event' => $event]);
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
            'name' => 'required|string|max:100',
            'date' => 'required|date',
        ]);

        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->date = $request->input('date');
        $event->save();

        $flash['type'] = 'success';
        $flash['message'] = 'Your event has been updated.';

        session()->flash('flash', $flash);

        return redirect()->route('events.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
