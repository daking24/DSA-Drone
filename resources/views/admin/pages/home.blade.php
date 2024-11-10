@extends('admin.index')

@push('css')
    <style>
        .stuff{
            display: flex;
            justify-content: center;
            gap: 1rem;

        }
      .card {
  padding: 1rem;
  background-color: #fff;
  max-width: 320px;
  min-width: 320px;
  border-radius: 20px;
  box-shadow: 10px 10px #323232;
  border: 3px solid #323232;
}

.title {
  display: flex;
  align-items: center;
  justify-content: center;
}

.title span {
  position: relative;
  padding-bottom: 0.5rem;
  background-color: #10B981;
  width: 1.5rem;
  height: 1.5rem;
  border-radius: 9999px;
}

.title span img {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #ffffff;
  height: 1rem;
}

.title-text {
  margin-left: 0.5rem;
  color: #374151;
  font-size: 2rem;
  margin-bottom: 0;
}

.data {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.data p {
  margin-top: 1rem;
  margin-bottom: 1rem;
  color: #1F2937;
  font-size: 2.25rem;
  line-height: 2.5rem;
  font-weight: 700;
  text-align: left;
}

.data .range {
  position: relative;
  background-color: #E5E7EB;
  width: 100%;
  height: 0.5rem;
  border-radius: 0.25rem;
}

.data .range .fill {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #10B981;
  width: 76%;
  height: 100%;
  border-radius: 0.25rem;
}
      </style>
@endpush
@section('content')
<div class="stuff">
<div class="card">
    <div class="title">
        <span>
            <img width="16px" src="{{ asset('vendor/img/user.png') }}" alt="">
        </span>
        <p class="title-text">
            Users
        </p>
    </div>
    <div class="data">
        <p>
        @if($usersCount == 0)
            No users yet
        @else
            {{ $usersCount }}
        @endif
        </p>
    </div>
</div>

<div class="card">
    <div class="title">
        <span>
            <img width="16px" src="{{ asset('vendor/img/camera-drone.png') }}" alt="">
        </span>
        <p class="title-text">
            Drones
        </p>
    </div>
    <div class="data">
        <p>
            @if($dronesCount == 0)
            No drones yet
            @else
            {{ $dronesCount }}
            @endif
        </p>
    </div>
</div>
</div>



@endsection
