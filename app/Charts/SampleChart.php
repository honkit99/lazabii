<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Ewallet;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
//use App\Charts\BaseChart;


class SampleChart extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'sample_chart';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'sample_chart';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    public ?string $prefix = 'admin';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = ['auth:admin'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $data1 = Ewallet::all();

        $gg1 = [];
        $gg2 = [];
        $gg3 = [];
        
        foreach ($data1 as $key=>$da1):

            $gg1[] = $da1->id;
            $gg2[] = $da1->new_balance;
            $gg3[] = $da1->current_balance;

        endforeach;

        return Chartisan::build()
            ->labels($gg1)
            ->dataset('new', $gg2)
            ->dataset('current', $gg3);
    }
}