<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookRegisterController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            // ユーザの登録中の本一覧を作成日時の降順で取得
            $have_reads = $user->feed_have_reads()->orderBy('created_at', 'desc')->paginate(10);
            $readings = $user->feed_readings()->orderBy('created_at', 'desc')->paginate(10);
            $want_to_reads = $user->feed_want_to_reads()->orderBy('created_at', 'desc')->paginate(10);
            $have_reads_counts = $user->feed_have_reads()->count();
            $readings_counts = $user->feed_readings()->count();
            $want_to_reads_counts = $user->feed_want_to_reads()->count();

            $data = [
                'have_reads' => $have_reads,
                'readings' => $readings,
                'want_to_reads' => $want_to_reads,
                'have_reads_counts' => $have_reads_counts,
                'readings_counts' => $readings_counts,
                'want_to_reads_counts' => $want_to_reads_counts,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    /**
     * 本を登録するアクション
     *
     * @param  $id  本のid
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $status = $request->status;
    
        // 認証済みユーザ（閲覧者）が、idの本を登録する
        \Auth::user()->register($id, $status);
        
        // 前のURLへリダイレクトさせる
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $status = $request->status;
        
        // 認証済みユーザ（閲覧者）が、idの本の状態を修正する
        \Auth::user()->register($id, $status);
        
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * 本を登録解除するアクション
     *
     * @param  $id  本のid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、idの本を登録解除する
        \Auth::user()->unregister($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
