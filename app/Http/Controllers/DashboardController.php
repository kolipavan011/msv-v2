<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Show inertia dashboard component response
     *
     * @return Response
     */
    public function index(): Response
    {
        return inertia('Dashboard');
    }
}
