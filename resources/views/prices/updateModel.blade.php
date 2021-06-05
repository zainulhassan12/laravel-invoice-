@extends('layouts.main')
@section('main-body')
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
  
    
@endsection
@section('main-script')
    
@endsection