@extends('layouts.main')
@section('page-head')
    <!-- Latest compiled and minified CSS -->

    {{-- <!-- Optional theme --> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

    <!-- Latest compiled and minified JavaScript -->

@endsection

@section('main-body')

@section('page-headings')
<h4 class="inline-1 inline-margins">Price Management</h4>
@endsection



<div class="row">
    <div class="col-sm-6 col-md-6"> 
      <div class="card" style="margin-bottom: 20px">
        <h5 class="card-header h5">Featured</h5>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="formGroupExampleInput">Example label</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Another label</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          prices
        </div>
        
        <div class="card-body">
          <h5 class="card-title"> <div class="btn-group float-right">
            <button class="btn btn-success btn-sm btn-left" type="submit">New <i class="bi bi-pencil-square"></i></button>
            {{-- <a class="btn btn-danger btn-sm " href="{{Route('StudentIndex')}}">Cancel<i class="bi bi-file-excel-fill back-icon"></i> </a> --}}
            {{-- <a href="javascript:window.history.back();" class="btn btn-danger btn-sm ">
              Cancel
              <i class="bi bi-file-excel-fill back-icon"></i>
            </a> --}}
              {{-- <i class="bi bi-arrow-left-circle" style="font-size:3rem;color:deepskyblue"></i></a> --}}
          </div></h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <table class="table" >
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Price</th>
                <th scope="col">Last Updates</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
               
                @foreach ($fee as $item)
                <tr>
                    <td>{{$item->fee_id}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->updates_at}}</td>

                    <td>
                        <a class="badge bg"  href="http://">
                            <i class="bi bi-gear-wide" style="font-size: 19px"></i>
                        </a>
                        <div class="border-left-span"></div>
                        <a class="badge bg" href="">
                            <i class="bi bi-x-square" style="font-size: 19px"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{$fee->appends(['course_fee' => $course_fee->currentPage()])->links()}}
        </div>
      </div>
</div>
     
    
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Cources
        </div>
        <div class="card-body">
          {{-- <h5 class="card-title">Special title treatment</h5> --}}
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Cource Name</th>
                <th scope="col">Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($course_fee as $item)
                <tr>
                    <td style="max-width:140px;">{{$item->fullname}}</td>
                    @if (isset($item->price))
                      <td>{{$item->price}}</td> 
                    @else
                      <td style="color:cornflowerblue">NaN</td>
                    @endif  
                    <td>
                      <a href="{{Route('PriceIndex')}}" class="badge bg" >
                        <i class="bi bi-pencil-square" style="color:black;font-size:19px" title="Add Price"></i>
                      </a>
                      <div class="border-left-span"></div>
                      <a href="{{Route('PriceIndex')}}" class="badge bg" >
                        <i class="bi bi-gear-wide" style="color:black;font-size:19px" title="change Price"></i>
                      </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{$course_fee->appends(['fee'=>$fee->currentPage()])->links()}}
        </div>
      </div>
    
</div>

    
   
</div>


@endsection

@section('main-script')
      
@endsection