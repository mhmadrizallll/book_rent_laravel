<?php

namespace App\Http\Controllers;

use App\Models\RentLog;

class RentLogController extends Controller
{
    public function index()
    {
        $rent_log = RentLog::with(['user', 'book'])->get();
        return view('rent-log', ['rentLog' => $rent_log]);
    }
}
