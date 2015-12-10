<?php
/*
 * Created on 10/29/2012
 *
 */
include_once('../php/piute_includes.php');
session_start();
redirectIfNotInRole('super user', '../not-allowed.php');

$selectedRoleId = $_POST['correspondence_role_id'];
if(!isset($selectedRoleId)) {
	$selectedRoleId = -1;
} else {
	$selectedRole = getRoleById($selectedRoleId);
}
$allRoles = getAllRoles();
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

    <h2>Members of the <?php echo $selectedRole->getName(); ?> Role</h2>
    
    <?php
    //var_dump($allRoles);
    //var_dump($selectedRoleId);
    ?>
    
    <form method="POST" name="correspondence_form" action='../php/correspondence_role_send_action.php'>
        
        <?php
        if($selectedRoleId>=0) {
        	$roleMembers = getAllMembersOfARole($selectedRoleId);
            ?>
            <table border="1">
                <?php foreach($roleMembers as $oneUser) { ?>
                <tr>
                    <td>
                        <input type="checkbox" name="member_id_<?php echo $oneUser->getId(); ?>" checked />
                    </td>
                    <td>
                        <?php echo formatUserNameReverse($oneUser); ?>(<?php echo $oneUser->getEmail(); ?>)
                    </td>
                </tr>
                <?php } ?>
            </table>
            <table>
                <tr>
                    <td>From</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" size="60" name="from_text" value="help@piuteponds.org"></input>
                    </td>
                </tr>
                <tr>
                    <td>Subject</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" size="60" name="subject_text"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="message_text" rows="25" cols="80"></textarea>
                    </td>
                </tr>
            </table>
            <?php
        }
        ?>
        
        <br/>
        <input type="submit" name="correspondence_role_send_action" value="Send" />
    </form>
    
    </body>
</html>