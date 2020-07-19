<pre>
<?php

 if(strlen($_REQUEST['name'])>0 && ($_REQUEST['score'])>0 ){

				  require("mysql-to-json.php");
				  if(insert("INSERT INTO score(name,score) VALUES('".$_REQUEST['name']."','".$_REQUEST['score']."')")>0){
						  
						  ?> 
						  <script>  //alert("successful"); </script> 
						  <?php
						  header("Location:game.php");
					   }
					   
			
		else{
			
				echo "<br/>Sorry invalid email!";
			}		
          }
    elseif (strlen($_REQUEST['name'])>0 && ($_REQUEST['score'])<0) {
    	    
          	 require("mysql-to-json.php");
				  if(insert("INSERT INTO score(name,score) VALUES('".$_REQUEST['name']."','".$_REQUEST['score']."')")>0){
						  
						  ?> 
						  <script>  //alert("successful"); </script> 
						  <?php
						  header("Location:game.php");
					   }
					   
			
		else{
			
				echo "<br/>Sorry invalid email!";
			}
          }  

    else{
        	echo "error";
     }
    
 
 
 
?>

</pre>