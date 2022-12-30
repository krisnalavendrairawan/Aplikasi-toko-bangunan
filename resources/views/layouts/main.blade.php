<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blog">
    <meta name="author" content="Krisna Lavendra Irawan">
    <title>Toko Bangunan | Dashboard</title>

 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/feather-icons"></script>


  </head>
  <body>
    
@include('layouts.header')

<div class="container-fluid">
  <div class="row">

    @include('layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      

    <script>
      feather.replace()
    </script>

    <script type="text/javascript">

        $('.tombol-hapus').on('click', function (e) {
          e.preventDefault();

          const href = $(this).attr('href');
          Swal.fire({
              title: 'ingi menghapus data ini? ',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.value){
                  document.location.href = href; 
              }
            })

        })


    </script>
  </body>
</html>
