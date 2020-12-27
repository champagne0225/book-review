@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="nickname card-title mb-0 text-center">{{ Auth::user()->nickname }}</h4>
                    </div>
                    <div class="card-body">
                        {{-- 認証済みユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid" src="{{ Gravatar::get(Auth::user()->email, ['size' => 500]) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-sm-9 book-status">
                <div class="jumbotron" style="padding: 2rem;">
                    <h3 style="display: inline; font-size: 1.4rem;">読んでる本<span class="badge badge-success ml-2">{!! $readings_counts !!}</span></h3>
                    <hr>
                    @if (count($readings) > 0)
                        <ul class="list-unstyled mb-0 row row-cols-2 row-cols-md-3 row-cols-lg-4">
                            @foreach ($readings as $reading)
                                <li class="col mb-2" style="height: 330px;">
                                    <div class="text-center">
                                        @if (!isset($reading->image_url))
                                            <div class="no_image">NO IMAGE</div>
                                        @else
                                            <img class="rounded img-fluid" src="{{ $reading->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                                        @endif
                                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($reading->title)) !!}</p>
                                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($reading->writer)) !!}</p>
                                        {{-- 状態変更ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['status.update', $reading->id]]) !!}
                                            {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'want_to_read' => "読みたい本"]) !!}
                                            {!! Form::submit('変更', ['class' => "btn btn-info btn-block"]) !!}
                                        {!! Form::close() !!}
                                        {{-- 登録解除ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['book.unregister', $reading->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- ページネーションのリンク --}}
                        {{ $readings->links() }}
                    @endif
                </div>
                <div class="jumbotron" style="padding: 2rem;">
                    <h3 style="display: inline; font-size: 1.4rem">読みたい本<span class="badge badge-success ml-2">{!! $want_to_reads_counts !!}</span></h3>
                    <hr>
                    @if (count($want_to_reads) > 0)
                        <ul class="list-unstyled mb-0 row row-cols-2 row-cols-md-3 row-cols-lg-4">
                            @foreach ($want_to_reads as $want_to_read)
                                <li class="col mb-2" style="height: 330px;">
                                    <div class="text-center">
                                        @if (!isset($want_to_read->image_url))
                                            <div class="no_image">NO IMAGE</div>
                                        @else
                                            <img class="rounded img-fluid" src="{{ $want_to_read->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                                        @endif
                                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($want_to_read->title)) !!}</p>
                                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($want_to_read->writer)) !!}</p>
                                        {{-- 状態変更ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['status.update', $want_to_read->id]]) !!}
                                            {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本']) !!}
                                            {!! Form::submit('変更', ['class' => "btn btn-info btn-block"]) !!}
                                        {!! Form::close() !!}
                                        {{-- 登録解除ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['book.unregister', $want_to_read->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- ページネーションのリンク --}}
                        {{ $want_to_reads->links() }}
                    @endif
                </div>
                <div class="jumbotron" style="padding: 2rem;">
                    <h3 style="display: inline; font-size: 1.4rem;">読んだ本<span class="badge badge-success ml-2">{!! $have_reads_counts !!}</span></h3>
                    <hr>
                    @if (count($have_reads) > 0)
                        <ul class="list-unstyled mb-0 row row-cols-2 row-cols-md-3 row-cols-lg-4">
                            @foreach ($have_reads as $have_read)
                                <li class="col mb-2" style="height: 330px;">
                                    <div class="text-center">
                                        @if (!isset($have_read->image_url))
                                            <div class="no_image">NO IMAGE</div>
                                        @else
                                            <img class="rounded img-fluid" src="{{ $have_read->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                                        @endif
                                        <p class="mb-0" style="height: 2.7rem; overflow: hidden;">{!! nl2br(e($have_read->title)) !!}</p>
                                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($have_read->writer)) !!}</p>
                                        {{-- 状態変更ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['status.update', $have_read->id]]) !!}
                                            {!! Form::select('status', ['' => '状態を選択', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                            {!! Form::submit('変更', ['class' => "btn btn-info btn-block"]) !!}
                                        {!! Form::close() !!}
                                        {{-- 登録解除ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['book.unregister', $have_read->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- ページネーションのリンク --}}
                        {{ $have_reads->links() }}
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Book Review</h1>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    {!! Form::open(['route' => 'login.post']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'パスワード') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}

                    {{-- ユーザ登録ページへのリンク --}}
                    <p class="mt-2">{!! link_to_route('signup.get', '新規会員登録はコチラ') !!}</p>
                </div>
            </div>
        </div>
    @endif
@endsection