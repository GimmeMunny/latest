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
            <table class="bottomtable" width="700" border="0">
              <tr>
                <td colspan="5">
                  &nbsp;
                </td>
              </tr>
              <tr>
                <td class="linkcell">
                  <a href="javascript:window.close()">
                    Close Window
                  </a>
                </td>
                <td class="linkcell">
                  <a href="emailer.php">
                    E-Mail Form
                  </a>
                </td>
                <td class="linkcell">
                  <a href="javascript:history.back()">
                    Back
                  </a>
                </td>
                <td class="linkcell">
                  <a href="<?php echo $log_path ?>" target="log">
                    View Logfile
                  </a>
                </td>
                <td class="linkcell">
                  <a href="../pdf/emailer.pdf" target="_blank">
                    Help
                  </a>
                </td>
              </tr>
              <tr>
                <td colspan="5">
                  &nbsp;
                </td>
              </tr>
              <tr>
                <td colspan="5" class="copyright">
                  &copy; 2003 by Patrick Biegel, <?php echo $version."\n"; ?>
                </td>
              </tr>
            </table>
          </form>
<?php


// ================================================================
// If the debugmode is enabled the variable values will be
// displayed.
// ================================================================
if($debug_mode == 1) {
  include('debug.php');
}


?>
        </td>
      </tr>
    </table>
  </body>
</html>