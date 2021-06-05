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
      <div class="card">
        <div class="card-header">
          Prices
            <button id="new_price" class="btn btn-success btn-sm btn-single float-right"data-m data-modal-type="type2" data-toggle="modal" data-target="#addPrice" type="submit">
              New <i class="bi bi-pencil-square"></i>
            </button>
        </div>
        <div class="card-body">
          {{-- <h5 class="card-title"></h5> --}}
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
                      <div class="border-left-span"></div>
                      <a class="badge bg"  href="{{Route('updateModal')}}" data-modal-type="type1" data-toggle="modal"  data-target="#UpdatePrice">
                            <i class="bi bi-gear-wide" style="font-size: 19px"></i>
                        </a>
                        <div class="border-left-span"></div>
                        <a class="badge bg" href="">
                            <i class="bi bi-x-square" style="font-size:19px"></i>
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
<!--Modals -->
<!--Start Add Proce Modal -->
<div class="modal fade" id="addPrice" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel"> Add Price Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
        <form id="priceForm" action="{{Route('PriceNew')}}" method="POST">
          @csrf
          <div class="modal-body" >
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">New Price</label>
                <input type="text" class="form-control" name="price" id="previousCource" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">This is in USD</div>
                @if ($errors->any())
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
    
            @endif
              </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success btn-sm btn-left">save</button>
              <button type="button" class="btn btn-danger btn-sm btn-right" data-dismiss="modal">cancel</button>
            </div> 
        </div>
        
        </form>
      </div>
  </div>
</div>
<!--End Add Proce Modal -->
<!--Start Update Modal-->
<div class="modal fade" id="UpdatePrice" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel"> Add Price Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
        <form id="priceForm" action="{{Route('PriceNew')}}" method="POST">
          @csrf
          <div class="modal-body" >
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">New Price</label>
                <input type="text" class="form-control" name="price" id="previousCource" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">This is in USD</div>
                @if ($errors->any())
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
              </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success btn-sm btn-left">save</button>
              <button type="button" class="btn btn-danger btn-sm btn-right" data-dismiss="modal">cancel</button>
            </div> 
        </div>
        </form>
      </div>
  </div>
</div>

<!--End Update Modal-->
<!-- -->
<!-- -->
<!-- -->
<!-- -->
<!-- -->
<!-- -->
<!-- -->
<!-- -->
<!-- -->
<!-- -->

@endsection

@section('main-script')
<script>
  $(document).ready(function(){
    
  })
//   (function multiple_modal() {
//   $(document).on('show.bs.modal', '.modal', function () {
//       var zIndex = 1040 + (10 * $('.modal:visible').length);
//       $(this).css('z-index', zIndex);
//       setTimeout(function () {
//           $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
//       }, 0);
//   });

//   $(document).on('hidden.bs.modal', '.modal', function () {
//       $('.modal:visible').length && $(document.body).addClass('modal-open');
//   });
// })()
</script>

      
@endsection

 {{-- <a class="btn btn-danger btn-sm " href="{{Route('StudentIndex')}}">Cancel<i class="bi bi-file-excel-fill back-icon"></i> </a> --}}
            {{-- <a href="javascript:window.history.back();" class="btn btn-danger btn-sm ">
              Cancel
              <i class="bi bi-file-excel-fill back-icon"></i>
            </a> --}}
              {{-- <i class="bi bi-arrow-left-circle" style="font-size:3rem;color:deepskyblue"></i></a> --}}