<?php

namespace App\Http\Controllers;
use App\Models\invoices;
use App\Models\User;

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


    $count_all =invoices::count();
    $count_invoices1 = invoices::where('Value_Status', 1)->count();
    $count_invoices2 = invoices::where('Value_Status', 2)->count();
    $count_invoices3 = invoices::where('Value_Status', 3)->count();

    if($count_invoices2 == 0){
        $nspainvoices2=0;
    }
    else{
        $nspainvoices2 = $count_invoices2/ $count_all*100;
    }

        if($count_invoices1 == 0){
            $nspainvoices1=0;
        }
        else{
            $nspainvoices1 = $count_invoices1/ $count_all*100;
        }

        if($count_invoices3 == 0){
            $nspainvoices3=0;
        }
        else{
            $nspainvoices3 = $count_invoices3/ $count_all*100;
        }


        // ExampleController.php

        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('doughnut')
        ->size(['width' => 350, 'height' => 200])
        ->labels(['PAID BILLS', 'UNPAID BILLS','PARTIALLY PAID BILLS'])
        ->datasets([
            [
                'backgroundColor' => ['#40FF33', '#FF4C2F', '#F6C93A'],
                'hoverBackgroundColor' => ['#40FF33', '#FF4C2F', '#F5C325'],
                'data' => [round($nspainvoices1, 2), round($nspainvoices2,2), round($nspainvoices3,2)]

            ]
        ])->options([]);








        return view('home', compact('chartjs'));

    }
}
