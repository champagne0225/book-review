@extends('layouts.app')

@section('content')

    <h2>「{{ $book->title }}」のレビュー登録</h2>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => ['review.update', $book->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('review', 'レビュー:') !!}
                    {!! Form::textarea('review', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection