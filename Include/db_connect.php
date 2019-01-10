<?php
/* Database Connection - Maritime Agency Control Software - MACS */

$db_user = 'root';//'macsuserhscr';'sfajardo'
$db_pass = '';//'PuraV4389$';'nissan@2016'
//$db_host = '127.0.0.1:3336';//php7.aster.com.gt:3336
$db_host = 'localhost';
$db_name = 'alabanza';

$db = mysqli_connect ($db_host, $db_user, $db_pass,$db_name);



//$db = mysqli_connect('localhost','lexincorpgt','Abog$17ad0','lexincorp');    se usa este para hacer CALL en MySql 




if (mysqli_connect_errno()) {
    printf("Falló la conexiónes: %s\n", mysqli_connect_error());
    echo $db;
    exit();
}




?>