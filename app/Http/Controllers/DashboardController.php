<?php

namespace App\Http\Controllers;

use App\Models\Arketim;
use App\Models\Shpenzim;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $arketimQuery = Arketim::query();
        $shpenzimQuery = Shpenzim::query();

        if ($startDate) {
            $arketimQuery->where('created_at', '>=', $startDate);
            $shpenzimQuery->where('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $arketimQuery->where('created_at', '<=', $endDate);
            $shpenzimQuery->where('created_at', '<=', $endDate);
        }

        $arketims = $arketimQuery->get();
        $shpenzims = $shpenzimQuery->get();

        $totalArketim = $arketimQuery->sum('amount');
        $totalShpenzim = $shpenzimQuery->sum('amount');

        return view('dashboard', [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'arketims' => $arketims,
            'shpenzims' => $shpenzims,
            'totalArketim' => $totalArketim,
            'totalShpenzim' => $totalShpenzim,
        ]);
    }
}