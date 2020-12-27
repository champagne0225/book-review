@extends('layouts.app')

@section('content')

    <div class="jumbotron container" style="padding: 2rem;">
        <h2 style="font-size: 1.5rem;">検索・登録</h2>
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
    
    <div class="container">
        <div class="row">
        {{-- 新規本登録ページへのリンク --}}
        {!! link_to_route('books.create', '新しく本を追加', [], ['class' => 'btn btn-primary']) !!}
        </div>
    </div>


    <div class="container jumbotron mt-1">
        @if (count($books) > 0)
            <ul class="list-unstyled mb-0 row row-cols-2 row-cols-md-3 row-cols-lg-5">
                @foreach ($books as $book)
                    <li class="col mb-2" style="height: 330px;">
                        <div class="text-center">
                            @if (!isset($book->image_url))
                                <img class="rounded img-fluid" src="{{ asset('storage/book_image/no_image.png') }}" style="max-width: 100px; height: 141.531px;" alt="">
                            @else
                                <img class="rounded img-fluid" src="{{ asset('storage/book_image/'.$book->image_url) }}" style="max-width: 100px; height: 141.53px; object-fit:cover;" alt="">
                            @endif
                            <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($book->title)) !!}</p>
                            <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($book->writer)) !!}</p>
                            @include('book_register.register_button')
                        </div>
                    </li>
                @endforeach
            </ul>
            {{-- ページネーションのリンク --}}
            {{ $books->links() }}
        @else
            <p class="text-center" style="font-size: 1.2rem; color: red;">検索結果がありません</p>
        @endif
    </div>

@endsection