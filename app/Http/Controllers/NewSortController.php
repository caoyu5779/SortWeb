<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NewSortController extends Controller
{
    //
    public function create($author)
    {
        return view('newSort');
    }
}
