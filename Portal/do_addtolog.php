<?php
$now = new \DateTime('now');
$month = $now->format('M');
$year = $now->format('Y');
switch ($logmsg) {
  case "login":
    $pathtolog = "_log/";
    $loginuse = $pathtolog . $month . $year ."_Portal.log";
    $txt = date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . "(" . $_SESSION['UserID'] . ") » logged in » " . $_SERVER['REMOTE_ADDR'] . ".\n";
    break;
  case "logout":
    $pathtolog = "_log/";
    $loginuse = $pathtolog . $month . $year ."_Portal.log";
    $txt = date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . "(" . $_SESSION['UserID'] . ") » logged out » " . $_SERVER['REMOTE_ADDR'] . ".\n";
    break;
  case "resetpassword":
    $pathtolog = "_log/";
    $loginuse = $pathtolog . $month . $year ."_Portal.log";
    $txt = date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . "(" . $_SESSION['UserID'] . ") » changed " . $row['UserName'] . "'s password » " . $_SERVER['REMOTE_ADDR'] . ".\n";
    break;
  case "edituser";
    $pathtolog = "_log/";
    $loginuse = $pathtolog . $month . $year ."_Portal.log";
    $txt = date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . "(" . $_SESSION['UserID'] . ") » edited " . $UserNameHiddenIn . "s details. Values FN:" . $UserFullNameIn . " E:" . $UserEmailIn . " PL:" . $UserPortalLevelIn . " CL:" . $UserCallCentreLevelIn . " AL:" . $UserAbortsLevelIn . " TL:" . $UserTrunkLevelIn . " SL:" . $UserSurchargeLevelIn . " CPRL:" . $UserCPRLevelIn . " A:" . $UserActiveIn . " » " . $_SERVER['REMOTE_ADDR'] . ".\n";
    break;
  case "ccc_orderentry";
    $pathtolog = "../Portal/_log/";
    $loginuse = $pathtolog . $month . $year ."_Portal.log";
    $txt = date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . "(" . $_SESSION['UserID'] . ") » Added a new CCC order for " . $OrderCompanyNameIn . " » " . $_SERVER['REMOTE_ADDR'] . ".\n";
    break;
  case "ccc_editorder";
    $pathtolog = "../Portal/_log/";
    $loginuse = $pathtolog . $month . $year ."_Portal.log";
    $txt = date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . "(" . $_SESSION['UserID'] . ") » edited CCC order: " . $OrderIDIn . " entry date: " . $OrderEntryDateIn . "', OrderCallCentreAgent = '" . $CallCentreAgentIn . "', OrderCompanyName = '" . $OrderCompanyNameIn . "',OrderCustomerName = '" . $OrderCustomerNameIn . "',OrderCustomerLandline = '" . $OrderCustomerLandlineIn . "',OrderCustomerMobile = '" . $OrderCustomerMobileIn . "',OrderCustomerEmail = '" . $OrderCustomerEmailIn . "',OrderMoveType = '" . $OrderMoveTypeIn . "',OrderHDDRemoval = '" . $OrderHDDRemovalIn . "',OrderCanonNotified = '" . $OrderCanonNotifiedIn . "',OrderAuthorised = '" . $OrderAuthorisedIn . "',OrderQuoteValue = '" . $OrderQuoteValueIn . "',OrderQuoteSentToCustomer = '" . $OrderQuoteSentToCustomerIn . "',OrderOrderClosed = '" . $OrderOrderClosedIn . "',OrderNotes = '" . $OrderNotesIn . "',OrderProductModel = '" . $OrderProductModelIn . "',OrderSerialNumber = '" . $OrderSerialNumberIn . "',OrderDestination = '" . $OrderDestinationIn . "'\n";
    break;
  case "trunk_newentry";
    $pathtolog = "../Portal/_log/";
    $loginuse = $pathtolog . $month . $year ."_Portal.log";
    $txt = date('d/m/Y H:i:s') . " » " . $_SESSION['login_user'] . "(" . $_SESSION['UserID'] . ") » Added a trunk to the board » " . $_SERVER['REMOTE_ADDR'] . ".\n";
    break;
    default:
    $pathtolog = "_log/";
    $loginuse = $pathtolog . $month . $year ."_Portal.log";
    $myfile = fopen($loginuse, "a+") or die("Unable to open file!");
    $txt = "Failure to log at " . $now;
    fwrite($myfile, $txt);
    fclose($myfile);
}
$myfile = fopen($loginuse, "a+") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
?>