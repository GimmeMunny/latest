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


// ================================================================
// Create the table begin.
// ================================================================


?>
<table class="formtable" width="700"  border="0" cellspacing="1">
  <tr>
    <td class="tableleft">
      Path to the recipient address file:
    </td>
    <td>
      <select name="address_file" size="1">
<?php


// ================================================================
// Display the content of the dropdown list.
// ================================================================
$counter = 0;
for ($counter = 0;$counter <= 9;$counter++) {


  // ==============================================================
  // Check if the actual address list needs to be selected.
  // ==============================================================
  if(($counter+1) == $default_address_list) {
    echo "<option selected>\n";
  } else {
    echo "<option>\n";
  }
  echo $file[$counter];
  echo "</option>\n";
}


?>
      </select>
      <input type="submit" name="todo" value="Edit">
    </td>
  </tr>
  <tr>
    <td class="tableleft">
      Path to a special file:
    </td>
    <td>
      <input type="text" name="special_file" size="60">
    </td>
  </tr>
  <tr>
    <td class="tableleft">
      Wait time for sending (in sec.):
    </td>
    <td>
      <input type="text" name="wait_time" size="3" value="<?php echo $default_wait_time; ?>">
    </td>
  </tr>
  <tr>
    <td class="tableleft">
      E-Mail Format HTML:
    </td>
    <td>
      <?php if($default_email_format == "html"){ ?>
        <input type="checkbox" name="email_format" value="html" checked>
      <?php } else { ?>
        <input type="checkbox" name="email_format" value="html">
      <?php } ?>
    </td>
  </tr>
  <tr>
    <td class="tableleft">
      E-Mail address of the sender:
    </td>
    <td>
      <input type="text" name="email_sender" size="60" value="<?php echo $default_email_sender; ?>">
    </td>
  </tr>
  <tr>
    <td class="tableleft">
      E-Mail address for confirmation:
    </td>
    <td>
      <input type="text" name="email_confirmation" size="60" value="<?php echo $default_email_confirmation; ?>">
    </td>
  </tr>
  <tr>
    <td class="tableleft">
      E-Mail subject:
    </td>
    <td>
      <input type="text" name="email_subject" size="60" value="<?php echo $default_email_subject ?>">
    </td>
  </tr>
  <tr>
    <td class="tableleft">
      E-Mail message:
    </td>
    <td rowspan="2">
      <textarea name="email_message" rows="14" cols="50"></textarea>
    </td>
  </tr>
  <tr>
    <td class="tableleft">
      <img src="../gif/email.gif" width="184" height="200" alt="Mass-E Mailer">
    </td>
  </tr>
</table>
<table class="bottomtable" width="700" border="0">
  <tr>
    <td>
      &nbsp;
    </td>
  </tr>
  <tr>
    <td class="bottomcell">
<?php


if($demo_mode == 1) {
  echo "<strong>Demomode active!&nbsp;</strong>\n";
}


?>    
    
    
    
      <input type="reset" name="resetform" value="Reset Form">
      <input type="submit" name="todo" value="Send">
<?php


if($demo_mode == 1) {
  echo "<strong>&nbsp;Demomode active!</strong>\n";
}


?>
    </td>
  </tr>
</table>
