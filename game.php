
<!DOCTYPE html>
<html>
<head>
   <title>Dart Game</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>

<script>
   function check_submit1(elm) {
      if(document.mfm1.name.value == '' || document.mfm1.score.value == '' ){
          alert("Please fill all value");
      }
      else{
            if (elm.getAttribute("type") == "button") {
                document.mfm1.submit();
            } else {
                alert("Error occurs!");
            }
        }
     }
</script>

<body>
<h1 align="left" style="color:white;">  Dart Game </h1>
<div class="topnav" id="myTopnav">
   <a href="game.php"><span><b> HOME </b></span></a>
   <a href="rule.php"><span><b> RULE </b></span></a>
</div>

<div class="col-container" style="width: 25%;">
<div class="col1" style="background-color:inherit; color:black;padding:1px; text-align:left;
		margin:1px;height:auto;width:160%;">
            <h3 style="color:white;"><b> TOTAL SCORE </b></h3>
          
<div class="col">		

  <table id="t01"  style="width:300px;">
      <tr>
           <th> name </th>
	         <th> score </th>
      </tr>
      <?php $jsn = json_decode(fetchNotice111()); ?>
  </table>
<br>
    <input  type="submit" onclick="document.getElementById('id01').style.display='block'" style="width:200px;text-align:center;
    font-weight:bold;font-size:15px;background-color:#e02a2a;position:relative;border-radius:25px;" 
    name="search" value="Clear All record">
</div>	

<div class="col"> 
  <table id="t01" style="margin-left: 10px;">
    <tr>
      <th> throw </th>
    </tr>
    <?php $jsn = json_decode(fetchNotice555()); ?>
  </table>
<br>
</div>
  <div class="col"> 
    <table id="t01" style="margin-right: 50px;margin-left: 10px;">
      <tr>
            <th> remain </th>
      </tr>
      <?php $jsn = json_decode(fetchNotice666()); ?>
    </table>
<br>
</div>
<div class="col" style="background:inherit;width:400px;height:120px;">
  <div style="background-color:inherit; color:black; text-align:center; width: 196.5%;">
  
  <form action="insert_score.php" method="post" enctype="multipart/form-data" name="mfm1" style="text-align:right;" >
      <h3 style="background-color: #c9c242; width:auto;">  
          <input type="radio" name="name" value="player1"><i> Player 1 </i>
          <input type="radio" name="name" value="player2"><i> Player 2</i>
          <input type="radio" name="name" value="player3"><i> Player 3 </i>
     </h3> 
     <h3><i style="color: white;background: black;">Score</i> <input type="text" name="score" class="sum" >
     <input type="button" onclick="check_submit1(this);" value="ADD SCORE"></h3> 
  </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<input type="text" name="score" placeholder="score 1" class="num1 key" style="width:104px;">
<input type="text" name="score" placeholder="score 2" class="num2 key">
<input type="text" name="score" placeholder="score 3" class="num3 key">

<script type="text/javascript">
$(document).ready(function() {
    $(".sum").val("0");
    $(".key").val("");
    function calc() {
        var $num1 = ($.trim($(".num1").val()) != "" && !isNaN($(".num1").val())) ? parseInt($(".num1").val()) : 0;
        console.log($num1);
        var $num2 = ($.trim($(".num2").val()) != "" && !isNaN($(".num2").val())) ? parseInt($(".num2").val()) : 0;
        console.log($num2);
        var $num3 = ($.trim($(".num3").val()) != "" && !isNaN($(".num3").val())) ? parseInt($(".num3").val()) : 0;
        console.log($num3);
        $(".sum").val($num1 + $num2 + $num3);
    }
    $(".key").keyup(function() {
        calc();
        return true;
    });
}); 
</script>

</div>
</div>
</div>			
</div>

<div class="col"> 
<?php
 $conn = new mysqli("localhost", "root", "", "dart_board");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);              
    foreach($conn->query("SELECT count(*) as counted from score where score>0 and name='player1' ") 
      as $row){  
      $p = $row['counted'];
    } ?>
<table id="t01" style="margin-left: 10px;">
      <tr>
            <th> name </th> 
            <?php
                for ($i=1; $i<=$p; $i++){
                  echo "<th>". $i."</th>";
            }
           ?>
      </tr>
      <?php $jsn = json_decode(fetchNotice999()); ?>
</table>
</div>
<br>

<div class="col"> 
<?php
  $conn = new mysqli("localhost", "root", "", "dart_board");
  if($conn->connect_error)die("Database connection failed" . $conn->connect_error);              
  foreach($conn->query("SELECT count(*) as counted from score where score>0 and name='player2' ") 
    as $row){  
    $p = $row['counted']; } 
?>
  <table id="t01" style="margin-left: 10px;">
    <tr>
      <th> name </th> 
      <?php
        for ($i=1; $i<=$p; $i++){
          echo "<th>". $i."</th>";
      }
     ?>
    </tr>
    <?php $jsn = json_decode(fetchNotice888()); ?>
  </table>
</div>
<br>
<div class="col"> 
<?php
  $conn = new mysqli("localhost", "root", "", "dart_board");
  if($conn->connect_error)die("Database connection failed" . $conn->connect_error);              
   foreach($conn->query("SELECT count(*) as counted from score where score>0 and name='player3' ") 
      as $row){  
      $p = $row['counted'];
    } ?>
  <table id="t01" style="margin-left: 10px;">
      <tr>
        <th> name </th> 
        <?php
          for ($i=1; $i<=$p; $i++){
            echo "<th>". $i."</th>"; }
       ?>
      </tr>
      <?php $jsn = json_decode(fetchNotice777()); ?>
  </table>
</div>
<br> <br>

  <div class="col-container" style="width:100%;">
    <div class="col" style="background:gray;width:400px;height:auto;padding-left:155px;padding-top:18px;
    border:5px solid black; ">


  <img src="image/player2.jpg" alt="Picture" width="150" height="140">
   <h3 style="text-align: center;margin-right: 130px; margin-top:5px;"> Player 2 </h3>
  </div>
  <div class="col" style="background:gray;width:400px;height:auto;padding-left:135px;padding-top:18px;padding-top:18px;border:5px solid black;">
  <img src="image/player1.jpg" alt="Picture" width="150" height="140">
  <h3 style="text-align: center;margin-right: 140px; margin-top:5px;"> Player 1 </h3>
  </div>
  <div class="col" style="background:gray;width:400px;height:auto;padding-left:130px;padding-top:18px;
  border:5px solid black;">
   <img src="image/player3.jpg" alt="Picture" width="150" height="140">
   <h3 style="text-align: center;margin-right: 140px; margin-top:5px;"> Player 3 </h3>
   </div>
</div>
</div>

<br>


<div id="id01" class="modal">
  
    <form class="modal-content animate" action="format.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
       
    <img src="image/delete.png" alt="image" class="avatar">
    </div>
    <div class="container" style="color:black;">
    <h3 align="center"> Erase Score? </h3>
      <br>
      <input type="submit" style="background-color:green;" name="login" value="ERASE">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">CANCEL</button>
      </div>
  </form>
</div>

</body>
</html>


<?php				
	function fetchNotice111(){
		$conn = new mysqli("localhost", "root", "", "dart_board");
		if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
		foreach($conn->query('SELECT name,sum(score) from score group by name') as $row){

         echo "<tr>";  		
		  ?> <td> <?php   
		echo $row['name']; 
		?> </td>
		<td style="text-align: center;"> <?php echo $row['sum(score)'];?> </td>
	   </tr> 
<?php }} ?>


<?php       
  function fetchNotice555(){
    $conn = new mysqli("localhost", "root", "", "dart_board");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
    foreach($conn->query('SELECT name,count(*) as count from score where score>0 group by name') as $row){
       echo "<tr>";     
      ?>
    <td style="text-align: center;"> <?php echo $row['count'];?> </td>
    </tr>

<?php }} ?>

<?php       
  function fetchNotice666(){
    $conn = new mysqli("localhost", "root", "", "dart_board");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);

    foreach($conn->query("SELECT name,'501'-sum(score) as sum from score group by name") as $row){

         echo "<tr>";     
      ?>
    <td style="text-align: center;"> 
    <?php 
    if($row['sum'] <= 50)  echo '<div style="color:white;background-color:red;">'.$row['sum'].'</div>';
    else echo $row['sum'];?> </td>
    </tr>

<?php }} ?>

<?php       
  function fetchNotice999(){
    $conn = new mysqli("localhost", "root", "", "dart_board");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
    foreach($conn->query('SELECT distinct name from score where name ="player1"') as $row){
         echo "<tr>";     
      ?>
      <td> <?php   
    echo $row['name']; 
    ?> </td>
    <?php
      foreach($conn->query('SELECT score from score where name ="player1" and score>0') as $row){
      ?>
    <td style="text-align: center;"> <?php 
     if($row['score'] > 49) echo '<div style="color:white;background-color:red;">'.$row['score'].'</div'; 
      else echo $row['score']; 
       ?> </td>
    <?php } ?>
    </tr>
<?php }} ?>

<?php       
  function fetchNotice888(){
    $conn = new mysqli("localhost", "root", "", "dart_board");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
    foreach($conn->query('SELECT distinct name from score where name="player2" ') as $row){
     echo "<tr>";     
      ?>
      <td> <?php echo $row['name']; ?> </td>

     <?php
      foreach($conn->query('SELECT score from score where name ="player2" and score>0') as $row){
      ?>
    <td style="text-align: center;"> <?php
     if($row['score'] > 49) echo '<div style="color:white;background-color:red;">'.$row['score'].'</div'; 
      else echo $row['score']; 
       ?> </td>
    <?php } ?>
    </tr>
<?php }} ?>

<?php       
  function fetchNotice777(){
    $conn = new mysqli("localhost", "root", "", "dart_board");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
    foreach($conn->query('SELECT distinct name from score where name="player3" ') as $row){
         echo "<tr>";     
      ?>
      <td> <?php echo $row['name']; ?> </td>
     <?php
      foreach($conn->query('SELECT score from score where name ="player3" and score>0') as $row){
      ?>
    <td style="text-align: center;"> <?php  
      if($row['score'] > 49) echo '<div style="color:white;background-color:red;">'.$row['score'].'</div'; 
      else echo $row['score']; 
       ?> </td>
    <?php } ?>
    </tr>
<?php }} ?>

