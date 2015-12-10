<?php
/*
 * Created on March 5, 2013
 *
 */
require_once(dirname(__FILE__) . '/bagCheckIncludes.php');
session_start();
redirectIfNotInRole('super user', dirname(__FILE__) . '/../not-allowed.php');

$allSpeciesList = getAllSpecies();
$bagCheckInfo = getBagCheckInfo();
$blindList = $bagCheckInfo->getBlindList();
$formattedDate = formatDate($bagCheckInfo->getDate(), "m/d/Y");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bag Load Form</title>

<script language="JavaScript" SRC="../calendar/CalendarPopup.js"></script>
<script language="JavaScript">document.write(getCalendarStyles());</script>

<link href="bagCheck.css" rel="stylesheet" type="text/css" />

<script language="JavaScript">
	function isEmpty(str) {
		return (!str || 0 === str.length);
	}
	function addBlindAction(currentBlindIndex) {
		form=document.getElementById("bag_check_form_id");
		customAction="bagCheckAddBlindAction.php?current_blind_index="+currentBlindIndex;
		form.action=customAction;
		form.submit();
	}
	function addSpeciesAction(currentGroupIndex) {
		form=document.getElementById("bag_check_form_id");
		customAction="bagCheckAddSpeciesAction.php?group_list_index="+currentGroupIndex;
		form.action=customAction;
	    form.submit();
	}
	function saveBlindAction() {
		form=document.getElementById("bag_check_form_id");
		form.action="bagCheckSaveAction.php";
	    form.submit();
	}
	function totalCountForRowAndBlind(blindIndex, rowIndex, groupIndex, maxBlinds, maxSpecies, blindTotalId, rowTotalId) {
		totalCountForRow(rowIndex, groupIndex, maxBlinds, rowTotalId);
		totalCountForBlind(blindIndex, groupIndex, maxSpecies, blindTotalId);
	}
	function totalCountForRow(rowIndex, groupIndex, maxColumns, rowTotalId) {
		var valueLabel;
		var countValue = 0;
		var countElement;
		var countTotal = 0;
		
		/* alert("Blur IT - rowIndex(" + rowIndex + ") group(" + groupIndex + ") maxColumns(" + maxColumns + ") rowTotalId(" + rowTotalId + ")"); */
		
		for(var currentColumn=0; currentColumn<maxColumns; currentColumn++) {
			valueLabel="SPECIES_ID_" + currentColumn + "_" + groupIndex + "_" + rowIndex;
			/* alert(valueLabel); */
			countElement = document.getElementById(valueLabel).value;
			if(isEmpty(countElement)) {
				countElement = 0;
			}
			countTotal+=parseInt(countElement);
			/* alert(countTotal); */
		}

		/* Set the total element value. */
		/* totalId.value=countTotal; */
		totalElement = document.getElementById(rowTotalId);
		totalElement.innerHTML = "Total " + countTotal;
	}
	function totalCountForBlind(blindIndex, groupIndex, maxSpecies, blindTotalId) {
		var valueLabel;
		var countValue = 0;
		var countElement;
		var countTotal = 0;
		
		/* alert("Blind blur IT - blindIndex(" + blindIndex + ") group(" + groupIndex + ") maxSpecies(" + maxSpecies + ") blindTotalId(" + blindTotalId + ")"); */
		
		for(var currentSpecies=0; currentSpecies<maxSpecies; currentSpecies++) {
			valueLabel="SPECIES_ID_" + blindIndex + "_" + groupIndex + "_" + currentSpecies;
			/* alert(valueLabel); */
			countElement = document.getElementById(valueLabel).value;
			if(isEmpty(countElement)) {
				countElement = 0;
			}
			countTotal+=parseInt(countElement);
			/* alert(countTotal); */
		}

		totalElement = document.getElementById(blindTotalId);
		totalElement.innerHTML = "Total " + countTotal;
	}
	function totalHuntersForRow(maxColumns, totalId) {
		var valueLabel;
		var countValue = 0;
		var countElement;
		var countTotal = 0;
		
		/* alert("Hunter blur IT - maxColumns(" + maxColumns + ") totalId(" + totalId + ")"); */
		
		for(var currentColumn=0; currentColumn<maxColumns; currentColumn++) {
			valueLabel="HUNTER_COUNT_" + currentColumn + "_NEW";
			/* alert(valueLabel); */
			countElement = document.getElementById(valueLabel).value;
			if(isEmpty(countElement)) {
				countElement = 0;
			}
			countTotal+=parseInt(countElement);
			/* alert(countTotal); */
		}

		/* Set the total element value. */
		/* totalId.value=countTotal; */
		totalElement = document.getElementById(totalId);
		totalElement.innerHTML = "Total " + countTotal;
		
	}
	function totalCarsForRow(maxColumns, totalId) {
		var valueLabel;
		var countValue = 0;
		var countElement;
		var countTotal = 0;
		
		/* alert("Hunter blur IT - maxColumns(" + maxColumns + ") totalId(" + totalId + ")"); */
				
		for(var currentColumn=0; currentColumn<maxColumns; currentColumn++) {
			valueLabel="CAR_COUNT_" + currentColumn + "_NEW";
			/* alert(valueLabel); */
			countElement = document.getElementById(valueLabel).value;
			if(isEmpty(countElement)) {
				countElement = 0;
			}
			countTotal+=parseInt(countElement);
			/* alert(countTotal); */
		}

		/* Set the total element value. */
		/* totalId.value=countTotal; */
		totalElement = document.getElementById(totalId);
		totalElement.innerHTML = "Total " + countTotal;
		
	}
	function totalHoursForRow(maxColumns, totalId) {
		var valueLabel;
		var countValue = 0;
		var countElement;
		var countTotal = 0;
		
		/* alert("Hunter blur IT - maxColumns(" + maxColumns + ") totalId(" + totalId + ")"); */
				
		for(var currentColumn=0; currentColumn<maxColumns; currentColumn++) {
			valueLabel="NUM_HOURS_" + currentColumn + "_NEW";
			/* alert(valueLabel); */
			countElement = document.getElementById(valueLabel).value;
			if(isEmpty(countElement)) {
				countElement = 0;
			}
			countTotal+=parseInt(countElement);
			/* alert(countTotal); */
		}

		/* Set the total element value. */
		/* totalId.value=countTotal; */
		totalElement = document.getElementById(totalId);
		totalElement.innerHTML = "Total " + countTotal;
		
	}
	function calculateAllTotals() {
		var totalBlinds = <?php echo count($blindList); ?>;
		var totalGroups = <?php echo 0 ?>;
		totalHuntersForRow(totalBlinds, '<?php echo hunterTotalId(); ?>');
		totalCarsForRow(totalBlinds, '<?php echo carTotalId(); ?>');
		totalHoursForRow(totalBlinds, '<?php echo hourTotalId(); ?>');

		<?php
		$blindIndex = 0;
		foreach($blindList as $blind) {
			$listIndex = 0;
			$birdGroupList = $blind->getSpeciesGroupList();
			foreach($birdGroupList as $birdGroup) {
		?>
				/* alert("list index " + "<?php echo $listIndex; ?> <?php echo $blindIndex; ?>"); */
				totalCountForBlind(<?php echo $blindIndex; ?>, <?php echo $listIndex; ?>, <?php echo count($birdGroupList); ?>, '<?php echo blindTotalId($listIndex, $blindIndex); ?>');
		<?php
				$listIndex++;
			}
			$blindIndex++;
		}
		?>
		
		<?php
		$oneBlind = $blindList[0];
		$birdGroupList = $oneBlind->getSpeciesGroupList();
		$listIndex = 0;
		foreach($birdGroupList as $birdGroup) {
			$speciesIndex = 0;
			$speciesList = $birdGroup->getSpeciesList();
			foreach($speciesList as $species) {
		?>
				/* alert("list index " + "<?php echo $listIndex; ?> <?php echo $speciesIndex; ?>"); */
				totalCountForRow(<?php echo $speciesIndex; ?>, <?php echo $listIndex; ?>, <?php echo count($blindList); ?>, '<?php echo speciesTotalId($speciesIndex, $listIndex); ?>');
		<?php
				$speciesIndex++;
			}
			$listIndex++;
		}
		?>
	}
</script>


</head>
<body onload="calculateAllTotals()">
    <SCRIPT LANGUAGE="JavaScript" ID="js18">
        var huntCalendar = new CalendarPopup("HuntCalendarDiv");
        huntCalendar.setCssPrefix("CAL");
    </SCRIPT>

<?php
?>


<h1>Bag Load Form</h1>
<a href="/">Piute Ponds Home Page</a><p>
<a href="bagCheckDaySelect.php">Bag Check</a><p>

<!-- This is the major for for doing all updates. -->
<form id="bag_check_form_id" method="POST" name="bag_check_form" action='bagCheckSaveAction.php'>

<h2 class="count_section_title">Day Information</h2>
<table>
    <tbody>
        <tr>
            <td>Date</td>
            <td><?PHP echo $formattedDate ?></td>
        </tr>
    <tr>
            <td>Area</td>
            <td>
               <input type='hidden' name="<?php echo generateOldIdAtDay("AREA"); ?>" value="<?php echo $bagCheckInfo->getArea(); ?>" />
               <input type='text' name="<?php echo generateNewIdAtDay("AREA"); ?>" value="<?php echo $bagCheckInfo->getArea(); ?>" />
            </td>
        </tr>
        <tr>
        	<td>Note</td>
        	<td>        	
				<input type="hidden" name="<?php echo generateOldIdAtDay("NOTE"); ?>" value="<?php echo $bagCheckInfo->getNote(); ?>" />
        		<textarea class='bc_note' name="<?php echo generateNewIdAtDay("NOTE"); ?>"><?php echo $bagCheckInfo->getNote(); ?></textarea>
        	</td>
        </tr>
    </tbody>
</table>

<h2 class="count_section_title">Hunt Information</h2>
<table class='count_table'>
    <thead>
        <!-- ########################### Add Blind Button ###################### -->
        <tr>
            <th class="count_first_column"></th>
            <?php
            $blindIndex = 0;
            foreach($blindList as $oneBlind) {
            ?>
            <input type='hidden' name='current_blind_index' value='<?php echo $blindIndex; ?>' />
            <td class='count_add'>
				<!-- <input type="submit" name='add_blind' value="Add" /> -->
				<!-- <a href="bagCheckAddBlindAction.php?current_blind_index=<?php echo $blindIndex; ?>">AddLink</a> -->
                <input type="button" value="Add Blind" name="add_blind" onclick="addBlindAction(<?php echo $blindIndex; ?>)" />
            	<!-- <a href="bagCheckAddBlindAction.php?current_blind_index=<?php echo $blindIndex; ?>"><button type="button">Add Blind</button></a> -->
            </td>
            <?php $blindIndex++;
            } ?>
        </tr>
        <!-- ########################### Add Blind Number ###################### -->
        <tr>
            <th class="count_first_column">Blind</th>
            <?php 
            $blindIndex = 0;
            foreach($blindList as $oneBlind) {
            	$oldId = generateOldIdAtBlind("BLIND_NUMBER", $blindIndex);
            	$newId = generateNewIdAtBlind("BLIND_NUMBER", $blindIndex);
            	$value = $oneBlind->getBlindNumber();
            ?>
            <th class='count'>
               <input type='hidden' name="<?php echo $oldId; ?>" value='<?php echo $value; ?>' />
               <input class="count_input" type='text' name='<?php echo $newId; ?>' id='<?php echo $newId; ?>' value='<?php echo bagCheckDisplayValue($value); ?>'/>
            </th>
            <?php $blindIndex++;
            } ?>
        </tr>
    </thead>
    <tbody>
        <!-- ########################### Hunter Count ###################### -->
        <tr>
            <td class="count_first_column">No. Hunters Checked</td>
            <?php
            $blindIndex = 0;
            foreach($blindList as $oneBlind) {
				$oldId = generateOldIdAtBlind("HUNTER_COUNT", $blindIndex);
				$newId = generateNewIdAtBlind("HUNTER_COUNT", $blindIndex);
				$value = $oneBlind->getNumHunters();
			?>
			<td class='count'>
            	<input type='hidden' name="<?php echo $oldId; ?>" value='<?php echo $value; ?>' />
               <input class="count_input" type='text' name='<?php echo $newId; ?>' id='<?php echo $newId; ?>' value='<?php echo bagCheckDisplayValue($value); ?>'  onblur="totalHuntersForRow(<?php echo count($blindList) ?>, '<?php echo hunterTotalId() ?>')"/>
			</td>
            <?php $blindIndex++;
            } ?>
            <td class='count_row_total' id='<?php echo hunterTotalId(); ?>'></td>
        </tr>
        <!-- ########################### Car Count ###################### -->
        <tr>
            <td class="count_first_column">No. Cars Checked</td>
            <?php
            $blindIndex = 0;
            foreach($blindList as $oneBlind) {
				$oldId = generateOldIdAtBlind("CAR_COUNT", $blindIndex);
				$newId = generateNewIdAtBlind("CAR_COUNT", $blindIndex);
				$value = $oneBlind->getNumCars();
			?>
			<td class='count'>
            	<input type='hidden' name="<?php echo $oldId; ?>" value='<?php echo $value; ?>' />
               <input class="count_input" type='text' name='<?php echo $newId; ?>' id='<?php echo $newId; ?>' value='<?php echo bagCheckDisplayValue($value); ?>'  onblur="totalCarsForRow(<?php echo count($blindList) ?>, '<?php echo carTotalId() ?>')"/>
			</td>
            <?php $blindIndex++;
            } ?>
           <td class='count_row_total' id='<?php echo carTotalId(); ?>'></td>
        </tr>
        <!-- ########################### Hunt Hours ###################### -->
        <tr>
            <td class="count_first_column">No. Hours on Refuge</td>
            <?php
            $blindIndex = 0;
            foreach($blindList as $oneBlind) {
				$oldId = generateOldIdAtBlind("NUM_HOURS", $blindIndex);
				$newId = generateNewIdAtBlind("NUM_HOURS", $blindIndex);
				$value = $oneBlind->getNumHours();
			?>
			<td class='count'>
            	<input type='hidden' name="<?php echo $oldId; ?>" value='<?php echo $value; ?>' />
                <input class="count_input" type='text' name='<?php echo $newId; ?>' id='<?php echo $newId; ?>' value='<?php echo bagCheckDisplayValue($value); ?>'  onblur="totalHoursForRow(<?php echo count($blindList) ?>, '<?php echo hourTotalId() ?>')"/>
			</td>
            <?php $blindIndex++;
            } ?>
            <td class='count_row_total' id='<?php echo hourTotalId(); ?>'></td>
        </tr>
    </tbody>
</table>


<?php
$oneBlind = $blindList[0];
$birdGroupList = $oneBlind->getSpeciesGroupList();
$listIndex = 0;
foreach($birdGroupList as $birdGroup) {
?>

<h2><?php echo $birdGroup->getGroupName(); ?></h2>
<?php $speciesList = $birdGroup->getSpeciesList(); ?>
<table class='count_table'>
   <?php $speciesIndex = 0;
      foreach($speciesList as $species) { ?>
      <tr>
      <?php $speciesName = $species->getSpeciesName(); ?>
          <td class="count_first_column"><?php echo $speciesName; ?></td>
      <?php $blindIndex = 0;
         foreach($blindList as $oneBlind) {
      	   $oneSpeciesItem = bagCheckGetSpeciesItem($blindList, $blindIndex, $listIndex, $speciesIndex);
      	   $oneValue = $oneSpeciesItem->getHarvestCount();
      ?>
          <td class='count'>
             <input type='hidden' name='<?php echo $oneSpeciesItem->getCurrentFieldId(); ?>' value='<?php echo $oneValue; ?>' />
             <input type='text' class="count_input" name='<?php echo $oneSpeciesItem->getFieldId(); ?>' id='<?php echo $oneSpeciesItem->getFieldId(); ?>' value='<?php echo bagCheckDisplayValue($oneValue); ?>' onblur="totalCountForRowAndBlind(<?php echo $blindIndex ?>, <?php echo $speciesIndex ?>, <?php echo $listIndex ?>, <?php echo count($blindList) ?>, <?php echo count($speciesList) ?>, '<?php echo blindTotalId($listIndex, $blindIndex) ?>', '<?php echo speciesTotalId($speciesIndex, $listIndex) ?>')"/></td>
      <?php $blindIndex++;
      } ?>
         <td class='count_row_total' id='<?php echo speciesTotalId($speciesIndex, $listIndex); ?>'></td>
      
      </tr>
   <?php $speciesIndex++;
   } ?>
   
   <tr>
      <td><?php echo $birdGroup->getGroupName(); ?> Total</td>
      <?php $blindIndex = 0;
         foreach($blindList as $oneBlind) {
      ?>
          <td class='count_blind_total' id='<?php echo blindTotalId($listIndex, $blindIndex); ?>'></td>
      <?php $blindIndex++;
         }
      ?>      
   </tr>

</table>

<!-- ################################## -->
<!-- # Add a new species              # -->
<!-- ################################## -->
<input type="hidden" name="group_list_index" value="<?php echo $listIndex; ?>" />
<select name="species_id_for_group_<?php echo $listIndex; ?>">
   <?php foreach($allSpeciesList as $oneSpecies) { ?>
   <option value="<?php echo $oneSpecies->getId() ?>"><?php echo $oneSpecies->getCommonName() ?></option>
   <?php } ?>
</select>
<!-- <input type="submit" value="Add Species" /> -->
<!-- <a href="bagCheckAddSpeciesAction.php"><button type="button">Test Add</button></a> -->
<input type="button" value="Add Species" name="add_species" onclick="addSpeciesAction(<?php echo $listIndex; ?>)" />
<?php $listIndex++;
}
?>
<p>

   <!-- <input type='submit' value='Save' /> -->
   <input type="button" value="Save Blind" name="save_blind" onclick="saveBlindAction()" />
   </form>

</body>
<div id="HuntCalendarDiv" STYLE="position:absolute;z-index:4;visibility:hidden;background-color:white;layer-background-color:white;"></div>
</html>