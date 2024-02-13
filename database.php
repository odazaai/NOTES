<?php

define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'pplg_1_notes');
$dbconnect=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Failed to connect to MYSQL: " . mysqli_error($dbconnect));

// $host="localhost";
// $user="root";
// $pass="";
// $db="pplg_1_notes";
// $dbconnect=mysqli_connect

function kuery($kueri)
{
    global $dbconnect;
    $result=mysqli_query($dbconnect, $kueri);
    $rows=[];
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    return $rows;
}

function inputdata($inputdata)
{
    global $dbconnect;
    $sql=mysqli_query($dbconnect, $inputdata);
    return $sql;
}

function Editdata($tablename, $id)
{
    global $dbconnect;
    $hasil=mysqli_query($dbconnect, "select * from $tablename where id='$id.'");
    return $hasil;
}

function update($table, $data, $id)
{
    global $dbconnect;
    $sql = "UPDATE $table SET notes = '$data' WHERE id = '$id'";
    $hasil=mysqli_query($dbconnect, $sql);
    return $hasil;
}

function Delete($tablename, $id)
{
    global $dbconnect;
    $hasil=mysqli_query($dbconnect, "Delete from $tablename where id='$id'");
    return $hasil;
}

function cek_login($username, $password){
    global $dbconnect;
    $uname = $username;
    $upass = $password;

    $hasil = mysqli_query($dbconnect, "select * from user where username='$uname' and password=md5('$upass')");
    $cek = mysqli_num_rows($hasil);

    if($cek > 0 ){
        return true;
    } 
    else {
        return false;
    }
}
?>