<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;
use App\Models\User;

class PricingPackageController extends Controller
{
    public function index()
    {
        $pricingPackages = SubscriptionPackage::with('features')->get();

        // Uncomment for debugging:
        // dd($pricingPackages);

        return view('pricing.index', compact('pricingPackages'));
    }

    public function user  ()
    {
        $users = User::all();

        return response()->json([
            'users' => $users,
        ]);
    }
}
