@extends('layouts.main')
@section('page-head')
    <!-- Latest compiled and minified CSS -->

    {{-- <!-- Optional theme --> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

    <!-- Latest compiled and minified JavaScript -->

@endsection
@section('main-body')
<style>
.nav-link{
    display: inline;
}

.back-icon-3 {
    font-size: 4rem !important;
    color: deepskyblue
}
</style>
@section('page-headings')
<h4 class="inline-1 inline-margins">Dashboard</h4>
@endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="col-md-8">
    <div class="panel panel-default ">
        <div class="panel-heading">Invoices</div>
        <div class="panel-body">
            <table class="table table-sm table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
    
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
     
</div>
<div class="col-md-4">
    <div class="panel panel-default ">
        <div class="panel-heading">Total Balance</div>
        <div class="panel-body">
            <table class="table table-sm table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
    
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
     
</div>
  
@endsection

@section('main-script')
      
@endsection