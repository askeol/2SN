<?php
require_once "dataConnect.php";

function addUser($login, $email, $password) {
  $db =dbConnect();
  if ($db == FALSE)
    return (FALSE);
  $query = "insert into USER (login, email, password, created, modified, connection) values \"".
    $username."\",\"".$email."\",".md5($password)."\"\, Now(), Now(), Now());";
  $result = $db->query($query);
  if ($result == FALSE)
    {
      dbClose($db);
      return (FALSE);
    }
  dbClose($db);
  return (TRUE);
}
function getUserID($login) {
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $query = "select id_user from USER where login like \"".$login."\";";
  $result = $db->query($query);
  while ($row = $result->fetchArray())
    {
      for ($i = 0; isset($row[$i]); $i++)
       $ID = $row[$i];
    }
  dbClose($db);
  if ($i > 1)
    return (FALSE);
  return ($ID);
}
function getUserInfo($field, $ID) {
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $query = "select \"".$field."\" from USER where id_user like \"".$ID."\";";
  $result = $db->query($query);
  while ($row = $result->fetchArray())
    {
      for ($i = 0; isset($row[$i]); $i++)
	$info = $row[$i];
    }
  dbClose($db);
  if ($i > 1)
    return (FALSE);
  return ($info);
}
function delUser($id) {
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $query = "delete from USER where id_user like \"".$id."\";";
  $result = $db->query($query);
  if ($result == FALSE)
    {
      dbClose($db);
      return (FALSE);
    }
  dbClose($db);
  return (TRUE);
}
function isUsernameExist($login){
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $query = "select id_user from USER where login like \"".$login."\";";
  $result = $db->query($query);
  while ($row = $result->fetchArray())
    {
      for ($i = 0; isset($row[$i]); $i++)
	$ID = $row[$i];
    }
  dbClose($db);
  if ($i > 0)
    return (TRUE);
  return (FALSE);
}
function isEmailExist($email){
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $query = "select id_user from USER where email like \"".$email."\";";
  $result = $db->query($query);
  while ($row = $result->fetchArray())
    {
      for ($i = 0; isset($row[$i]); $i++)
        $ID = $row[$i];
    }
  dbClose($db);
  if ($i > 0)
    return (TRUE);
  return (FALSE);
}
function userConnect($login, $password){
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $id = getUserID($login);
  $query = "select id_user from USER where id_user = \"".$id."\" and password = \"".md5($password)."\";";
  $result = $db->query($query);
  while ($row = $result->fetchArray())
    {
      for ($i = 0; isset($row[$i]); $i++)
        $ID = $row[$i];
    }
  if ($i > 0)
    {
      $query = "update USER set connection = Now() where id_user = \"".$id."\";";
      $result = $db->query($query);
      dbClose($db);
      return (TRUE);
    }
  dbClose($db);
  return (FALSE);
}
function setUserField($id, $field, $newContent){
  $db = dbConnect();
  if ($db == FALSE)
    return (FALSE);
  $query = "update USER set \"".$field."\"=\"".$newContent."\" where id_user = \"".$id."\";";
  $result = $db->query($query);
  if ($result == FALSE)
    {
      dbClose($db);
      return (FALSE);
    }
  $query = "update USER set modified = Now() where id_user = \"".$id."\";";
  $result = $db->query($query);
  dbClose($db);
  return (TRUE);
}
//function isUserAdmin($id);
?>
