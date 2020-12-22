<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'writer',
    ];

    /**
     * この本を登録中のユーザ（Userモデルとの関係を定義）
     */
    public function registered()
    {
        return $this->belongsToMany(User::class, 'books_of_interest', 'book_id', 'user_id')->withTimestamps();
    }
}
