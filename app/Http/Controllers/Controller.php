<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;
use App\Models\Wathbat_social;
use App\Models\Wathbat_data;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {

        $branch = Wathbat_data::first();

        if ($branch == null) {
            $branch = new Wathbat_data();
        }

        $social = Wathbat_social::first();

        if ($social == null) {
            $social = new Wathbat_social();
        }
        View::share(['branch' => $branch,'social' => $social]);
    }
}
