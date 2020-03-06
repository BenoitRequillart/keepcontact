<?php

if($argv[1] == "edit"){

    $contact_file = "contact.json";
    try{
        $contact_fileData = file_get_contents($contact_file);
        
        $editcontact = json_decode($contact_fileData, true);
        if (isset($argv[2])) {
            if( 0 < $argv[2] && $argv[2] < count($editcontact)){
                
                echo "You want to edit the contact :\n";
                echo $editcontact[$argv[2]]['nom']." ".$editcontact[$argv[2]]['prenom']."\n";
                echo "Y / N : " ;
                $yesorno = trim(fgets(STDIN));
                if ($yesorno == "y" || $yesorno == "Y") {
                    echo 'NOM : ';
                    $name = trim(fgets(STDIN)); 
                    echo 'PRENOM : ';
                    $firstname = trim(fgets(STDIN));
                    echo 'NUMERO : ';
                    $phone = trim(fgets(STDIN));
                    echo 'MAIL : ';
                    $mail = trim(fgets(STDIN));
                    if (!empty($name)) {
                        $editcontact[$argv[2]]['nom'] = strtolower($name);
                    }
                    if (!empty($firstname)) {
                        $editcontact[$argv[2]]['prenom'] = strtolower($firstname);
                    }
                    if (!empty($phone)) {
                        $editcontact[$argv[2]]['phonenumber'] = $phone;
                    }
                    if (!empty($mail)) {
                        $editcontact[$argv[2]]['mail'] = strtolower($mail);
                    }
                    
                    
                    $stock_edit = json_encode($editcontact);
    
                    file_put_contents($contact_file, $stock_edit);
                }
                else{
                    echo 'Bye';
                }
               
            }
            else{
                echo 'no contact at this ID';
            }
        }
        else{
            echo "missing the ID of the contact\n";
            echo "exemple : ./keepcontact edit 2";
            
        }
        
    }
    catch( Exception $e ) {
        echo "Erreur : ".$e->getMessage();
        echo "Il y a eu un petit problèmes";
    }
}
?>