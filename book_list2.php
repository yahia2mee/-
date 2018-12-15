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
  $updateSQL = sprintf("UPDATE costumer_tb SET book_no=%s, FLY_NO=%s, book_level=%s, book_state=%s WHERE ID=%s",
                       GetSQLValueString($_POST['book_no'], "int"),
                       GetSQLValueString($_POST['FLY_NO'], "int"),
                       GetSQLValueString($_POST['book_level'], "text"),
                       GetSQLValueString($_POST['book_state'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($updateSQL, $nova_con) or die(mysql_error());

  $updateGoTo = "book_tec.php";
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
	<div id="wrapper">																																																																																																																								</div>
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
		    <p>&nbsp;</p>
	      </h2>
		  <div align="center">
		    <table width="362" border="1">
		      <tr>
		        <td>تذكرة مبدئية</td>
		        <td>حالة الحجز</td>
		        <td>مستوى الحجز</td>
		        <td>رقم الرحلة</td>
		        <td>رقم الحجز</td>
	          </tr>
		      <tr>
		        <td>&nbsp;</td>
		        <td><?php echo $row_Recordset1['book_state']; ?></td>
		        <td><?php echo $row_Recordset1['book_level']; ?></td>
		        <td><?php echo $row_Recordset1['FLY_NO']; ?></td>
		        <td><?php echo $row_Recordset1['book_no']; ?></td>
	          </tr>
	        </table>
	      </div>
		  <h2 align="center">
		    <p>&nbsp;</p>
	      </h2>
		  <h2 align="center">&nbsp;</h2>
		  <pre align="center"></pre>
			<h2 align="center">
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
