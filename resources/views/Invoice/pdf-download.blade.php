<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Invoice Download</title>
    <style>
        img{
            opacity: 1;
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
        body{
            font-weight: 700;
            font-family: Arial, Helvetica, sans-serif

        }
        .row{
            padding: 0px 0px 0px 0px;
        }
        .image{
            height:150px;
            width:150px
        }
        
    </style>
</head>
<body>
    
    <div class="">
        <div class="image" style="">
         
            </div>
            <br>
             
            <br>
        @foreach ($pdfdata as $item)
        <label for="to3">To :</label> <span id="to3">{{$item->Name}} {{$item->Surname}}</span>
        <br>
        <label for="to3">Email :</label> <span id="to3">{{$item->Email}}</span>
        <br>
        @endforeach
     </div>
     <br>
        <div class="devider"><hr></div>
            <div class="" style="float: left">  
                <p>Full Name :</p>
                <p>Current Level : </p>
                <p>Qualification route :</p>
                <p>Total ammount :</p>
                <p>Course Name:</p>
                <p>Start Date :</p>
                <p>Paid :</p>
                <p>Balance</p>
                <p>Due Date</p>
                <p>Issued by :</p>
            </div>
            <div>

            </div>
            <div class="" style="float:right"> 
                @foreach ($pdfdata as $item)
                    <p>{{$item->Name}}  {{$item->Surname}} (ZCBM- {{$item->student_id}})</p> 
                    <p>{{$item->current_level}}</p> 
                    <p>{{$item->qualification_route}}</p>
                    <p>{{$item->total_ammount}}</p> 
                    <p>{{$item->fullname}}</p> 
                    <p>{{$item->issue_date}} </p> 
                    <p>${{$item->ammount_paid}} </p> 
                    <p>${{$item->balance}} </p> 
                    <p>{{$item->due_date}} </p>
                    <p>{{$item->issued_by}} </p>
                @endforeach
            </div>  
        {{$pdfdata}}    
    </div>
</body>
</html>