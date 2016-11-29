<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @param $id
     * @return mixed
     */
    public function  show($id )
    {
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
}
