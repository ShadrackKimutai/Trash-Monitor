<?php

if(!isset($message)) {
		require("DBController.php");
		$db_handle = new DBController();
		
		$query="SELECT * FROM bins WHERE lat LIKE '$_POST[latitude]' AND lng LIKE'$_POST[longitude]'";
		$res = $db_handle->numRows($query);
		echo $res;
		if($res<1){
        		$query = "INSERT INTO bins (lat,lng,state) VALUES ('$_POST[latitude]','$_POST[longitude]','$_POST[state]')";
              //  echo $query;
        		$result = $db_handle->insertQuery($query);
        				
                if(!empty($result)) {
        			$message = "<div class='panel panel-success'>
                        <div class='panel-heading'>
                          <h3 class='panel-title'>Registration success</h3>
                        </div>
                        <div class='panel-body'>
                          You have Successfully Registered new state of the bin at  <br>latitude:$_POST[latitude]<br>longitude:$_POST[longitude]
                        </div>
                      </div>";	
        			unset($_POST);
        		} else {
        			$message = "<div class='panel panel-primary'>
                        <div class='panel-heading'>
                          <h3 class='panel-title'>Registration Failed</h3>
                        </div>
                        <div class='panel-body'>
                         Your Attempt to register bin status has Failed! Please Try Again 
                        </div>
                      </div>";	
        		}
		
		}else{
		    	$query = "UPDATE bins SET state='$_POST[state]' WHERE lat LIKE '$_POST[latitude]' AND lng LIKE '$_POST[longitude]'";
                //echo $query;
        		$result = $db_handle->updateQuery($query);
        				
                if(!empty($result)) {
        			$message = "<div class='panel panel-success'>
                        <div class='panel-heading'>
                          <h3 class='panel-title'>Update success</h3>
                        </div>
                        <div class='panel-body'>
                          You have Successfully Registered the new state of the bin at <br>latitude:$_POST[latitude]<br>longitude:$_POST[longitude]
                          
                        </div>
                      </div>";	
        			unset($_POST);
        		} else {
        			$message = "<div class='panel panel-primary'>
                        <div class='panel-heading'>
                          <h3 class='panel-title'>Update Failed</h3>
                        </div>
                        <div class='panel-body'>
                         Your Attempt to register new bin status has Failed! Please Try Again 
                        </div>
                      </div>";	
        		}
		}
}
		
  
	
header('Refresh: 5;url=/');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script> 
    <style type="text/css">

    body .divMain{
        height:6000px !important;
        background-color:ffffff;
        overflow:auto;
    }
   .divMain #floatDiv {
        position:absolute;
        left:50%;
        margin-top:200px;
        margin-left:-200px;
        width:400px;
        height:200px;
        background-color: ffffff;
    }
        
    </style>

</head>
<body>
    <div class="divMain">
        <div id="floatDiv">
       
        <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
            <div class="card-header">Inteligent Bin Monitor </div>
                <div class="card-body">
                  <p class="card-text"><?php echo $message; ?></p>
                </div>
            
        </div>
    </div>
    </div>
    
    
</body>
</html>