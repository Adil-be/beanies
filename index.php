<?php 
$BeaniesTab =[
    ['name'=>"Bonnet en laine",
    'prix'=> 10, 
    'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam voluptates labore aut odio aliquid tempore consequatur, nihil doloremque magni,"], 

    ['name'=>"Bonnet en laine bio",
    'prix'=> 14, 
    'description'=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio et repellat odit harum sed perspiciatis"],

    ['name'=>"Bonnet en laine et cachemire",
    'prix'=> 20, 
    'description'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia magnam adipisci temporibus maiores quo id distinctio alias earum voluptatem vitae,"], 

    ['name'=>"Bonnet arc-en-ciel",
    'prix'=> 12, 
    'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nam reprehenderit veniam aperiam impedit iure delectus,"]];

    function prixHT(float $prixTTC):float{
        return $prixTTC/1.2;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>beanies</title>
</head>
<body>
    <h1>Listes bonnets</h1>
    <table>
        <tr><th>nom</th><th>prix HT</th><th>prix TCC</th><th>description</th></tr>

    <?php 
    foreach($BeaniesTab as $beanie){
        $prixTTC= number_format($beanie['prix'],2);
        $prixHT= number_format(prixHT($prixTTC), 2);
        ?>
        <tr>
            <td><?php echo $beanie['name']; ?> </td>
            <td><?php echo $prixHT;  ?>
            <td class = <?php if($prixTTC<= 12) {echo 'green';}else{echo 'blue';}  ?> >
            <?php echo $prixTTC."€"; ?> </td>
            <td><?php echo $beanie['description'] ?> </td>
        </tr>    
        <?php
    }
    ?>
    </table>
    
</body>
</html>
