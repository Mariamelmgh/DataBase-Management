<?php
     class Column{
        //Properties
        private $nomColumn;
        private $type;
        private $taille;
        private $valeurParDefault;
        private $interclassement;
        private $attributs;
        private $isNull;
        private $A_I;
        private $commentaire;
        private $virtualite;
        private $deplacerUneColumn;
        private $typeDeMedia;
        private $transformationAffichage;
        private $optionsDeTransformationAffichage;
        private $transformationDeSaisie;
        private $optionsDeTransformationDeSaisie;

        //Getters & Setters
        public function getNomColumn(){
            return $this -> nomColumn;
        }
        public function setNomColumn($nomColumn){
            $this -> nomColumn = $nomColumn;
        }
        public function getType(){
            return $this -> type;
        }
        public function setType($type){
            $this -> type = $type;
        }
        public function getTaille(){
            return $this -> taille;
        }
        public function setTaille($taille){
            $this -> taille = $taille;
        }
        public function getValeurParDefault(){
            return $this -> valeurParDefault;
        }
        public function setValeurParDefault($valeurParDefault){
            $this -> valeurParDefault = $valeurParDefault;
        }
        public function getInterclassement(){
            return $this -> interclassement;
        }
        public function setInterclassement($interclassement){
            $this -> interclassement = $interclassement;
        }
        public function getAttributs(){
            return $this ->  attributs;
        }
        public function setAttributs($attributs){
            $this -> attributs = $attributs;
        }
        public function getIsNull(){
            return $this -> isNull;
        }
        public function setIsNull($isNull){
             $this -> isNull = $isNull;
        }
        public function getA_I(){
            return $this -> A_I;
        }
        public function setA_I($A_I){
            $this -> A_I = $A_I;
        }
        public function getCommentaire(){
            return $this -> commentaire;
        }
        public function setCommentaire($commentaire){
            $this -> commentaire = $commentaire;
        }
        public function getVirtualite(){
            return $this -> virtualite;
        }
        public function setVirtualite($virtualite){
            $this -> virtualite = $virtualite;
        }
        public function getDeplacerUneColumn(){
            return $this -> deplacerUneColumn;
        }
        public function setDeplacerUneColumn($deplacerUneColumn){
            return $this -> deplacerUneColumn = $deplacerUneColumn;
        }
        public function getTypeDeMedia(){
            return $this -> typeDeMedia;
        }
        public function setTypeDeMedia($typeDeMedia){
            $this -> typeDeMedia = $typeDeMedia;
        }
        public function getTranformationAffichage(){
            return $this ->transformationAffichage;
        }
        public function setTransformationAffichage($transformationAffichage){
            $this -> transformationAffichage = $transformationAffichage;
        }
        public function getOptionDeTranformationAffichage(){
            return $this -> optionsDeTransformationAffichage;
        }
        public function setOptionDeTransformationAffichage($optionsDeTransformationAffichage){
            $this -> optionsDeTransformationAffichage = $optionsDeTransformationAffichage;
        }
        public function getTransformationDeSaisie(){
            return $this -> transformationDeSaisie;
        }
        public function setOptionDeTransformationDeSaisie($optionsDeTransformationDeSaisie){
            $this -> optionsDeTransformationDeSaisie = $optionsDeTransformationDeSaisie;
        }










        //Methods


    }

?>