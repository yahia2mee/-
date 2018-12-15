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
  $insertSQL = sprintf("INSERT INTO admin_tb (USERNAME, PASSWORD) VALUES (%s, %s)",
                       GetSQLValueString($_POST['USERNAME'], "text"),
                       GetSQLValueString($_POST['PASSWORD'], "text"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($insertSQL, $nova_con) or die(mysql_error());
}

mysql_select_db($database_nova_con, $nova_con);
$query_Recordset1 = "SELECT * FROM admin_tb";
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
			<li><a href="admin_home.html"><strong>رجوع</strong></a></li>
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
			<h2 align="center">إدارة المستخدمين</h2>
			<div align="center">
			  <table width="591" border="1">
			    <tr>
			      <td width="66" nowrap bgcolor="#0099CC"><div align="center"><strong>حذف</strong></div></td>
			      <td width="66" nowrap bgcolor="#0099CC"><div align="center"><strong>تعديل</strong></div></td>
			      <td width="227" nowrap bgcolor="#0099CC"><div align="center"><strong>كلمة المرور</strong></div></td>
			      <td width="204" nowrap bgcolor="#0099CC"><div align="center"><strong>اسم المستخدم</strong></div></td>
		        </tr>
			    <tr>
			      <?php do { ?>
			        <td nowrap><div align="center"><a href="del_user.php?noo=<?php echo $row_Recordset1['ID']; ?>"><img src="images/delete_selected.png" width="39" height="27"></a></div></td>
			        <td nowrap><div align="center"><a href="user_update.php?noo=<?php echo $row_Recordset1['ID']; ?>"><img src="images/update.png" width="36" height="28"></a></div></td>
			        <td nowrap><div align="center"><?php echo $row_Recordset1['PASSWORD']; ?></div></td>
			        <td nowrap><div align="center"><?php echo $row_Recordset1['USERNAME']; ?></div></td>
			       </tr>
                    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
		        
		      </table>
		  </div>
			<p align="center">&nbsp;</p>
			<p align="center"><strong>إضافة مستخدم			</strong></p>
			<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
              <div align="center">
                <table align="center" dir="rtl">
                  <tr valign="baseline">
                    <td nowrap align="right">اسم المستخدم</td>
                    <td><input type="text" name="USERNAME" value="" size="32" required></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">كلمة المرور</td>
                    <td><input type="text" name="PASSWORD" value="" size="32" required></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td><div align="left">
                      <input type="submit" value="اضافة">
                    </div></td>
                  </tr>
                </table>
                <input type="hidden" name="MM_insert" value="form1">
              </div>
          </form>
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
?>
