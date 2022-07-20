<?php

namespace App\Http\Controllers;

use App\Events\EventOneCreated;
use App\Http\Requests\FormOneRequest;
use App\Jobs\ProcessEventOneEmail;
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
        //get today date
        $deadline = date('Y-m-d', strtotime('2022-07-31'));
        $today = date('Y-m-d', strtotime('now'));

            if ($today >= $deadline)
            {
                toastr()->error("Incrições ENCERRADAS.",
                    "Atenção - O Limite máximo para a inscrição é $deadline",
                    [   'closeButton'=>true,
                        'positionClass'=>'toast-top-right',
                        'timeOut'=>'4000',
                        'progressBar'=> true,
                        'preventDuplicates'=>true,
                        'onclick'=>null,
                        'showDuration'=>'3000',
                        'hideDuration'=>'2000',
                        "extendedTimeOut"=> "5000",
                        "showEasing"=> "swing",
                        "hideEasing"=> "linear",
                        "showMethod"=> "fadeIn",
                        "hideMethod"=> "fadeOut"
                    ]);

//                return view('applications.eventone.endenroll');
                return view('applications.eventone.create');
            }

        $total_enrollments = EventOne::all()
            ->where('email_verified_at', '!=', null)
            ->count();
        if ($total_enrollments < 200)

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

        $deadline = date('Y-m-d', strtotime('2022-07-31'));
        $today = date('Y-m-d', strtotime('now'));

        if ($today >= $deadline)
        {
            toastr()->error("Incrições ENCERRADAS.",
                "Atenção - O Limite para a inscrição é $deadline até as 16hs",
                [   'closeButton'=>true,
                    'positionClass'=>'toast-top-right',
                    'timeOut'=>'4000',
                    'progressBar'=> true,
                    'preventDuplicates'=>true,
                    'onclick'=>null,
                    'showDuration'=>'3000',
                    'hideDuration'=>'2000',
                    "extendedTimeOut"=> "5000",
                    "showEasing"=> "swing",
                    "hideEasing"=> "linear",
                    "showMethod"=> "fadeIn",
                    "hideMethod"=> "fadeOut"
                ]);

            return redirect()->back();
        }
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
                [   'closeButton'=>true,
                    'positionClass'=>'toast-top-right',
                    'timeOut'=>'4000',
                    'progressBar'=> true,
                    'preventDuplicates'=>true,
                    'onclick'=>null,
                    'showDuration'=>'3000',
                    'hideDuration'=>'2000',
                    "extendedTimeOut"=> "5000",
                    "showEasing"=> "swing",
                    "hideEasing"=> "linear",
                    "showMethod"=> "fadeIn",
                    "hideMethod"=> "fadeOut"
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
                        'timeOut'=>'4000',
                        'progressBar'=> true,
                        'preventDuplicates'=>true,
                        'onclick'=>null,
                        'showDuration'=>'3000',
                        'hideDuration'=>'2000',
                        "extendedTimeOut"=> "5000",
                        "showEasing"=> "swing",
                        "hideEasing"=> "linear",
                        "showMethod"=> "fadeIn",
                        "hideMethod"=> "fadeOut"
                    ]);
            }


            else
                toastr()->info("Inscrição Não foi Alterada!.",
                    'Atenção - Não houve Modificações!!!!',
                    ['closeButton'=>true,
                        'positionClass'=>'toast-top-right',
                        'timeOut'=>'4000',
                        'progressBar'=> true,
                        'preventDuplicates'=>true,
                        'onclick'=>null,
                        'showDuration'=>'3000',
                        'hideDuration'=>'2000',
                        "extendedTimeOut"=> "5000",
                        "showEasing"=> "swing",
                        "hideEasing"=> "linear",
                        "showMethod"=> "fadeIn",
                        "hideMethod"=> "fadeOut"
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
                    'timeOut'=>'4000',
                    'progressBar'=> true,
                    'preventDuplicates'=>true,
                    'onclick'=>null,
                    'showDuration'=>'3000',
                    'hideDuration'=>'2000',
                    "extendedTimeOut"=> "5000",
                    "showEasing"=> "swing",
                    "hideEasing"=> "linear",
                    "showMethod"=> "fadeIn",
                    "hideMethod"=> "fadeOut"
                ]);
            return redirect()->back();
        }


    }

    public function ageschart()
    {
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

        //logica das idades

        $year = date('Y');
        $today_date = date('Y-m-d');
        $month = date('m');
        $day = date('d');

        $year_minors = date('Y') - 18;
        $year_18_25 = $year - 25;
        $year_25_40 = $year - 40;




        //montar a data de nascimento para os menores de 18 anos de idade

        $mount_date_minors = $year_minors.'-'.$month.'-'.$day;

        //montar a data de nascimento para os de 18 a 25 anos de idade

        $mount_18_25 = $year_18_25.'-'.$month.'-'.$day;

        //montar a data de nascimento para os de 25 a 40 anos de idade

        $mount_25_40 = $year_25_40.'-'.$month.'-'.$day;



//        dd($mount_18_25);

        $count_minors = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_date_minors, $today_date])
            ->count();

        $count_18_25 = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_18_25, $today_date])
            ->count();

        $count_25_40 = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_25_40, $today_date])
            ->count();
        $count_over_40 = EventOne::all()
            ->where('date_of_birth', '<', $mount_25_40)
            ->count();


        return view('charts.ages', [
            'count_minors'=>$count_minors,
            'count_18_25'=>$count_18_25,
            'count_25_40'=>$count_25_40,
            'count_over_40'=>$count_over_40,
            'total_enrollments' => $total_enrollments,
            'total_confirmed_enrollments'=>$total_confirmed_enrollments,
            'total_not_confirmed_enrollments'=>$total_not_confirmed_enrollments,
            'inscritos'=>$inscritos
        ]);
    }


}
