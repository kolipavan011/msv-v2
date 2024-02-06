<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Http\Request;
use Inertia\Response;

class VidbotController extends Controller
{
    public function index(Request $request): Response
    {
        return inertia("Vidbot/Index", [
            'pageToken' => $request->query('pageToken', null),
            'keyword' => $request->query('q', ""),
        ]);
    }
}
