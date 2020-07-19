
<pre>
<?php
$link = mysqli_connect("localhost", "root", "", "dart_board");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "TRUNCATE TABLE score";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
    header("Location:game.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
mysqli_close($link);
?>
</pre>