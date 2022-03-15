<!DOCTYPE html>
<html>
<head>
    <title>Laravel Custom Logout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body> 
   
  <div class="container">
    <h2>Laravel Custom Logout</h2>
    <div class="card">
      <div class="card-header">Laravel Custom Logout</div>
      <div class="card-body">
        <div class="col-md-12 text-center">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
          </div>
        </div> 
    </div>
  </div>

</body>
</html>