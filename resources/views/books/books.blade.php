@extends('layouts.app')

@section('content')

    <h2>検索・登録</h2>
    <div class="row">
        {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
            <div class="form-group">
                {!! Form::text('title', '', ['class' => 'form-control']) !!}
            </div>
            
            {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

    </div>
    
    <div class="row mt-5">
        @if (!empty($data))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>筆者</th>
                        <th>登録</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{!! link_to_route('books.show', $item->title, ['book' => $item->id]) !!}</td>
                        <td>{{ $item->writer }}</td>
                        <td>
                            @include('book_register.register_button')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>筆者</th>
                        <th>登録</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td>{!! link_to_route('books.show', $book->title, ['book' => $book->id]) !!}</td>
                        <td>{{ $book->writer }}</td>
                        <td>
                            @include('book_register.register_button')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                {{-- ページネーションのリンク --}}
                {{ $books->links() }}
        @endif
    </div>
    <div class="row">
        {{-- 新規本登録ページへのリンク --}}
        {!! link_to_route('books.create', '新しく追加', [], ['class' => 'btn btn-primary']) !!}
    </div>

@endsection