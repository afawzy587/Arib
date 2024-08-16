<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard - Analytics
    public function home()
    {
        $pageConfigs = [
            'pageHeader' => true
        ];
        return view('/pages/home', [
            'pageConfigs' => $pageConfigs,
        ]);
    }
}
