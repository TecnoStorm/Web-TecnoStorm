<?php
foreach($_FILES["archivo"]['tmp_name'] as $key =>$tmp_name)
{
if($_FILES["archivo"]["name"][$key]){
    $filename=$_FILES["archivo"] ["name"][$key];
    $origen=$_FILES["archivo"] ["tmp_name"][$key];
    $directorio="CV";
    if(!file_exists($directorio)){
    mkdir ($directorio, 0777) or die ("no se puede crear el directorio");
    }
    $dir=opendir($directorio);
    $destino=$directorio.'/'.$filename;
    if(move_uploaded_file($origen,$destino)){
        echo "el archivo $filename se almacenado de forma exitosa <br>";        
    }
    else{
        echo "no se subio el archivo <br>";
    }
    closedir($dir);
}
}
?>