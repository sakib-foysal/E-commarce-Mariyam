<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .allDisplay{
            width: 100%;
            height: 100vh;
            display: grid;
            align-items: center;
            justify-content: center;
        }
    </style>
  </head>
  <body>
    <section class="allDisplay">
        <div class="text-center">
            <div><a href="{{url('/')}}" class="text-decoration-none fs-3 text-danger fw-bold">You don't have permission to access for this page.</a></div>

            {{-- <div><img src="https://media1.tenor.com/m/UflrOIwQb64AAAAC/denied-lou.gif" alt=""></div> --}}
            {{-- <div><img src="https://media1.tenor.com/m/7TsXLjyH2woAAAAC/denied-saquinon.gif" alt=""></div> --}}
            {{-- <div><img src="https://media.tenor.com/lrZWmW7c4W8AAAAi/%E4%B8%8D%E8%A6%81-%E5%80%94%E5%BC%BA.gif" alt=""></div> --}}
            {{-- <div><img src="https://media1.tenor.com/m/VBMrUgbp-EsAAAAC/nope-not-today.gif" alt=""></div> --}}
            <div class="py-5"><img src="https://media.tenor.com/gxdAKO0StfoAAAAi/incorrect-hate.gif" alt="" class="w-25"></div>

            <div><a href="{{url('/')}}" class="btn btn-success"><i class="bi bi-arrow-left pe-2"></i>Back To Home</a></div>


        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
