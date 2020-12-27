<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'writer', 'image_url',
    ];

    /**
     * この本を登録中のユーザ（Userモデルとの関係を定義）
     */
    public function registered()
    {
        return $this->belongsToMany(User::class, 'books_of_interest', 'book_id', 'user_id')->withTimestamps();
    }
    
    /**
     * 読んだ本に登録中のユーザに絞り込む
     */
    public function feed_have_reads()
    {
        // この本を読んだ本に登録中のユーザのidを取得して配列にする
        $userIds = $this->registered()->where('status', 'have_read')->pluck('user_id')->toArray();
        // このidのユーザに絞り込む
        return User::whereIn('id', $userIds);
    }
    
    /**
     * 読んでる本に登録中のユーザに絞り込む
     */
    public function feed_readings()
    {
        // この本を読んでる本に登録中のユーザのidを取得して配列にする
        $userIds = $this->registered()->where('status', 'reading')->pluck('user_id')->toArray();
        // このidのユーザに絞り込む
        return User::whereIn('id', $userIds);
    }

    /**
     * 読みたい本に登録中のユーザに絞り込む
     */
    public function feed_want_to_reads()
    {
        // この本を読んでる本に登録中のユーザのidを取得して配列にする
        $userIds = $this->registered()->where('status', 'want_to_read')->pluck('user_id')->toArray();
        // このidのユーザに絞り込む
        return User::whereIn('id', $userIds);
    }
}
