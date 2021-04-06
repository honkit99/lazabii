<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Order;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevenueChart extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'revenue_chart';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'revenue_chart';

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
        //$data = Order::select("MONTHNAME(`created_at`) as month, `total_payment_amount`");
        $data = DB::select('SELECT MONTHNAME(`created_at`) AS month, `total_payment_amount` FROM `lazabii`.`orders`');

        $gg1 = [];
        $gg2 = [];
        $gg3 = [];
        
        foreach ($data as $key=>$da1):

            $gg1[] = $da1->month;
            $gg2[] = $da1->total_payment_amount;

        endforeach;

        return Chartisan::build()
            ->labels($gg1)
            ->dataset('new', $gg2);
    }
}