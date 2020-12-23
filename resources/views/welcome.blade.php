@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->nickname }}</h3>
                    </div>
                    <div class="card-body">
                        {{-- 認証済みユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid" src="{{ Gravatar::get(Auth::user()->email, ['size' => 500]) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-sm-9">
                <div class="jumbotron">
                    <h3>読んだ本</h3>
                    <hr>
                    @if (count($have_reads) > 0)
                        <ul class="list-unstyled row row-cols-4">
                            @foreach ($have_reads as $have_read)
                                <li class="col mb-2">
                                    <div>
                                        <p class="mb-0">{!! nl2br(e($have_read->title)) !!}</p>
                                        <p class="mb-0">{!! nl2br(e($have_read->writer)) !!}</p>
                                        {{-- 状態変更ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['status.update', $have_read->id]]) !!}
                                            {!! Form::select('status', ['' => '状態を選択', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                            {!! Form::submit('変更', ['class' => "btn btn-primary btn-block"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- ページネーションのリンク --}}
                        {{ $have_reads->links() }}
                    @endif
                </div>
                <div class="jumbotron">
                    <h3>読んでる本</h3>
                    <hr>
                    @if (count($readings) > 0)
                        <ul class="list-unstyled row row-cols-4">
                            @foreach ($readings as $reading)
                                <li class="col mb-2">
                                    <div>
                                        <p class="mb-0">{!! nl2br(e($reading->title)) !!}</p>
                                        <p class="mb-0">{!! nl2br(e($reading->writer)) !!}</p>
                                        {{-- 状態変更ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['status.update', $reading->id]]) !!}
                                            {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'want_to_read' => "読みたい本"]) !!}
                                            {!! Form::submit('変更', ['class' => "btn btn-primary btn-block"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- ページネーションのリンク --}}
                        {{ $readings->links() }}
                    @endif
                </div>
                <div class="jumbotron">
                    <h3>読みたい本</h3>
                    <hr>
                    @if (count($want_to_reads) > 0)
                        <ul class="list-unstyled row row-cols-4">
                            @foreach ($want_to_reads as $want_to_read)
                                <li class="col mb-2">
                                    <div>
                                        <p class="mb-0">{!! nl2br(e($want_to_read->title)) !!}</p>
                                        <p class="mb-0">{!! nl2br(e($want_to_read->writer)) !!}</p>
                                        {{-- 状態変更ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['status.update', $want_to_read->id]]) !!}
                                            {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本']) !!}
                                            {!! Form::submit('変更', ['class' => "btn btn-primary btn-block"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- ページネーションのリンク --}}
                        {{ $want_to_reads->links() }}
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