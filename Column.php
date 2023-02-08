<?php
//include("Connection.php");
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
         private $index;
    //   private $isPrimaryKey;
     //   private $isForeignKey;
        
        private $refrence;
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
       
        public function getRefrence(){
            return $this -> refrence;
        }
        public function setRefrence($refrence){
            $this -> refrence = $refrence;
        }
        public function getIndex(){
            return $this->index;
        }
        public function setIndex($index){
            $this->index = $index;
        }
        public function __construct($nomColumn, $type, $A_I,$isNull,$index){
            $this->nomColumn = $nomColumn;
            $this->type = $type;
            $this->A_I = $A_I;
            $this->isNull = $isNull;
            $this->index = $index;
        }

        /**
         * This method add a new column to an existent table
         * @param 
         * column name
         * new type
         * Null Or Not Null
         * @return void
         */
        static public function Ajouter($newColumns,$tableName){
            // ALTER TABLE table_name
            // ADD new_column_name column_definition
            // [ FIRST | AFTER column_name ],
            // ADD new_column_name column_definition
            // [ FIRST | AFTER column_name ],
            //  ...
            // ;
            
            $query = "alter table $tableName  ";
            for ($i=0; $i < count($newColumns); $i++) {
             $query .= "add ";
                for ($j = 0; $j < count($newColumns[$i]); $j++) {
                $query .= $newColumns[$i][$j] . " ";
                }
                if($i != count($newColumns) -1){
                    $query .= ",";
                }
               
            }
        Connection::executeQuery($query);    
        echo $query;
        }
          /**
         * This method is to modify an existent/s column/s in th table
         * @param 
         * column name
         * new type
         * Null Or Not Null
         * @return void
         */
        public static function Modifier($Columns, $tableName)
        {
            // ALTER TABLE table_name
            // MODIFY column_name column_definition
            // [ FIRST | AFTER column_name ],
            // MODIFY column_name column_definition
            // [ FIRST | AFTER column_name ],
            //  ...;

            $query = "alter table $tableName ";
            $query = "alter table $tableName  ";
            for ($i = 0; $i < count($Columns); $i++) {
                $query .= "modify ";
                for ($j = 0; $j < count($Columns[$i]); $j++) {
                    $query .= $Columns[$i][$j] . " ";
                }
                if ($i != count($Columns) - 1) {
                    $query .= ",";
                }
            }
            echo $query;
            Connection::executeQuery($query);
        }
        /** 
         * This method is to drop an existent/s column/s in th table
         * @param 
         * column name
         * @return void
         */
        public static function Suprimer($columnName, $tableName){
            //ALTER TABLE table_name
            //DROP COLUMN column_name;
            $query = "alter table $tableName Drop Column $columnName";
             echo $query;
            Connection::executeQuery($query);

        }
         /** 
         * This method is to change an existent coulmn
         * @param 
         * columnOldName, columnNewName, tableName, newDefinition
         *
         * @return void
         */
        public static function Changer($oldName,$newName,$tableName, $newDefinition){
            //ALTER TABLE contacts
            //CHANGE COLUMN contact_type ctype
            // varchar(20) NOT NULL;
            $query = "alter table $tableName change column $oldName $newName $newDefinition";
            Connection::executeQuery($query);

        }
       
        public function isNull(){
            if ($this-> getIsNull()){
                return "";
            }
            return "NOT NULL";
        }
        public function isAutoIncrement(){
            if($this-> getA_I()){
                return "AUTO_INCREMENT";
            }
            return "";
        }

}

//$column = new Column();
//array = array(array("id", "int", "Null","AUTO_INCREMENT" ,"PRIMARY KEY"), array("Name","varchar(100)","Not Null"),array("LastName","varchar(255)","not Null"));
//Column::Modifier($array,"tableForTest");

?>