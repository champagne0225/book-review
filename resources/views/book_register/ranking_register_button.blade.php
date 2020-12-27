@if (Auth::user()->is_registering($book->id))
    {{-- 登録解除ボタンのフォーム --}}
    {!! Form::open(['route' => ['book.unregister', $book->id], 'method' => 'delete']) !!}
        {!! Form::submit('解除', ['class' => "btn btn-danger btn-block"]) !!}
    {!! Form::close() !!}
@else
    {{-- 登録ボタンのフォーム --}}
    {!! Form::open(['route' => ['book.register', $book->id]]) !!}
        {!! Form::select('status', ['' => '状態を選択', 'have_read' => '読んだ本', 'reading' => '読んでる本', 'want_to_read' => "読みたい本"]) !!}
        {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
    {!! Form::close() !!}
@endif