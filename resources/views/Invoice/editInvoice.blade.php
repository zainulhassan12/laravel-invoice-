@extends('layouts.main')
@section('page-headings')
  <h4>Invoice Adding Form</h4>
  <h6>Feilds with <span class="" style="color:red">*</span> are mandatory</h2>
@endsection
@section('main-body')
<div class="col-md-10">

    @foreach($Invoice as $item)
        <form method="POST" action="{{ Route('EdittheInvoice', $item->id)  }}">
            @csrf
            @method('PUT')
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
              <div class="form-group ">
                <label for="inputPassword4"><span style="color:red">*</span>Current Level</label>
                {{-- <input type="text" name="Surname" class="form-control" placeholder="Last name" required> --}}
                <select class="custom-select mr-sm-2" name="current_level" id="current_level1" >
                    <option selected>{{$item->current_level}}</option>
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
                        <option selected>{{$item->qualification_route}}</option>
                        {{-- <option value="">Choose...</option> --}}
                        <option value="Internediate">Intermediate</option>
                        <option value="Metric">Metric</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Beachlors">Beac  hlors</option>
                        <option value="Masters">Masters</option>
                    </select>
                    </div>
                <div class="form-group col-md-6">
                  <label for="Phone Number"><span style="color:red">*</span>Total Amount</label>
                  <input type="number" name="total_ammount" id="total_ammount" value="{{$item->total_ammount}}" class="form-control" placeholder="Total_amount" readonly required>
                  <input type="hidden" id="fee_id" name="fee_id" value="="{{$item->fee_id}}">
                </div>
              </div>
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect"><span style="color:red">*</span>Qualification Route</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Qualification Route" required>
                  <option selected >{{$item->qualification_route}}</option>
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
                        <label for="Discount"> Due Date</label>
                        <input id="datepicker1" type="date" value="{{$item->due_date}}" class="form-control" name="due_date" data-date-format="yyyy/mm/dd"> 
                      </div>
                    <div class="form-group col-md-6">
                        <label for="Discount">Discount</label>
                        <input type="number" id="Discount" name="Discount"  class="form-control" placeholder="Discount">
                    </div>
                </div>
            </div>
            @endforeach
        </form>    
</div>

@endsection

@section('main-script')
<script>
  $.noConflict();
jQuery( document ).ready(function( $ ) {
        
});
</script>
      
@endsection