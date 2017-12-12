<?php
// connect to database 
include("include/conn.php"); 



// Name of your CSV file
$csv_file = "California.csv";

if (($getfile = fopen($csv_file, "r")) !== FALSE) { 
        $data = fgetcsv($getfile, 1000, ",");
        while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
         $num = count($data); 
         for ($c=0; $c < $num; $c++) {
             $result = $data; 
             $str = implode(",", $result); 
             $slice = explode(",", $str);
             $col1 = $slice[0]; 
             $col2 = $slice[1];
             $col3 = $slice[2]; 

// SQL Query to insert data into DataBase

$query = "INSERT INTO Email3(EmailAddress)
VALUES('".$col1."')";

$s=mysql_query($query); 
     }
   } 
  }

echo "File data successfully imported to database!!"; 
mysql_close($connect); 
?>