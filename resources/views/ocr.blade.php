<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>
<body>
    <form action="pdf/upload" method="post" enctype="multipart/form-data" >

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <input type="file" name="file" accept=".pdf" >
      <input type="text" name="cin" >
      <input type="submit" value="ok">


    </form>

    <input type="button" value="get api" id="api">

    {{-- <script src="assets/js/require.min.js"></script> --}}
     <!-- <script src="API_OCR/apiocr.js"></script> -->
   <script src="js/app.js"></script>


</body>
</html>
