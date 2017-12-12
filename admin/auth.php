<? 
// auth.php 
error_reporting(E_ALL^E_NOTICE);
print $_SESSION["username"];


// convert username and password from _POST or _SESSION 
if($_POST["username"]) 
{ 
  $username=$_POST["username"]; 
  $password=$_POST["password"];   
  session_start();
// start and register session variables 
$_SESSION["username"] = $username;
//session_register("username"); 
session_start();
$_SESSION["password"] = $password; 
//session_register("password"); 
} 
elseif($_SESSION["username"]) 
{ 
  $username=$_SESSION["username"]; 
  $password=$_SESSION["password"]; 
} 


// connect to database 
include("include/conn.php"); 
//print $username;


$query_user = "SELECT * FROM User WHERE Username = '$username' and Password = '$password'";
	@$result_user = mysql_query($query_user);
	@$numRows_user = mysql_num_rows($result_user);
	$user_row = mysql_fetch_array($result_user);

$user = $user_row['Username'];

if (empty($user)){
	
//header("Location: login.php");
//print $user;
  exit; 
}
?>

