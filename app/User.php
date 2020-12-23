<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが登録中の本（Bookモデルとの関係を定義）
     */
    public function registering()
    {
        return $this->belongsToMany(Book::class, 'books_of_interest', 'user_id', 'book_id')->withTimestamps();
    }

    /**
     * $bookIdで指定された本を登録する。
     *
     * @param  int  $bookId
     * @return bool
     */
    public function register($bookId, $status)
    {
        // すでに登録しているかの確認
        $exist = $this->is_registering($bookId);

        if ($exist) {
            // すでに登録していれば変更する
            $this->registering()->updateExistingPivot($bookId, ['status' => $status]);
            return true;
        } else {
            // 未登録であれば登録する
            $this->registering()->attach($bookId, ['status' => $status]);
            return true;
        }
    }

    /**
     * $bookIdで指定されたユーザを登録解除する。
     *
     * @param  int  $bookId
     * @return bool
     */
    public function unregister($bookId)
    {
        // すでに登録しているかの確認
        $exist = $this->is_registering($bookId);

        if ($exist) {
            // すでに登録していれば登録を解除する
            $this->registering()->detach($bookId);
            return true;
        } else {
            // 未登録であれば何もしない
            return false;
        }
    }

    /**
     * 指定された $bookIdの本をこのユーザが登録中であるか調べる。登録中ならtrueを返す。
     *
     * @param  int  $bookId
     * @return bool
     */
    public function is_registering($bookId)
    {
        // 登録中の本の中に $bookIdのものが存在するか
        return $this->registering()->where('book_id', $bookId)->exists();
    }

    /**
     * $bookIdで指定された本にレビューを登録する。
     *
     * @param  int  $bookId
     * @return bool
     */
    public function review($bookId, $review)
    {
        $this->registering()->updateExistingPivot($bookId, ['review' => $review]);
        return true;
    }

    /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount(['registering']);
    }

        
    /**
     * このユーザが読んだ本に絞り込む。
     */
    public function feed_have_reads()
    {
        // このユーザが読んだ本に登録中の本のidを取得して配列にする
        $bookIds = $this->registering()->where('status', 'have_read')->pluck('book_id')->toArray();
        // この本のidの本に絞り込む
        return Book::whereIn('id', $bookIds);
    }

    /**
     * このユーザが読んでる本に絞り込む。
     */
    public function feed_readings()
    {
        // このユーザが読んでる本に登録中の本のidを取得して配列にする
        $bookIds = $this->registering()->where('status', 'reading')->pluck('book_id')->toArray();
        // この本のidの本に絞り込む
        return Book::whereIn('id', $bookIds);
    }

    /**
     * このユーザが読みたい本に絞り込む。
     */
    public function feed_want_to_reads()
    {
        // このユーザが読んでる本に登録中の本のidを取得して配列にする
        $bookIds = $this->registering()->where('status', 'want_to_read')->pluck('book_id')->toArray();
        // この本のidの本に絞り込む
        return Book::whereIn('id', $bookIds);
    }

    /**
     * このユーザが登録したレビューを取り出す。
     */
    public function feed_reviews()
    {
        // このユーザが読んだ本に登録中のレビューを取得して配列にする
        $reviews = $this->registering()->where('status', 'have_read')->pluck('review', 'book_id')->toArray();
        return $reviews;
    }
}
