<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    @yield("page-head")  
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ url('/') }}">ZCBM Invoice Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ Route('InvoiceIndex') }}">cources <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <div class="btn-group">
              <a class="nav-link dropdown-toggle invoice-dropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Students
              </a>
              
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{Route('CreateStudent')}}">Create Students</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{Route('StudentIndex')}}">View Students</a>
                  {{-- <div class="dropdown-divider"></div>
                  {{-- <a class="dropdown-item" href="#"></a>
                  <div class="dropdown-divider"></div> --}} 
                  
                </div>

             
            </div>
            {{-- <a class="nav-link" href="{{ url('/') }}">Invoices</a> --}}
          </li>
          <li class="nav-item">
            <div class="btn-group">
              <a class="nav-link dropdown-toggle invoice-dropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Invoices
              </a>
              
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Create Invoice</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">View Invoices</a>
                  {{-- <div class="dropdown-divider"></div>
                  {{-- <a class="dropdown-item" href="#"></a>
                  <div class="dropdown-divider"></div> --}} 
                  
                </div>

             
            </div>
          </li>
          <li class="nav-item">
            {{-- <a class="nav-link disabled" href="#">Disabled</a> --}}
          </li>
        </ul>
      </div>
    </nav>
    
      <div class="container-fluid" style="padding: 1rem">
        <form>
          {{-- <button type="button"  class="btn btn-info btn-sm back" onclick="history.back()">
            
            Back
          </button> --}}
          <a href="javascript:window.history.back();" class=""><i class="bi bi-arrow-left-circle" style="font-size:3rem;color:deepskyblue"></i></a>
         </form>
      </div>
      
    <div class="container"  style="max-width: 1174px;">
      <div class="col-md-12">
        
        
        @yield('main-body')
      </div>        
    </div>
    


    @yield('main-script')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>