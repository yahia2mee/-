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
$query_Recordset1 = "SELECT * FROM line_tb";
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
		  <div align="center"></div>
			<h2 align="center"><a href="add_line.php"><strong>اضافة خــط</strong></a></h2>
			<div align="center">
			  <table width="761" border="1">
			    <tr>
			      <td nowrap bgcolor="#0099FF"><div align="center"><strong>حذف</strong></div></td>
			      <td nowrap bgcolor="#0099FF"><div align="center"><strong>تعديل</strong></div></td>
			      <td nowrap bgcolor="#0099FF"><div align="center"><strong>الوصف</strong></div></td>
			      <td nowrap bgcolor="#0099FF"><div align="center"><strong>الى</strong></div></td>
			      <td nowrap bgcolor="#0099FF"><div align="center"><strong>من</strong></div></td>
			      <td nowrap bgcolor="#0099FF"><div align="center"><strong>اسم الخــط</strong></div></td>
		        </tr>
			    <tr>
			      <?php do { ?>
		          <td nowrap><div align="center"><a href="del_line.php?NNN=<?php echo $row_Recordset1['ID']; ?>"><img src="images/delete_selected.png" alt="" width="33" height="30"></a></div></td>
		          <td nowrap><div align="center"><a href="update_line.php?hhh=<?php echo $row_Recordset1['ID']; ?>"><img src="images/update.png" alt="" width="33" height="30"></a></div></td>
		          <td nowrap><div align="center"><?php echo $row_Recordset1['DESCRIPTION']; ?></div></td>
		          <td nowrap><div align="center"><?php echo $row_Recordset1['TO']; ?></div></td>
		          <td nowrap><div align="center"><?php echo $row_Recordset1['FROM']; ?></div></td>
		          <td nowrap><div align="center"><?php echo $row_Recordset1['LINE']; ?></div></td>
			      </tr>
                    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
		        
			  </table>
		  </div>
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
?>
