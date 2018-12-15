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

$colname_Recordset1 = "-1";
if (isset($_POST['name'])) {
  $colname_Recordset1 = $_POST['name'];
}
mysql_select_db($database_nova_con, $nova_con);
$query_Recordset1 = sprintf("SELECT * FROM fly_tb WHERE FLY_DATE = %s", GetSQLValueString($colname_Recordset1, "text"));
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
			<li><a href="view_fly.php"><strong>رجوع</strong></a></li>
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
		  <div align="center">
            <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
<table width="367" border="0">
          <tr>
            <td><h1 align="right">عذراً لاتوجد نتائج</h1></td>
          </tr>
          </table>
<?php } // Show if recordset empty ?>
          </div>
		  <div align="center"></div>
          <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
            <table width="750" border="1">
              <tr>
                <td width="42" nowrap bgcolor="#0066FF"><div align="center">
                  <h3><strong>عرض</strong></h3>
                </div></td>
                <td width="186" nowrap bgcolor="#0066FF"><div align="center">
                  <h3><strong>الى</strong></h3>
                </div></td>
                <td width="200" nowrap bgcolor="#0066FF"><div align="center">
                  <h3><strong>من </strong></h3>
                </div></td>
                <td width="201" nowrap bgcolor="#0066FF"><div align="center">
                  <h3><strong>رقم الرحلة</strong></h3>
                </div></td>
              </tr>
              <tr>
                <?php do { ?>
                  <td nowrap><div align="center"><a href="view_all_fly2.php?noo=<?php echo $row_Recordset1['ID']; ?>"><img src="images/secondary_msg_file.png" width="33" height="30"></a></div></td>
                  <td nowrap><div align="center"><?php echo $row_Recordset1['TO']; ?></div></td>
                  <td nowrap><div align="center"><?php echo $row_Recordset1['FROM']; ?></div></td>
                  <td nowrap><div align="center"><?php echo $row_Recordset1['FLY_NO']; ?></div></td>
                 </tr>
                  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
              
            </table>
            <?php } // Show if recordset not empty ?>
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
