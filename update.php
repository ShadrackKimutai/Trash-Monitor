<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Reading</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<br><br><br><br>
<div class="container">
    <img src="https://openclipart.org/image/2400px/svg_to_png/228877/Layer-1.png" align="center" width="80">
  <h2>Integrated Intelligent Trash Bin Reporting System</h2><BR><BR>
  <form class="form-horizontal" action="updater.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="latitude">Latitude:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="latitude" placeholder="enter latitude" name="latitude">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="longitude">Longitude:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="longitude" placeholder="enter longitude" name="longitude">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="state">Reporting Bin State:</label>
      <div class="col-sm-10">          
        <select class="form-control" id="state" name="state">
       
       <option>empty</option>
                        <option>half</option>
                  <option>full</option>
                        
      </select>
      </div>
      </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="submit" value="Register" class="btn btn-primary">
      </div>
    </div>
  </form>
</div>

</body>
</html>
