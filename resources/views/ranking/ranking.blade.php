@extends('layouts.app')

@section('content')
    
    <div class="jumbotron" style="padding: 2rem;">
        <h3 style="display: inline; font-size: 1.4rem;">読んだ本</h3>
        <hr>
        <ul class="list-unstyled mb-0 row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @if($ranking_have_reads1)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-warning" style="font-size: 1.7rem;">1</span>
                    <div class="text-center">
                        @if (!isset($ranking_have_reads1->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_have_reads1->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_have_reads1->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_have_reads1->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_have_reads1->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_have_reads1->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_have_reads1->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
            @if($ranking_have_reads2)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-danger" style="font-size: 1.7rem;">2</span>
                    <div class="text-center">
                        @if (!isset($ranking_have_reads2->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_have_reads2->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_have_reads2->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_have_reads2->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_have_reads2->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_have_reads2->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_have_reads2->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
            @if($ranking_have_reads3)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-success" style="font-size: 1.7rem;">3</span>
                    <div class="text-center">
                        @if (!isset($ranking_have_reads3->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_have_reads3->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_have_reads3->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_have_reads3->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_have_reads3->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_have_reads3->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_have_reads3->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
        </ul>
    </div>

    <div class="jumbotron" style="padding: 2rem;">
        <h3 style="display: inline; font-size: 1.4rem;">読んでる本</h3>
        <hr>
        <ul class="list-unstyled mb-0 row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @if($ranking_readings1)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-warning" style="font-size: 1.7rem;">1</span>
                    <div class="text-center">
                        @if (!isset($ranking_readings1->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_readings1->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_readings1->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_readings1->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_readings1->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_readings1->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_readings1->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
            @if($ranking_readings2)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-danger" style="font-size: 1.7rem;">2</span>
                    <div class="text-center">
                        @if (!isset($ranking_readings2->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_readings2->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_readings2->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_readings2->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_readings2->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_readings2->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_readings2->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
            @if($ranking_readings3)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-success" style="font-size: 1.7rem;">3</span>
                    <div class="text-center">
                        @if (!isset($ranking_readings3->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_readings3->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_readings3->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_readings3->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_readings3->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_readings3->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_readings3->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
        </ul>
    </div>

    <div class="jumbotron" style="padding: 2rem;">
        <h3 style="display: inline; font-size: 1.4rem;">読みたい本</h3>
        <hr>
        <ul class="list-unstyled mb-0 row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @if($ranking_want_to_reads1)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-warning" style="font-size: 1.7rem;">1</span>
                    <div class="text-center">
                        @if (!isset($ranking_want_to_reads1->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_want_to_reads1->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_want_to_reads1->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_want_to_reads1->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_want_to_reads1->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_want_to_reads1->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_want_to_reads1->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
            @if($ranking_want_to_reads2)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-danger" style="font-size: 1.7rem;">2</span>
                    <div class="text-center">
                        @if (!isset($ranking_want_to_reads2->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_want_to_reads2->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_want_to_reads2->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_want_to_reads2->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_want_to_reads2->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_want_to_reads2->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_want_to_reads2->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
            @if($ranking_want_to_reads3)
                <li class="col mb-2" style="height: 330px;">
                    <span class="badge badge-success" style="font-size: 1.7rem;">3</span>
                    <div class="text-center">
                        @if (!isset($ranking_want_to_reads3->image_url))
                            <div class="no_image">NO IMAGE</div>
                        @else
                            <img class="rounded img-fluid" src="{{ $ranking_want_to_reads3->image_url }}" style="max-width: 100px; height: 141.531px; object-fit:cover;" alt="">
                        @endif
                        <p class="mb-0" style="height: 2.7rem; overflow:hidden;">{!! nl2br(e($ranking_want_to_reads3->title)) !!}</p>
                        <p class="mb-0" style="font-size: 0.8rem; height: 1.2rem; line-height: 1.4rem; overflow: hidden;">{!! nl2br(e($ranking_want_to_reads3->writer)) !!}</p>
                        @if(Auth::check())
                            @if (Auth::user()->is_registering($ranking_want_to_reads3->id))
                                {{-- 登録解除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.unregister', $ranking_want_to_reads3->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- 登録ボタンのフォーム --}}
                                {!! Form::open(['route' => ['book.register', $ranking_want_to_reads3->id]]) !!}
                                    {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
                                    {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                </li>
            @endif
        </ul>
    </div>

@endsection