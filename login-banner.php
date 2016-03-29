

<?php
session_start();

if(isset( $_SESSION["first"], $_SESSION["last"])==true)
{

} else {
	header("Location: index.php");
}
?>
