<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request )
    {
        if( Comment::create($request->all()) ){
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败!');
        }
    }

}
