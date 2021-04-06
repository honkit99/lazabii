<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;

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
        $data1 = DB::table('orders')
            ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('COUNT(total_payment_amount) as sales'), DB::raw('MONTH(created_at) as month_num'))
            ->groupBy(DB::raw('MONTHNAME(created_at)'), 'month_num')
            ->orderBy(DB::raw('month_num'))
            ->get();

        $data2 = DB::table('users')
            ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('COUNT(name) as users'), DB::raw('MONTH(created_at) as month_num'))
            ->groupBy(DB::raw('MONTHNAME(created_at)'), 'month_num')
            ->orderBy(DB::raw('month_num'))
            ->get();

        $data3 = DB::table('orders')
            ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('SUM(total_payment_amount) as amounts'), DB::raw('MONTH(created_at) as month_num'))
            ->groupBy(DB::raw('MONTHNAME(created_at)'), 'month_num')
            ->orderBy(DB::raw('month_num'))
            ->get();

        $gg1 = 0;
        $gg2 = 0;
        $gg3 = 0;

        foreach ($data1 as $key=>$da1):

            $gg1 = $da1->sales + $gg1;

        endforeach;

        foreach ($data2 as $key=>$da2):

            $gg2 = $da2->users + $gg2;

        endforeach;

        foreach ($data3 as $key=>$da3):

            $gg3 = $da3->amounts + $gg3;

        endforeach;

        $info = [
            'sale'     => $gg1,
            'user'     => $gg2,
            'revenue'  => $gg3,
        ];

        return view('admin.home', $info);
    }
}
