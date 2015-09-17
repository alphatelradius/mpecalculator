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
$query_detail2renstra4program = "SELECT * FROM renstra4program WHERE renstra2sasaranId=123456789 ORDER BY renstra4programId";
$detail2renstra4program = mysql_query($query_detail2renstra4program, $epconn) or die(mysql_error());
$row_detail2renstra4program = mysql_fetch_assoc($detail2renstra4program);
$totalRows_detail2renstra4program = mysql_num_rows($detail2renstra4program);

mysql_select_db($database_epconn, $epconn);
$query_detail3renstra5kegiatan = "SELECT * FROM renstra5kegiatan WHERE renstra4programId = 123456789 AND renstra5kegiatan.renstra5kegiatanRenja != 3 ORDER BY renstra5kegiatanId ASC";
$detail3renstra5kegiatan = mysql_query($query_detail3renstra5kegiatan, $epconn) or die(mysql_error());
$row_detail3renstra5kegiatan = mysql_fetch_assoc($detail3renstra5kegiatan);
$totalRows_detail3renstra5kegiatan = mysql_num_rows($detail3renstra5kegiatan);

mysql_select_db($database_epconn, $epconn);
$query_detailindikator = "SELECT * FROM renstra3indikator WHERE renstra2sasaranId = 123456789 ORDER BY renstra3IndikatorId ASC";
$detailindikator = mysql_query($query_detailindikator, $epconn) or die(mysql_error());
$row_detailindikator = mysql_fetch_assoc($detailindikator);
$totalRows_detailindikator = mysql_num_rows($detailindikator);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Realisasi Perencanaan Kegiatan Tahun 2015 - ePerformance Kabupaten Karimun</title>
<meta name="author" content="www.pixelweb.co.id" />
<meta name="description" content="Julfan Wijaya" />
<meta name="keywords" content="ePerformance Kabupaten Karimun" />
<link rel="stylesheet" type="text/css" href="styles-laporan.css" />
</head>

<body>
<?php include("header-laporan.inc.php"); ?>
<h1> Progam &amp; Kegiatan Renstra 2011 - 2016<br /> 
<?php echo $row_rsUcapan['skpdNama']; ?></h1> 

<table width="100%" border="1" cellspacing="0" cellpadding="0">
        
          <tr>
            <th>No</th>
            <th>Sasaran Strategis / Indikator Kinerja</th>
            <th>No</th>
            <th>Program</th>
            <th>No</th>
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
            <td>x1</td>
            <td><strong><?php echo $row_master1renstra2sasaran['renstra2sasaranNama']; ?></strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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
            <td>x1.1</td>
            <td><?php echo $row_detailindikator['renstra3IndikatorNama']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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
            <td>xx</td>
            <td><?php echo $row_detail2renstra4program['renstra4programNama']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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
          <?php
			$statusrenja = $row_detail3renstra5kegiatan['renstra5kegiatanRenja'];
			if ($statusrenja == "0") {
				$halaman = "renstra";
				$warnaprogram = "#FFFFFF";
				$warnakegiatan = "#FFFFFF";
			} elseif ($statusrenja == "2") {
				$halaman = "renstra";
				$warnaprogram = "#FFFFFF";
				$warnakegiatan = "#FFFFFF";
			} else {
				$halaman = "renja";
				$warnaprogram = "#FFEAEA";
				$warnakegiatan = "#FFEAEA";
			}
			?>              
            <tr bgcolor="<?php echo $warnakegiatan; ?>">
              <td rowspan="4" bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            <td rowspan="4" bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            <td rowspan="4" bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            <td rowspan="4" bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            <td rowspan="4" bgcolor="<?php echo $warnakegiatan; ?>">xx</td>
            <td rowspan="4" bgcolor="<?php echo $warnakegiatan; ?>"><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanNama']; ?></td>
            <td rowspan="4" bgcolor="<?php echo $warnakegiatan; ?>"><?php echo $row_detail3renstra5kegiatan['renstra5kegiatanIndikator']; ?></td>
            <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            </tr>
            <tr bgcolor="<?php echo $warnakegiatan; ?>">
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            </tr>
            <tr bgcolor="<?php echo $warnakegiatan; ?>">
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            </tr>
            <tr bgcolor="<?php echo $warnakegiatan; ?>">
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
              <td bgcolor="<?php echo $warnakegiatan; ?>">&nbsp;</td>
            </tr>
          <?php
      } while ($row_detail3renstra5kegiatan = mysql_fetch_assoc($detail3renstra5kegiatan)); //Nested move next
    }
  }
?>
		  <?php
      } while ($row_detail2renstra4program = mysql_fetch_assoc($detail2renstra4program)); //Nested move next
    }
  }
?>
          
          <?php } while ($row_master1renstra2sasaran = mysql_fetch_assoc($master1renstra2sasaran)); ?>
        </table>       


</body>
</html>
<?php
mysql_free_result($master1renstra2sasaran);

mysql_free_result($detail2renstra4program);

mysql_free_result($detail3renstra5kegiatan);

mysql_free_result($detailindikator);
?>