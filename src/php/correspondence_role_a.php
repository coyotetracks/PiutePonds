<?php
/*
 * Created on 10/29/2012
 *
 */
include_once('../php/piute_includes.php');
session_start();
redirectIfNotInRole('super user', '../not-allowed.php');

$allRoles = getAllRoles();
//$allRoles = array();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Role Correspondences</title>
        <link href="AdminCSS.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    
    <a href="../">Piute Ponds Home Page</a>
    <br/>
    <a href="admin_home.php">Admin Home</a>
    <br/>
    <a href="correspondence_all.php">Correspondence Home</a>
    <br/>
        
    
    <h1>Role Correspondence</h1>

    <?php
    //var_dump($allRoles);
    //var_dump($selectedRoleId);
    ?>
    
    <form method="POST" name="correspondence_form" action='../php/correspondence_role_b.php'>
        <select name="correspondence_role_id">
            <option value="-1">Select Role</option>
            <?php foreach($allRoles as $oneRole) {
            	if($selectedRoleId==$oneRole->getId()) {
            		$selectionClause = " selected ";
            	} else {
            		$selectionClause = " ";
            	}
            ?>
            <option value="<?php echo $oneRole->getId() ?>" <?php echo $selectionClause; ?>><?php echo $oneRole->getName(); ?></option>
            <?php } ?>
        </select>

        <br />
        <input type="submit" name="send_correspondence" value="Next" />
    </form>
    
    </body>
</html>