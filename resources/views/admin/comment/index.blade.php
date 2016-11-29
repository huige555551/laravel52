@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">评论管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>Page</th>
                                <th>评论</th>
                                <th>发表者</th>
                                <th>操作</th>
                            </tr>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>
                                        {{ $comment->hasOneArticle->title }}
                                    </td>
                                    <td title="Email address:{{ $comment->email }}, Home page:{{ $comment->website }}">
                                        {{ $comment->content }}
                                    </td>
                                    <td>
                                        {{ $comment->nickname }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/comment/'.$comment->id.'/edit') }}"
                                           class="btn btn-success">编辑</a>

                                        <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST"
                                              style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    </td>
                                    <br/>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection