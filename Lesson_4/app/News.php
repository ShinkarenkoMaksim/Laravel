<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    public $categories = [];

    public $news = [];

    public function getNews()
    {
        $this->news = json_decode(Storage::get('news.txt'), true);
        if (is_null($this->news))
            $this->news = [];
        return $this->news;
    }

    public function getCategories(){

        $this->categories = json_decode(Storage::get('categories.txt'), true);
        if (is_null($this->categories))
            $this->categories = [];
        return $this->categories;
    }
}
