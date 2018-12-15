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
  $updateSQL = sprintf("UPDATE costumer_tb SET COSTUMER_NAME=%s, NATIONALITY=%s, NAT_TYPE=%s, ID_NO=%s, ADDRESS=%s, PHONE=%s, EMAIL=%s, JOB=%s WHERE ID=%s",
                       GetSQLValueString($_POST['COSTUMER_NAME'], "text"),
                       GetSQLValueString($_POST['NATIONALITY'], "text"),
                       GetSQLValueString($_POST['NAT_TYPE'], "text"),
                       GetSQLValueString($_POST['ID_NO'], "int"),
                       GetSQLValueString($_POST['ADDRESS'], "text"),
                       GetSQLValueString($_POST['PHONE'], "int"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['JOB'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($updateSQL, $nova_con) or die(mysql_error());

  $updateGoTo = "member_home2.php";
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
$query_Recordset1 = sprintf("SELECT * FROM costumer_tb WHERE ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $nova_con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>نوفا للطيران</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
.تت {
	color: #808000;
}
</style>
</head>

<body>
	<div id="header">																																																																																																																						<div class="inner_copy"><a href="http://ecommercebuilders.blogspot.com/2016/07/shopify-review.html"></a></div>
		<div id="meta"><img src="images/Sudan_240-animated-flag-gifs.gif" width="123" height="59">||</div>
	  <ul id="menu">
			<li><a href="member_home2.php?noo=<?php echo $row_Recordset1['ID']; ?>"><strong>رجوع</strong></a></li>
			<li></li>                                             
			<li></li>
			<li></li>
			<li></li>                                                                                                                                                                                                                                                                                                                                                
		</ul>
		<ul id="forum">
			<li></li>
		</ul>
	</div>
	<div id="wrapper">																																																																																																																								<div class="inner_copy"><a href="http://www.bestfreetemplates.info/builders.php">Top 10 Free Website Builders - Bestfreetemplates.info</a></div>
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
			<h2 align="center">
            
           <?php
		   $_POST['name'] = $row_Recordset1['COSTUMER_ID'];
		   ?>
              <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                <table align="center" dir="rtl">
                  <tr valign="baseline">
                    <td nowrap align="right">الاسم</td>
                    <td><input type="text" name="COSTUMER_NAME" value="<?php echo htmlentities($row_Recordset1['COSTUMER_NAME'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">الجنسية</td>
                    <td><input type="text" name="NATIONALITY" value="<?php echo htmlentities($row_Recordset1['NATIONALITY'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">نوع الهوية</td>
                    <td><input type="text" name="NAT_TYPE" value="<?php echo htmlentities($row_Recordset1['NAT_TYPE'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">رقم الهوية</td>
                    <td><input type="text" name="ID_NO" value="<?php echo htmlentities($row_Recordset1['ID_NO'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right" valign="top">العنوان</td>
                    <td><textarea name="ADDRESS" cols="50" rows="5"><?php echo htmlentities($row_Recordset1['ADDRESS'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">الهاتف</td>
                    <td><input type="text" name="PHONE" value="<?php echo htmlentities($row_Recordset1['PHONE'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">البريد الالكتروني</td>
                    <td><input type="text" name="EMAIL" value="<?php echo htmlentities($row_Recordset1['EMAIL'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">الوظيفة</td>
                    <td><input type="text" name="JOB" value="<?php echo htmlentities($row_Recordset1['JOB'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td><label for="textfield"></label></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td><div align="left">
                      <input type="submit" value="تعديل" id="name">
                    </div></td>
                  </tr>
                </table>
                <input type="hidden" name="MM_update" value="form1">
                <input type="hidden" name="ID" value="<?php echo $row_Recordset1['ID']; ?>">
                
              </form>
              <p>&nbsp;</p>
&nbsp;
<p>&nbsp;</p>
            </h2>
		</div>
	</div>
	<div id="footer">																																																																																																																																																																																	<div class="inner_copy"><</div>
		<div></div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
