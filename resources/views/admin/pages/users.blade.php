@extends('admin.index')

@push('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
  <style>
    .card {
      padding: 1rem;
      background-color: whitesmoke;
      border-radius: 20px;
      box-shadow: 10px 10px #323232;
      border: 3px solid #323232;

    }

    .title {
      display: flex;
      justify-content: space-between;
    }

    dialog {
      padding: 1rem 3rem;
      background: white;
      max-width: 400px;
      padding-top: 2rem;
      border-radius: 20px;
      border: 0;
      box-shadow: 0 5px 30px 0 rgb(0 0 0 / 10%);
      animation: fadeIn 1s ease both;
    }

    dialog::backdrop {
      animation: fadeIn 1s ease both;
      background: rgb(255 255 255 / 40%);
      z-index: 2;
      backdrop-filter: blur(20px);
    }

    .x {
      filter: grayscale(1);
      border: none;
      background: none;
      position: absolute;
      top: 15px;
      right: 10px;
      transition: ease filter, transform 0.3s;
      cursor: pointer;
      transform-origin: center;
    }

    .x:hover {
      filter: grayscale(0);
      transform: scale(1.1);
    }

    h2 {
      font-weight: 600;
      font-size: 2rem;
      padding-bottom: 1rem;
    }

    p {
      font-size: 1rem;
      line-height: 1.3rem;
      padding: 0.5rem 0;

    }

    dialog a:visited {
      color: rgb(var(--vs-primary));
    }

    .title a {
      text-decoration: none;
      color: white !important;
      padding: 1rem !important;
      border-radius: 20px !important;
    }
    .action-buttons {
      display: flex;
      gap: 1rem;
    }
  </style>
@endpush

@section('content')
  <div class="card">
    <div class="title">
      <h2 class="text-center">Users/Viewers</h2>
      <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">Add Users</a>
    </div>
    <div class="table">
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Gender</th>
            <th>Service No</th>
            <th>Rank</th>
            <th>Post</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody> <!-- Check if users collection has any data -->
          @forelse($users as $u)
            <!-- Loop through each user -->
            <tr>
              <td>{{ $u->name }}</td> <!-- Access viewer relationship on individual user -->
              <td>{{ $u->email }}</td>
              <td>{{ $u->viewer->phone_no ?? 'N/A' }}</td>
              <td>{{ $u->viewer->gender ?? 'N/A' }}</td>
              <td>{{ $u->viewer->service_no ?? 'N/A' }}</td>
              <td>{{ $u->viewer->rank ?? 'N/A' }}</td>
              <td>{{ $u->viewer->post ?? 'N/A' }}</td>
              <td>
                <div class="action-buttons">
                  <a href="{{ route('admin.editUser', $u->id) }}" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#editUser{{ $u->id }}">Edit</a>
                  <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteUser{{ $u->id }}">Delete</a>
                  @include('admin.pages.user_modal.edit')
                  @include('admin.pages.user_modal.delete')
                </div>
              </td>
            </tr>
            {{-- @include('admin.pages.user_modal.edit') --}}
            {{-- @include('admin.pages.user_modal.delete') --}}
          @empty
            <tr>
              <td colspan="7" class="text-center">No users found</td>
            </tr>
          @endforelse
        </tbody>

        <tfoot>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Gender</th>
            <th>Service No</th>
            <th>Rank</th>
            <th>Post</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  @include('admin.pages.user_modal.create')
@endsection
@push('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

  <script>
    new DataTable('#example');

    // Function to open the dialog by its ID
    function openDialog(dialogId) {
      const dialog = document.getElementById(createUser);
      if (dialog) {
        dialog.showModal();
      }
    }

    // Function to close the dialog by its ID
    function closeDialog(dialogId) {
      const dialog = document.getElementById(dialogId);
      if (dialog) {
        dialog.close();
      }
    }
  </script>
@endpush
