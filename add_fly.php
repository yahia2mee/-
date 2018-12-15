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
  $insertSQL = sprintf("INSERT INTO fly_tb (FLY_NO, `FROM`, `TO`, SITE_NO1, SITE_NO2, SITE_NO3, PLANE_TYPE, AIRPORT_FROM, AIRPORT_TO, FLY_DATE, LINE, price_l1, price_l2, price_l3) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['FLY_NO'], "text"),
                       GetSQLValueString($_POST['FROM'], "text"),
                       GetSQLValueString($_POST['TO'], "text"),
                       GetSQLValueString($_POST['SITE_NO1'], "int"),
                       GetSQLValueString($_POST['SITE_NO2'], "int"),
                       GetSQLValueString($_POST['SITE_NO3'], "int"),
                       GetSQLValueString($_POST['PLANE_TYPE'], "text"),
                       GetSQLValueString($_POST['AIRPORT_FROM'], "text"),
                       GetSQLValueString($_POST['AIRPORT_TO'], "text"),
                       GetSQLValueString($_POST['FLY_DATE'], "text"),
                       GetSQLValueString($_POST['LINE'], "text"),
                       GetSQLValueString($_POST['price_l1'], "int"),
                       GetSQLValueString($_POST['price_l2'], "int"),
                       GetSQLValueString($_POST['price_l3'], "int"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($insertSQL, $nova_con) or die(mysql_error());

  $insertGoTo = "fly_manage.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
#wrapper #big div form table tr td {
	color: #000;
}
#wrapper #big form table tr td {
	color: #000;
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
		  <h2 align="center">&nbsp;</h2>
			<div align="center"></div>
           <?php 
// دالة توليد الرقم العشوائي
function createID() {
    for ($i = 1; $i <= 5; $i++) {
        $id = rand(0,1900);
    }
    return $id;
}
// توليد الرقم
$id = createID();
// الاتصال بقاعدة البيانات
//mysql_connect("localhost", "root", "");
//mysql_select_db("highschool");
//$query = mysql_query("SELECT studentno FROM studentreg WHERE studentno = $id");
//$num_rows = mysql_num_rows($query);

// التحقق من عدم مطابقة الرقم المولد بقاعدة البيانات
//while($num_rows > 0) {
    // توليد الرقم
    $id = createID();
   // $query = mysql_query("SELECT studentno FROM studentreg WHERE studentno = $id"); 
  //  $num_rows = mysql_num_rows($query);
//}
// النهاية 
?> 
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
			
           <script>
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		<?php 
$PHPtext = "هذا الحقل يقبل أرقام فقط";
?>
var JavaScriptAlert = <?php echo json_encode($PHPtext); ?>;
alert(JavaScriptAlert); 
        return false;
    }
    return true;
}
</script>
        <script>
            function istext(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return true;
    }
			<?php 
$PHPtext = "هذا الحقل يقبل حروف فقط";
?>
var JavaScriptAlert = <?php echo json_encode($PHPtext); ?>;
alert(JavaScriptAlert); 
    return false;
}
</script> 
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
              <div align="center">
                <table width="449" height="357" align="center" dir="rtl">
                  <tr valign="baseline">
                    <td width="139" height="31" align="right" nowrap>رقم الرحلة</td>
                    <td colspan="4"><input type="text" name="FLY_NO" value="<?php echo $id ?>" size="25" required></td>
                  </tr>
                  <tr valign="baseline">
                    <td height="30" align="right" nowrap>من</td>
                    <td colspan="4"><select name="FROM">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_des1['Destination_NAME']?>" ><?php echo $row_des1['Destination_NAME']?></option>
                      <?php
} while ($row_des1 = mysql_fetch_assoc($des1));
?>
                    </select></td>
                  <tr>
                  <tr valign="baseline">
                    <td height="30" align="right" nowrap>الى</td>
                    <td colspan="4"><select name="TO">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_des2['Destination_NAME']?>" ><?php echo $row_des2['Destination_NAME']?></option>
                      <?php
} while ($row_des2 = mysql_fetch_assoc($des2));
?>
                    </select></td>
                  <tr>
                  <tr valign="baseline">
                    <td height="30" align="right" nowrap>عدد مقاعد الدرجة الاولى</td>
                    <td width="112"><input type="text" name="SITE_NO1" value="" size="15" onKeyPress="return isNumber(event)" required></td>
                    <td width="90"><div align="left">سعر المقعد</div></td>
                    <td width="61"><input type="text" name="price_l1" value="" size="10" onKeyPress="return isNumber(event)" required></td>
                    <td width="23">جنيه</td>
                  </tr>
                  <tr valign="baseline">
                    <td height="30" align="right" nowrap>عدد مقاعد الدرجة الثانية</td>
                    <td><input type="text" name="SITE_NO2" value="" size="15" onKeyPress="return isNumber(event)" required></td>
                    <td><div align="left">سعر المقعد</div></td>
                    <td><input type="text" name="price_l2" value="" size="10" onKeyPress="return isNumber(event)" required></td>
                    <td>جنيه</td>
                  </tr>
                  <tr valign="baseline">
                    <td height="31" align="right" nowrap>عدد مقاعد الدرجة الثالثة</td>
                    <td><input type="text" name="SITE_NO3" value="" size="15" onKeyPress="return isNumber(event)" required></td>
                    <td><div align="left">سعر المقعد</div></td>
                    <td><input type="text" name="price_l3" value="" size="10" onKeyPress="return isNumber(event)" required></td>
                    <td>جنيه</td>
                  </tr>
                  <tr valign="baseline">
                    <td height="31" align="right" nowrap>نوع الطائرة</td>
                    <td colspan="4"><input type="text" name="PLANE_TYPE" value="" size="32" required></td>
                  </tr>
                  <tr valign="baseline">
                    <td height="31" align="right" nowrap>مطار الاقلاع</td>
                    <td colspan="4"><input type="text" name="AIRPORT_FROM" value="" size="38" required></td>
                  </tr>
                  <tr valign="baseline">
                    <td height="30" align="right" nowrap>مطار الهبوط</td>
                    <td colspan="4"><input type="text" name="AIRPORT_TO" value="" size="38" required></td>
                  </tr>
                  <tr valign="baseline">
                    <td height="31" align="right" nowrap>تاريخ الرحلة</td>
                    <td colspan="4"><input type="text" name="FLY_DATE" value="" size="32" id="name" placeholder="اضغط لاختيار التاريخ" required></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td colspan="4"><div align="left">
                      <input type="submit" value="اضافة">
                    </div></td>
                  </tr>
                </table>
                <input type="hidden" name="MM_insert" value="form1">
              </div>
          </form>
            <p>&nbsp;</p>
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
