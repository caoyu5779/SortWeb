<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Sort;

class ArticleController extends Controller
{
    //
    public function show(Request $request)
    {
        $author = Auth::user()->name;

        $articleInfo = Sort::getArticleInfoByAid(
            $request->article_id,
            $author
        );

        $listInfo = Sort::getArticleInfo(
            $request->article_id,
            $author
        );

        return view('articleShow')->with([
            'article' => $articleInfo,
            'list' => $listInfo
        ]);

    }
}
