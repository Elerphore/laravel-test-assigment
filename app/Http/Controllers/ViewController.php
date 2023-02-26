<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class ViewController extends Controller
{
    public function crudView(): Factory|View|Application {
        Log::channel('view')->info("Return CRUD VIEW");
        return view('crud');
    }

    public function createView(): Factory|View|Application {
        Log::channel('view')->info("Return CREATE VIEW");
        return view('create-form');
    }

    public function updateView(): Factory|View|Application {
        Log::channel('view')->info("Return UPDATE VIEW");
        return view('update-form');
    }
}
