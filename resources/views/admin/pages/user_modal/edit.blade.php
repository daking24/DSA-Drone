<div class="modal modal-right large fade" id="editUser{{ $u->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        @php
            $editUserUrl = route('admin.updateUser', $u->id);
        @endphp

        <form class="mb-3" action="{{ $editUserUrl }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $u->viewer->first_name ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $u->viewer->last_name ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender">
              <option value="">Select Gender</option>
              <option value="male" {{ $u->viewer->gender ?? '' == 'male' ? 'selected' : '' }}>Male</option>
              <option value="female" {{ $u->viewer->gender ?? '' == 'female' ? 'selected' : '' }}>Female</option>
              <option value="other" {{ $u->viewer->gender ?? '' == 'other' ? 'selected' : '' }}>Other</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="phone_no" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone_no" name="phone_no" value="{{ $u->viewer->phone_no ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $u->email ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="service_no" class="form-label">Service No</label>
            <input type="text" class="form-control" id="service_no" name="service_no" value="{{ $u->viewer->service_no ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="rank" class="form-label">Rank</label>
            <input type="text" class="form-control" id="rank" name="rank" value="{{ $u->viewer->rank ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="post" class="form-label">Post</label>
            <input type="text" class="form-control" id="post" name="post" value="{{ $u->viewer->post ?? '' }}">
          </div>
          <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
