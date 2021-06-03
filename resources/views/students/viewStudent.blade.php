@extends('layouts.main')

@section('main-body')
<div class="col-md-12">
  @section('page-headings')
   <h3>Student Details</h4>
  @endsection
    
      {{-- <a href="../" class="btn btn-primary pull-left">back</a>   --}}
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
         <div class="col-md-12 col-sm-12 viewer">
           <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">ZCBM_Id</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->ZCBM_Id}}</p>
                </div>
              </div>
             </div>
             <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Name</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Name}}</p>
                  
                </div>
              </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for=""> Surname</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Surname}}</p>
                </div>
              </div>
             </div>
             <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Email</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Email}}</p>
                  
                </div>
              </div>
             </div>

           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Phone_Number</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Phone_Number}}</p>
                </div>
              </div>
             </div>
             <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Qualification_Route</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Qualification_Route}}</p>
                  
                </div>
              </div>
             </div>

           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Start_Date</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Start_Date}}</p>
                </div>
              </div>
             </div>
             <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Discount</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Discount}}</p>
                  
                </div>
              </div>
             </div>

           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Current_Level</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Current_Level}}</p>
                </div>
              </div>
             </div>
             <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Data_Entered_By</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->Data_Entered_By}}</p>
                  
                </div>
              </div>
             </div>

           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">created_at</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->created_at}}</p>
                </div>
              </div>
             </div>
             <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="">updated_at</label>
                </div>
                <div class="col-md-6">
                  <p>{{$item->updated_at}}</p>
                  
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    

    
           {{-- <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-6"></div>
            </div>
           </div> --}}
         {{-- </div>
      <form method="get" action="../">
         
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">ZCBM_Id</label>
                <input type="text" name="ZCBM_Id" class="form-control" value="{{$item->ZCBM_Id}}" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Name</label>
                <input type="text" name="Surname" class="form-control"  value="{{ $item->Name }}" placeholder="Last name" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Surname</label>
                <input type="text" name="Surname" class="form-control"  value="{{ $item->Surname }}" placeholder="Last name" readonly>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="Email" class="form-control" id="email"  value="{{$item->Email}}" placeholder="Email" readonly >
                  </div>
                <div class="form-group col-md-6">
                  <label for="Phone Number">Phone Number</label>
                  <input type="number" name="Phone_Number" id="Phone Number" class="form-control"  value="{{$item->Phone_Number }}" placeholder="Phone Number" readonly>
                </div>
              </div>
            <div class="form-group">
                
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">*Qualification Route</label>
                    <input type="text" name="Qualification_Route" id="Qualification_Route" class="form-control"  value="{{$item->Qualification_Route }}" placeholder="Qualification Route" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">*Start Date</label>
                    <input type="text" name="Start_Date" id="Start_Date" class="form-control"  value="{{$item->Start_Date}}" placeholder="Qualification Route" readonly>
                  </div>
                  
              </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Total Tuition Fees">*Total Tuition Fees</label>
                        <input type="number" id="Total Tuition Fees" name="Total_Tuition_Fees"  class="form-control"  value="{{$item->Total_Tuition_Fees }}" placeholder="Total Tuition Fees" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Discount">*Discount</label>
                        <input type="number" id="Discount" name="Discount"  class="form-control"  value="{{$item->Discount }}" placeholder="Discount" readonly>
                    </div>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="mr-sm-2"  for="inlineFormCustomSelect">Current Level</label>
                <input type="number" id="Current Level" name="Current Level"  class="form-control" placeholder="Current Level" value="{{$item->Current_Level }}" readonly>
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
            {{-- </div>
          
            
        </form>    
 




   
      </div> --}} 

@endsection

@section('main-script')
      
@endsection