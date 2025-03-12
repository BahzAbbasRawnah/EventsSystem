<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class PricingPackageController extends Controller
{
    public function index(){
        $pricingPackages = SubscriptionPackage::with('features')->get();

        // dd($pricingPackage);
        return view('pricing.index', compact('pricingPackages'));
    }
}
