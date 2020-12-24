@extends('layouts.app')

@section('content')

    <h2>「{{ $book->title }}」のレビュー登録</h2>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => ['review.update', $book->id], 'method' => 'put']) !!}

                <?php $today = \Carbon\Carbon::now(); ?>

                <div class="form-group">
                    {!! Form::label('読み終わった日:') !!}
                    {!! Form::selectRange('year', 2020, 2030, $today->year) !!}年
                    {!! Form::selectRange('month', 1, 12, $today->month) !!}月
                    {!! Form::selectRange('day', 1, 31, $today->day) !!}日
                </div>

                <div class="form-group">
                    {!! Form::label('review', 'レビュー:') !!}
                    {!! Form::textarea('review', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection