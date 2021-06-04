@extends('layouts.main')


@section('main-body')

<table class="table">
    <thead class="thead-light table-bordered">
      <tr>
        <th scope="col"></th>
        <th scope="col">Cources name</th>
        <th scope="col">Short name</th>
        <th scope="col">Tuition Fee</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($cource as $item)
     <tr>
        <th scope="col"><Input type="checkbox" name="choice"></th>
        <td>{{$item->fullname}}</td>
        <td>{{$item->shortname}}</td>
        <td>
           @if (isset($item -> price))
              <p class="inline-1"><span style="font-size:15px;font-weight:500">${{$item -> price}}</span></p>
            @else
            <p class="inline-1"><span style="font-size:15px;color:cornflowerblue">NaN</span></p>

            @endif
            <div class="border-left-span"></div>
              <a id="modal-button" href="" data-toggle="modal" data-course="{{$item->fullname}}" data-drop="{{$price}}" data-selected="{{$item->price}}" data-target="#addPrice" data-whatever="@mdo" class="badge bg" style="">
                <i class="bi bi-file-earmark-plus" style="color:black;font-size:19px" title="Add Prices"></i>
              </a> 
            <div class="border-left-span"></div>
              <a href="{{Route('PriceIndex')}}" class="badge bg" style="">
                <i class=" bi bi-gear" style="color:black;font-size:19px" title="Manage Prices"></i>
              </a>   
        </td> 
        <td>
            <div class="btn-group btn-sm btn-group-toggle" data-toggle="buttons">
              <button class="btn btn-primary btn-sm btn-left" id="a1" value="{{$item-> id}}" >View</button>
              <button class="btn btn-danger btn-sm btn-right ">delete</button>
          </div>
        </td>
      </tr>
     @endforeach
     {{-- <tr>{{ $cource->links()}}</tr> --}}
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $cource->links() }}
  </div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="addPrice" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel"> Add Price Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <button type="submit" class="btn btn-success btn-sm btn-left">save</button>
              <button type="button" class="btn btn-danger btn-sm btn-right" data-dismiss="modal">cancel</button>
            </div> 
        </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cource Name</label>
                <input type="text" class="form-control" id="previousCource" aria-describedby="emailHelp" readonly>
                <div id="emailHelp" class="form-text">The course Title...</div>
              </div>
              <div class="mb-3">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                <select class="custom-select my-1 mr-sm-2"  id="dropdown">
                <!--Added by jquery-->
                </select>
              
            </form>
          </div>
      </div>
  </div>
</div>
<!--End Modal -->

@endsection

@section('main-script')
<script>
$(document).ready(function(){
  $('#addPrice').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget) // Button that triggered the modal
  var dropdown  = button.data('drop')
  var previousPrice = button.data('selected');
  var course = button.data('course');
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
  modal.find('.modal-body #dropdown').html(html);
  modal.find('.modal-body #previousCource').val(course);
  
 })
});


</script>
@endsection



 {{-- <a href="{{Route('PriceIndex')}}" class="badge bg-info"><i class="bi bi-file-diff" style="color:white;font-size:17px"></i>
                </a>
                <br>  --}}
                {{-- <div class="management-seting">
                  <span> $200</span>
                  <br>
                  
                  <a href="{{Route('PriceIndex')}}" class="badge bg" style=""><i class="bi bi-file-diff" style="color:balck;font-size:22px"></i>
                  </a></div> --}}