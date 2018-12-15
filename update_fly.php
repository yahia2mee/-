<?php require_once('Connections/nova_con.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE fly_tb SET FLY_NO=%s, `FROM`=%s, `TO`=%s, SITE_NO1=%s, SITE_NO2=%s, SITE_NO3=%s, PLANE_TYPE=%s, AIRPORT_FROM=%s, AIRPORT_TO=%s, FLY_DATE=%s, LINE=%s WHERE ID=%s",
                       GetSQLValueString($_POST['FLY_NO'], "text"),
                       GetSQLValueString($_POST['FROM'], "text"),
                       GetSQLValueString($_POST['TO'], "text"),
                       GetSQLValueString($_POST['SITE_NO1'], "int"),
                       GetSQLValueString($_POST['SITE_NO2'], "int"),
                       GetSQLValueString($_POST['SITE_NO3'], "int"),
                       GetSQLValueString($_POST['PLANE_TYPE'], "text"),
                       GetSQLValueString($_POST['AIRPORT_FROM'], "text"),
                       GetSQLValueString($_POST['AIRPORT_TO'], "text"),
                       GetSQLValueString($_POST['FLY_DATE'], "text"),
                       GetSQLValueString($_POST['LINE'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($updateSQL, $nova_con) or die(mysql_error());

  $updateGoTo = "fly_manage.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['noo'])) {
  $colname_Recordset1 = $_GET['noo'];
}
mysql_select_db($database_nova_con, $nova_con);
$query_Recordset1 = sprintf("SELECT * FROM fly_tb WHERE ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $nova_con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_nova_con, $nova_con);
$query_des1 = "SELECT * FROM destination_tb";
$des1 = mysql_query($query_des1, $nova_con) or die(mysql_error());
$row_des1 = mysql_fetch_assoc($des1);
$totalRows_des1 = mysql_num_rows($des1);

mysql_select_db($database_nova_con, $nova_con);
$query_des2 = "SELECT * FROM destination_tb";
$des2 = mysql_query($query_des2, $nova_con) or die(mysql_error());
$row_des2 = mysql_fetch_assoc($des2);
$totalRows_des2 = mysql_num_rows($des2);

mysql_select_db($database_nova_con, $nova_con);
$query_line = "SELECT * FROM line_tb";
$line = mysql_query($query_line, $nova_con) or die(mysql_error());
$row_line = mysql_fetch_assoc($line);
$totalRows_line = mysql_num_rows($line);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>نوفا للطيران</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
بب {
	color: #FFF;
}
#wrapper #big div table tr td div strong {
	color: #FFF;
}
#wrapper #big table tr td {
	color: #FFF;
}
#wrapper #big table tr td {
	color: #000;
}
ت {
	color: #FFF;
}
</style>
</head>

<body>
	<div id="header">																																																																																																																						<div class="inner_copy"><a href="http://ecommercebuilders.blogspot.com/2016/07/shopify-review.html"></a></div>
		<div id="meta"><img src="images/Sudan_240-animated-flag-gifs.gif" width="123" height="59">||</div>
	  <ul id="menu">
			<li><a href="fly_manage.php"><strong>رجوع</strong></a></li>
			<li></li>                                             
			<li></li>
			<li></li>
			<li></li>                                                                                                                                                                                                                                                                                                                                                
		</ul>
		<ul id="forum">
			<li></li>
		</ul>
	</div>
	<div id="wrapper">																																																																																																																								<div class="inner_copy"></div>
		<div id="left">
			<div id="left_navigation">
				<img src="images/gtop.gif" alt="" width="191" height="8" />
				<div class="title1"></div>
				<ul class="contries">
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<img src="images/gbot.gif" alt="" width="191" height="8" />
			</div>
		</div>  
		<div id="big">
		  <div align="center"></div>
			<h2 align="center">&nbsp;
             <link href="stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/jquery/jquery-ui-custom.css" />
<script src="includes/jquery/jquery-1.10.2.js"></script>
<script src="includes/jquery/jquery-ui-custom.js"></script>
<script src="includes/jquery/maskedinput.js"></script>
<script src="includes/bootstrap/js/bootstrap.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script>
  jQuery(document).ready(function($) {var dateToday = new Date();
var dates = $("#mydate").datepicker({
    defaultDate: "+1w",
	dateFormat: 'yy-mm-dd',
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "mydate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker.settings.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
   	 }
	});
});
  </script>
             
              <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                <table align="center" dir="rtl">
                  <tr valign="baseline">
                    <td nowrap align="right">رقم الرحلة</td>
                    <td><input type="text" name="FLY_NO" value="<?php echo htmlentities($row_Recordset1['FLY_NO'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">من</td>
                    <td><select name="FROM">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_des1['Destination_NAME']?>" <?php if (!(strcmp($row_des1['Destination_NAME'], htmlentities($row_Recordset1['FROM'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_des1['Destination_NAME']?></option>
                      <?php
} while ($row_des1 = mysql_fetch_assoc($des1));
?>
                    </select></td>
                  <tr>
                  <tr valign="baseline">
                    <td nowrap align="right">الى</td>
                    <td><select name="TO">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_des2['Destination_NAME']?>" <?php if (!(strcmp($row_des2['Destination_NAME'], htmlentities($row_Recordset1['TO'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_des2['Destination_NAME']?></option>
                      <?php
} while ($row_des2 = mysql_fetch_assoc($des2));
?>
                    </select></td>
                  <tr>
                  <tr valign="baseline">
                    <td nowrap align="right">درجة اولى</td>
                    <td><input type="text" name="SITE_NO1" value="<?php echo htmlentities($row_Recordset1['SITE_NO1'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">درجة ثانية</td>
                    <td><input type="text" name="SITE_NO2" value="<?php echo htmlentities($row_Recordset1['SITE_NO2'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">درجة ثالثة</td>
                    <td><input type="text" name="SITE_NO3" value="<?php echo htmlentities($row_Recordset1['SITE_NO3'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">نوع الطائرة</td>
                    <td><input type="text" name="PLANE_TYPE" value="<?php echo htmlentities($row_Recordset1['PLANE_TYPE'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">مطار الاقلاع</td>
                    <td><input type="text" name="AIRPORT_FROM" value="<?php echo htmlentities($row_Recordset1['AIRPORT_FROM'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">مطار الهبوط</td>
                    <td><input type="text" name="AIRPORT_TO" value="<?php echo htmlentities($row_Recordset1['AIRPORT_TO'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">تاريخ الاقلاع</td>
                    <td><input type="text" name="FLY_DATE" value="<?php echo htmlentities($row_Recordset1['FLY_DATE'], ENT_COMPAT, 'utf-8'); ?>" size="32" id="mydate"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">الخط</td>
                    <td><select name="LINE">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_line['LINE']?>" <?php if (!(strcmp($row_line['LINE'], htmlentities($row_Recordset1['LINE'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_line['LINE']?></option>
                      <?php
} while ($row_line = mysql_fetch_assoc($line));
?>
                    </select></td>
                  <tr>
                  <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td><div align="left">
                      <input type="submit" value="تعديل">
                    </div></td>
                  </tr>
                </table>
                <input type="hidden" name="MM_update" value="form1">
                <input type="hidden" name="ID" value="<?php echo $row_Recordset1['ID']; ?>">
              </form>
              <p>&nbsp;</p>
            </h2>
			<div align="center"></div>
			<p align="center">&nbsp;</p>
			<p align="center">&nbsp;</p>
			<p>&nbsp;</p>
<p align="center">&nbsp;</p>
		</div>
	</div>
	<div id="footer">																																																																																																																																																																																	<div class="inner_copy">></div>
		<div></div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($des1);

mysql_free_result($des2);

mysql_free_result($line);
?>
