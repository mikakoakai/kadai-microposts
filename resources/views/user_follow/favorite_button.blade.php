    @if (Auth::user()->is_favorating($micropost->id))

        {!! Form::open(['route' => ['users.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-xs"]) !!}
        {!! Form::close() !!}
    @else

        {!! Form::open(['route' => ['users.favorite', $micropost->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
    @endif
