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
if (isset($_GET['noo'])) {
  $colname_Recordset1 = $_GET['noo'];
}
mysql_select_db($database_nova_con, $nova_con);
$query_Recordset1 = sprintf("SELECT * FROM costumer_tb WHERE COSTUMER_ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $nova_con) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['noo'])) {
  $colname_Recordset2 = $_GET['noo'];
}
mysql_select_db($database_nova_con, $nova_con);
$query_Recordset2 = sprintf("SELECT * FROM book_tb WHERE COSTUMER_ID = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $nova_con) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تذكرة</title>
<style type="text/css">
.ا {
	color: #FFF;
}
.ت {
	color: #F00;
}
</style>
</head>

<body>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<div align="center">
  <table width="613" border="0">
    <tr>
      <td colspan="4" bgcolor="#00CCCC"><div align="center">
        <h3><img src="images/O9.png" width="390" height="52" /></h3>
      </div></td>
      <td bgcolor="#FF0000"><div align="center" class="ا"><strong>نوفا للطيران</strong></div></td>
    </tr>
    <tr>
      <td colspan="5" bgcolor="#00CCCC"><div align="center">ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFF99">&nbsp;</td>
      <td colspan="2" bgcolor="#3399FF"><div align="right"><?php echo $row_Recordset1['COSTUMER_NAME']; ?></div></td>
      <td width="81" bgcolor="#33CCFF"><div align="right"><strong>اسم العميل</strong></div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFF99"><div align="right"><?php echo $row_Recordset2['AMOUNT']; ?></div></td>
      <td width="83" bgcolor="#00CCCC"><div align="center"><strong>نوع الحجز</strong></div></td>
      <td width="215" bgcolor="#3399FF"><div align="right"><?php echo $row_Recordset2['FLY_NO']; ?></div></td>
      <td bgcolor="#33CCFF"><div align="right"><strong>رقم الرحلة</strong></div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFF99"><div align="right"><?php echo $row_Recordset2['BOOK_STATE']; ?></div></td>
      <td bgcolor="#00CCCC"><div align="center"><strong>حالة الحجز</strong></div></td>
      <td bgcolor="#3399FF"><div align="right"><?php echo $row_Recordset2['BOOK_LEVEL']; ?></div></td>
      <td bgcolor="#33CCFF"><div align="right"><strong>مستوى الحجز</strong></div></td>
    </tr>
    <tr>
      <td width="117" rowspan="3" bgcolor="#FFFF99"><div align="center">
      
      <?php

include"qrcode/phpqrcode.php";
 
$co_id = $row_Recordset2['COSTUMER_ID'];
 $name= $row_Recordset1['COSTUMER_NAME'];
  $bok =  $row_Recordset2['BOOK_NO'];
  $flw =  $row_Recordset2['FLY_NO'];
	$state = $row_Recordset2['BOOK_STATE'];
	$dte = $row_Recordset2['BOOK_DATE'];

    // انشاء البيانات
   
    $codeContents  = 'نوفا للطيران'."\n";
	$codeContents .= 'اسم العميل:  ' .$name. "\n";
    $codeContents .= 'رقم الحجز: ' .$bok. "\n";
	$codeContents .= 'حالة الحجز:  ' .$state. "\n";
		
$errorCorrectionLevel = 'H';
$matrixPointSize = 2;
QRcode::png(
$codeContents ,'qrcode2/filename.png',$errorCorrectionLevel,$matrixPointSize,1); 

echo "<img src='qrcode2/filename.png' alt='' />";  
?>
      
      
      </div>        <div align="center"></div></td>
      <td width="83" bgcolor="#FFFF99">&nbsp;</td>
      <td colspan="2" bgcolor="#FFFF99"><div align="right"><?php echo date ('y/m/d') ?></div></td>
      <td bgcolor="#33CCFF"><div align="right"><strong>تاريخ التذكرة</strong></div></td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#00CCCC"><div align="center">ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</div></td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#00CCCC"><div align="center" class="ت"><strong>في حال عدم تأكيد الحجز لا تعتمد التذكرة</strong></div></td>
    </tr>
  </table>
  <p><a href="member_home3.php?noo=<?php echo $row_Recordset2['COSTUMER_ID']; ?>">عودة</a></p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
