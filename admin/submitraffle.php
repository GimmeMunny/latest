<html>
  <head>
    <title>Gimmemunny.com Admin</title>
    <META http-equiv="refresh" content="3;URL=index.php">
  </head>
<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

$name= $_POST['name'];
$category=$_POST['category'];
$raffleamount=$_POST['raffleamount'];
$rafflevalue=$_POST['rafflevalue'];
$price=$_POST['price'];
$bundle3=$_POST['bundle3'];
$bundle5=$_POST['bundle5'];
$desc=$_POST['desc'];
$price=$_POST['price'];
$today = date("H:i:s");  
$txtGalleryName = $today.'_'.$category;
mkdir($_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."", 0777);
mkdir($_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."/thumbs", 0777);

$i=0;

$error=array();
    $extension=array("jpeg","jpg");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists($_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."/".$file_name))
                    {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."/".$file_name);
						$image=($_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."/".$file_name);
						$thumbnail=($_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."/thumbs/".$file_name);
						$string1 = $string1.', Image'.$key;
  						$string2 = $string2.", '".$file_name."'";
						// Get new sizes
list($width, $height) = getimagesize($image);
$newwidth = 150; // This can be a set value or a percentage of original size ($width)
$newheight = 150; // This can be a set value or a percentage of original size ($height)
 
 ini_set("memory_limit","100000M");
// Load the images
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($image);


 
// Resize the $thumb image.
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
 
// Save the new file to the location specified by $thumbnail
imagejpeg($thumb, $thumbnail, 100);

                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."/".$newFileName);
						$image=($_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."/".$file_name);
						$thumbnail=($_SERVER["DOCUMENT_ROOT"] ."/upload/".$txtGalleryName."/thumbs/".$file_name);
						$string1 = $string1.', Image'.$key;
  						$string2 = $string2.", '".$file_name."'";
											// Get new sizes
list($width, $height) = getimagesize($image);
$newwidth = 150; // This can be a set value or a percentage of original size ($width)
$newheight = 150; // This can be a set value or a percentage of original size ($height)
 
// Load the images
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($image);
 
// Resize the $thumb image.
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
 
// Save the new file to the location specified by $thumbnail
imagejpeg($thumb, $thumbnail, 100);
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }
  //$string1 = $string1.', Image['.$i.']';
  //$string2 = $string2.', '.$filename;
  //<META http-equiv="refresh" content="3;URL=index.php">
  
  

// insert a new raffle contest

  $query_insertItem = "INSERT INTO Raffle (GalleryName, RaffleName, RaffleCategory, RaffleMax, RaffleTicketPrice, RaffleBundle3, RaffleBundle5, RaffleDescription, Value, RaffleStatus $string1) VALUES ('$txtGalleryName', '$name', '$category', '$raffleamount', '$price', '$bundle3', '$bundle5','desc', $rafflevalue, 'open' $string2)";
	$dberror = "";
	$ret = mysql_query($query_insertItem);
	//print_r($query_insertItem);
	
	function nettuts_error_handler($number, $message, $file, $line, $vars)
 
{
    $email = "
        <p>An error ($number) occurred on line 
        <strong>$line</strong> and in the <strong>file: $file.</strong> 
        <p> $message </p>";
         
    $email .= "<pre>" . print_r($vars, 1) . "</pre>";
     
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     
    // Email the error to someone...
    error_log($email, 1, 'derek.baehr@gmail.com', $headers);
 
    // Make sure that you decide how to respond to errors (on the user's side)
    // Either echo an error message, or kill the entire project. Up to you...
    // The code below ensures that we only "die" if the error was more than
    // just a NOTICE. 
    if ( ($number !== E_NOTICE) && ($number < 2048) ) {
        die("There was an error. Please try again later.");
    }
}
	
	?>
	
    Updating...