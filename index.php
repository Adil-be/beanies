<?php 
include ('include/function.php');
include ('include/variable.php');
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
        afficherProduit($beanie);
    }
    ?>
    </table>
    
</body>
</html>
