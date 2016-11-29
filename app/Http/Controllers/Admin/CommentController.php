<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class CommentController
 * @package App\Http\Controllers\Admin
 */
class CommentController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {
        return view('admin/comment/index')->withComments(Comment::with('hasOneArticle')->get());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id ){
        return view('admin/comment/edit')->withComment(Comment::with('hasOneArticle')->find($id));
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id )
    {
        $this->validate($request, [
            'nickname' => 'required',
            'content' => 'required'
        ]);

        $comment = Comment::find($id);
        $comment->nickname = $request->get('nickname');
        $comment->email = $request->get('email');
        $comment->website = $request->get('website');
        $comment->content = $request->get('content');

        if( $comment->save() ){
            return redirect('admin/comment');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败!');
        }
    }

    /**
     * @param $id
     * @return $this
     */
    public function destroy($id )
    {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功!');
    }

}
