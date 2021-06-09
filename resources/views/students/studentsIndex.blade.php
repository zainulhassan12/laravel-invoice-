@extends('layouts.main')
@section('page-headings')
<h4>Students Details</h4>
@endsection
@section('main-body')
<div class="">
 {{$Record}}
    <table class="table table-sm table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col">ZCBM_ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Qualification Route</th>
            <th scope="col">Start Date</th>
            <th scope="col">Total Tuition Fees</th>
            <th scope="col">Discount</th>
            <th scope="col">Current Level</th>
            <th scope="col">Data Entered By</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($Record as $item)
            <tr>
                <th scope="row">{{$item->ZCBM_Id }}</th>
                {{-- <td>{{$item->ZCBM_Id }}</td> --}}
                <td>{{$item->Name}}</td>
                <td>{{$item->Surname }}</td>
                <td>{{$item->Email}}</td>
                <td>{{$item->Phone_Number }}</td>
                <td>{{$item->Qualification_Route }}</td>
                <td>{{$item->Start_Date }}</td>
                <td>{{$item->Total_Tuition_Fees }}</td>
                <td>{{$item->Discount }}</td>
                <td>{{$item->Current_Level }}</td>
                <td>{{$item->Data_Entered_By }}</td>
                <td>
                 <form class="form-inline" action="{{ Route('DeleteStudent',$item->ZCBM_Id)}}" method="POST">
                    <div class="btn-group" data-toggle="">
                          <a class="btn btn-primary btn-sm" href="{{ Route('DisplayStudent',$item->ZCBM_Id)}}"> View</a>
                          <a class="btn btn-secondary btn-sm" href="{{ Route('EditStudent',$item->ZCBM_Id)}}"> edit</a>
                          <button class="btn btn-danger btn-sm btn-right" type="submit">delete</button>
                          @csrf 
                          @method('DELETE')
                      </div>
                  </form>
                </td>
              </tr>
                
            @endforeach
        </tbody>
      </table>
</div>

@endsection

@section('main-sript')
    
@endsection
