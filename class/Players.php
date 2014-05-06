<?php
require_once 'DB.class.php';
//
// User
// DB support class for the user table.
//
class User {

// Properties
public $Player_First_Name;
public $Player_LAST_Name;
public $Player_Position;
public $Player_Age;
public $Team_ID_num;
public $Player_Pic;

//Constructor is called whenever a new object is created.
//Takes an associative array with the DB row as an argument.
function __construct($data) {
$this->Player_First_Name = (isset($data['Player_First_Name'])) ? $data['Player_First_Name'] : "";
$this->Player_LAST_Name = ((isset($data['Player_LAST_Name'])) ? $data['Player_LAST_Name'] : "");
$this->Player_Position = (isset($data['Player_Position'])) ? $data['Player_Position'] : "";
$this->Player_Age = stripslashes((isset($data['Player_Age'])) ? $data['Player_Age'] : "");
$this->Team_ID_num = (isset($data['Team_ID_num'])) ? $data['Team_ID_num'] : "";
$this->Player_Pic = ((isset($data['Player_Pic'])) ? $data['Player_Pic'] : "");
}

public function save($isNewUser = false) {
//create a new database object.
$db = new DB();
$Player_First_Name = mysql_real_escape_string($this->Player_First_Name);
$Player_LAST_Name = mysql_real_escape_string($this->Player_LAST_Name);
$Position = mysql_real_escape_string($this->Position);
$Player_Age = mysql_real_escape_string($this->Player_Age);
$Team_ID_num = mysql_real_escape_string($this->Team_ID_num);
$Player_Pic= mysql_real_escape_string($this->Player_Pic)

//if the user is already registered and we're
//just updating their info.
if(!$isNewUser) {
//set the data array
$data = array(
"username" => "'$username'",
"password" => "'$this->hashedPassword'",
"email" => "'$email'",
"firstName" => "'$firstName'",
"lastName" => "'$lastName'",
"link" => "'$link'",
);

//update the row in the database
$db->update($data, 'users', 'id = '. $this->id);
}else {
//if the user is being registered for the first time.
$data = array(
"username" => "'$username'",
"password" => "'$this->hashedPassword'",
"email" => "'$email'",
"link" => "'$link'",
"firstName" => "'$firstName'",
"lastName" => "'$lastName'",
);
$this->id = $db->insert($data, 'users');
$this->joinDate = time();
}
return true;
}

}

?>