<?php include_once('php/piute_includes.php'); session_start(); redirectIfNotInRole('hunter', '../not-allowed.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piute Ponds Duck Blind List</title>
<link href="DuckBlindCSS.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
   $blindYear = $_REQUEST['year'];
   $blindList = getAllBlindsByYear($blindYear);
   $season = getSeasonByYear($blindYear);
?>

<h1>Duck Blind List for <?php echo $season->getSeasonTitle() ?></h1>

<table class="duck_blind_list">
  <tr class="duck_blind_list">
      <th class="duck_blind_list">Blind</th>
      <th class="duck_blind_list">Name</th>
      <th class="duck_blind_list">Home Phone</th>
      <th class="duck_blind_list">Work Phone</th>
  </tr>
  <?php
  $previousBlindNumber = 1;
  foreach ($blindList as $oneBlind) {
  	$addSpace = false;
  	$currentBlindNumber = 0+$oneBlind->getBlindNumber();
  	
  	if($oneBlind->getIsPublicHomePhone()=="y") {
  		$displayHomePhone = $oneBlind->getHomePhone();
  	} else {
  		$displayHomePhone = "";
  	}
  	
  	if($oneBlind->getIsPublicWorkPhone()=="y") {
  		$displayWorkPhone = $oneBlind->getWorkPhone();
  	} else {
  		$displayWorkPhone = "";
  	}
  	
  	if($currentBlindNumber !== $previousBlindNumber) {
  		$previousBlindNumber = $currentBlindNumber;
  		$addSpacer = true;
  	} else {
  		$addSpacer = false;
  	}
  ?>
  <?php if($addSpacer) { ?>
     <tr class="duck_blind_list_spacer">
        <td class="duck_blind_list_spacer"></td>
        <td class="duck_blind_list_spacer"></td>
        <td class="duck_blind_list_spacer"></td>
        <td class="duck_blind_list_spacer"></td>
     </tr>
  <?php } ?>
  <tr>
    <td class="duck_blind_list"><?php echo $currentBlindNumber ?></td>
    <td class="duck_blind_list"><?php echo $oneBlind->getName() ?></td>
    <td class="duck_blind_list"><?php echo $displayHomePhone ?></td>
    <td class="duck_blind_list"><?php echo $displayWorkPhone ?></td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>