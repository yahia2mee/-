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
$query_Recordset1 = "SELECT * FROM fly_tb";
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
			<li><a href="index.php"><strong>رجوع</strong></a></li>
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
				<div class="title1">البحث عن الرحلات</div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
               
            <link href="stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/jquery/jquery-ui-custom.css" />
<script src="includes/jquery/jquery-1.10.2.js"></script>
<script src="includes/jquery/jquery-ui-custom.js"></script>
<script src="includes/jquery/maskedinput.js"></script>
<script src="includes/bootstrap/js/bootstrap.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script>
  jQuery(document).ready(function($) {var dateToday = new Date();
var dates = $("#name").datepicker({
    defaultDate: "+1w",
	dateFormat: 'yy-mm-dd',
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "name",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker.settings.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
   	 }
	});
});
  </script>   
               
               
               
                <p><form action="view_fly_bydate.php" method="POST">
<center>
  <table width="150" border="0" cellpadding="2" dir="rtl">
    <tr>
      <td colspan="2"><div align="right">اختر التاريخ</div></td>
      </tr>
    <tr>
      <td width="23"><div align="right">
        <input name="name" type="text" class="h30" id="name" size="15" placeholder="اضغط لاختيار التاريخ">
        <input name="name2" type="submit" class="h30" id="name3" value="بحث">
      </div></td>
      <td width="23"><div align="left"></div></td>
    </tr>
    <tr>
      <td>ــــــــــــــــــــــــــــــــــــ</td>
      <td><div align="left"></div></td>
    </tr>
    <tr>
      <td><div align="right">اختر المدينة</div></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
          </td>
      <td>&nbsp;</td>
    </tr>
  </table>
</center>
</form>
      </form>
      <form action="view_fly_bycity.php" method="POST">
<center>
  <table width="180" border="0" cellpadding="2" dir="rtl">
    <tr>
      <td width="41">&nbsp;</td>
      <td width="360"><label for="textfield"></label>
        <label for="select"></label>
        <select name="name" id="name">
          <?php
do {  
?>
          <option value="<?php echo $row_des1['Destination_NAME']?>"><?php echo $row_des1['Destination_NAME']?></option>
          <?php
} while ($row_des1 = mysql_fetch_assoc($des1));
  $rows = mysql_num_rows($des1);
  if($rows > 0) {
      mysql_data_seek($des1, 0);
	  $row_des1 = mysql_fetch_assoc($des1);
  }
?>
        </select>
        <div align="right"></div></td>
      <td width="23"><div align="right">
        <input name="submit" type="submit" class="h30" id="name2" value="بحث">
      </div></td>
    </tr>
  </table>
</center>
</form>
  </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <ul class="contries">
                  <li></li>
                  <li></li>
                  <li></li>
                </ul>
				<img src="images/gbot.gif" alt="" width="191" height="8" />
			</div>
		</div>  
		<div id="big">
		  <div align="center"></div>
		  <div align="center"></div>
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
			    <td nowrap><div align="center"><a href="view_all_fly2.php?noo=<?php echo $row_Recordset1['ID']; ?>"><img src="images/secondary_msg_file.png" width="33" height="30"></a></div></td>
		        <td nowrap><div align="center"><?php echo $row_Recordset1['TO']; ?></div></td>
		        <td nowrap><div align="center"><?php echo $row_Recordset1['FROM']; ?></div></td>
		        <td nowrap><div align="center"><?php echo $row_Recordset1['FLY_NO']; ?></div></td>
			    </tr>
		  </table>
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
