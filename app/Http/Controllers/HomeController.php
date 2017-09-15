<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Page;

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
        $author = Auth::user()->name;
        $authorLists = Sort::getListsInfo($author);

        return view('home')->with([
            'author' => $author,
            'lists' => $authorLists
        ]);
    }
}
