@extends('layouts.app')

@section('content')

    <h2>検索</h2>

    @if (count($books) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>筆者</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{!! link_to_route('books.show', $book->title, ['book' => $book->id]) !!}</td>
                    <td>{{ $book->writer }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{-- 新規本登録ページへのリンク --}}
    {!! link_to_route('books.create', '新しく追加', [], ['class' => 'btn btn-primary']) !!}

@endsection