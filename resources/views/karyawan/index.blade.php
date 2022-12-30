@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Karyawan</h1>
    </div>
    @include('sweetalert::alert')
    @if (session()->has('success'))
      
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>

    @endif

    @if (session()->has('error'))
      
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('error') }}
      </div>

    @endif


    <div class="table-responsive col-lg-12">
      <a href="/dashboard/create" class="btn btn-primary mb-3"><span data-feather="user-plus" class="align-text-bottom" width="20"></span> Create New Karyawan</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Gender</th>
              <th scope="col">Sandi</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($karyawan as $item)

            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->gender }}</td>
              <td>{{ $item->sandi }}</td>
              <td>
                <a href="/dashboard/{{ $item->id }}/edit" class="btn btn-warning text-decoration-none"> <span data-feather="edit"></span>Edit</a>

                <form action="/dashboard/{{ $item->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0 text-decoration-none" onclick="return confirm('are you sure?')"><span data-feather="x-circle"></span>Delete</button>

                </form>

              </td>
            </tr>
            
          @endforeach
            
          </tbody>
        </table>
      </div>

      

      <script type="text/javascript">

          document.querySelector('.btnDelete').addEventListener('click', function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
             )
            }
          })
          })

      </script>

@endsection