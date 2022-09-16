<?php 
    class Personnage{
        private $nom;
        private $prenom;
        private $age;
        private $sexe;

        

        public function setNom($p){
            return $this->nom = $p;
        }
        public function getNom(){
            return $this->nom;
        }
    
        
        public function setPrenom($p){
            return $this->prenom = $p;
        }
        public function getPrenom(){
            return $this->prenom;
        }


        public function setAge($p){
            return $this->age = $p;
        }
        public function getAge(){
            return $this->age;
        }

        
        public function setSexe($p){
            return $this->sexe = $p;
        }
        public function getSexe(){
            return $this->sexe;
        }

        public function __toString(){
            return "{$this->nom}<br>{$this->prenom}<br>{$this->age} ans <br>{$this->sexe}";
        }



    }














?>