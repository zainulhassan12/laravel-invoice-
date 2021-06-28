@extends('layouts.main')

@section('main-body')
@section('page-headings')
<h4>Update Form</h4>
@endsection

{{-- @if ($errors->any())
<div class="row">
  <div class="col-md-6">

  </div>
  <div class="col-md-6">
    <div class="alert alert-danger float-right">
      <span style="font-size:29px;cursor:pointer float-right" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  </div>
</div>
      
      @endif --}}
<form method="Post" action="{{Route('UpdateStudent', $item->ZCBM_Id)}}">
@csrf
@method('PUT')
<div class="form-row">
  <div class="form-group col-md-10">
      {{-- <label for="inputPassword4"><span style="color:red">*</span>Name</label>
      <input type="text" name="Surname" class="form-control"  value="{{ $item->Name }}" placeholder="Last name" required> --}}
    </div>
<div class="form-group col-md-2">
  <div class="btn-group float-right">
    <button class="btn btn-success btn-sm btn-left" type="submit">Update<i class="bi bi-check2-square"></i></button>
    
    {{-- <a class="btn btn-danger btn-sm " href="{{Route('StudentIndex')}}">Cancel<i class="bi bi-file-excel-fill back-icon"></i> </a> --}}
    <a href="javascript:window.history.back();" class="btn btn-danger btn-sm ">
      Cancel
      <i class="bi bi-file-excel-fill back-icon"></i>
    </a>
      {{-- <i class="bi bi-arrow-left-circle" style="font-size:3rem;color:deepskyblue"></i></a> --}}
  </div>
</div>
</div>
<div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputPassword4"><span style="color:red">*</span>Name</label>
            <input type="text" name="Name" class="form-control"  value="{{ $item->Name }}" placeholder="Last name" required>
          </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4"><span style="color:red">*</span>Surname</label>
        <input type="text" name="Surname" class="form-control"  value="{{ $item->Surname }}" placeholder="Last name" required>
      </div>    
    </div>
    {{-- <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputPassword4"><span style="color:red">*</span>Email</label>
            <input type="text" name="Email" class="form-control"  value="{{ $item->Email }}" placeholder="Last name" required>
          </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4"><span style="color:red">*</span>Surname</label>
        <input type="text" name="Surname" class="form-control"  value="{{ $item->Surname }}" placeholder="Last name" required>
      </div>    
    </div> --}}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" name="Email" class="form-control" id="email"  value="{{$item->Email}}" placeholder="Email">
          </div>
        <div class="form-group col-md-6">
          <label for="Phone Number">Phone Number</label>
          <input type="number" name="Phone_Number" id="Phone Number" class="form-control"  value="{{$item->Phone_Number }}" placeholder="Phone Number">
        </div>
      </div>
    <div class="form-group">
          <div class="form-group">
            <label class="mr-sm-2" for="inlineFormCustomSelect"><span style="color:red">*</span>Qualification Route</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Qualification_Route" required>
              <option selected>{{$item->Qualification_Route }}</option>
              <option value="Certificate">Internediate</option>
              <option value="Diploma">Metric</option>
              <option value="Advance Diploma">Diploma</option>
              <option value="Graduate Diploma">Beachlors</option>
              <option value="Graduate Diploma">Masters</option>
            </select>
        </div>
          {{-- <div class="form-group col-md-6">
            <label class="mr-sm-2" for="inlineFormCustomSelect">*Start Date</label>
            <input type="text" name="Start_Date" id="Start_Date" class="form-control"  value="{{$item->Start_Date}}" placeholder="Qualification Route" readonly>
          </div> --}}
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Total Tuition Fees"><span style="color:red">*</span>Total Tuition Fees</label>
                <input type="number" id="Total Tuition Fees" name="Total_Tuition_Fees"  class="form-control"  value="{{$item->Total_Tuition_Fees }}" placeholder="Total Tuition Fees" required>
            </div>
            <div class="form-group col-md-6">
                <label for="Discount"><span style="color:red">*</span>Discount</label>
                <input type="number" id="Discount" name="Discount"  class="form-control"  value="{{$item->Discount }}" placeholder="Discount" required>
            </div>
        </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="mr-sm-2"  for="inlineFormCustomSelect">Current Level	</label>
        <select name="Current_Level" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
          <option selected>{{$item->Current_Level}}</option>
          <option value="Certificate">Certificate</option>
          <option value="Diploma">Diploma</option>
          <option value="Advance Diploma">Advance Diploma</option>
          <option value="Graduate Diploma">Graduate Diploma</option>
        </select>
      </div>
    </div>
    <div class="from-group col-md-6">
      
    </div>
      
      
</form>    
@endsection

@section('main-script')
 
@endsection