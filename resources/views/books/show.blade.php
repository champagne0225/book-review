@extends('layouts.app')

@section('content')

    <h2>「{{ $book->title }}」の詳細</h2>

    <table class="table table-bordered">
        <tr>
            <th>タイトル</th>
            <td>{{ $book->title }}</td>
        </tr>
        <tr>
            <th>筆者</th>
            <td>{{ $book->writer }}</td>
        </tr>
    </table>
    
    {{-- 本編集ページへのリンク --}}
    {!! link_to_route('books.edit', 'この本を編集', ['book' => $book->id], ['class' => 'btn btn-light']) !!}

    {{-- 本削除フォーム --}}
    {!! Form::model($book, ['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection