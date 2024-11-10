@extends('user.index')
@section('user.content')
<div class="video-container">
      <h2>{{ $drone->name }} | {{ $drone->location->name }}</h2>
      <video controls autoplay muted>
        <source src="http://your-windows-ip:8080/drone1/live/stream.m3u8" type="application/x-mpegURL">
        Your browser does not support the video tag.
      </video>
    </div>
@endsection
