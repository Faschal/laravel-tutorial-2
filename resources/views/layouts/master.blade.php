<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="https://pagecdn.io/lib/enyo-dropzone/v5.7.2/min/dropzone.min.css" rel="stylesheet" crossorigin="anonymous"  > 
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://pagecdn.io/lib/enyo-dropzone/v5.7.2/min/dropzone.min.js" crossorigin="anonymous"  ></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/m467a5mz7m0qod31oukt0l5v08aquv1sty719en9gdcwk3gz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea'
   });
  </script>
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
</body>
</html>