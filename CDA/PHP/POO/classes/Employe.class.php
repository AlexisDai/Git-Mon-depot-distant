<?php 
    class Employe{
        private $_nom;
        private $_prenom;
        private $_embauche;
        private $_fonction;
        private $_salaire;
        private $_service;

        public function __construct(string $nom, string $prenom, string $embauche, string $fonction, float $salaire, string $service){
            $this->setNom($nom);
            $this->setPrenom($prenom);
            $this->setEmbauche($embauche);
            $this->setFonction($fonction);
            $this->setSalaire($salaire);
            $this->setService($service);
        }

    /*     public function __toString(){
            return $this->_nom.' '.$this->prenom.'<br>'.'<b>Service : </b>'.$this->_service.' - <b>Fonction : </b>'.$this->_fonction.'<br>'.'<b>Date d\'embauche : </b>'.$this->_embauche.'<br>'.$this->_salaire.' K € <br><hr>';
        } */

        public function getNom(){
            return $this->_nom;
        }
        public function setNom($Nom){
            $this->_nom = $Nom;
        }


        public function getPrenom(){
            return $this->_prenom;
        }
        public function setPrenom($Prenom){
            $this->_prenom = $Prenom;
        }


        public function getEmbauche(){
            return $this->_embauche;
        }
        public function setEmbauche($Embauche){
            $this->_embauche = $Embauche;
        }

        public function getFonction(){
            return $this->_fonction;
        }
        public function setFonction($Fonction){
            $this->_fonction = $Fonction;
        }


        public function setSalaire(){
            return $this->_salaire;
        }
        public function getSalaire(){
            $this->_salaire = $Salaire;
        }


        public function setService(){
            return $this->_service;
        }
        public function getService($Service){
            $this->_service = $Service;
        }


        public function getAnciennete(){
            $ajd = new DateTime('now');
            $ajd->format('d/m/Y');
            $emb = DateTime::createFromFormat('d/m/Y',$this->_embauche);
            $anciennete = date_diff($emb, $ajd);
            return $anciennete->format('%Y années pleines');
        }


        public function getPrime(){
            var_dump($this->_salaire);
        }
    }










?>