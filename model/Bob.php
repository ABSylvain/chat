<?php 
class Bob{

///////////////// VERIF CONTENU D'UNE VARIABLE /////////////////
function whatThat($yourVar){
    if(isset($yourVar)){
        echo 'Exist ';
        if(!empty($yourVar)){
            echo 'Something inside : ';
            if(is_dir($yourVar)){
                echo 'Folder.';
            }if(is_file($yourVar)){
                echo 'File.';
            }if(is_int($yourVar)){
                echo 'Numeric.';
            }if(is_float ($yourVar)){
                echo 'Decimal Number.';
            }if(is_string($yourVar)){
                echo 'String.';
            }if(is_object($yourVar)){
                echo 'Objet.';
            }if(is_array($yourVar)){
                echo 'Array.';
            }if(is_bool($yourVar)){
                echo 'Booléen.';
            }if($yourVar == $_SESSION){
                echo 'Session.';
            }if($yourVar == $_POST){
                echo 'Post.';
            }if(json_decode($yourVar)){
                echo 'Json';
            }if($yourVar->setParserProperty(XMLReader::VALIDATE, true)){
                echo 'XML.';
            }
        }else{
        echo 'Nothing inside.';
        }
    }else{
        echo 'Not Exist.';
    }
}

/////////////////// Afficher un tableau ////////////////
function diplayArray($array){
    echo '<pre>';
    var_dump($array);
    echo'</pre>';
}

/////////////////// 
}
?>