<?php

namespace App\Http\Controllers;

use App\Events\EventOneCreated;
use App\Http\Requests\FormOneRequest;
use App\Models\EventOne;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            // The user is logged in...

            $total_enrollments = EventOne::all()
                ->count();
            $total_confirmed_enrollments = EventOne::all()
                ->where('email_verified_at','!=',null )
                ->count();
            $total_not_confirmed_enrollments = EventOne::all()
                ->where('email_verified_at','=',null )
                ->count();
            $inscritos = EventOne::all()
                ->where('email_verified_at','!=', null);


            return view('applications.eventone.index', [
                'total_enrollments' => $total_enrollments,
                'total_confirmed_enrollments'=>$total_confirmed_enrollments,
                'total_not_confirmed_enrollments'=>$total_not_confirmed_enrollments,
                'inscritos'=>$inscritos
            ]);
        }
        return view('auth.login');

    }

    public function not_confirmed()
    {
        if (Auth::check()) {
            // The user is logged in...

            $total_enrollments = EventOne::all()
                ->count();
            $total_confirmed_enrollments = EventOne::all()
                ->where('email_verified_at','!=',null )
                ->count();
            $total_not_confirmed_enrollments = EventOne::all()
                ->where('email_verified_at','=',null )
                ->count();
            $inscritos = EventOne::all()
                ->where('email_verified_at','!=', null);
            $not_confirmed = EventOne::all()
                ->where('email_verified_at','=', null);


            return view('applications.eventone.not_confirmed', [
                'total_enrollments' => $total_enrollments,
                'total_confirmed_enrollments'=>$total_confirmed_enrollments,
                'total_not_confirmed_enrollments'=>$total_not_confirmed_enrollments,
                'inscritos'=>$inscritos,
                'not_confirmed'=>$not_confirmed
            ]);
        }
        return view('auth.login');


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
        if ($total_enrollments < 100)

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

    public function manual_confirmed($uuid)
    {
        if (Auth::check()) {
            // The user is logged in...
            $eventOne = EventOne::findByUuid($uuid);
            $eventOne->update(['email_verified_at' => now()]);
            $eventOne->save();

            toastr()->success("Inscrição confirmada manualmente com sucesso!.",
                'Atenção - O registro de verificação foi definido manualmente',
                ['closeButton'=>true,
                    'positionClass'=>'toast-top-right',
                    'timeOut'=>'4000'
                ]);

            return redirect()->back();
        }


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
        if (Auth::check()) {
            // The user is logged in...
            $total_enrollments = EventOne::all()
                ->count();
            $total_confirmed_enrollments = EventOne::all()
                ->where('email_verified_at','!=',null )
                ->count();
            $total_not_confirmed_enrollments = EventOne::all()
                ->where('email_verified_at','=',null )
                ->count();
            $inscritos = EventOne::all()
                ->where('email_verified_at','!=', null);
            return view('applications.eventone.edit',[
                'eventOne'=>$eventOne,
                'total_enrollments' => $total_enrollments,
                'total_confirmed_enrollments'=>$total_confirmed_enrollments,
                'total_not_confirmed_enrollments'=>$total_not_confirmed_enrollments,
                'inscritos'=>$inscritos
            ]);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventOne  $eventOne
     * @return \Illuminate\Http\Response
     */
    public function update(FormOneRequest $request, EventOne $eventOne)
    {
        if (Auth::check()) {
            // The user is logged in...
            $eventOne->update($request->validated());

            if ($eventOne->wasChanged())
            {


                toastr()->success("Inscrição Atualizada com sucesso!.",
                    'Atenção - As Informações sobre a Inscrição foram Modificadas!!!!',
                    ['closeButton'=>true,
                        'positionClass'=>'toast-top-right',
                        'timeOut'=>'4000'
                    ]);
            }


            else
                toastr()->info("Inscrição Não foi Alterada!.",
                    'Atenção - Não houve Modificações!!!!',
                    ['closeButton'=>true,
                        'positionClass'=>'toast-top-right',
                        'timeOut'=>'4000'
                    ]);


            return redirect()->route('event_one.index');
        }



    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventOne  $eventOne
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventOne $eventOne)
    {
        if (Auth::check()) {
            // The user is logged in...

            $eventOne->delete();
            toastr()->error("Inscrição DESTRUÍDA!.",
                'Atenção - Registro foi destruído!!!!',
                ['closeButton'=>true,
                    'positionClass'=>'toast-top-right',
                    'timeOut'=>'4000'
                ]);
            return redirect()->back();
        }


    }


}
