<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BookRankingController extends Controller
{
    public function index()
    {
        $have_reads_counts = [];
        $readings_counts = [];
        $want_to_reads_counts = [];
        for ($id = 1; $id <= Book::max('id'); $id++) {
            $book = Book::where('id', $id)->first();
            if ($book) {
                $have_reads_count = $book->feed_have_reads()->count();
                $readings_count = $book->feed_readings()->count();
                $want_to_reads_count = $book->feed_want_to_reads()->count();
                $have_reads_counts += [$id => $have_reads_count];
                $readings_counts += [$id => $readings_count];
                $want_to_reads_counts += [$id => $want_to_reads_count];
            }
        }
    
        arsort($have_reads_counts);
        arsort($readings_counts);
        arsort($want_to_reads_counts);

        $have_reads_bookIds = array_keys($have_reads_counts);
        $readings_bookIds = array_keys($readings_counts);
        $want_to_reads_bookIds = array_keys($want_to_reads_counts);
        
        $ranking_have_reads1 = Book::where('id', $have_reads_bookIds[0])->first();
        $ranking_have_reads2 = Book::where('id', $have_reads_bookIds[1])->first();
        $ranking_have_reads3 = Book::where('id', $have_reads_bookIds[2])->first();
        $ranking_readings1 = Book::where('id', $readings_bookIds[0])->first();
        $ranking_readings2 = Book::where('id', $readings_bookIds[1])->first();
        $ranking_readings3 = Book::where('id', $readings_bookIds[2])->first();
        $ranking_want_to_reads1 = Book::where('id', $want_to_reads_bookIds[0])->first();
        $ranking_want_to_reads2 = Book::where('id', $want_to_reads_bookIds[1])->first();
        $ranking_want_to_reads3 = Book::where('id', $want_to_reads_bookIds[2])->first();

        return view('ranking.ranking', [
            'ranking_have_reads1' => $ranking_have_reads1,
            'ranking_have_reads2' => $ranking_have_reads2,
            'ranking_have_reads3' => $ranking_have_reads3,
            'ranking_readings1' => $ranking_readings1,
            'ranking_readings2' => $ranking_readings2,
            'ranking_readings3' => $ranking_readings3,
            'ranking_want_to_reads1' => $ranking_want_to_reads1,
            'ranking_want_to_reads2' => $ranking_want_to_reads2,
            'ranking_want_to_reads3' => $ranking_want_to_reads3,
        ]);
    }
}
