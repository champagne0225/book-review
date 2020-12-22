<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookRegisterController extends Controller
{
    /**
     * 本を登録するアクション。
     *
     * @param  $id  本のid
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $status = $request->status;
    
        // 認証済みユーザ（閲覧者）が、idの本を登録する
        \Auth::user()->register($id, $status);
        
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * 本を登録解除するアクション。
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
