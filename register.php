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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO costumer_tb (COSTUMER_ID, COSTUMER_NAME, NATIONALITY, NAT_TYPE, ID_NO, ADDRESS, PHONE, NATIONAL_ID, EMAIL, JOB, USERNAME, PASSWORD) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['COSTUMER_ID'], "int"),
                       GetSQLValueString($_POST['COSTUMER_NAME'], "text"),
                       GetSQLValueString($_POST['NATIONALITY'], "text"),
                       GetSQLValueString($_POST['NAT_TYPE'], "text"),
                       GetSQLValueString($_POST['ID_NO'], "int"),
                       GetSQLValueString($_POST['ADDRESS'], "text"),
                       GetSQLValueString($_POST['PHONE'], "int"),
                       GetSQLValueString($_POST['NATIONAL_ID'], "text"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['JOB'], "text"),
                       GetSQLValueString($_POST['USERNAME'], "text"),
                       GetSQLValueString($_POST['PASSWORD'], "text"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($insertSQL, $nova_con) or die(mysql_error());

  $insertGoTo = "register-don.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_nova_con, $nova_con);
$query_Recordset1 = "SELECT * FROM costumer_tb";
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
<style type="text/css">
.تت {
	color: #808000;
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
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
	<div id="wrapper">																																																																																																																								<div class="inner_copy"><a href="http://www.bestfreetemplates.info/builders.php">Top 10 Free Website Builders - Bestfreetemplates.info</a></div>
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
			<h2 align="center">&nbsp;
              
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
   //// $query = mysql_query("SELECT studentno FROM studentreg WHERE studentno = $id");
   // $num_rows = mysql_num_rows($query);
//}
// النهاية 
?>
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
                <table align="center" dir="rtl">
                  <tr valign="baseline">
                    <td width="94" align="right" nowrap>رقم العميل</td>
                    <td colspan="2"><div align="right">
                      <h6><span id="sprytextfield1">
                        <input type="text" name="COSTUMER_ID" value="<?php echo $id ?>" size="32" required>
                      <span class="textfieldRequiredMsg">الرجاء ادخال الرقم</span></span><span class="تت">الرجاء الاحتفاظ بهذا الرقم</span></h6>
                    </div></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">اسم العميل</td>
                    <td width="255"><span id="sprytextfield2">
                      <input type="text" name="COSTUMER_NAME" value="" size="32" onKeyPress="return istext(event)" required>
                    <span class="textfieldRequiredMsg">الرجاء ادخال الاسم.</span></span></td>
                    <td width="12">&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">الجنسية</td>
                    <td><span id="sprytextfield3">
                      <input type="text" name="NATIONALITY" value="" size="32"  required>
                    <span class="textfieldRequiredMsg">الرجاء ادخال الجنسية</span></span></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">نوع الهوية</td>
                    <td><span id="sprytextfield4">
                      <input type="text" name="NAT_TYPE" value="" size="32"  required>
                    <span class="textfieldRequiredMsg">الرجاء ادخال نوع الهوية</span></span></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">رقم الهوية</td>
                    <td><span id="sprytextfield5">
                      <input type="text" name="ID_NO" value="" size="32" onKeyPress="return isNumber(event)"  required>
                    <span class="textfieldRequiredMsg">الرجاء ادخال رقم الهوية</span></span></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right" valign="top">العنوان</td>
                    <td><span id="sprytextarea1">
                      <textarea name="ADDRESS" cols="40" rows="5"  required></textarea>
                    <span class="textareaRequiredMsg">الرجاء ادخال العنوان</span></span></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">الهاتف</td>
                    <td><span id="sprytextfield6">
                      <input type="text" name="PHONE" value="" size="32" onKeyPress="return isNumber(event)" required>
                    <span class="textfieldRequiredMsg">الرجاء ادخال الهاتف</span></span></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">البريد الإلكتروني</td>
                    <td><span id="sprytextfield8">
                      <input type="text" name="EMAIL" value="" size="32"  required>
                    <span class="textfieldRequiredMsg">الرجاء ادخال البريد الالكتروني</span></span></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">الوظيفة</td>
                    <td><input type="text" name="JOB" value="" size="32"  required></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td><div align="left">
                      <input type="submit" value="تسجيل">
                    </div></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <input type="hidden" name="MM_insert" value="form1">
              </form>
              <p>&nbsp;</p>
            </h2>
		</div>
	</div>
	<div id="footer">																																																																																																																																																																																	<div class="inner_copy"><</div>
		<div></div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
