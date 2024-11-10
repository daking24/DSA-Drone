<div class="modal modal-right large fade" id="editDrone{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Drone Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        @php
            $editDroneUrl = route('admin.updateDrone', $d->id);
        @endphp

        <form class="mb-3" action="{{ $editDroneUrl }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ $d->brand }}">
          </div>
          <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="text" class="form-control" id="start_date" name="start_date" value="{{ $d->start_date }}">
          </div>
          <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="text" class="form-control" id="end_date" name="end_date" value="{{ $d->end_date }}">
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
