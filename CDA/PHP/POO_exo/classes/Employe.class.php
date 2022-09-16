<?php 


    class Employe
    {
        private $nom;
        private $prenom;
        private $embauche;
        private $poste;
        private $salaire;
        private $service;
        private $magasin;
        private $cheques = true;
        private $nbEnfants;
        private $ageEnfants = array();
        private $autorisation;
        private $cheque20;
        private $cheque30;
        private $cheque50;


        public function __construct(string $nom, string $prenom, string $embauche, string $poste, string $salaire, string $service, Magasins $magasin = Null, string $nbEnfants, array $ageEnfants){
            $this->setNom($nom);
            $this->setPrenom($prenom);
            $this->setEmbauche($embauche);
            $this->setPoste($poste);
            $this->setSalaire($salaire);
            $this->setService($service);
            $this->setMagasin($magasin);
            $this->setNbEnfants($nbEnfants);
            $this->setAgeEnfants($ageEnfants);
        }

        public function getNom(){
            return $this->nom;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }


        public function getPrenom(){
            return $this->prenom;
        }
        public function setPrenom($prenom){
            $this->prenom = $prenom;
        }


        public function getEmbauche(){
            return $this->embauche;
        }
        public function setEmbauche($embauche){
            $this->embauche = $embauche;
        }


        public function getPoste(){
            return $this->poste;
        }
        public function setPoste($poste){
            $this->poste = $poste;
        }


        public function getSalaire(){
            return $this->salaire;
        }
        public function setSalaire($salaire){
            return $this->salaire = $salaire;
        }


        public function getService(){
            return $this->service;
        }
        public function setService($service){
            $this->service = $service;
        }

        public function getMagasin(){
            return $this->magasin;
        }
        public function setMagasin(Magasins $mag){

            $this->magasin = $mag;
        }


        public function getNbEnfants(){
            return $this->NbEnfants;
        }
        public function setNbEnfants($nbEnfants){
            $this->NbEnfants = $nbEnfants;
        }


        public function getAgeEnfants(){
            return $this->ageEnfants;
        }
        public function setAgeEnfants($ageEnfants){
            $this->ageEnfants = $ageEnfants;
        }


        public function infoEmp(){
            echo $this->nom.' '.$this->prenom.'<br>'.'<b>Service</b> : '.$this->service.' - <b>Poste</b> : '.$this->poste.'<br>'.'<b>Date d\'embauche :</b> '.$this->embauche.'<br>'.'<b>Salaire</b> : '.$this->salaire.' K €<br>'.'<b>Montant de la prime annuelle : </b>'.$this->getPrime().' € <br>'.$this->Transfert().'<br>';
            //.$this->modeResto();
        }
        


        public function getAncienneté(){
            $embauche = new DateTime($this->embauche);
            $datedujour = new DateTime('now');
            $anciennete = $embauche->diff($datedujour);
            return $anciennete->format('%y années complètes');
        }

        public function getPrime(){
            $prime = $this->salaire * 1.05;
            $primeA = $prime + ((1.02 * $prime) * (float)$this->getAncienneté());
            return $primeA;
        }

        public function Transfert(){
            $date = new DateTime('now');
            $dateEnvoi = new DateTime();

            $timeDate = $date->format('Y-m-d');
            $timeDateEnvoi = $dateEnvoi->format('Y-m-d');

            if ($timeDate === $timeDateEnvoi){
                return 'Ordre de transfert effectué le : '.$timeDateEnvoi;
            }
        }


        public function getCheques(){
            if ($this->getAncienneté() >= 1 ){
                $cheques = true;
                return 'L\'employé peut disposer de chèques-vacances';
            }else{
                $cheques = false;
                return 'L\'employé ne peut pas disposer de chèques-vacances';
            }
        }


        public function Autorisation(){
            foreach($this->ageEnfants as $key => $age){
            if($age >= 0 && $age <= 18){
                $this->autorisation = true;
                return 'L\'employé peut avoir des chèques Noël';
            }else{
                $this->autorisation = false;
                return 'L\'employé ne peut pas avoir des chèques Noël';
            }
        }
    }

        public function Distribution(){

            if($this->autorisation === true){
                foreach($this->ageEnfants as $index=>$age){
                    if($age >= 0 && $age <= 10){
                        $this->cheque20++;                      
                    }elseif($age >= 11 && $age <= 15){
                        $this->cheque30++;
                    }elseif($age >= 16 && $age <= 18){
                        $this->cheque50++;
                    }
                }return $this->cheque20.' chèque(s) de 20€<br>'.$this->cheque30.'chèque(s) de 30€<br>'.$this->cheque50.' chèque(s) de 50€';            
            }
        }
        
    }
