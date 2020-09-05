<?php $bd=new mysqli('localhost', 'xxxxx' , 'xxxxxx','xxxxxx');
mysqli_set_charset($mysqli,"utf8");
if($bd-> connect_error)
{ 
    die('Error'.('.$bd-> connect_errno.').'$bd-> connect_error');
}else{
    echo"";
}

?>

