@extends('layouts.app')

@section('content')

    <div class="jumbotron container" style="padding: 2rem;">
        <h2>検索・登録</h2>
        <hr>
        <div>
            {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <div class="form-group row">
                    {!! Form::text('title', '', ['class' => 'form-control offset-2 col-7']) !!}
                    {!! Form::submit('検索', ['class' => 'btn btn-primary ml-1']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
    <div class="row">
        {{-- 新規本登録ページへのリンク --}}
        {!! link_to_route('books.create', '新しく本を追加', [], ['class' => 'btn btn-primary']) !!}
    </div>

    <div class="row mt-1">
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
                            <td><img class="rounded img-fluid" src="{{ asset('storage/book_image/no_image.png') }}" style="max-width: 100px; height: 141.531px; " alt=""></td>
                        @else
                            <td><img class="rounded img-fluid" src="{{ asset('storage/book_image/'.$book->image_url) }}" style="max-width: 100px; height: 141.53px; object-fit:cover;"" alt=""></td>
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

@endsection