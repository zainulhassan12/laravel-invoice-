@extends('layouts.main')
@section('page-headings')
<h4>Invoicing Dashboard </h4>
@endsection
@section('main-body')
<div class="invoice-dashboard">
    <div class="card">
    <div class="card-header">
      All Invoices
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
           <a id="modal-button" href="" data-toggle="modal" data-url="{{Route('InvoiceGetStudentInfo')}}" data-studentid="{{$item->id}}" data-target="#viewstudent"  class="float-right">
            <i class="fa fa-eye" style="margin-left:5px;color:royalblue;font-size:15px" title="View Student"></i>
          </a>
        </td>
        <td>{{$item->fullname}}
           <!-- <div class="border-left-span" style="height: 13px !important; display:inline !important"></div>   -->
           <a id="modal-button" href=""  data-toggle="modal" data-url="{{Route('InvoiceGetCourseInfo')}}" data-studentid="{{$item->id}}" data-target="#viewcourse"  class="float-right">
            <i class="fa fa-eye" style="margin-left:5px;color:royalblue;font-size:15px" title="View Course"></i>
          </a>
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
          <a href=""><i class="fa fa-pencil-square-o" style="color: royalblue;font-size:16px" aria-hidden="true" title="Edit Invoice"></i></a>
          <div class="border-left-span"></div>
          <a class="" style="display: inline;" href=""><i class="fa fa-trash-o" style="color:red;font-size:16px" aria-hidden="true" title="Delete Invoice"></i></a>
          <div class="border-left-span"></div>
          <form style="display:inline" action="{{Route('InvoiceDownloadView',$item->id)}}" method="POST">
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
<!--Modals -->
<!--View Student Modal -->
<div class="modal fade bd-example-modal-lg" id="viewstudent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:13px">
     <div class="modal-header">
        <h5 class="modal-title">Students Info</h5>
        <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <table class="table table-striped table-responsive">
        <thead class="thead-light ">
          <tr>
            <th scope="col">Student#</th>
            <th scope="col">Name</th>
            <!-- <th scope="col">Surname</th> -->
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Current Level</th>
            <th scope="col">Qualification Route</th>
          </tr>
        </thead>
        <tbody id="studentrow">
        </tbody>
     </table>
    </div>
  </div>
</div>
<!--View Course Modal-->
<div class="modal fade bd-example-modal-lg" id="viewcourse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Course Info</h5>
        <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <table class="table table-striped table-responsive">
        <thead class="thead-light ">
          <tr>
            <th scope="col">Course#</th>
            <th scope="col">Full Name</th>
            <!-- <th scope="col">Surname</th> -->
            <th scope="col">Short Name</th>

          
          </tr>
        </thead>
        <tbody id="studentrow">
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
    $('#viewstudent').on('show.bs.modal', function (event) {  
      var button = $(event.relatedTarget) // Button that triggered the modal
      var studentId = button.data('studentid');
      var url =button.data('url');
      $.ajax({
        url:url,
        method:'POST',
        data:{"student_id": studentId,"_token": "{{ csrf_token() }}"},
        success:function(result){
          var html = '<tr>';
          if (result.student){
            ajaxResult = result.student;
            var modal = $('#viewstudent')
            // console.log(ajaxResult)
              html +='<td>' + ajaxResult.ZCBM_Id +'</td>';
              html +='<td>' + ajaxResult.Name +ajaxResult.Surname+'</td>';
              html +='<td>' + ajaxResult.Phone_Number +'</td>';
              html +='<td>' + ajaxResult.Email +'</td>';
              html +='<td>' + ajaxResult.Current_Level +'</td>';
              html +='<td>' + ajaxResult.Qualification_Route +'</td>';
    
            // modal.find('.modal-title').text('New message to ')
            modal.find('.modal-content #studentrow').html(html)
     
          }else{
            alert("Data isn't founded!!!");
          }
        },
      });
        
    });
        $('#viewcourse').on('show.bs.modal', function (event) {  
      var button = $(event.relatedTarget) // Button that triggered the modal
      var studentId = button.data('studentid');
      var url =button.data('url');
      $.ajax({
        url:url,
        method:'POST',
        data:{"student_id": studentId,"_token": "{{ csrf_token() }}"},
        success:function(result){
          var html = '<tr>';
          if (result.course){
            console.log(result.course);
            ajaxResult = result.course[0];
            var modal = $('#viewcourse')
             html +='<td>' + ajaxResult.id +'</td>';
            html +='<td>' + ajaxResult.fullname+'</td>';
            html +='<td>' + ajaxResult.shortname+'</td>';
            html +='<td>' + Date.parse(ajaxResult.Start_Date) +'</td></tr>';

            // html +='<td>' + ajaxResult.startdate +'</td><tr>';
            // console.log(ajaxResult)
          
            // modal.find('.modal-title').text('New message to ')
            modal.find('.modal-content #studentrow').html(html)
     
          }else{
            alert("Data isn't founded!!!");
          }
        },
      });
        
    });
  });
  

</script>
@endsection