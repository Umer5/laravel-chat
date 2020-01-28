<!DOCTYPE html>
<html>
<head>
  <title>Chat App</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
  <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
  <script>
        var base_url = '{{ url("/") }}';
    </script>
</head>
<body>
<div class="container">
  <div class="row no-gutters">
      <div class="col-md-4 border-right">
      <div class="settings-tray">
          <img class="profile-image" src="https://clarity-enhanced.net/wp-content/themes/clarity-enhanced/assets/img/bootstrap-chat-app-assets/filip.jpg" alt="Profile img">
      </div>
      <div class="search-box">
          <div class="input-wrapper">
          <i class="material-icons">search</i>
          <input placeholder="Search here" type="text">
          </div>
      </div>
      @if($users->count() > 0)
          @foreach($users as $user)
      <div class="friend-drawer friend-drawer--onhover chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">
          <img class="profile-image" src="https://clarity-enhanced.net/wp-content/themes/clarity-enhanced/assets/img/bootstrap-chat-app-assets/robocop.jpg" alt="">
          <div class="text">
          <h6>{{ $user->name }}</h6>
          <p class="text-muted">{{ substr($user->content, 0, 30) }}</p>
          </div>
          <span class="time text-muted small">{{\Carbon\Carbon::parse($user->time)->format('M d') }}</span>
      </div>
      <hr>
      @endforeach
          @endif
          @include('chat-box')
      </div>

      <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
      <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
      <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
      <div class="col-md-8">
        <div id="chat-overlay" class=""></div>
      </div>
  </div>
</div>


<audio id="chat-alert-sound" style="display: none">
    <source src="{{ asset('sound/facebook_chat.mp3') }}" />
</audio>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{ asset('js/chat.js') }}"></script>
</html>