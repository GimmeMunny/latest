<? 
session_start(); 
require("inc/allincludes.php");
//$username = $_REQUEST['Email'];
$temp = $_REQUEST;
$temp1 = $_POST;
foreach ($temp as $key => $value)
{
	$request[$key] =$value;
}
mail('bhumitpatel85@gmail.com,visal.purohit@gmail.com','paymentlivevishal',$request);
mail('bhumitpatel85@gmail.com,visal.purohit@gmail.com','paymentlivevishal1',$temp1);
//$Email = $request['Username'];
if($request['Username'] != "" && $request['Action'] == 'Payment' && $request['TransactionID'] != '')
{
	
		$query = "SELECT tblmemberinfo.*,tblusers.* FROM `tblmemberinfo`,tblusers WHERE tblmemberinfo.vUserName = '".$request['Username']."' and tblusers.iRoleId = '3' and tblmemberinfo.iMemberId=tblusers.iUserInfoId"; 
		
		$userpaymentdata=GetRecords($query);
		
		$queryag="SELECT tblagencyinfo.*,tblusers.* FROM `tblagencyinfo`,tblusers WHERE tblagencyinfo.vUserName = '".$request['Username']."' and tblusers.iRoleId = '4' and tblagencyinfo.iAgencyId=tblusers.iUserInfoId";
		
		$ueragencydata=GetRecords($queryag);
		
		
		if(isset($userpaymentdata) && $userpaymentdata[0]['iMemberId'] != '')
		{
				   
						$id = $userpaymentdata[0]['iMemberId'];
			            $curdate = date("Y-m-d");
						$productplan = $userpaymentdata[0]['vPlanName'];
						$plandetail = GetPlanDetails($productplan);
						$appoint = $plandetail[0]['vAppoint'];
						$carnumber = $userpaymentdata[0]['iCounter'];
						$counter = $carnumber + 1;
							
						$sublistjhhj="update tblmemberinfo set vAppointment = '$appoint',vPaid = 'Paid',vAccount = 'Accept',dDateModify = '$curdate',iCounter = '$counter' where iMemberId = '$id'";	
							$subres = SetRecords($sublistjhhj);
		}
		if($_SESSION['LASTSERID'] != '')
		{
				        $id = $_SESSION['LASTSERID'];
			            $curdate = date("Y-m-d");
						$vUserName = $request['Username'];
						
						$sublistgfgfg="update tblmemberinfo set vAccount = 'Accept',vUserName = '".$request['Username']."',dDateModify = '$curdate' where iMemberId = '".$_SESSION['LASTSERID']."'";	
						$subres = SetRecords($sublistgfgfg);
		}
		
		if(isset($ueragencydata) && $ueragencydata[0]['iAgencyId'] != '' && $_SESSION['AGENCYLASTID'] == '')
		{
		                $agncyid = $ueragencydata[0]['iMemberId'];
			            $curdate = date("Y-m-d");
						$productplan = $userpaymentdata[0]['vPlanName'];
						$plandetail = GetAgencyPlanDetails($productplan);
						$appoint = $plandetail[0]['vAppoint'];
						$carnumber = $ueragencydata[0]['iCounter'];
						$counter = $carnumber + 1;
						
						$sublist111="update tblagencyinfo set dDateModify = '$curdate',vAppointment = '$appoint',vPaid = 'Paid',vAccount = 'Accept',iCounter = '$counter' where iAgencyId = '$agncyid'";	
   						$subres = SetRecords($sublist111);
		}
				
		if($_SESSION['AGENCYLASTID'] != '')
		{
				        $agncyid = $_SESSION['AGENCYLASTID'];
			            $curdate = date("Y-m-d");
						$vUserName = $request['Username'];
						
						$sublist="update tblagencyinfo set eStatus = 'Activate',vAccount = 'Accept',vUserName = '".$request['Username']."',dDateModify = '$curdate' where iAgencyId = '".$_SESSION['AGENCYLASTID']."'";	
						$subres = SetRecords($sublist);
		}

}

//echo "<pre>";
//print_r($_REQUEST);
//echo "<pre>";
//print_r($_SESSION);


/*mail('visal.purohit@gmail.com','paymentlivevishal',$request);

//print_r($_REQUEST);
if($request['Username'] != "" && $request['Action'] == 'Payment' && $request['TransactionID'] != '')
{
	
		$query = "select * from `tblmemberinfo` where vUserName = '".$request['Username']."'";
		$userpaymentdata=GetRecords($query);
if(isset($userpaymentdata) && $userpaymentdata[0]['iMemberId'] != '')
{
			
			$id = $userpaymentdata[0]['iMemberId'];
			$curdate = date("Y-m-d");
			
			
			
			$appoint = $userpaymentdata[0]['vAppoint'];
			$carnumber = $userpaymentdata[0]['iCounter'];
			$carnumber++;
			
			
			
			$sublist="update tblmemberinfo set vAppointment = '$appoint',vPaid = 'Paid',vAccount = 'Accept',iCounter = '$carnumber',dDateModify = '$curdate' where iMemberId = '$id'";	
			$subres = SetRecords($sublist);
}

else
{
			foreach ($_SESSION as $key => $value)
			{
				$session[$key] =$value;
			}
			
			$siteuserid = $request['siteuserid'];
			$vUserName = $request['Username'];
			$sublist="insert into tblmemberinfo (iUniqueId,vFirstName,vLastName,vWorking,vEmailAddress,vImageName,vAddress,vAddress1,vCity,vState,vZipcode,vPhone,vGender,dBod,vContact,vVehicle,dDateCreated,amt,vPlanName,vAppointment,vPaid,vUserName,iCounter) values ('$uniqueid','".$_SESSION['firstname']."','".$_SESSION['lastname']."','".$_SESSION['working']."','".$_SESSION['email']."','".$_SESSION['txtimg']."','".$_SESSION['address1']."','".$_SESSION['address2']."','".$_SESSION['city']."','".$_SESSION['state']."','".$_SESSION['zipcode']."','".$_SESSION['phone']."','".$_SESSION['gender']."','".$_SESSION['txtdate']."','".$_SESSION['contact']."','".$_SESSION['carnumber']."','$curdate','$price','$plan','$siteuserid','$paid','$vUserName','$counter')";	
	
	
	
	mail('visal.purohit@gmail.com','Insert query',$sublist);
	die;
	$subres = SetRecords($sublist);
	
	$lastuserid = mysql_insert_id();
	
	
	
	$sublist_user = "insert into tblusers (iRoleId,iUserInfoId,vEmail,vToken,dDateCreated) values ('3','$lastuserid','$usernm','$userpwd','$curdate')";	
	$subres_user = SetRecords($sublist_user);
	
	   
						
		if (!session_is_registered("USERNAME")) 
			session_register("USERNAME"); 						
		
		$userid = $lastuserid;
		$email = $txtemail;
		$_SESSION['USERINFOID'] = $userid;
		$_SESSION['EMAIL'] = $_SESSION['email'];
		$_SESSION['ACTIVE'] = "Activate";
		 		
			
				 //$to = "info@escortbuddy.com";
				 $to = "rajveerpatel@gmail.com";
  
			   	$subject = "Register on Escort Buddy";
				$date=date("j M Y, H:i:s");
				$disdate=date("j F Y"); ///for find the date on which date the request is come

				$headers = "From: info@escortbuddy.com\n";
				$headers.= "Reply-To: $to\n";
				$headers.= "MIME-Version: 1.0\n";
				$headers.= "Content-type: text/html; charset=iso-8859-1\n";
				
				$paypal = "select * from tblemail";
				$payamount = GetRecords($paypal);				


			$AdminMessage= stripslashes($payamount[0]['vRegisterEmail']);

			mail($email,$subject,$AdminMessage,$headers);*/
		
        /*$sublist="SELECT * FROM `tblmemberinfo` where vEmailAddress = '".$username."'";
	    $subres=GetRecords($sublist);
		$emailid = $subres[0]['vEmailAddress'];
		$id = $subres[0]['iMemberId']; 
		if($emailid == "")
		{
		$add = AddMemberCard();
		if ($add==1)
			{
				//header("location:home.php");
			}
	   }
	   else
	   {
	     $edit = EditMemberListCard($id);
		if ($edit==1)
			{
			//	header("location:home.php");
			}
	   }*/
//}
//}
/*if($_REQUEST['submit']=='Retrieve')
{
		$add = AddMemberCard();
		if ($add==1)
			{
				header("location:home.php");
			}
		
}*/

$cmsdata = GetCMSPageDetails(19);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" type="text/css" rel="stylesheet" media="screen">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $general[0]['vText']; ?></title>
<meta http-equiv="Content-Type" content="<? echo $cmsdata[0]['vMetaDescription']; ?>" />
<meta name="keywords" content="<? echo $cmsdata[0]['vKeyword']; ?>" />
<style type="text/css">				
			.registration{
	width:97%;
	float:left;
	color:#818181;
	/*border: 2px solid #ccc;*/
	padding:10px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	-moz-box-shadow: 0 0 5px 5px #DADADA;
	-webkit-box-shadow: 0 0 5px 5px #DADADA;
	box-shadow: 0 0 5px 5px #DADADA;
	border-radius:10px;
	margin-left: 5px;
	background-color: #FFFFFF;
	margin-top: 10px;
			}
	.registration div {
	padding-top: 8px;
	padding-bottom: 8px;
	text-align: justify;
}
</style>
<div id="openglobal_privacy_widget" style="display: inline; text-align:right; font-size: 13px; line-height: 100%; position: fixed; top: 0; right: 0; margin: 0; padding: 0 0 0 3px; background: #F4F4F4; z-index: 100000; opacity:35.9; filter: alpha(opacity=90);">
Accept <a title="This website uses cookies to store information on your computer. Some of these cookies are used for visitor analysis, others may be necessary for the website to function properly. You should configure your browser to only accept the cookies you wish to approve, or leave this website." style="color:#000000;" rel="privacy" href="eu_cookie_policy.php">Cookies</a>?
<button id="openglobal_privacy_accept" style="vertical-align: middle;" onclick="openglobal_privacy_accept();return false;">Yes</button>
<button id="openglobal_privacy_wait" style="vertical-align: middle;" onclick="clearTimeout(openglobal_privacy_timer);return false;">Wait</button>
<button id="openglobal_privacy_leave" style="vertical-align: middle;" onclick="window.location='eu_cookie_policy.php';">Leave</button>
</div>
<script type="text/javascript">
//<![CDATA[
var openglobal_privacy_timeout = 0;
var openglobal_privacy_functions = [];

var openglobal_privacy_widget = document.getElementById('openglobal_privacy_widget');
var results = document.cookie.match ( '(^|;) ?openglobal_privacy_widget=([^;]*)(;|$)' );
if (results) {
  if (1 == unescape(results[2])) {
    openglobal_privacy_accept();
  }
} else {
  window.onload = function() {
    for (var i = 0; i < document.links.length; i++) {
      var link_href = document.links[i].getAttribute('href');
      if ('privacy' != document.links[i].getAttribute('rel') && (!/^[\w]+:/.test(link_href) || (new RegExp('^[\\w]+://[\\w\\d\\-\\.]*' + window.location.host)).test(link_href))) {
        var current_onclick = document.links[i].onclick;
document.links[i].onclick = function() {openglobal_privacy_accept();if (Object.prototype.toString.call(current_onclick) == '[object Function]') {current_onclick();}};
      }
    }
  };
}

var openglobal_privacy_timer;
if (openglobal_privacy_timeout > 0) {
   openglobal_privacy_timer = setTimeout('openglobal_privacy_tick()', 1000);
} else {
  var openglobal_privacy_wait = document.getElementById('openglobal_privacy_wait');
  if (null != openglobal_privacy_wait) {
    openglobal_privacy_wait.parentNode.removeChild(openglobal_privacy_wait);
  }
}
function openglobal_privacy_tick() {
  if (0 >= --openglobal_privacy_timeout) {
    openglobal_privacy_accept();
    return;
  }
  var openglobal_privacy_accept_button = document.getElementById('openglobal_privacy_accept');
  if (null != openglobal_privacy_accept_button) {
    openglobal_privacy_accept_button.innerHTML = 'Yes (' + openglobal_privacy_timeout + ')';
    openglobal_privacy_timer = setTimeout('openglobal_privacy_tick()', 1000);
  }
}

function openglobal_privacy_accept() {
  clearTimeout(openglobal_privacy_timer);
  document.cookie = 'openglobal_privacy_widget=1; path=/; expires=Mon, 18 Jan 2038 03:14:00 GMT';
  openglobal_privacy_widget.parentNode.removeChild(openglobal_privacy_widget);
  for (var i = 0; i < openglobal_privacy_functions.length; i++) {
    openglobal_privacy_functions[i]();
  }
}
//]]>
</script>
</head>

<body>
<div id="wreper">
  <div id="main_div">
    <div class="heder">
<?php if($_SESSION['USERINFOID']){ include("inc/toplogin.php"); } elseif($_SESSION['USERINFOAGENCYID']) { include("inc/agencytop.php"); } else { include("inc/top.php");} ?>
<div class="login_under1">
        <div class="login_box">
          <div class="registration">
            <div><div style="float:left; padding-right:15px;"><?php echo $cmsdata[0]['vContent']; ?></div>
            </div>
        </div>
      </div>
    </div>
    <?php include("inc/bottom.php"); ?>
  </div>
</div>
</body>
</html>
