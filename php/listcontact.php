<?php

    if($argv[1] == "list"){

        $contact_file = "contact.json";
        try{
            $contact_fileData = file_get_contents($contact_file);
            
            $listcontact = json_decode($contact_fileData, true);
            $i = 1;
            while( $i < count($listcontact) && $i > 0) { 
                echo "Contact n°$i\n";
                print_r('NOM : '.ucfirst($listcontact[$i]['nom'])."\n");
                print_r('PRENOM : '.ucfirst($listcontact[$i]['prenom'])."\n");
                print_r('NUMERO DE TELEPHONE : '.$listcontact[$i]['phonenumber']."\n");
                print_r('MAIL : '.strtolower($listcontact[$i]['mail'])."\n");
                echo "===============================\n";
                $i++;
            }
                
            

        }
        catch( Exception $e ) {
            echo "Erreur : ".$e->getMessage();
            echo "Il y a eu un petit problèmes";
        }
    }
?>