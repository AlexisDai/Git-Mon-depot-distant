<?php 

    class Personnage{

       private $_nom;
       private $_prenom;
       private $_age;
       private $_sexe;

       public function getNom(){
           return $this->_nom;
       }
       public function setNom($sNom){
           $this->_nom = $sNom;
       }

       public function getPrenom(){
           return $this->_prenom;
       }
       public function setPrenom($sPrenom){
           $this->_prenom = $sPrenom;
       }


       public function getAge(){
           return $this->_age;
       }
       public function setAge($sAge){
           $this->_age = $sAge;
       }


       public function getSexe(){
           return $this->_sexe;
       }
       public function setSexe($sSexe){
           $this->_sexe = $sSexe;
       }
}










?>