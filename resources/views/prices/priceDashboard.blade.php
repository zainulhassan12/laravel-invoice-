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
              <button id="new_price" class="btn btn-success btn-sm btn-single float-right" data-toggle="modal" data-target="#newpricemodal">
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
                       
                        <a class="badge bg"  href=""  data-toggle="modal" data-Pid="{{$item->fee_id}}" data-test="hello" data-updatePrice2="{{$item->price}}" data-target="#UpdatePrice">
                              <i class="fa fa-pencil" style="font-size: 19px;color:cornflowerblue" title="Update Price"></i>
                          </a>
                          <div class="border-left-span"></div>

                          <form style="display:inline" method="POST" action="{{Route('PriceDelete', $item->fee_id)}}">
                            <button type="submit" class="badge bg btn" onClick="return confirm('Are you absolutely sure you want to delete?')" ng-click="remove_user(user, $event)">
                              <i class="fa fa-trash" style="font-size:19px;color:red"></i>
                            </button>
                            @csrf
                            @method('DELETE')
                          </form>

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
                        {{-- href="{{Route('PriceIndex')}} --}}
                        <a id="modal-button" href="" data-toggle="modal" data-cid="{{$item->id}}" data-course="{{$item->fullname}}" data-drop="{{$price}}" data-selected="{{$item->price}}" data-target="#addPrice" class="badge bg" style="">
                          <i class="fa fa-pencil-square-o" style="color:royalblue;font-size:19px" title="Add Prices"></i>
                        </a>
                        <div class="border-left-span"></div>
                        {{-- <a href="{{Route('PriceIndex')}}" class="badge bg" >
                          <i class="fa fa-sliders" style="color:deepskyblue;font-size:19px" title="change Price"></i>
                        </a> --}}
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
<!-- New price Modal -->


<!-- Modal -->
<div class="modal fade" id="newpricemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Price Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{Route('PriceNew')}}" method="POST">
        @csrf
        @method('POST')
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-success btn-sm btn-left " type="submit">Save</button>
          <button type="button" class="btn btn-danger btn-sm btn-right" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal-->
<!--Modals -->
<!-- Update Price Modal Price-->
<div class="modal fade" id="UpdatePrice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="updatepriceform" method="POST" action="">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <label for="" class="form-label" id="">Previous Price</label>
        <p style="font-size:19px">$<span  id="oldprice" style="color: red"></span> </p>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price</label>
            <input type="text" class="form-control" name="price" id="priceinput">
            <p style="color:red"> Please enter new price</p>
          </div>
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
<!-- End Modal -->

<!--Start Add Price Modal Course-->
<div class="modal fade" id="addPrice" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel"> Add Price Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
        <form id="priceForm" action="" method="POST">
          @csrf
          <div class="modal-body" >
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cource Name</label>
                <input type="text" class="form-control" name="course" id="previousCource" aria-describedby="emailHelp" readonly>
                <div id="emailHelp" class="form-text">The course Title...</div>
              </div>
              <div class="mb-3">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Course Name</label>
                <select class="custom-select my-1 mr-sm-2" name='price'  id="dropdown">
                <!--Added by jquery-->
                </select>
              
            
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
    $('#UpdatePrice').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var priceID = button.data('pid');
  var priceUpdate = button.data('updateprice2');
  console.log(priceID);
  console.log(priceUpdate);
  
   // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $('#updatepriceform').attr('action', '/price/update/'+priceID);
  modal.find('.modal-body #oldprice').html(priceUpdate);
});

//cource price adding modal

$('#addPrice').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  var dropdown  = button.data('drop')
  var previousPrice = button.data('selected');
  var course = button.data('course');
  var cid = button.data('cid')
  if(!previousPrice)
  {
    var html ='<option selected>please select a price from dropdown</option>';
  }
  else
  {
    var html ='<option selected>'+ previousPrice+'</option>';
  }
  for(var i=0; i<dropdown.length; i++)
  {
    html += ' <option value=" '+dropdown[i].fee_id+'" >$'+dropdown[i].price+'</option>';
  }
  var modal = $(this);
  $('#priceForm').attr('action', '/price/CoursePrice/'+cid)
  
  modal.find('.modal-body #dropdown').html(html);
  modal.find('.modal-body #previousCource').val(course);
  
 })
});

</script>

      
@endsection

 {{-- <a class="btn btn-danger btn-sm " href="{{Route('StudentIndex')}}">Cancel<i class="bi bi-file-excel-fill back-icon"></i> </a> --}}
            {{-- <a href="javascript:window.history.back();" class="btn btn-danger btn-sm ">
              Cancel
              <i class="bi bi-file-excel-fill back-icon"></i>
            </a> --}}
              {{-- <i class="bi bi-arrow-left-circle" style="font-size:3rem;color:deepskyblue"></i></a> --}}