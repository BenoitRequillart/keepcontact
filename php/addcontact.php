<?php
    if($argv[1] == "add"){
        echo 'NOM : ';
        $name = trim(fgets(STDIN)); 
        echo "$name\n";
        echo 'PRENOM : ';
        $firstname = trim(fgets(STDIN));
        echo "$firstname\n";
        echo 'NUMERO : ';
        $phone = trim(fgets(STDIN));
        echo "$phone\n";
        echo 'MAIL : ';
        $mail = trim(fgets(STDIN));
        echo "$mail\n";        
    
    
        $contact_file = 'contact.json';
    
        try {
            // On essayes de récupérer le contenu existant
            $contact_fileData = file_get_contents($contact_file);
            
            if( !$contact_fileData || strlen($contact_fileData) == 0 ) {
                // On crée le tableau JSON
                $newcontact = array();
            } else {
                // On récupère le JSON dans un tableau PHP
                $newcontact = json_decode($contact_fileData, true);
            }
            
            // On ajoute le nouvel élement
            array_push( $newcontact, array(
                'nom' => strtolower($name),
                'prenom' => strtolower($firstname),
                'phonenumber' => $phone,
                'mail' => strtolower($mail)
            ));
            // On réencode en JSON
            $contenu_json = json_encode($newcontact);
            
            // On stocke tout le JSON
            file_put_contents($contact_file, $contenu_json);
            
            echo "Contact enregistrées";
        }
        catch( Exception $e ) {
            echo "Erreur : ".$e->getMessage();
        }
    }
?>