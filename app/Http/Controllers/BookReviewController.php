<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BookReviewController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            // ユーザの登録中の本一覧を作成日時の降順で取得
            $have_reads = $user->feed_have_reads()->orderBy('created_at', 'desc')->paginate(10);
            $reviews = $user->feed_reviews();
            $completion_dates = $user->feed_completion_dates();

            $data = [
                'have_reads' => $have_reads,
                'completion_dates' => $completion_dates,
                'reviews' => $reviews,
            ];
        }

        return view('reviews.reviews', $data);
    }
    
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        
        return view('reviews.edit', [
            'book' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'review' => 'max:255',
        ]);

        $review = $request->review;
        $date = $request->year.'-'.$request->month.'-'.$request->day;
    
        // 認証済みユーザ（閲覧者）が、idの本のレビューを登録する
        \Auth::user()->review($id, $review, $date);
        
        return redirect('reviews');
    }
}
