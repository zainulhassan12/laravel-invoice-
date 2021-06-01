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
        <td>{{$item -> fullname}}</td>
       
        <td>{{$item -> shortname}}</td>
        <td>$200</td>
        <td>
            <div class="btn-group btn-sm btn-group-toggle" data-toggle="buttons">
              
                <button class="btn btn-primary btn-sm" id="a1" value="{{$item-> id}}" >View</button>
                {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">View</button>
                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <table>
                          <tr>
                            <th>catagory</th>
                            <th>Duration</th>

                          </tr>
                          <tr>
                            <td>{{$item -> category}}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div> --}}
              
       
            
              <button class="btn btn-danger btn-sm">delete</button>

          </div>
        </td>
      </tr>
     @endforeach
      

    </tbody>
  </table>


  
@endsection

@section('main-script')
<script>
  $(document).ready(function(){
    console.log("abc")
    $('#a1').click(function( ){
    btn = $(this).value();
    console.log("abc")
  })
});

 
  

</script>
@endsection