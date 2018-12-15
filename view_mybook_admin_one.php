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
			<li><a href="view_mybook_admin.php?noo=<?php echo $row_Recordset1['COSTUMER_ID']; ?>"><strong>رجوع</strong></a></li>
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
		    <table width="324" border="0">
		      <tr>
		        <td height="25"><div align="right"><?php echo $row_Recordset2['BOOK_NO']; ?></div></td>
		        <td><div align="right"><strong>رقم الحجز</strong></div></td>
	          </tr>
		      <tr>
		        <td height="26"><div align="right"><?php echo $row_Recordset2['COSTUMER_ID']; ?></div></td>
		        <td><div align="right"><strong>رقم العميل</strong></div></td>
	          </tr>
		      <tr>
		        <td height="27"><div align="right"><?php echo $row_Recordset2['FLY_NO']; ?></div></td>
		        <td><div align="right"><strong>رقم الرحلة</strong></div></td>
	          </tr>
		      <tr>
		        <td height="26"><div align="right"><?php echo $row_Recordset2['BOOK_LEVEL']; ?></div></td>
		        <td><div align="right"><strong>مستوى الحجز</strong></div></td>
	          </tr>
		      <tr>
		        <td height="26"><div align="right"><?php echo $row_Recordset2['BOOK_STATE']; ?></div></td>
		        <td><div align="right"><strong>حالة الحجز</strong></div></td>
	          </tr>
		
		      <tr>
		        <td height="28"><div align="right"><?php echo $row_Recordset2['BOOK_DATE']; ?></div></td>
		        <td><div align="right"><strong>تاريخ الحجز</strong></div></td>
	          </tr>
		      <tr>
		        <td><div align="right"><?php echo $row_Recordset2['ACCOUNT']; ?></div></td>
		        <td><div align="right"><strong>رقم الحساب</strong></div></td>
	          </tr>
	        </table>
		    <p></p>
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
