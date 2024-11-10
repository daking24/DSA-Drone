<div class="modal modal-right large fade" id="createLocation" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Location Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        @php
            $createLocationUrl = route('admin.createLocation');
        @endphp

        <form class="mb-3" action="{{ $createLocationUrl }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address">
          </div>
          <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude">
          </div>
          <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude">
          </div>
          <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="state" name="state">
          </div>
          <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country">
          </div>
          <div class="mb-3">
            <label for="radius" class="form-label">Radius</label>
            <input type="text" class="form-control" id="radius" name="radius">
          </div>
          <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
