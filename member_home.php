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

$colname_Recordset1 = "-1";
if (isset($_POST['name'])) {
  $colname_Recordset1 = $_POST['name'];
}
mysql_select_db($database_nova_con, $nova_con);
$query_Recordset1 = sprintf("SELECT * FROM costumer_tb WHERE COSTUMER_ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $nova_con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>التسجيل</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="header">																																																																																																																						<div class="inner_copy"><a href="http://ecommercebuilders.blogspot.com/2016/07/shopify-review.html"></a></div>
		<div id="meta"><img src="images/Sudan_240-animated-flag-gifs.gif" width="123" height="59">||</div>
	  <ul id="menu">
			<li><a href="index.php"><strong>الرئيسية</strong></a></li>
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
					<li>
					  <div align="center">
                        <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <table width="120" border="0">
    <tr>
      <td><h3 align="center"><a href="view_mybook.php?noo=<?php echo $row_Recordset1['COSTUMER_ID']; ?>"><strong>قائمة الحجوزات</strong></a></h3>      </td>
      </tr>
    <tr>
      <td><div align="center">ـــــــــــــــــــــــــــــــــــــــــــــ</div></td>
    </tr>
    <tr>
      <td><h3 align="center"><strong><a href="book.php?noo=<?php echo $row_Recordset1['ID']; ?>">الحجز</a></strong></h3>      </td>
    </tr>
    <tr>
      <td><div align="center">ـــــــــــــــــــــــــــــــــــــــــــــ</div></td>
    </tr>
    <tr>
      <td><h3 align="center"><a href="update_register.php?noo=<?php echo $row_Recordset1['ID']; ?>"><strong>تعديل الملف الشخصي</strong></a></h3>      </td>
    </tr>
    </table>
  <?php } // Show if recordset not empty ?>
                      </div>
					</li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<img src="images/gbot.gif" alt="" width="191" height="8" />
			</div>
		</div>  
		<div id="big">
			<div align="center">
              <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
                <table width="370" border="0">
                  <tr>
                    <td width="276" bgcolor="#FFFFCC"><div align="right"><strong><?php echo $row_Recordset1['COSTUMER_NAME']; ?></strong></div></td>
                    <td width="84"><div align="right"><strong>مرحباً بك </strong></div></td>
                  </tr>
                </table>
                <?php } // Show if recordset not empty ?>
            </div>
			<p>&nbsp;</p>
			<div align="center">
              <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
                <table width="422" border="0">
                  <tr>
                    <td width="285" nowrap><div align="right"><strong><?php echo $row_Recordset1['COSTUMER_ID']; ?></strong></div></td>
                    <td width="277" nowrap><div align="right"><strong>عذرا لم يتم التسجيل بالرقم</strong></div></td>
                  </tr>
                </table>
                <?php } // Show if recordset empty ?>
            </div>
			<p>&nbsp;</p>
			<div align="center">
              <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
                <table width="200" border="0">
                  <tr>
                    <td colspan="2" bgcolor="#FFCCCC"><div align="center">
                      <h2 align="right"><strong>بيانات التسجيل الخاصة بك هي</strong></h2>
                    </div></td>
                  </tr>
                  <tr>
                    <td width="624"><div align="right"><strong><?php echo $row_Recordset1['COSTUMER_ID']; ?></strong></div></td>
                    <td width="133" bgcolor="#FFFFCC"><div align="right"><strong>الرقم</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><?php echo $row_Recordset1['NATIONALITY']; ?></strong></div></td>
                    <td bgcolor="#FFFFCC"><div align="right"><strong>الجنسية</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><?php echo $row_Recordset1['NAT_TYPE']; ?></strong></div></td>
                    <td bgcolor="#FFFFCC"><div align="right"><strong>نوع الهوية</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><?php echo $row_Recordset1['ID_NO']; ?></strong></div></td>
                    <td bgcolor="#FFFFCC"><div align="right"><strong>رقم الهوية</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><?php echo $row_Recordset1['ADDRESS']; ?></strong></div></td>
                    <td bgcolor="#FFFFCC"><div align="right"><strong>العنوان</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><?php echo $row_Recordset1['PHONE']; ?></strong></div></td>
                    <td bgcolor="#FFFFCC"><div align="right"><strong>الهاتف</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><?php echo $row_Recordset1['EMAIL']; ?></strong></div></td>
                    <td bgcolor="#FFFFCC"><div align="right"><strong>البريد الالكتروني</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><?php echo $row_Recordset1['JOB']; ?></strong></div></td>
                    <td bgcolor="#FFFFCC"><div align="right"><strong>الوظيفة</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="right"></div></td>
                    <td bgcolor="#FFFFCC"><div align="right"></div></td>
                  </tr>
                </table>
                <?php } // Show if recordset not empty ?>
            </div>
			<h6 align="center"></h6>
			<p align="center">&nbsp;</p>
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
