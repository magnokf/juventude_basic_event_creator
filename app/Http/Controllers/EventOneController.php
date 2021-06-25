<?php

namespace App\Http\Controllers;

use App\Events\EventOneCreated;
use App\Http\Requests\FormOneRequest;
use App\Models\EventOne;
use Illuminate\Http\JsonResponse;
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
        $total_enrollments = EventOne::all()
            ->where('email_verified_at', '!=', null)
            ->count();
        if ($total_enrollments < 101)

            return view('applications.eventone.create');
        else
            return view('applications.eventone.endenroll');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormOneRequest $request)
    {
        $enrollment = EventOne::create($request->validated());

        event(new EventOneCreated($enrollment));

        return view('confirmations.chekemail', [
            'uuid'=> $enrollment->uuid
        ]);
    }


    public function confirmation($uuid)
    {
        $eventOne = EventOne::findByUuid($uuid);

        $eventOne->update(['email_verified_at' => now()]);
        $eventOne->save();
        return view('confirmations.eventone',['uuid' => $eventOne->uuid]);
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
