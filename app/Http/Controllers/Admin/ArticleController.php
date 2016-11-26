<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Admin
 */
class ArticleController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin/article/create');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request )
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if( $article->save() ){
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }

    public function edit( $id ){
//        var_dump(Article::find($id));die;
        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    public function update( Request $request, $id )
    {
        $this->validate($request, [
            'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'body' => 'required',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');

        if( $article->save() ){
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败!');
        }
    }

    public function destroy( $id )
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功!');
    }

}
