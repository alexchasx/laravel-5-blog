<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

/**
 * @property integer $id
 * @property string  $title
 * @property integer $count_articles
 * @property integer $status
 */
class Category extends BaseModel
{
    const TABLE_NAME = 'categories';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

//    /**
//     * Возращает все статьи к данной категории.
//     */
//    public function articles()
//    {
//        return $this->hasMany(Article::class, 'article_id');
//    }
}
