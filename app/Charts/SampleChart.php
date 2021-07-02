<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\EventOne;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class SampleChart extends BaseChart
{

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        //logica das idades

        $year = date('Y');
        $today_date = date('Y-m-d');
        $month = date('m');
        $day = date('d');


        $year_18 = $year - 18;
        $year_25 = $year - 25;
        $year_40 = $year - 40;
        $year_50 = $year - 50;




        //montar a data de nascimento para os menores de 18 anos de idade

        $mount_18 = $year_18.'-'.$month.'-'.$day;

        //montar a data de nascimento para os de 18 a 25 anos de idade

        $mount_25 = $year_25.'-'.$month.'-'.$day;

        //montar a data de nascimento para os de 25 a 40 anos de idade

        $mount_40 = $year_40.'-'.$month.'-'.$day;

        //montar a data de nascimento para os de 25 a 40 anos de idade

        $mount_50 = $year_50.'-'.$month.'-'.$day;





        $count_minors = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_18, $today_date])
            ->count();

        $count_18_25 = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_25, $mount_18])
            ->count();

        $count_25_40 = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_40, $mount_25])
            ->count();
        $count_40_50 = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_50, $mount_40])
            ->count();
        $count_over_50 = EventOne::all()
            ->where('date_of_birth', '<', $mount_50)
            ->count();
        return Chartisan::build()
            ->labels(['Menores de 18 anos', 'Entre 18 e 25 anos', 'Entre 25 a 40 anos', 'Entre 40 a 50 anos', 'Maiores de 50 anos'])
            ->dataset('Inscritos',  [$count_minors, $count_18_25, $count_25_40, $count_40_50, $count_over_50]);

    }
}
