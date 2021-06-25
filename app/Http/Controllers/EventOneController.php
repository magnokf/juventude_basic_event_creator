<?php

namespace App\Http\Controllers;

use App\Events\EventOneCreated;
use App\Http\Requests\FormOneRequest;
use App\Models\EventOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventOneController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.eventone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormOneRequest $request ,EventOne $eventOne)
    {
        $create_event_one = EventOne::create($request->validated());

        event(new EventOneCreated($create_event_one));

       return redirect()->back();
    }


    public function confirmation($uuid)
    {
        $eventOne = EventOne::findByUuid($uuid);
        $eventOne->update(['email_verified_at' => now()]);
        $eventOne->save();
         return view('confirmations.eventone');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventOne  $eventOne
     * @return \Illuminate\Http\Response
     */
    public function show(EventOne $eventOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventOne  $eventOne
     * @return \Illuminate\Http\Response
     */
    public function edit(EventOne $eventOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventOne  $eventOne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventOne $eventOne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventOne  $eventOne
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventOne $eventOne)
    {
        //
    }
}
