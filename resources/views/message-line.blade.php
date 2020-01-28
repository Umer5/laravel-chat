@if($message->from_user == \Auth::user()->id)

    <div class="row msg_container no-gutters" data-message-id="{{ $message->id }}">
        <div class="col-md-4 offset-md-8">
            <div class="chat-bubble chat-bubble--right">
                <p>{!! $message->content !!}</p>
                <time datetime="{{ date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString())) }}">{{ $message->fromUser->name }} • {{ $message->created_at->diffForHumans() }}</time>
            </div>
        </div>
    </div>

@else

    <div class="row msg_container no-gutters" data-message-id="{{ $message->id }}">
        <div class="col-md-4">
            <div class="chat-bubble chat-bubble--left">
                <p>{!! $message->content !!}</p>
                <time datetime="{{ date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString())) }}">{{ $message->fromUser->name }} • {{ $message->created_at->diffForHumans() }}</time>
            </div>
        </div>
    </div>

@endif