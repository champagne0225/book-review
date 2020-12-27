@extends('layouts.app')

@section('content')

    <h2>「{{ $book->title }}」編集</h2>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put', 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('writer', '著者:') !!}
                    {!! Form::text('writer', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image_url', '画像URL:') !!}
                    {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection