<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 *
 * @property string title
 * @property string text
 * @property string img
 * @property boolean is_private
 */
class News extends Model
{
    protected $fillable = ['title', 'text', 'is_private', 'category_id'];
}
