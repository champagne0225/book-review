@extends('layouts.app')

@section('content')

    <div class="jumbotron" style="padding: 2rem;">
        <h3 style="font-size: 1.4rem;">レビュー未登録</h3>
        <hr>
        <ul class="list-unstyled row row-cols-2 row-cols-md-3 row-cols-lg-4">
            @foreach ($have_reads as $have_read)
                @if(!isset($reviews[$have_read->id]))
                    <li class="col mb-2">
                        <div class="text-center">
                            @if (!isset($have_read->image_url))
                                <td><img class="rounded img-fluid" src="{{ asset('storage/book_image/no_image.png') }}" style="max-width: 100px; height: 141.53px;" alt=""></td>
                            @else
                                <td><img class="rounded img-fluid" src="{{ asset('storage/book_image/'.$have_read->image_url) }}" style="max-width: 100px; height: 141.53px; object-fit:cover;" alt=""></td>
                            @endif
                            <p class="mb-0" style="height: 2.7rem; overflow: hidden;">{!! nl2br(e($have_read->title)) !!}</p>
                            <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($have_read->writer)) !!}</p>
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
        <div class="reviews jumbotron" style="padding: 2rem;">
            <div class="row row-cols-2">
                @if (!isset($have_read->image_url))
                    <img class="rounded img-fluid" src="{{ asset('storage/book_image/no_image.png') }}" alt="">
                @else
                    <img class="book_image rounded img-fluid" src="{{ asset('storage/book_image/'.$have_read->image_url) }}" alt="">
                @endif
                <h3 class="ml-3">{!! nl2br(e($have_read->title)) !!}<br>（{!! nl2br(e($have_read->writer)) !!}）</h3>
            </div>
            <hr>
            <span>読み終わった日：{!! $completion_dates[$have_read->id] !!}</span>
            <p class="mb-0">レビュー：<br>{!! $reviews[$have_read->id] !!}</p>
            <div class="text-right">
            {{-- レビュー編集ページへのリンク --}}
            {!! link_to_route('review.edit', '編集', ['book_id' => $have_read->id], ['class' => 'btn btn-light mt-3']) !!}
            </div>
        </div>
    @endforeach

@endsection