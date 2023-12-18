<?php
include "config/config.php";
include ROOT."/include/function.php";
if (!isset($_SESSION)) session_start();
spl_autoload_register("loadClass");
$db= new Db();
$cart = new Cart();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database!</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<table width="90%" border="1" align="center">
  <tr>
    <td colspan="3"><?php
    include "include/header.php";
	?></td>
  </tr>
  <tr>
    <td width="29%" valign="top">
   
			<div class='boxleft'><?php
			?>
            </div>
            <div class='boxleft'>
            </div>
	</td>
    <td width="42%" valign="top">
    	<?php
			
			include "mod.php";
			
			?>
    </td>
    <!-- hien thi chi tiet san pham-->
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

</body>
</html>