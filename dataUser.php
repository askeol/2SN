<?php
require_once "dataConnect.php";

function addUser($username, $email, $password) {
  $db =dbConnect();
  if ($db == FALSE)
    return (FALSE);
  $query = "insert into USER (username, email, password) values \"".$username."\",\"".$email
    ."\",".$passwrd."\"\);";
  dbClose();
  return (TRUE);
}
function getUserID($login) {
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $query = "select ID from USER where login like \"".$login."\";";
  $result = $db->query($query);
  while ($row = $result->fetchArray())
    {
      for ($i = 0; isset($row[$i]); $i++)
       $ID = $row[$i];
    }
  if ($i > 1)
    return (FALSE);
  dbClose($db);
  return ($ID);
}
function getUserInfo($field, $ID) {
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $query = "select \"".$field."\" from USER where ID like \"".$ID."\";";
  $result = $db->query($query);
  while ($row = $result->fetchArray())
    {
      for ($i = 0; isset($row[$i]); $i++)
	$info = $row[$i];
    }
  if ($i > 1)
    return (FALSE);
  dbClose($db);
  return ($info);
}
function delUser($id) {
  $db = dbConnect();
  if ($db == FALSE)
    return (0);
  $query = "delete from USER where id like \"".$id."\";";
  $result = $db->query($query);
  if ($result == FALSE)
    {
      dbClose($db);
      return (FALSE);
    }
  dbClose($db);
  return (TRUE);
}
//function userConnect($username, $password);
//function isUserAdmin($id);
//function modUser($id, $field, $newContent);
