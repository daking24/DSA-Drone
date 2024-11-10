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
      margin-bottom: 1rem;
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
      <h2 class="text-center">Drones</h2>
      <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDrone">Add Drone</a>
    </div>
    <div class="table">
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody> <!-- Check if users collection has any data -->
          @forelse($drones as $d)
            <!-- Loop through each user -->
            <tr>
              <td>{{ $d->name ?? 'N/A' }}</td> <!-- Access viewer relationship on individual user -->
              <td>{{ $d->brand ?? 'N/A' }}</td>
              <td>{{ $d->location->name ?? 'N/A' }}</td>
              <td>{{ $d->start_date ?? 'N/A' }}</td>
              <td>{{ $d->end_date ?? 'N/A' }}</td>
              <td>
                <div class="action-buttons">
                  <a href="{{ route('admin.editDrone', $d->id) }}" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#editDrone{{ $d->id }}">Edit</a>
                  <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteDrone{{ $d->id }}">Delete</a>
                  @include('admin.pages.drone_modal.edit')
                  @include('admin.pages.drone_modal.delete')
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">No drones found</td>
            </tr>
          @endforelse
        </tbody>

        <tfoot>
          <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  @include('admin.pages.drone_modal.create')
@endsection
@push('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#start_date").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
      });
    });
  </script>
  
@endpush
