@extends('layouts.main')
@section('page-headings')
  <h4>Student Adding Form</h4>
  <h6>Feilds with <span class="" style="color:red">*</span> are mandatory</h2>
@endsection
@section('main-body')
<div class="col-md-10">
        <form method="post" action="{{ Route('StoreStudent') }}">
          <div class="form-row">
            <div class="form-group col-md-10">
                {{-- <label for="inputPassword4"><span style="color:red">*</span>Name</label>
                <input type="text" name="Surname" class="form-control"  value="{{ $item->Name }}" placeholder="Last name" required> --}}
              </div>
          <div class="form-group col-md-2">
            <div class="btn-group float-right">
              <button class="btn btn-success btn-sm btn-left" type="submit">Save<i class="bi bi-check2-square"></i></button>
              <a href="javascript:window.history.back();" class="btn btn-danger btn-sm ">
                Cancel
                <i class="bi bi-file-excel-fill back-icon"></i>
              </a>
            </div>
          </div>
          </div>  
          @csrf 
            @if ($errors->any())
            <div class="alert alert-danger">
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
                <label for="inputEmail4"><span style="color:red">*</span>Name</label>
                <input type="text" name="Name" class="form-control" placeholder="First name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4"><span style="color:red">*</span>Surname</label>
                <input type="text" name="Surname" class="form-control" placeholder="Last name" required>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="Email" class="form-control" id="email" placeholder="Email" >
                  </div>
                <div class="form-group col-md-6">
                  <label for="Phone Number">Phone Number</label>
                  <input type="number" name="Phone_Number" id="Phone Number" class="form-control" placeholder="Phone Number">
                </div>
              </div>
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect"><span style="color:red">*</span>Qualification Route</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Qualification Route" required>
                  <option selected>Choose..</option>
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
                        <label for="Total Tuition Fees"><span style="color:red">*</span>Total Tuition Fees</label>
                        <input type="number" id="Total Tuition Fees" name="Total_Tuition_Fees"  class="form-control" placeholder="Total Tuition Fees" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Discount"><span style="color:red">*</span>Discount</label>
                        <input type="number" id="Discount" name="Discount"  class="form-control" placeholder="Discount" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="mr-sm-2"  for="inlineFormCustomSelect">Current Level	</label>
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
      
@endsection