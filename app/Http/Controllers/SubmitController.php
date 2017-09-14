<?php

namespace App\Http\Controllers;

use App\Sort;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SubmitController extends Controller
{
    //
    public function store(Request $request)
    {
        $author = Auth::user()->name;

        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $sort = new Sort();
        $lastArticleId = $sort::getLastInsertPage($author);

        $result = $sort::createNewPage(
            $request->title,
            $author,
            $request->body,
            $lastArticleId['article_id']
        );

        if (!empty($result))
        {
            return redirect('home');
        }
        else
        {
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }
}
