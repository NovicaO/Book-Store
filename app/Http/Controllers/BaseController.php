<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Support\Facades\View;


class BaseController extends Controller
{
    public function __construct()
    {
        $currency = Currency::where('is_default', 1)->first();

        View::share('currency', $currency);

    }
}
