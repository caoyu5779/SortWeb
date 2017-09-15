<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sort extends Model
{
    //
    public static function createNewPage($title, $author, $description, $articleId)
    {
        $res = DB::table('lists')->insert([
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'article_id' => $articleId,
        ]);

        return empty($res) ? false : true;
    }

    public static function createNewArticle($author, $code)
    {
        $res = DB::table('sort_content')->insert([
            'author' => $author,
            'code' => $code,
        ]);

        return empty($res) ? false : true;
    }

    public static function getListsInfo($author)
    {
        $lists = DB::table('lists')->where('author',$author)->get();
        return empty($lists) ? array() : $lists;
    }

    public static function getLastInsertPage($author)
    {
        $articleId = DB::table('lists')->where('author', $author)->orderBy('created_at','desc')->get();
        $articleId = Tool::object_2_array($articleId);

        return empty($articleId[0]) ? 1 : $articleId[0];
    }

    public static function getArticleInfoByAid($articleId, $author)
    {
        $articleInfo = DB::table('sort_content')->where(['article_id' => $articleId, 'author' => $author])->first();

        $articleInfo = Tool::object_2_array($articleInfo);

        return empty($articleInfo) ? array() : $articleInfo;

    }

    /*
     * @author
     * @article_id
     * @return : title，description
     * @desc : 根据作者与文章id获取文章信息
     * **/
    public static function getArticleInfo($articleId, $author)
    {
        $info = DB::table('lists')->where(['article_id' => $articleId, 'author' => $author])->first();

        $info = Tool::object_2_array($info);

        return empty($info) ? array() : $info;
    }

    public function sortContent()
    {
        return $this->hasOne('App\Page');
    }

}
