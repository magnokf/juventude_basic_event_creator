<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\EventOne;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class AgesChart extends BaseChart
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

        return Chartisan::build()


            ->labels(['Menores de 18 anos', 'Entre 18 e 25 anos', 'Entre 25 a 40 anos', 'Maiores de 40 anos'])
            ->Dataset('Inscritos', [$count_minors, $count_18_25, $count_25_40, $count_over_40])

            ;
    }
}
