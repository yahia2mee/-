


<?php require_once('Connections/nova_con.php'); ?>
<?php require_once('Connections/nova_con.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO book_tb (BOOK_NO, FLY_NO, COSTUMER_ID, BOOK_LEVEL, BOOK_STATE, BOOK_DATE, AMOUNT, ACCOUNT) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['BOOK_NO'], "int"),
                       GetSQLValueString($_POST['FLY_NO'], "int"),
                       GetSQLValueString($_POST['COSTUMER_ID'], "int"),
                       GetSQLValueString($_POST['BOOK_LEVEL'], "text"),
                       GetSQLValueString($_POST['BOOK_STATE'], "text"),
                       GetSQLValueString($_POST['BOOK_DATE'], "text"),
                       GetSQLValueString($_POST['AMOUNT'], "text"),
                       GetSQLValueString($_POST['ACCOUNT'], "int"));

  mysql_select_db($database_nova_con, $nova_con);
  $Result1 = mysql_query($insertSQL, $nova_con) or die(mysql_error());

  $insertGoTo = "book_tec.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

mysql_select_db($database_nova_con, $nova_con);
$query_books = "SELECT * FROM book_tb";
$books = mysql_query($query_books, $nova_con) or die(mysql_error());
$row_books = mysql_fetch_assoc($books);
$totalRows_books = mysql_num_rows($books);

mysql_select_db($database_nova_con, $nova_con);
$query_flys = "SELECT * FROM fly_tb";
$flys = mysql_query($query_flys, $nova_con) or die(mysql_error());
$row_flys = mysql_fetch_assoc($flys);
$totalRows_flys = mysql_num_rows($flys);
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
           <?php 
// دالة توليد الرقم العشوائي
function createID() {
    for ($i = 1; $i <= 5; $i++) {
        $id = rand(1001,10000);
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
  //  $query = mysql_query("SELECT studentno FROM studentreg WHERE studentno = $id");
 //   $num_rows = mysql_num_rows($query);
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
var dates = $("#mydate").datepicker({
    defaultDate: "+1w",
	dateFormat: 'yy-mm-dd',
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "mydate",
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
              <table align="center" dir="rtl">
                <tr valign="baseline">
                  <td nowrap align="right">رقم الحجز</td>
                  <td><input type="text" name="BOOK_NO" value="<?php echo $id ?>" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">رقم الرحلة</td>
                  <td><input type="text" name="FLY_NO" value="" size="32" onKeyPress="return isNumber(event)"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">رقم العميل</td>
                  <td><input type="text" name="COSTUMER_ID" value="<?php echo $row_Recordset1['COSTUMER_ID']; ?>" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">مستوى الحجز</td>
                  <td><select name="BOOK_LEVEL">
                    <option value="درجة اولى" <?php if (!(strcmp("درجة اولى", ""))) {echo "SELECTED";} ?>>درجة اولى</option>
                    <option value="درجة ثانية" <?php if (!(strcmp("درجة ثانية", ""))) {echo "SELECTED";} ?>>درجة ثانية</option>
                    <option value="درجة ثالثة" <?php if (!(strcmp("درجة ثالثة", ""))) {echo "SELECTED";} ?>>درجة ثالثة</option>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">تاريخ الحجز</td>
                  <td><input type="text" name="BOOK_DATE" value="" size="32" id="mydate"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">نوع الحجز</td>
                  <td><select name="AMOUNT">
                    <option value="ذهاب" <?php if (!(strcmp("ذهاب", ""))) {echo "SELECTED";} ?>>ذهاب</option>
                    <option value="ذهاب وعودة" <?php if (!(strcmp("ذهاب وعودة", ""))) {echo "SELECTED";} ?>>ذهاب وعودة</option>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">رقم الحساب</td>
                  <td><input type="text" name="ACCOUNT" value="" size="32" onKeyPress="return isNumber(event)"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">&nbsp;</td>
                  <td><div align="left">
                    <input type="submit" value="حجز">
                  </div></td>
                </tr>
              </table>
              <input type="hidden" name="BOOK_STATE" value="<?php echo "غير مؤكد" ?>">
              <input type="hidden" name="MM_insert" value="form1">
            </form>
            <p>&nbsp;</p>
          </h2>
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



mysql_free_result($books);

mysql_free_result($flys);
?>
