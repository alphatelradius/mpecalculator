<?php require_once('Connections/epconn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

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
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$pilihskpd_master1renstra2sasaran = "-1";
if (isset($_GET['s'])) {
  $pilihskpd_master1renstra2sasaran = $_GET['s'];
}
mysql_select_db($database_epconn, $epconn);
$query_master1renstra2sasaran = sprintf("SELECT renstra2sasaran.renstra2sasaranId, renstra2sasaran.renstra2sasaranNama, renstra1.skpdId FROM (renstra1 LEFT JOIN renstra2sasaran ON renstra2sasaran.renstra1Id=renstra1.renstra1Id) WHERE renstra1.skpdId=%s", GetSQLValueString($pilihskpd_master1renstra2sasaran, "int"));
$master1renstra2sasaran = mysql_query($query_master1renstra2sasaran, $epconn) or die(mysql_error());
$row_master1renstra2sasaran = mysql_fetch_assoc($master1renstra2sasaran);
$totalRows_master1renstra2sasaran = mysql_num_rows($master1renstra2sasaran);

mysql_select_db($database_epconn, $epconn);
$query_detail2renstra4program = "SELECT * FROM renstra4program WHERE renstra2sasaranId=123456789 AND renstra4program.renstra4programRenja=0 ORDER BY renstra4programId";
$detail2renstra4program = mysql_query($query_detail2renstra4program, $epconn) or die(mysql_error());
$row_detail2renstra4program = mysql_fetch_assoc($detail2renstra4program);
$totalRows_detail2renstra4program = mysql_num_rows($detail2renstra4program);

mysql_select_db($database_epconn, $epconn);
$query_detail3renstra5kegiatan = "SELECT * FROM renstra5kegiatan WHERE renstra4programId = 123456789 AND renstra5kegiatan.renstra5kegiatanRenja IN (0,1,3) ORDER BY renstra5kegiatanId ASC";
$detail3renstra5kegiatan = mysql_query($query_detail3renstra5kegiatan, $epconn) or die(mysql_error());
$row_detail3renstra5kegiatan = mysql_fetch_assoc($detail3renstra5kegiatan);
$totalRows_detail3renstra5kegiatan = mysql_num_rows($detail3renstra5kegiatan);

mysql_select_db($database_epconn, $epconn);
$query_detailindikator = "SELECT renstra3IndikatorId, renstra2sasaranId, renstra3IndikatorNama, renstra3indikator.renstra3IndikatorT1, renstra3indikator.renstra3IndikatorT2, renstra3indikator.renstra3IndikatorT3, renstra3indikator.renstra3IndikatorT4, renstra3indikator.renstra3IndikatorT5 FROM renstra3indikator WHERE renstra2sasaranId=123456789 ORDER BY renstra3IndikatorId";
$detailindikator = mysql_query($query_detailindikator, $epconn) or die(mysql_error());
$row_detailindikator = mysql_fetch_assoc($detailindikator);
$totalRows_detailindikator = mysql_num_rows($detailindikator);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Program & Kegiatan Rencana Strategis Tahun 2015</title>
<meta name="author" content="www.pixelweb.co.id" />
<meta name="description" content="Julfan Wijaya" />
<meta name="keywords" content="ePerformance Kabupaten Karimun" />

<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="custom.css" />
</head>

<body>
<!-- topmenu -->  
<?php include("header.inc.php"); ?>        
<!--/ topmenu -->

<div class="header">
	<div class="container">&nbsp;</div>  
</div>
<div class="header-line"></div>

<div class="middle">
<div class="container">

	<div class="header-title-image">
    	<div class="image"><img src="images/header/header_2.jpg" width="708" height="124" alt="" /></div>
    	<h1>Program & Kegiatan Rencana Strategis Tahun 2015<br />
    	  <?php echo $row_rsSKPDTampil['skpdNama']; ?></h1>
    </div>
    
    <!-- middle content -->
    <div class="container_24">
          <div class="text">
        <div class="grid_24">
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
        
          <tr>
            <th>No</th>
            <th>Sasaran Strategis / Indikator Kinerja</th>
            <th width="35">&nbsp;</th>
            <th>Program</th>
            <th width="35">&nbsp;</th>
            <th>Kegiatan</th>
            <th>Indikator Kegiatan</th>
            <th colspan="5">Target</th>
            </tr>
          <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>2012</th>
            <th>2013</th>
            <th>2014</th>
            <th>2015</th>
            <th>2016</th>
          </tr>
          <?php do { ?>
          <tr>
            <td>&nbsp;</td>
            <td colspan="11" style="font-size:13px;"><strong><?php echo $row_master1renstra2sasaran['renstra2sasaranNama']; ?></strong><br />            </td>
            </tr>
          <?php
  if ($totalRows_master1renstra2sasaran>0) {
    $nested_query_detailindikator = str_replace("123456789", $row_master1renstra2sasaran['renstra2sasaranId'], $query_detailindikator);
    mysql_select_db($database_epconn);
    $detailindikator = mysql_query($nested_query_detailindikator, $epconn) or die(mysql_error());
    $row_detailindikator = mysql_fetch_assoc($detailindikator);
    $totalRows_detailindikator = mysql_num_rows($detailindikator);
    $nested_sw = false;
    if (isset($row_detailindikator) && is_array($row_detailindikator)) {
      do { //Nested repeat
?>
          <tr>
            <td>&nbsp;</td>
            <td colspan="6"><?php echo $row_detailindikator['renstra3IndikatorNama']; ?></td>
            <td><?php echo $row_detailindikator['renstra3IndikatorT1']; ?></td>
            <td><?php echo $row_detailindikator['renstra3IndikatorT2']; ?></td>
            <td><?php echo $row_detailindikator['renstra3IndikatorT3']; ?></td>
            <td><?php echo $row_detailindikator['renstra3IndikatorT4']; ?></td>
            <td><?php echo $row_detailindikator['renstra3IndikatorT5']; ?></td>
          </tr>
          <?php
      } while ($row_detailindikator = mysql_fetch_assoc($detailindikator)); //Nested move next
    }
  }
?>
          <?php
  if ($totalRows_master1renstra2sasaran>0) {
    $nested_query_detail2renstra4program = str_replace("123456789", $row_master1renstra2sasaran['renstra2sasaranId'], $query_detail2renstra4program);
    mysql_select_db($database_epconn);
    $detail2renstra4program = mysql_query($nested_query_detail2renstra4program, $epconn) or die(mysql_error());
    $row_detail2renstra4program = mysql_fetch_assoc($detail2renstra4program);
    $totalRows_detail2renstra4program = mysql_num_rows($detail2renstra4program);
    $nested_sw = false;
    if (isset($row_detail2renstra4program) && is_array($row_detail2renstra4program)) {
      do { //Nested repeat
?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="renstra-program-olahdata-edit.php?s=<?php echo $_GET['s']; ?>&amp;pid=<?php echo $row_detail2renstra4program['renstra4programId']; ?>"><img src="images/edit_16.png" /></a> <a href="renstra-program-olahdata-hapus.php?s=<?php echo $_GET['s']; ?>&amp;pid=<?php echo $row_detail2renstra4program['renstra4programId']; ?>"><img src="images/close_16.png" /></a></td>
            <td colspan="9"><?php echo $row_detail2renstra4program['renstra4programNama']; ?></td>
            </tr>
          <?php
  if ($totalRows_detail2renstra4program>0) {
    $nested_query_detail3renstra5kegiatan = str_replace("123456789", $row_detail2renstra4program['renstra4programId'], $query_detail3renstra5kegiatan);
    mysql_select_db($database_epconn);
    $detail3renstra5kegiatan = mysql_query($nested_query_detail3renstra5kegiatan, $epconn) or die(mysql_error());
    $row_detail3renstra5kegiatan = mysql_fetch_assoc($detail3renstra5kegiatan);
    $totalRows_detail3renstra5kegiatan = mysql_num_rows($detail3renstra5kegiatan);
    $nested_sw = false;
    if (isset($row_detail3renstra5kegiatan) && is_array($row_detail3renstra5kegiatan)) {
      do { //Nested repeat
?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="renstra-program-olahdata-kegiatan-edit.php?s=<?php echo $_GET['s']; ?>&amp;kid=<?php echo $row_detail3renstra5kegiatan['renstra5kegiatanId']; ?>"><img src="images/edit_16.png" /></a> <a href="renstra-program-olahdata-kegiatan-hapus.php?s=<?php echo $_GET['s']; ?>&amp;kid=<?php echo $row_detail3renstra5kegiatan['renstra5kegiatanId']; ?>"><img src="images/close_16.png" /></a></td>
            <td><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanNama']; ?></td>
            <td><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanIndikator']; ?></td>
            <td><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT1']; ?> <?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT1Satuan']; ?></td>
            <td><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT2']; ?> <?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT2Satuan']; ?></td>
            <td><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT3']; ?> <?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT3Satuan']; ?></td>
            <td><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT4']; ?> <?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT4Satuan']; ?></td>
            <td><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT5']; ?> <?php echo $row_detail3renstra5kegiatan['renstra5kegiatanT5Satuan']; ?></td>
          </tr>
          <?php
      } while ($row_detail3renstra5kegiatan = mysql_fetch_assoc($detail3renstra5kegiatan)); //Nested move next
    }
  }
?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="renstra-kegiatan-olahdata-tambah.php?s=<?php echo $_GET['s']; ?>&amp;pid=<?php echo $row_detail2renstra4program['renstra4programId']; ?>"><img src="images/tambah-kegiatan.png" width="106" height="26" /></a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <?php
      } while ($row_detail2renstra4program = mysql_fetch_assoc($detail2renstra4program)); //Nested move next
    }
  }
?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="renstra-program-olahdata-tambah.php?s=<?php echo $_GET['s']; ?>&amp;sid=<?php echo $row_master1renstra2sasaran['renstra2sasaranId']; ?>"><img src="images/tambah-program.png" width="106" height="26" /></a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <?php } while ($row_master1renstra2sasaran = mysql_fetch_assoc($master1renstra2sasaran)); ?>
        </table>
        
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="divider_space"></div>
        
      </div> 
      <div class="clear"></div>
	</div>
  <!--/ middle content --></div>
</div>

<?php include("footer.inc.php"); ?>

</body>
</html>
<?php
mysql_free_result($master1renstra2sasaran);

mysql_free_result($detail2renstra4program);

mysql_free_result($detail3renstra5kegiatan);

mysql_free_result($detailindikator);
?>