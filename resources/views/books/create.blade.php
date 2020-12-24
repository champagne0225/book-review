@extends('layouts.app')

@section('content')

    <h2>本の新規登録</h2>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => 'books.store', 'method' => 'post', 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('writer', '著者:') !!}
                    {!! Form::text('writer', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image', '画像:') !!}
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登　録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection