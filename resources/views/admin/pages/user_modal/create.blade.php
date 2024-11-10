<div class="modal modal-right large fade" id="createUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        @php
            $createUserUrl = route('admin.createUser');
        @endphp

        <form class="mb-3" action="{{ $createUserUrl }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender">
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="phone_no" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone_no" name="phone_no">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="service_no" class="form-label">Service No</label>
            <input type="text" class="form-control" id="service_no" name="service_no">
          </div>
          <div class="mb-3">
            <label for="rank" class="form-label">Rank</label>
            <input type="text" class="form-control" id="rank" name="rank">
          </div>
          <div class="mb-3">
            <label for="post" class="form-label">Post</label>
            <input type="text" class="form-control" id="post" name="post">
          </div>
          <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
