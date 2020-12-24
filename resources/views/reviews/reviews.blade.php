@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <h2>レビュー未登録</h2>
        <hr>
        <ul class="list-unstyled row row-cols-5">
            @foreach ($have_reads as $have_read)
                @if(!isset($reviews[$have_read->id]))
                    <li class="col mb-2">
                        <div>
                            @if (!isset($have_read->image_url))
                                <td><img class="rounded img-fluid" src="{{ asset('storage/book_image/no_image.png') }}" style="max-width: 100px;" alt=""></td>
                            @else
                                <td><img class="rounded img-fluid" src="{{ asset('storage/book_image/'.$have_read->image_url) }}" style="max-width: 100px;" alt=""></td>
                            @endif
                            <p class="mb-0">{!! nl2br(e($have_read->title)) !!}</p>
                            <p class="mb-0">{!! nl2br(e($have_read->writer)) !!}</p>
                            {{-- レビュー登録ページへのリンク --}}
                            {!! link_to_route('review.edit', 'レビューを登録', ['book_id' => $have_read->id], ['class' => 'btn btn-light']) !!}
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $have_reads->links() }}
    </div>

    @foreach($have_reads as $have_read)
        <div class="jumbotron">
            <div class="row">
            @if (!isset($have_read->image_url))
                <img class="rounded img-fluid" src="{{ asset('storage/book_image/no_image.png') }}" style="max-width: 100px;" alt="">
            @else
                <img class="rounded img-fluid" src="{{ asset('storage/book_image/'.$have_read->image_url) }}" style="max-width: 100px;" alt="">
            @endif
            <h3 class="ml-3">{!! nl2br(e($have_read->title)) !!}<br>（著者：{!! nl2br(e($have_read->writer)) !!}）</h3>
            </div>
            <hr>
            <span>{!! $completion_dates[$have_read->id] !!}</span>
            <p class="mb-0">{!! $reviews[$have_read->id] !!}</p>
            {{-- レビュー編集ページへのリンク --}}
            {!! link_to_route('review.edit', '編集', ['book_id' => $have_read->id], ['class' => 'btn btn-light']) !!}
        </div>
    @endforeach

@endsection