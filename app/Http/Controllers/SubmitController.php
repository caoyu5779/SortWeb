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
            'description' => 'required|max:255',
        ]);

        $lastArticleId = Sort::getLastInsertPage($author);

        $sortResult = Sort::createNewPage(
            $request->title,
            $author,
            $request->description,
            $lastArticleId['article_id'] + 1
        );

        $articleResult = Sort::createNewArticle(
            $author,
            $request->body
        );

        if (!empty($sortResult) && !empty($articleResult))
        {
            return redirect('home');
        }
        else
        {
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }
}
