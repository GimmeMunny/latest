<?php


// ================================================================
//                    M A S S   E - M A I L E R
// ================================================================
//
// The script sends e-mails to different e-mail addresses specified
// in different text files. The text files can be changed and saved
// over a web interface. The user can send the e-mails in HTML- or
// plain text format. The script also writes a logfile and the user
// can ad a signature at the end of the e-mails.
//
// Copyright (C) 2003, Patrick Biegel / 15.11.2005 / 23:50
//
//
// ================================================================
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License as
// published by the Free Software Foundation; either version 2 of
// the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public
// License along with this program; if not, write to the Free
// Software Foundation, Inc., 59 Temple Place, Suite 330, Boston,
// MA 02111-1307 USA
//
// ================================================================
//


?>
<!-- Definition of the Document Type (HTML 4.01 Transitional)   -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>Mass E-Mailer - PHP-Script for sending a lot of e-mails</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="author" content="Patrick Biegel">
    <meta name="description" content="This PHP script sends e-mails in text- or HTML format to different addresses which are stored in plain text files. The addresses can be changed and saved over a web interface.">
    <meta name="keywords" content="patrick, biegel, php, script, scripts, mass, e-mailer, mail, mails, email, emails, send, edit, store">
    <link rel="stylesheet" type="text/css" href="../css/emailer.css">
  </head>
  <body>
    <table class="centertable" width="100%" border="0">
      <tr>
        <td>
<?php


// ================================================================
// If the debugmode is enabled the variable values will be
// displayed.
// ================================================================
if($debug_mode == 1) { 
  include('debug.php');
}


// ================================================================
// Display the page title.
// ================================================================
?>
          <form id="emailer" name="emailer" method="post" action="emailer.php">
            <table class="titletable" width="700" border="0">
              <tr>
                <td>
                  <h1>
                    Mass E-Mailer - <?php echo $page."\n"; ?>
                  </h1>
                </td>
              </tr>
            </table>
