<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App
 */
class Comment extends Model
{

    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];

    public function hasOneArticle()
    {
        return $this->hasOne('App\Article', 'id', 'article_id');
    }

}
