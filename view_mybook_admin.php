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

mysql_select_db($database_nova_con, $nova_con);
$query_Recordset1 = "SELECT * FROM costumer_tb";
$Recordset1 = mysql_query($query_Recordset1, $nova_con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$query_Recordset1 = "SELECT * FROM costumer_tb";
$Recordset1 = mysql_query($query_Recordset1, $nova_con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_nova_con, $nova_con);
$query_Recordset2 = "SELECT * FROM book_tb";
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
		    <table width="953" border="1">
		      <tr>
		        <td nowrap="nowrap" bgcolor="#FFCCFF"><strong>حذف</strong></td>
		        <td nowrap="nowrap" bgcolor="#FFCCFF"><strong>تأكيد</strong></td>
		        <td nowrap="nowrap" bgcolor="#FFCCFF"><div align="center"><strong>عرض</strong></div></td>
		        <td nowrap="nowrap" bgcolor="#FFCCFF"><div align="center"><strong>حالة الحجز</strong></div></td>
		        <td nowrap="nowrap" bgcolor="#FFCCFF"><div align="center"><strong>مستوى الحجز</strong></div></td>
		        <td nowrap="nowrap" bgcolor="#FFCCFF"><div align="center"><strong>رقم الرحلة</strong></div></td>
		        <td nowrap="nowrap" bgcolor="#FFCCFF"><div align="center"><strong>رقم الحجز</strong></div></td>
	          </tr>
		      <tr>
		        <?php do { ?>
	            <td nowrap="nowrap"><div align="center"><a href="del_book.php?noo=<?php echo $row_Recordset2['ID']; ?>"><img src="images/delete_selected.png" width="30" height="30"></a></div></td>
	            <td nowrap="nowrap"><div align="center"><a href="view_mybook_update.php?noo=<?php echo $row_Recordset2['ID']; ?>"><img src="images/dwcheckyes.png" width="30" height="30"></a></div></td>
	            <td nowrap="nowrap"><div align="center"><a href="view_mybook_admin_one.php?noo=<?php echo $row_Recordset2['ID']; ?>"><img src="images/secondary_msg_file.png" width="29" height="30"></a></div></td>
	            <td nowrap="nowrap"><div align="center"><?php echo $row_Recordset2['BOOK_STATE']; ?></div></td>
	            <td nowrap="nowrap"><div align="center"><?php echo $row_Recordset2['BOOK_LEVEL']; ?></div></td>
	            <td nowrap="nowrap"><div align="center"><?php echo $row_Recordset2['FLY_NO']; ?></div></td>
	            <td nowrap="nowrap"><div align="center"><?php echo $row_Recordset2['BOOK_NO']; ?></div></td>
		          </tr>
                  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
	          
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
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
