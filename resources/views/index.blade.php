@extends('layouts.main')
@section('page-head')
    <!-- Latest compiled and minified CSS -->

    {{-- <!-- Optional theme --> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

    <!-- Latest compiled and minified JavaScript -->

@endsection
@section('page-headings')
<h4 class="">Dashboard</h4>
@endsection
@section('main-body')


<div class="container invoice-dashboard">
    <div class="row" style="">
        <div class="col-md-12">
            <div class="card card-responsive">
  
                <div class="card-header">
                    Invoices
                    <div class="float-right">
                        <a href="{{Route('InvoiceIndex')}}"><i class="fa fa-gear" style="font-size:20px"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Invoice#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Course</th>
                            <th scope="col">Current level</th>
                            <th scope="col">Qualification Route</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Issued By</th>
                            <th scope="col">Issue date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td style="text-decoration: underline">{{$item->Name}} {{$item->Surname}}
                                    <!-- <div class="border-left-span" style="height: 13px !important; display:inline !important"></div>   -->
                                    {{-- <a id="modal-button" href="" data-toggle="modal" data-url="{{Route('InvoiceGetStudentInfo')}}" data-studentid="{{$item->id}}" data-target="#invoices"  class="float-right">
                                        <i class="fa fa-eye" style="margin-left:5px;color:royalblue;font-size:15px" title="View Student"></i>
                                    </a> --}}
                                    </td>
                                    <td>{{$item->fullname}}
                                    <!-- <div class="border-left-span" style="height: 13px !important; display:inline !important"></div>   -->
                                    {{-- <a id="modal-button" href=""  data-toggle="modal" data-url="{{Route('InvoiceGetCourseInfo')}}" data-studentid="{{$item->id}}" data-target="#viewcourse"  class="float-right">
                                        <i class="fa fa-eye" style="margin-left:5px;color:royalblue;font-size:15px" title="View Course"></i>
                                    </a> --}}
                                    </td>
                                    <td >{{$item->current_level}}</td>
                                    <td>{{$item->qualification_route}}</td>
                                    <td>{{$item->due_date}}</td>
                                    <td>{{$item->ammount_paid}}</td>
                                    <td>{{$item->total_ammount}}</td>
                                    <td >{{$item->balance}}</td>
                                    <td >{{$item->issued_by}}</td>
                                    <td>{{$item->issue_date}}</td>
                                    <td>
                                    {{-- <a href=""><i class="fa fa-pencil-square-o" style="color: royalblue;font-size:16px" aria-hidden="true" title="Edit Invoice"></i></a>
                                    <div class="border-left-span"></div>
                                    <a class="" style="display: inline;" href=""><i class="fa fa-trash-o" style="color:red;font-size:16px" aria-hidden="true" title="Delete Invoice"></i></a>
                                    <div class="border-left-span"></div> --}}
                                    <form style="display:inline" action="{{Route('InvoiceDownloadView',$item->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class=" badge btn"><i class="fa fa-cloud-download" style="font-size: 16px;" aria-hidden="true" title="download pdf"></i> </a>
                                    </form>
                                    </td>
                                
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div style="height: 10px">
        
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    students
                    <div class="float-right">
                        <a href="{{Route('StudentIndex')}}"><i class="fa fa-gear" style="font-size:20px"></i></a>
                    </div>
                </div>  
                <div class="card-body">
                    <table class="table table-sm table-bordered table-responsive">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ZCBM_ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            {{-- <th scope="col">Qualification Route</th> --}}
                            <th scope="col">Start Date</th>
                            <th scope="col">Total Tuition Fees</th>
                            <th scope="col">Discount</th>
                            {{-- <th scope="col">Current Level</th> --}}
                            {{-- <th scope="col">Data Entered By</th> --}}
                            <th scope="col">Actions
                               
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($Record as $item)
                            <tr>
                                <th scope="row">{{$item->ZCBM_Id }}</th>
                                <td>{{$item->Name}}</td>
                                <td>{{$item->Surname }}</td>
                                <td>{{$item->Email}}</td>
                                <td>{{$item->Phone_Number }}</td>
                                {{-- <td>{{$item->Qualification_Route }}</td> --}}
                                <td>{{$item->Start_Date }}</td>
                                <td>{{$item->Total_Tuition_Fees }}</td>
                                <td>{{$item->Discount }}</td>
                                {{-- <td>{{$item->Current_Level }}</td> --}}
                                {{-- <td>{{$item->Data_Entered_By }}</td> --}}
                                <td>
                                    <a id="modal-button" href="" data-toggle="modal" data-url="{{Route('allInvoices',$item->ZCBM_Id)}}" data-target="#invoices"  class="float-right">
                                        <i class="fa fa-eye" style="margin-left:5px;color:royalblue;font-size:15px" title="View Student"></i>
                                      </a>
                                 {{-- <form class="form-inline" action="{{ Route('DeleteStudent',$item->ZCBM_Id)}}" method="POST">
                                    <div class="btn-group" data-toggle="">
                                          <a class="btn btn-primary btn-sm" href="{{ Route('DisplayStudent',$item->ZCBM_Id)}}"> View</a>
                                          <a class="btn btn-secondary btn-sm" href="{{ Route('EditStudent',$item->ZCBM_Id)}}"> edit</a>
                                          <button class="btn btn-danger btn-sm btn-right" type="submit">delete</button>
                                          @csrf 
                                          @method('DELETE')
                                      </div>
                                  </form> --}}
                                </td>
                              </tr>
                                
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            
            <div class="card">
                <div class="card-header">
                    Total Balances
                </div>  
                <div class="card-body">
                    <table class="table table-bordered table-responsive ">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    Total Recived
                                </th>
                                <th>
                                    Total Balance
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>
</div>
<!--View Student Modal -->
<div class="modal fade bd-example-modal-lg" id="invoices" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="padding:13px">
       <div class="modal-header">
          <h5 class="modal-title">Invoice Info</h5>
          <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <table class="table table-striped table-responsive">
          <thead class="thead-light ">
                <tr>
                <th scope="col">Invoice#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Course</th>
                <th scope="col">Current level</th>
                <th scope="col">Qualification Route</th>
                <th scope="col">Due Date</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Balance</th>
                <th scope="col">Issued By</th>
                <th scope="col">Issue date</th>
                {{-- <th scope="col">Action</th> --}}
                </tr>
            </tr>
          </thead>
          <tbody id="InvoiceRow">
          </tbody>
       </table>
      </div>
    </div>
  </div>  
@endsection

@section('main-script')
<script>
    $(document).ready(function(){
    var ajaxResult = ''; 
    $('#invoices').on('show.bs.modal', function (event) {  
      var button = $(event.relatedTarget) // Button that triggered the modal
    //   var studentId = button.data('studentid');
      var url =button.data('url');
      $.ajax({
        url:url,
        method:'POST',
        data:{"_token": "{{ csrf_token() }}"},
        success:function(result){
          var html = '';
          if (result.Invoices){
            ajaxResult = result.Invoices;
            var modal = $('#invoices');
            console.log(ajaxResult);
            for (var i=0; i<ajaxResult.length; i++)
            {
                html +='<tr>';
                html +='<td>' + ajaxResult[i].id +'</td>';
                html +='<td>' + ajaxResult[i].Name + ajaxResult[i].Surname  +'</td>';
                html +='<td>' + ajaxResult[i].fullname  +'</td>';
                html +='<td>' + ajaxResult[i].current_level  +'</td>';
                html +='<td>' + ajaxResult[i].qualification_route  +'</td>';
                html +='<td>' +ajaxResult[i].due_date  +'</td>';
                html +='<td>' +ajaxResult[i].ammount_paid  +'</td>';
                html +='<td>' +ajaxResult[i].total_ammount  +'</td>';
                html +='<td>' +ajaxResult[i].balance  +'</td>';
                html +='<td>' +ajaxResult[i].issued_by  +'</td>';
                html +='<td>' +ajaxResult[i].issue_date  +'</td>';

            }
            // // modal.find('.modal-title').text('New message to ')
            modal.find('.modal-content #InvoiceRow').html(html)
     
          }else{
            alert("Data isn't founded!!!");
          }
        },
      });
        
    });
});

</script>

      
@endsection