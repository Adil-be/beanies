<?php
$beaniesTab =[
    ['id'=> 1,
        'name'=>"Bonnet en laine",
    'prix'=> 10,
    'pathImg'=>'img/beanie1.jpg',
    'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam voluptates labore aut odio aliquid tempore consequatur, nihil doloremque magni,"], 

    ['id'=> 2,
        'name'=>"Bonnet en laine bio",
    'prix'=> 14,
    'pathImg'=>'img/beanie2.jpg',
    'description'=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio et repellat odit harum sed perspiciatis"],

    ['id'=> 3,
        'name'=>"Bonnet en laine et cachemire",
    'prix'=> 20,
    'pathImg'=>'img/beanie3.jpg', 
    'description'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia magnam adipisci temporibus maiores quo id distinctio alias earum voluptatem vitae,"], 

    ['id'=> 4,
    'name'=>"Bonnet arc-en-ciel",
    'prix'=> 12,
    'pathImg'=>'img/beanie4.jpg', 
    'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nam reprehenderit veniam aperiam impedit iure delectus,"]];


    $mdp ="12345";


    $description1="Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam voluptates labore aut odio aliquid tempore consequatur, nihil doloremque magni,";


    $beaniesObj=[
        (new Beanie(1,"Bonnet en laine","img/beanie1.jpg",10, $description1)),
        (new Beanie(1,"test","test",0,"test"))
        ->setId(2)
        ->setName("Bonnet en laine bio")
        ->setPrix(14)
        ->setPath('img/beanie2.jpg')
        ->setDescritpion("Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio et repellat odit harum sed perspiciatis"),
        (new Beanie(1,"test","test",0,"test"))
        ->setId(3)
        ->setName("Bonnet en laine et cachemire")
        ->setPath('img/beanie3.jpg')
        ->setPrix(20)
        ->setDescritpion("Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia magnam adipisci temporibus maiores quo id distinctio alias earum voluptatem vitae,"),
        (new Beanie(1,"test","test",0,"test"))
        ->setId(4)
        ->setName("Bonnet arc-en-ciel")
        ->setPath('img/beanie4.jpg')
        ->setPrix(12)
        ->setDescritpion("Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nam reprehenderit veniam aperiam impedit iure delectus,"),
    ]
    
?>

