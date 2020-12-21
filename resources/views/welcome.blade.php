@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
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
            <div class="col-sm-8">
                {{-- 本一覧 --}}
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