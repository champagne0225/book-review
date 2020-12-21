@extends('layouts.app')

@section('content')

    <h2>「{{ $book->title }}」編集</h2>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('writer', '筆者:') !!}
                    {!! Form::text('writer', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection