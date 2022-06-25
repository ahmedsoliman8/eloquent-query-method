@foreach($discussions as $discussion)

    <div>
        {{$discussion->id}}.{{$discussion->title}} @if($discussion->solved_at) (Solved)  @endif
    </div>
@endforeach



