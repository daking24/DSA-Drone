<div class="modal modal-right large fade" id="createDrone" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Drone Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        @php
            $createDroneUrl = route('admin.createDrone');
        @endphp

        <form class="mb-3" action="{{ $createDroneUrl }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand">
          </div>
          <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="text" class="form-control" id="start_date" placeholder="YYYY-MM-DD" name="start_date">

          </div>
          <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="end_date" name="end_date">
          </div>
          <div class="mb-3">
            <label for="location_id" class="form-label">Location</label>
            <select class="form-select" id="location_id" name="location_id">
              @foreach ($locations as $l)
                <option value="{{ $l->id }}">{{ $l->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
