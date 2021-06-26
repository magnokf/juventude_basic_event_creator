<?php

namespace App\Http\Controllers;

use App\Models\EventOne;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_enrollments = EventOne::all()
            ->count();
        $total_confirmed_enrollments = EventOne::all()
            ->where('email_verified_at','!=',null )
            ->count();
        $total_not_confirmed_enrollments = EventOne::all()
            ->where('email_verified_at','=',null )
            ->count();

        return view('home', [
            'total_enrollments' => $total_enrollments,
            'total_confirmed_enrollments'=>$total_confirmed_enrollments,
            'total_not_confirmed_enrollments'=>$total_not_confirmed_enrollments,
        ]);
    }
}
