<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = Search::stats();
        return view('home', ['stats' => $stats]);
    }

    public function reindex(Request $request)
    {
        Search::reindex();
        return redirect()->route('admin');
    }
}
