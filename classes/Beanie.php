<?php
class Beanie{

    protected  ?int $id;
    protected ?string $name;
    protected ?string $pathImg;
    protected float $prix =0.0;
    protected ?string $description;

        const SIZES_AVAILABLES = ['S', 'M', 'L', 'XL'];
        const MATERIALS_AVAILABLES =['laine','laine bio','cachemire'];

        public function __construct(int $id, string $name = 'benanie', string $path ="img/placeholder.jpg",float $prix, string $description ="description" ){
            $this->id =$id;
            $this->name =$name;
            $this->pathImg =$path;
            $this->prix =$prix;
            $this->description = $description;
        }
        public function getId(){
            return $this->id;
        }
        public function getName(){
            return $this->name;
        }
        public function getPath(){
            return $this->pathImg;
        }
        public function getPrix(){
            return $this->prix;
        }
        public function getDescription(){
            return $this->description;
        }

        public function setId($id){
            $this->id= $id;
            return $this;
        }
        public function setName(string $text){
            $this->name= $text;
            return $this;
        }
        public function setPath(string $text){
            $this->pathImg= $text;
            return $this;
        }
        public function setPrix(float $number){
            $this->prix= $number;
            return $this;
        }
        public function setDescritpion(string $text){
            $this->description= $text;
            return $this;
        }
    }
?>