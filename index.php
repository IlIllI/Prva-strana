<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dodaj</title>
</head>
<body>
<?php

$konekcija = mysqli_connect(
    'localhost',
    'root',
    '',
    'malastudentskabaza'
);
echo "<a href=/PHP/KOLZ/KOLOKVIJUM%20JAN%2019/Zad2/POK.php>REFRESH</a> <br>";

$kime="";
$upit = mysqli_query(
    $konekcija,
"SELECT * FROM predmet "
);
if(isset($_POST['kolona'])){
for($i=0; $i < mysqli_num_fields($upit); $i++) {
$vime=mysqli_fetch_field_direct($upit, $i)->name;
if($vime==$_POST['kolona'] || $vime=="id")
{

}
else{
    if($kime){
$sime=$kime;
    }
    else{
        $sime="";
    }
    $kime="".$vime.",".$sime."";
}

}
$kime=substr($kime,0,-1);
   }
   
if(isset($_POST['kolona'])){
$upit2 = mysqli_query(
    $konekcija,
"SELECT id,".$kime." FROM predmet " 
);
}



if(isset($_POST['kime'])){

$kime="";
$upit3 = mysqli_query(
    $konekcija,
"SELECT id,".$_POST['kime']." FROM predmet " 
);
    for($i=0; $i < mysqli_num_fields($upit3); $i++) {
        $vime=mysqli_fetch_field_direct($upit3, $i)->name;
        if($vime==$_POST['kolona'] || $vime=="id")
        {
        
        }
        else{
            if($kime){
        $sime=$kime;
            }
            else{
                $sime="";
            }
            $kime="".$vime.",".$sime."";
        }
        
        }
        $kime=substr($kime,0,-1);
        
           if($kime){
        $upit2 = mysqli_query(
            $konekcija,
        "SELECT id,".$kime." FROM predmet " 
        );
    }
    else{
        $upit2 = mysqli_query(
            $konekcija,
        "SELECT id FROM predmet " 
        );

    }
        


}
  

print '<table border="1px">';
if(isset($_POST['kolona'])){
print ' <tr>';
$imeID=mysqli_fetch_field_direct($upit2, 0)->name;
print '<th>'.$imeID.'</th>';
    for ($i=1; $i < mysqli_num_fields($upit2); $i++) {
         $ime=mysqli_fetch_field_direct($upit2, $i)->name;
        print '<th>'.$ime.'';
        print '<form action="" method="POST">';
        print '<input type="hidden" name="kolona" value='.$ime.'>';
        print '<input type="hidden" name="kime" value='.$kime.'>';
        print '<input type="submit" name="dugme" value="Obrisi">';
        print '</form>';
        print '</th>';
         }
        
    
    print ' </tr>';
    while ($vrsta = mysqli_fetch_array($upit2)) {
        print '<tr>';
        for ($i=0; $i < mysqli_num_fields($upit2); $i++){
            print '<td>'.$vrsta[$i].'</td>';
    
    }
    print '</tr>';
}
}
else{
print ' <tr>';
$imeID=mysqli_fetch_field_direct($upit, 0)->name;
print '<th>'.$imeID.'</th>';
    for ($i=1; $i < mysqli_num_fields($upit); $i++) {
         $ime=mysqli_fetch_field_direct($upit, $i)->name;
       
        print '<th>'.$ime.'';
        print '<form action="" method="POST">';
        print '<input type="hidden" name="kolona" value='.$ime.'>';
        print '<input type="submit" name="dugme" value="Obrisi">';
        print '</form>';
        print '</th>';
         }
        
    
    print ' </tr>';
    while ($vrsta = mysqli_fetch_array($upit)) {
        print '<tr>';
        for ($i=0; $i < mysqli_num_fields($upit); $i++){
            print '<td>'.$vrsta[$i].'</td>';
    
    }
    print '</tr>';
}
}


     print '</table>';

  

    ?>

</body>
</html>