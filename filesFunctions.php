<?php
//Create file function 
function createFile($fileName, $content){
    //Creating a file with the patrams name 
    $file =   fopen($fileName,"w");

    //Write contents inside the file 

    fwrite($file,$content);

    //Close the file 

    fclose($file);

    
}


//Display the contents of an already exisitng file 
function displayFileContents($fileName){

    $fileRead = file_get_contents($fileName);
    echo "<span>$fileRead</span>";
    return $fileRead;
}
 //If file existed => show contents
 //Else craeate new file with new lines

function myFile_1($fileName, $content){
    if (file_exists($fileName)){
        displayFileContents($fileName);
    }else{
        createFile($fileName,$content);
    }
    
}

//This is function read the conteent of the first file & copy it in the second file
function myFile_2($originalFile, $copiedFile){
    copy($originalFile, $copiedFile);

}

// This is a function that calculate vowels and consents in a file 
function calculate_1($fileName){

    $vowelCount = 0;
    $consentsCount = 0;
    $fileRead = file_get_contents($fileName);
    for($i = 0; $i <strlen($fileRead); $i++){
        if(strtoupper($fileRead[$i]) == 'A' || strtoupper($fileRead[$i]) == 'E' || strtoupper($fileRead[$i]) == 'I' || strtoupper($fileRead[$i]) == 'O' 
        || strtoupper($fileRead[$i] )== 'U' || strtoupper($fileRead[$i]) == 'Y' ){
            $vowelCount++;
        }else{
            $consentsCount++;
        }
    }
    return array("Vowel" => $vowelCount, "Consents" => $consentsCount);

}

//This is a function that calculate the number of occurances of digits and chars in a file
function calculate_2($fileName){

    $charsCount = 0;
    $digitsCount = 0;
    $charResult = array();
    $digitResult = array();

    $fileRead = file_get_contents($fileName);
    for($i = 0; $i< strlen($fileRead);$i++){
        if(!is_numeric($fileRead[$i])){
            $charsCount =   substr_count($fileRead, $fileRead[$i]);
            if($fileRead[$i] == "\n" ){
                $charResult["new line"] = $charsCount;
            }elseif($fileRead[$i] == " "){
                $charResult["espace"] = $charsCount;
            }else{
                $charResult[$fileRead[$i]] = $charsCount;
            }
                


        }else{
            $digitsCount = substr_count($fileRead, $fileRead[$i]);
            $digitResult[$fileRead[$i]] = $digitsCount;
        }
       
    }
 
    return array("Chars" =>$charResult ,"Digits" => $digitResult);
  
}

//function that calcualte the letters nummber and the digits number and ines nummber in a giving file
// The result must be stocked in a file named Result.txt and the returnes values must be ordered acordinly 

function calculate_3($fileName){
    $result = calculate_2($fileName);
    $lettersCount = 0;
    $linesCount = 0;
    $file = fopen($fileName,'r');
    while(! feof($file)){
        $line = fgets($file);
        for($i= 0; $i< strlen($line); $i++){
              if(ctype_alpha($line[$i])){
                   $lettersCount++;
               }
        } 
        $linesCount++;


    }
    fclose($file);
    //dgits counts
    $digitsCount = array_sum($result["Digits"]);
    $resultSorted = array($digitsCount,$lettersCount,$linesCount);
    sort($resultSorted);
   createFile("Result.txt",implode("\n",$resultSorted));

}

//Function that anlyze a text file and calculate th number of the occurance of a spesefci word
function searchForWord($fileName, $wordToSearchFor){
    //$file = fopen($fileName,'r');
    $wordCount = str_word_count(file_get_contents($fileName));
    echo $wordCount;
} 

// receive a file invert it then past it in a  new file 
function reverseFile($fileName,$mode){

    //vars to use for both modes
    $content = file_get_contents($fileName);
    $reversedFileContent = "";

    if($mode == 'letter'){
        $reversedFileContent =  strrev($content);
    }else{
        $inpStrArray = explode(" ", $content); 
       $reversedFileContent =  implode(" ", array_reverse($inpStrArray)); 

    }
   
    createFile("ReversedFile.txt",$reversedFileContent);
}
// This function create a file that contains employees infos based on a form that the user fill

function storeFile($clientName, $clientCity){
   
    if(filesize("info.txt") > 1000){
        return;
    }
    $file = fopen('info.txt', 'a')or die("Unable to open file!");
    
    $data = file("info.txt");
    $counter = count($data);
    fwrite($file, $counter ."         ".$clientName . "         ".$clientCity. "\n");
    fclose($file);

}
//based on the file on the last exercise we have to look for a spesefic client based on its code
//
function searchCode($code){

    $file = fopen("info.txt",'r');
    while(! feof($file)){
        $line = fgets($file);
        if(($line[0] ?? -1) == $code )
        echo "$line <br>";
    } 


    return array("Code Client" => $code,"Client Name" => explode("         ",$line)[1],"Client City" => explode("        ",$line)[2])
    ?? "There is no element in our database with such code";
}

function uploadFile($fileName){
    $result = array();
    $file = fopen($fileName,'r');
    $i = 0;
    while(!feof($file)){
        $line = fgets($file);
        if(isset($line[0]) && isset(explode("         ",$line)[1]) && isset(explode("         ",$line)[2]))
             $result[$i]  = array("Code Client" => explode("         ",$line)[0],"Client Name" => explode("         ",$line)[1],"Client City" => explode("        ",$line)[2]);    
        $i++;    
    }

   //     echo count($result);
        return $result;
}

// This fountion count the number of article goint to a certain city 
function countCities($city,$data){

    $count = 0;
    for($i = 0;$i< count($data);$i++){
        $string = str_replace(' ', '-', $data[$i]["Client City"]); // Replaces all spaces with hyphens.
        $string =  preg_replace('/[^A-Za-z0-9\-]/', '', $data[$i]["Client City"]); // Remov
           if(strtoupper($string) == strtoupper($city)){
            $count++;
        }
    }
}

//this function take a table of infos and create for each city the list of distributors that are from the same city
function distrebutorCity($data){
    for($i = 0;$i< count($data);$i++){
        $content = "";
        for($j= 0;$j <count($data); $j++){
            if($data[$i]["Client City"] == $data[$j]["Client City"]){
                $content .= $data[$j]["Code Client"] . "         " . $data[$j]["Client Name"] . "        " ."\n";

            }
        }

            createFile($data[$i]["Client City"] ."txt", $content);
    }




}
    
?>