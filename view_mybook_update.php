<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>

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
  $updateSQL = sprintf("UPDATE book_tb SET BOOK_STATE=%s WHERE ID=%s",
                       GetSQLValueString($_POST['BOOK_STATE'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($updateSQL, $nova_con) or die(mysql_error());

  $updateGoTo = "view_mybook_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$query_Recordset1 = "SELECT * FROM costumer_tb";
$Recordset1 = mysql_query($query_Recordset1, $nova_con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['noo'])) {
  $colname_Recordset2 = $_GET['noo'];
}
mysql_select_db($database_nova_con, $nova_con);
$query_Recordset2 = sprintf("SELECT * FROM book_tb WHERE ID = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $nova_con) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
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
			<li><a href="admin_home.html?noo=<?php echo $row_Recordset1['COSTUMER_ID']; ?>"><strong>رجوع</strong></a></li>
			<li></li>                                             
			<li></li>
			<li></li>
			<li></li>                                                                                                                                                                                                                                                                                                                                                
		</ul>
		<ul id="forum">
			<li></li>
		</ul>
	</div>
	<div id="wrapper">																																																																																																																								
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
		  <div align="center">
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
              <table align="center" dir="rtl">
                <tr valign="baseline">
                  <td nowrap align="right">تأكيد الحجز</td>
                  <td><select name="BOOK_STATE">
                    <option value="مؤكد" <?php if (!(strcmp("مؤكد", htmlentities($row_Recordset2['BOOK_STATE'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>مؤكد</option>
                    <option value="غير مؤكد" <?php if (!(strcmp("غير مؤكد", htmlentities($row_Recordset2['BOOK_STATE'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>غير مؤكد</option>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">&nbsp;</td>
                  <td><div align="left">
                    <input type="submit" value="حفظ">
                  </div></td>
                </tr>
              </table>
              <input type="hidden" name="MM_update" value="form1">
              <input type="hidden" name="ID" value="<?php echo $row_Recordset2['ID']; ?>">
            </form>
            <p>&nbsp;</p>
          </div>
			<h2 align="center">
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
mysql_free_result($Recordset2);
?>
