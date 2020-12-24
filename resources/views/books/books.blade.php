@extends('layouts.app')

@section('content')

    <div class="jumbotron container">
        <h2>検索・登録</h2>
        <hr>
        <div>
            {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <div class="form-group row text-center">
                    {!! Form::text('title', '', ['class' => 'form-control ml-2 col-sm-8']) !!}
                    {!! Form::submit('検索', ['class' => 'btn btn-primary ml-1']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>表紙</th>
                    <th>タイトル</th>
                    <th>著者</th>
                    <th>登録</th>
                </tr>
            </thead>
             <tbody>
                @foreach ($books as $book)
                    <tr>
                        @if (!isset($book->image_url))
                            <td><img class="rounded img-fluid" src="{{ asset('storage/book_image/no_image.png') }}" style="max-width: 100px;" alt=""></td>
                        @else
                            <td><img class="rounded img-fluid" src="{{ asset('storage/book_image/'.$book->image_url) }}" style="max-width: 100px;" alt=""></td>
                        @endif
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
    </div>
    <div class="row">
        {{-- 新規本登録ページへのリンク --}}
        {!! link_to_route('books.create', '新しく追加', [], ['class' => 'btn btn-primary']) !!}
    </div>

@endsection