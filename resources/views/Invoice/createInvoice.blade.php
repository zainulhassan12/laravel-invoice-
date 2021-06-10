@extends('layouts.main')
@section('page-headings')
  <h4>Invoice Adding Form</h4>
  <h6>Feilds with <span class="" style="color:red">*</span> are mandatory</h2>
@endsection
@section('main-body')
<div class="col-md-10">
        <form method="post" action="{{ Route('InvoiceStore') }}">
          <div class="form-row">
            <div class="form-group col-md-10">
                {{-- <label for="inputPassword4"><span style="color:red">*</span>Name</label>
                <input type="text" name="Surname" class="form-control"  value="{{ $item->Name }}" placeholder="Last name" required> --}}
              </div>
          <div class="form-group col-md-2">
            <div class="btn-group float-right">
              <button class="btn btn-success btn-sm btn-left" type="submit">Save<i class="bi bi-check2-square"></i></button>
              <a href="javascript:window.history.back();" class="btn btn-danger btn-sm btn-right">
                Cancel
                <i class="bi bi-file-excel-fill back-icon"></i>
             </a>
            </div>
          </div> 
          </div>  
          @csrf 
            @if ($errors->any())
            <div class="">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
              @endif
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4"><span style="color:red">*</span>Student</label>
                {{-- <input type="text" name="student_id" class="form-control" placeholder="Student" required> --}}
                <select name="student_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Qualification Route" required>
                  <option value="">Select a Student</option>
                    @foreach ($student as $item)
                      <option value="{{$item->ZCBM_Id}}">{{$item->Name}} {{$item->Surname}}</option>
                  @endforeach
                </select>
            </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4"><span style="color:red">*</span>Current Level</label>
                {{-- <input type="text" name="Surname" class="form-control" placeholder="Last name" required> --}}
                <select class="custom-select mr-sm-2" name="current_level" id="current_level1" required>
                    <option value="">Please Select One level</option>
                    <option value="Certificate">Certificate</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Advance Diploma">Advance Diploma</option>
                    <option value="Graduate Diploma">Graduate Diploma</option>
                </select>  
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4"><span style="color:red">*</span>Qualification Route</label>
                    <select type="text" name="qualification_route" class="custom-select mr-sm-2" id="qualification_route" placeholder="Qulification Route" required>
                        <option value="">Please Select One level</option>
                        {{-- <option value="">Choose...</option> --}}
                        <option value="Internediate">Intermediate</option>
                        <option value="Metric">Metric</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Beachlors">Beachlors</option>
                        <option value="Masters">Masters</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputEmail4"><span style="color:red">*</span>Course</label>
                    <select id="course" type="text" name="course_id" class="custom-select mr-sm-2" id="qualification_route" placeholder="please select a course." required>
                        <option >Please Select a course</option>
                        @foreach ($course_info as $item)
                        <option value="{{$item->id}}">{{$item->fullname}}</option>
                        @endforeach
                    </select>
                    </div>
                <div class="form-group col-md-6">
                  <label for="Phone Number"><span style="color:red">*</span>Total Amount</label>
                  <input type="number" name="total_ammount" id="total_ammount" value="" class="form-control" placeholder="Total_amount" readonly required>
                  <input type="hidden" id="fee_id" name="fee_id" value="">
                </div>
              </div>
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect"><span style="color:red">*</span>Qualification Route</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Qualification Route" required>
                  <option >Choose..</option>
                  <option value="Certificate">Internediate</option>
                  <option value="Diploma">Metric</option>
                  <option value="Advance Diploma">Diploma</option>
                  <option value="Graduate Diploma">Beachlors</option>
                  <option value="Graduate Diploma">Masters</option>

                </select>
            </div>
            <div class="form-group">
                <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="Discount">Date</label>
                        <input id="datepicker1" type="date" class="form-control" name="due_date" data-date-format="yyyy/mm/dd"> 
                      </div>
                    <div class="form-group col-md-6">
                        <label for="Discount">Discount</label>
                        <input type="number" id="Discount" name="Discount"  class="form-control" placeholder="Discount">
                    </div>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="mr-sm-2"  for="inlineFormCustomSelect"><span style="color:red">*</span>Current Level	</label>
                <select name="Current Level" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Choose..</option>
                  <option value="Certificate">Certificate</option>
                  <option value="Diploma">Diploma</option>
                  <option value="Advance Diploma">Advance Diploma</option>
                  <option value="Graduate Diploma">Graduate Diploma</option>
                </select>
              </div>
              {{-- <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2"> 
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
              </div> --}}
            </div>
          
            {{-- <button type="submit" class="btn btn-primary">Add Student</button> --}}
        </form>    
</div>

@endsection

@section('main-script')
<script>
  $.noConflict();
jQuery( document ).ready(function( $ ) {
        $("#course").change(function() 
        {
           var course =  $(this).val();
           var url = "/create/getTotalAmount";
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
        //    var url = {{Route('InvoiceCreateToalAmount')}};

           $.ajax({
               type: 'POST',
               url:"/invoice"+url,
               data:{'course_id':course,"_token": "{{ csrf_token() }}",},
               success:function(data){
                 
                 if(data.fee_id.length > 0)
                 {
                   result = data.fee_id[0]
                  //  alert(data);
                   console.log(result.fee_id);
                   console.log($('#total_ammount'));
                   $('#total_ammount').attr('value',result.fee_id)
                   $('#total_ammount').val(result.price);
                   $('#fee_id').attr('value',result.fee_id)
                   $('#fee_id').val(result.fee_id);


                 }
                 else{
                  $('#total_ammount').attr('value','')
                  $('#total_ammount').val('');
                   alert('There is no price for this course please select a price first!!')
                 }
                   
               }
           });

        });
  // Code that uses jQuery's $ can follow here.
});
    // $(document).ready(function(){  
       
    // });
    
</script>
      
@endsection