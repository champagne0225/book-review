@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <h2>レビュー（未登録）</h2>
        <hr>
        <ul class="list-unstyled row row-cols-5">
            @foreach ($have_reads as $have_read)
                @if(!isset($reviews[$have_read->id]))
                    <li class="col mb-2">
                        <div>
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
            <h3>{!! nl2br(e($have_read->title)) !!}（著者：{!! nl2br(e($have_read->writer)) !!}）</h3>
            <hr>
            <p class="mb-0">{!! $reviews[$have_read->id] !!}</p>
            {{-- レビュー編集ページへのリンク --}}
            {!! link_to_route('review.edit', '編集', ['book_id' => $have_read->id], ['class' => 'btn btn-light']) !!}
        </div>
    @endforeach

@endsection