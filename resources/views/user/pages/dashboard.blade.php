@extends('user.index')

@push('css')
{{-- Start Generation Here --}}
<style>
     .card {
  padding: 1rem;
  background-color: #fff;
  max-width: 320px;
  min-width: 320px;
  border-radius: 20px;
  box-shadow: 10px 10px #323232;
  border: 3px solid #323232;
}
{{-- Start Generation Here --}}
<style>
    #droneSelect {
        padding: 0.5rem;
        border-radius: 0.25rem;
        border: 2px solid #10B981;
        background-color: #f8f9fa;
        transition: border-color 0.3s;
    }

    #droneSelect:focus {
        border-color: #10B981;
        outline: none;
        box-shadow: 0 0 5px rgba(16, 185, 129, 0.5);
    }
</style>
{{-- End Generation Here --}}

</style>

{{-- End Generation Here --}}
@endpush
@section('user.content')
{{-- Start Generation Here --}}
<div class="card">
    <div class="title">
        <h2 class="text-center">Select a Drone to View</h2>
    </div>
    <div class="form-group">
        <label for="droneSelect">Choose a Drone:</label>
        <select id="droneSelect" class="form-control" onchange="location = this.value;">
            <option value="">-- Select a Drone --</option>
            @foreach($drones as $drone)
                <option value="{{ route('drone.view', $drone->id) }}">{{ $drone->name }}</option>
            @endforeach
        </select>
    </div>
</div>
{{-- End Generation Here --}}
@endsection
