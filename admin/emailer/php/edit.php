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
<table class="changetable" width="600">
  <tr>
    <td>
      <strong>
        Open file: <?php echo $address_file."\n"; ?>
      </strong>
    </td>
  </tr>
  <tr>
    <td>
<?php


// ================================================================
// Initialize variable.
// ================================================================
$success = 0;


// ================================================================
// Specify the whole path to the address file.
// ================================================================
$address_path_file = $list_dir.$address_file;


// ================================================================
// Check if the address file exists.
// ================================================================
if (@file_exists($address_path_file)) {


  // ==============================================================
  // Try to open the selected address file.
  // ==============================================================
  $open_address_file = @fopen ($address_path_file, "r");
  if($open_address_file == true) {
    $success = 1;
  } else {


    // ============================================================
    // Message that the address file could not be opened.
    // ============================================================
    echo "The file <b>\"".$address_path_file."\"</b> could not be opened !<br>\n";
  }
} else {


  // ==============================================================
  // Message that the address file does not exist.
  // ==============================================================
  echo "There is no file <b>\"".$address_path_file."\"</b> !<br>\n";
}
echo "</td>\n";
echo "</tr>\n";


// ================================================================
// Insert data to the textbox.
// ================================================================
if ($success == 1) {
  echo "<tr>\n";
  echo "<td>\n";
  echo "<textarea name=\"email_recipient\" rows=\"23\" cols=\"70\">\n";
  while(($line = @fgets($open_address_file,1024)) == true) {
    echo @trim(stripslashes($line))."\n";
  }
  echo"</textarea>\n";
  echo "</td>\n";
  echo "</tr>\n";


  // ==============================================================
  // Close the address file.
  // ==============================================================
  echo "<tr>\n";
  echo "<td>\n";
  if(!@fclose ($open_address_file)) {


    // ============================================================
    // Message that the address file could not be closed.
    // ============================================================
    echo "The file <b>\"".$address_path_file."\"</b> could not be closed !<br>\n";
  }
  echo "</td>\n";
  echo "</tr>\n";
  echo "</table>\n";
}


// ================================================================
// Display buttons.
// ================================================================


?>
<table class="bottomtable" width="700">
  <tr>
    <td>
      &nbsp;
    </td>
  </tr>
  <tr>
    <td class="bottomcell">
      <input type="reset" name="resetform" value="Reset">
      <input type="submit" name="todo" value="Save">
      <input type="hidden" name="list_dir" value="<?php echo $list_dir; ?>">
      <input type="hidden" name="address_file" value="<?php echo $address_file; ?>">
    </td>
  </tr>
</table>
