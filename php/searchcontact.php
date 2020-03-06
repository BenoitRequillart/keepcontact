<?php

if($argv[1] == "search"){

    $contact_file = "contact.json";
    try{
        $contact_fileData = file_get_contents($contact_file);
        
        $searchcontact = json_decode($contact_fileData, true);
        $i = 0;
        if (isset($argv[2]) && isset($argv[3])) {
            while( $i < count($searchcontact)) {
                if (in_array(strtolower($argv[2]), $searchcontact[$i]) && in_array(strtolower($argv[3]), $searchcontact[$i])) {
                    echo "Contact n°$i\n";
                    print_r('NOM : '.ucfirst($searchcontact[$i]['nom'])."\n");
                    print_r('PRENOM : '.ucfirst($searchcontact[$i]['prenom'])."\n");
                    print_r('NUMERO DE TELEPHONE : '.$searchcontact[$i]['phonenumber']."\n");
                    print_r('MAIL : '.strtolower($searchcontact[$i]['mail'])."\n");
                    echo "===============================\n";
                    
                }
                $i++;
            }
        }
        elseif (isset($argv[2]) && empty($argv[3])) {
            while( $i < count($searchcontact)) {
                if (in_array(strtolower($argv[2]), $searchcontact[$i])) {
                    echo "Contact n°$i\n";
                    print_r('NOM : '.ucfirst($searchcontact[$i]['nom'])."\n");
                    print_r('PRENOM : '.ucfirst($searchcontact[$i]['prenom'])."\n");
                    print_r('NUMERO DE TELEPHONE : '.$searchcontact[$i]['phonenumber']."\n");
                    print_r('MAIL : '.strtolower($searchcontact[$i]['mail'])."\n");
                    echo "===============================\n";
                    
                }
                $i++;
            }
        }
        else {
            echo 'missing search';
        }
        
    }
    catch( Exception $e ) {
            echo "Erreur : ".$e->getMessage();
            echo "Il y a eu un petit problèmes";
        }
    }