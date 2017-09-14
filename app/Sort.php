<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sort extends Model
{
    //
    public static function createNewPage($title, $author, $description, $articleId)
    {
        $res = DB::insert('insert into lists (title,author,description,article_id) values(?,?,?,?)',
            [$title, $author, $description, $articleId]);
        return empty($res) ? false : true;
    }

    public static function getListsInfo($author)
    {
//        $lists = DB::table('lists')->where('author', '= ', $author)->get();
//        return $lists;
        $lists = DB::select('SELECT * FROM `lists` WHERE `author` = ?', [$author]);

        return empty($lists) ? array() : $lists;
    }

    public static function getLastInsertPage($author)
    {
//        $articleId = DB::select('SELECT `article_id` FROM `lists` WHERE `author` = ? ORDER BY `created_at` DESC', [$author]);
        $articleId = Db::table('lists')->where('author', $author)->orderBy('created_at','desc')->get();
        $articleId = Tool::object_2_array($articleId);

        return empty($articleId[0]) ? 1 : $articleId[0];
    }
}
