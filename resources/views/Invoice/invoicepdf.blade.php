@extends('layouts.main')
@section('page-head')
    <!-- Latest compiled and minified CSS -->

    {{-- <!-- Optional theme --> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

    <!-- Latest compiled and minified JavaScript -->
    <style>
        img{
            opacity: 0.6;
        }
        .container{
            padding: 20px;
        }
        hr {
            height: 2px;
            border-width: 0;
            color: gray;
            /* sbackground-color: gray; */
        }
        body{
            font-weight: 700;
            font-family: Arial, Helvetica, sans-serif

        }
        .row{
            padding: 0px 30px 0px 30px;
        }
        .image{
            height:150px;
            width:150px
        }
        .footer{
            margin-bottom:0px; 
        }
        
    </style>

@endsection
@section('page-headings')
<h4 class="">PDF View</h4>
@endsection
  

@section('main-body')
<div class="container col-md-10 invoice-header">
    <div class="image" style="">
    <img src="{{asset('/image/zcbm-header.png')}}" height="150px" width="150px" alt="">
    </div>
    <br>
    <?php
    $date = date('d/m/y');
    echo $date;  ?>
    <br>

    <div class="row" style="float:right">
        <form action="{{Route('InvoiceDownload', $id )}}">
            <button type="submit" class="btn btn-primary btn-sm">PDF</button>
        </form>
    </div>

<div class="row">
    @foreach ($pdfdata as $item)
    <label for="to">To :</label> <span id="to">{{$item->Name}} {{$item->Surname}}</span>
    <br>
    <label for="to3">Email :</label> <span style="color:darkturquoise;text-decoration:underline" id="to3">{{$item->Email}}</span>

    @endforeach
</div>


    {{-- <img src="{{asset('/image/z')}}" height="300px" width="300px" alt="">  --}}

    <hr>
    <div class="row">
        <div class="col-md-6">  
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
        <div class="col-md-6" style=""> 
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

    </div>
       
    <div class="">
        <label for="">Signed by:</label>    
    </div>
    <div class="footer sticky-bottom" style="text-align: center;color:cyan">
        <p >Zanzibar College of Business & Management Limited (t/a) Zanzibar Centre of Business & Management</p>
        <p style="text-align:center ">PO Box 1103, Kwa Mchina, Mombasa, Zanzibar, Tanzania</p> 
        <p>T: +255 (0) 772293502 || E: info@zcbm.education || W: www.zcbm.education</p>
    </div>
</div>
@endsection
   