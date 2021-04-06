<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerChart extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'customer_chart';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'customer_chart';

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
        $data = DB::table('users')
            ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('COUNT(name) as num'), DB::raw('MONTH(created_at) as month_num'))
            ->groupBy(DB::raw('MONTHNAME(created_at)'), 'month_num')
            ->orderBy(DB::raw('month_num'))
            ->get();

        $gg1 = [];
        $gg2 = [];

        foreach ($data as $key => $da1):

            $gg1[] = $da1->month;
            $gg2[] = $da1->num;

        endforeach;

        return Chartisan::build()
            ->labels($gg1)
            ->dataset('', $gg2);
        }
}