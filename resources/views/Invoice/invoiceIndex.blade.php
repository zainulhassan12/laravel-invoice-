@extends('layouts.main')


@section('main-body')
<table class="table">
    <thead class="thead-light table-bordered">
      <tr>
        <th scope="col"></th>
        <th scope="col">Cources name</th>
        <th scope="col">Short name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($cource as $item)
     <tr>
        <th scope="col"><Input type="checkbox" name="choice"></th>
        <td>{{$item -> fullname}}</td>
        <td>{{$item -> shortname}}</td>
        <td>
            <div class="btn-group btn-sm btn-group-toggle" data-toggle="buttons">
              <a href="#">
                <button class="btn btn-primary btn-sm">check</button>

              </a>
       
            
              <button class="btn btn-danger btn-sm">delete</button>

          </div>
        </td>
      </tr>
     @endforeach
      

    </tbody>
  </table>
@endsection