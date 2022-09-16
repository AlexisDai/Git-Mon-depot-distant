<?php 
    class Magasins
    {
        private $nomMag;
        private $adresse;
        private $codepos;
        private $ville;
        private $resto;
        private $ticketResto;
        //public static $nbEmployes;


        public function __construct(string $nomMag, string $adresse = "", string $codepos = "", string $ville = "", bool $resto){
           
            $this->setNomMag($nomMag);
            $this->setAdresse($adresse);
            $this->setCodePos($codepos);
            $this->setVille($ville);
            $this->setResto($resto);
        }

        public function getNomMag(){
            return $this->nomMag;
        }
        public function setNomMag($nomMag){
            $this->nomMag = $nomMag;
        }


        public function getAdresse(){
            return $this->adresse;
        }
        public function setAdresse($adresse){
            $this->adresse = $adresse;
        }


        public function getCodePos(){
            return $this->codepos;
        }
        public function setCodePos($codepos){
            $this->codepos = $codepos;
        }


        public function getVille(){
            return $this->ville;
        }
        public function setVille($ville){
            $this->ville = $ville;
        }


        public function getResto(){
            return $this->resto;
        }
        public function setResto($resto){
            $this->resto = $resto;
        }

        public function modeResto(){
            if ($this->resto === true){
                $this->ticketResto = false;
                return 'Restaurant d\'entreprise disponible ';
            }else{
                $this->ticketResto = true;
                return 'Restaurant d\'entreprise indisponible, mise à disposition de tickets restaurants';
            }
        }

        
        
    }













?>