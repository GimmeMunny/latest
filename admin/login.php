<?php


if ($_SESSION["username"] != '') {
header("Location: test.php");
}




	?>

<title>admin</title>

<body leftmargin="0" rightmargin="0" bottommargin="0" topmargin="0" cellspacing="0" cellpadding="0" bgcolor="ffffff">
<head>
<head>

<link rel="stylesheet" href="../include/styles.css" type="text/css">
</head>

</head>

<center>
<table width="700" leftmargin="0" rightmargin="0" bottommargin="0" topmargin="0" cellspacing="0" cellpadding="0">
<tr bgcolor="white"><td align="center" valign="center">


<br>
 <div class="contentBox">
 <img src="images/gimme.png">
        <form name="form1" method="post" action="index.php">
		  <p><span class="white">UserName:</span><br>
						<input name="username" type="text" id="username" size="12">
		  </p>
		  <p><span class="white">Password:</span><br>
			<input name="password" type="password" id="password" size="12"><br />
		   </p>
		  <p> 
			<input type="submit" name="Submit" value="Submit" />
		  </p>
		</form>

      </div>
    </div>
</td></tr>


</table>



