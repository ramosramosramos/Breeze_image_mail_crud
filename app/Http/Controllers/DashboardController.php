<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;

class DashboardController
{
    public function getCount()
    {

        $userCounts = User::count();
        $adminRole = User::where('role', 'admin')->count();
        $userRole = User::where('role', 'user')->count();
        $unverified = User::where('email_verified_at', null)->count();
        $verified = User::count('email_verified_at');


        $totalSales = Sale::sum('amount');

        $currentMonthSales = Sale::whereMonth('created_at', now()
        ->month)->whereYear('created_at', now()->year)->sum('amount');

        $previousMonthSales = Sale::whereMonth('created_at', now()->subMonth()->month)
        ->whereYear('created_at', now()->subMonth()->year)->sum('amount');


        return inertia('AllowedPages/Dashboard', [
            'counts' => [
                'userCounts' => $userCounts,
                'adminRole' => $adminRole,
                'userRole' => $userRole,
                'verified' => $verified,
                'unverified' => $unverified,
                'currentMonthSales' => $currentMonthSales,
                'previousMonthSales' => $previousMonthSales,
                'totalSales' => $totalSales,

            ]
        ]);
    }
}
