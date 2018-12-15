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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO line_tb (LINE, `FROM`, `TO`, `DESCRIPTION`) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['LINE'], "text"),
                       GetSQLValueString($_POST['FROM'], "text"),
                       GetSQLValueString($_POST['TO'], "text"),
                       GetSQLValueString($_POST['DESCRIPTION'], "text"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($insertSQL, $nova_con) or die(mysql_error());

  $insertGoTo = "line_manage.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_nova_con, $nova_con);
$query_Recordset1 = "SELECT * FROM line_tb";
$Recordset1 = mysql_query($query_Recordset1, $nova_con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_nova_con, $nova_con);
$query_des = "SELECT * FROM destination_tb";
$des = mysql_query($query_des, $nova_con) or die(mysql_error());
$row_des = mysql_fetch_assoc($des);
$totalRows_des = mysql_num_rows($des);

mysql_select_db($database_nova_con, $nova_con);
$query_des2 = "SELECT * FROM destination_tb";
$des2 = mysql_query($query_des2, $nova_con) or die(mysql_error());
$row_des2 = mysql_fetch_assoc($des2);
$totalRows_des2 = mysql_num_rows($des2);
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
</style>
</head>

<body>
	<div id="header">																																																																																																																						<div class="inner_copy"><a href="http://ecommercebuilders.blogspot.com/2016/07/shopify-review.html"></a></div>
		<div id="meta"><img src="images/Sudan_240-animated-flag-gifs.gif" width="123" height="59">||</div>
	  <ul id="menu">
			<li><a href="line_manage.php"><strong>رجوع</strong></a></li>
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
		  <h2 align="center">&nbsp;
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
              <table align="center" dir="rtl">
                <tr valign="baseline">
                  <td nowrap align="right">اسم الخط</td>
                  <td><input type="text" name="LINE" value="" size="32" required></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">من</td>
                  <td><select name="FROM">
                    <?php 
do {  
?>
                    <option value="<?php echo $row_des['Destination_NAME']?>" ><?php echo $row_des['Destination_NAME']?></option>
                    <?php
} while ($row_des = mysql_fetch_assoc($des));
?>
                  </select></td>
                <tr>
                <tr valign="baseline">
                  <td nowrap align="right">الى</td>
                  <td><select name="TO">
                    <?php 
do {  
?>
                    <option value="<?php echo $row_des2['Destination_NAME']?>" ><?php echo $row_des2['Destination_NAME']?></option>
                    <?php
} while ($row_des2 = mysql_fetch_assoc($des2));
?>
                  </select></td>
                <tr>
                <tr valign="baseline">
                  <td nowrap align="right">الوصف</td>
                  <td><textarea name="DESCRIPTION" cols="40" rows="5" required></textarea></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">&nbsp;</td>
                  <td><div align="left">
                    <input type="submit" value="اضافة">
                  </div></td>
                </tr>
              </table>
              <input type="hidden" name="MM_insert" value="form1">
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

mysql_free_result($des);

mysql_free_result($des2);
?>
