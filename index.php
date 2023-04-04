<?php 
$BeaniesTab =["Bonnet en laine", "Bonnet en laine bio","Bonnet en laine et cachemire", "Bonnet arc-en-ciel"]
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
        <tr><th>nom</th></tr>

    <?php 
    foreach($BeaniesTab as $beanie){
        ?>
        <tr><td><?php echo $beanie ?> </td></tr>
        
        <?php
    }
    ?>
    </table>
    
</body>
</html>
