<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="https://pagecdn.io/lib/enyo-dropzone/v5.7.2/min/dropzone.min.css" rel="stylesheet" crossorigin="anonymous"  > 
  <link href="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.css" rel="stylesheet" crossorigin="anonymous" integrity="sha256-R91pD48xW+oHbpJYGn5xR0Q7tMhH4xOrWn1QqMRINtA=" >
  <style>
    img{
      background-color: grey;
      height: 250px;
      width: 100%;
      border: 1px solid grey;
      margin-top: 25px;
      box-shadow: 0 8px 6px -6px black;
    }
  </style>
</head>
<body>

  @yield('content')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://pagecdn.io/lib/enyo-dropzone/v5.7.2/min/dropzone.min.js" crossorigin="anonymous"  ></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/m467a5mz7m0qod31oukt0l5v08aquv1sty719en9gdcwk3gz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://pagecdn.io/lib/toastr/2.1.4/toastr.min.js" crossorigin="anonymous" integrity="sha256-Hgwq1OBpJ276HUP9H3VJkSv9ZCGRGQN+JldPJ8pNcUM=" ></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous"></script>
  {{-- <script>
    tinymce.init({
      selector: 'textarea'
   });
  </script> --}}
  <script>
    $(document).ready(function() {
      $('img').lazyload();
    });
  </script>
  <script>
    function previewFile() {
      const preview = document.querySelector('img');
      const file = document.querySelector('input[type=file]').files[0];
      const reader = new FileReader();

      reader.addEventListener("load", function () {
        // convert image file to base64 string
        preview.src = reader.result;
      }, false);

      if (file) {
        reader.readAsDataURL(file);
      }
    }
  </script>
  @if (Session::has('student_added'))
      <script>
        toastr.success("{!! Session::get('student_added') !!}");
      </script>
  @endif

  @if (Session::has('student_added'))
      <script>
        swal("Added Success", "{!! Session::get('student_added') !!}", "success", {
          button: "OK",
        });
      </script>
  @endif

  <script>
    var path = "{{ route('search.autocomplete') }}";

    $('input.typeahead').typeahead({
      source: function(terms, process){
        return $.get(path,{terms:terms}, function(data){
          return process(data);
        });
      }
    });
  </script>
</body>
</html>