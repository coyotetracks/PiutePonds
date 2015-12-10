<?php
//require_once(dirname(__FILE__) . '/piute_includes.php');
require_once(dirname(__FILE__) . '/db_info.php');
require_once(dirname(__FILE__) . '/db_info_support.php');
require_once(dirname(__FILE__) . '/role_info.php');
//require_once(dirname(__FILE__) . '/sql_help.php');

function generateAllMembersOfARoleListSql($roleId) {
	$sql = "";
	$sql .=	"SELECT l.*";
	$sql .=	" FROM login l, role_map r";
	$sql .=	" WHERE r.role_id = ";
	$sql .= $roleId;
	$sql .=	" AND l.id = r.login_id";
	$sql .=	" ORDER BY l.last_name, l.first_name";
   return $sql;
}

function getAllMembersOfARole($roleId) {
	$userList = array();

	// connect to db
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$sql = generateAllMembersOfARoleListSql($roleId);
	//var_dump($sql);

	$result = mysql_query($sql, $dbLink);
	if ($result) {
		if (mysql_num_rows($result)>0) {
			while ($row = mysql_fetch_assoc($result)) {
				$oneUser = createUserFromRow($row);
				$userList[] = $oneUser;
			}
		}
	}

    return $userList;
}

function generateRoleByIdSql($roleId) {
	$sql = "";
	$sql .=	"SELECT * FROM role";
	$sql .=	" WHERE id=";
	$sql .=	$roleId;
	return $sql;
}

function getRoleById($roleId) {
	// Connect to database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$sql = generateRoleByIdSql($roleId);

	$result = mysql_query($sql, $dbLink);
	if ($result) {
		if (mysql_num_rows($result)>0) {
			$row = mysql_fetch_assoc($result);
			$currentRole = createRoleFromRow($row);
		}
	}

	return $currentRole;
}

function generateAllRoleListSql() {
	$sql = "";
	$sql .=	"SELECT * FROM role";
	return $sql;
}

function getAllRoles() {
	$roleList = array();

	// Connect to the database
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$sql = generateAllRoleListSql();

	$result = mysql_query($sql, $dbLink);
	if ($result) {
		if (mysql_num_rows($result)>0) {
			while ($row = mysql_fetch_assoc($result)) {

				$currentRole = new role_info();
				$currentRole->setId($row['id']);
				$currentRole->setName($row['name']);

				$roleList[] = $currentRole;
			}
		}
	}

// 	 				$currentRole = new role_info();
// 	 				$currentRole->setId(1);
// 	 				$currentRole->setName('jeff');
// 	 				$roleList[] = $currentRole;
	
    return $roleList;
}

function generateRoleListSql($user) {
	$userId = $user->getId();
	$sql =
		"SELECT r.id AS id, r.name AS name " .
		" FROM login l, role r, role_map m" .
		" WHERE l.id = " . $userId .
		" AND l.id = m.login_id" .
		" AND r.id = m.role_id";
   return $sql;
}

function getRoles($user) {
	$roleList = array();

	// connect to db
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$sql = generateRoleListSql($user);

	$result = mysql_query($sql, $dbLink);
	if ($result) {
		if (mysql_num_rows($result)>0) {
			while ($row = mysql_fetch_assoc($result)) {

				$currentRole = new role_info();
				//$currentRole->setId($row['id']);
				$currentRole->setName($row['name']);

				$roleList[] = $currentRole;
			}
		}
	}

    return $roleList;
}

function isUserARoleMember($user, $targetRoleName) {
	$rolesArray = getRoles($user);
	$foundRole = isRoleMemberFromArray($rolesArray, $targetRoleName);
	return $foundRole;
}

function isRoleMember($targetRoleName) {
	$foundRole = FALSE;

	if(isset($_SESSION['roles'])) {
		$rolesArray = $_SESSION['roles'];
		$foundRole = isRoleMemberFromArray($rolesArray, $targetRoleName);
	}

	return $foundRole;
}

function isRoleMemberFromArray($rolesArray, $targetRoleName) {
	$foundRole = FALSE;

	//$rolesArray = $_SESSION['roles'];
	if(isset($rolesArray)) {
		$maxRoleIndex = count($rolesArray);
		if($maxRoleIndex>0) {
			$keepLooking = TRUE;
			$currentRoleIndex = 0;
			while($keepLooking) {
				$oneRole = $rolesArray[$currentRoleIndex];
				$oneRoleName = $oneRole->getName();
				if($oneRoleName == $targetRoleName) {
					$foundRole = TRUE;
					$keepLooking = FALSE;
				}
				$currentRoleIndex += 1;
				if($currentRoleIndex == $maxRoleIndex) {
					$keepLooking = FALSE;
				}
			}
		}
	}

	return $foundRole;
}

function getRoleIdFromName($roleName) {
	// connect to db
	$dbInfo = initialize_db_info();
	$dbLink = db_connect($dbInfo);
	db_select($dbLink, $dbInfo);

	$sql = "SELECT id FROM role WHERE name = '".$roleName."'";

	$result = mysql_query($sql, $dbLink);
	if ($result) {
		if (mysql_num_rows($result)==1) {
			$row = mysql_fetch_assoc($result);
			$roleId = $row['id'];
		}
	}

	return $roleId;
}

function redirectIfNotInRole($roleName, $redirectPage) {
	$isRoleMember = isRoleMember($roleName);
	if(!$isRoleMember) {
		//addError('login','You are not allowed ');
		header('Location: '.$redirectPage);
	}
}

function createRoleFromRow($dbRow) {
  	$rowRole = new role_info();
  	$rowRole->setId($dbRow['id']);
	$rowRole->setName($dbRow['name']);
  	return $rowRole;
}
?>