<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        img{
            opacity: 0.6;
        }
        .container{
            padding: 20px;
        }
        body>div>div.devider>hr {
            height: 2px;
            border-width: 0;
            color: gray;
            background-color: gray;
        }
    </style>
</head>
<body>
    <div class="container col-md-8 invoice-header">
        <div class="float-right">
            <form action="{{Route('InvoiceDownload')}}">
            <button type="submit" class="btn btn-primary btn-sm">PDF</button></div>
            </form>

        <!-- <img src="/image/zcbm-header.png" height="300px" width="300px" alt=""> -->
        <img src="{{public_path('zcbmheader.png')}}" height="300px" width="300px" alt="">

        <div class="devider"><hr></div>
        {{$pdfdata}}
    
    </div>
    
    
</body>
</html>