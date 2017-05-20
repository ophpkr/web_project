<?php require_once("../Modele/user.php"); ?>
<?php require_once("./tools.php"); ?>

<?php

/*echo $_POST['name'] . $_POST['firstname'] . $_POST['day'] . $_POST['month'] . $_POST['year'] . $_POST['sexe'] . $_POST['street'] . $_POST['pcode']
        . $_POST['city'] . $_POST['email'] . $_POST['size'];*/
        
        
    //check that every mandatory fields are not empty
    if(isset($_POST['name']) AND isset($_POST['firstname']) AND isset($_POST['day']) AND isset($_POST['month'])
       AND isset($_POST['year']) AND isset($_POST['sexe']) AND isset($_POST['street']) AND isset($_POST['pcode'])
       AND isset($_POST['city']) AND isset($_POST['email']) AND isset($_POST['size']))
    {
        
        if(!preg_match('/^[a-zA-Z-\s]+$/', $_POST['name']))
        {
            //$msg : the message returned to the user when the registration has something wrong
            $msg = "Votre nom est incorrect \n Attention : les symboles '/', '-', '_' sont refusés";
            echo '1';
        }
    
        if(!preg_match('/^[a-zA-Z-\s]+$/', $_POST['firstname']))
        {
            $msg = "Votre prénom est incorrect \n Attention : les symboles '/', '-', '_' sont refusés";
            echo '2';
        }
    
        if(!preg_match('/^[0-9a-zA-Z-\s]+$/', $_POST['street']))
        {
            $msg = "La ville entrée est incorrecte \n Attention : les symboles '/', '-', '_' sont refusés";
            echo '3';
        }
        
        if(!preg_match('/^[a-zA-Z-\s]+$/', $_POST['city']))
        {
            $msg = "La ville entrée est incorrecte \n Attention : les symboles '/', '-', '_' sont refusés";
            echo '4';
        }
        
        if(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
            {
                $msg = "Votre email n'est pas valide";
                echo '5';
            }
            
            
            
        //check the date
        if(!preg_match('/^[0-9]+$/', $_POST['day']) || intval($_POST['day'])>31 || intval($_POST['day'])<1 )
        {
            $msg = "Cette date n'existe pas";
            echo '6';
        }
        else{
            //convert date in date type accepted by mysql
            $date = convertToDate($_POST['day'] ,$_POST['month'], $_POST['year']);
            echo 'conv ok';
        }
        
        //check the Postal Code
        if(!preg_match('/^[0-9]+$/', $_POST['pcode']) || strlen($_POST['pcode']) != 5)
        {
            $msg = "Le code postal est incorect";
            echo '7';
        }
        
        if(isset($_POST['phone']) && strlen($_POST['phone']) != 10)
        {
            $msg = "Le numéro de téléphone est incorrect";
            echo '8';
        }
        
        //check the size for the bib
        if(!preg_match('(XS|S|M|L|XL|XXL)', $_POST['size']))
        {
            $msg = "Taille non existante";
            echo '9';
        }
        
        if (isset($_POST['havepermit']) && !isset($_POST['numpermit']))
        {
            $msg = "Vous n'avez pas renseigné votre numéro de licence";
            echo '10';
        }
        
        if(!isset($_POST['havepermit']))
        {
            $numPermit = NULL;
            echo 'a pas lic';
        }
        else
        {
            $numPermit = $_POST['numpermit'];
            echo 'a lic num ' . $_POST['numpermit'];
        }
        
        if(!isset($_POST['sexe']))
        {
            $errors['sexe'] = "Vous n'avez pas mentionné votre sexe";
            echo '11';
        }
        
        if(empty($_POST['phone']))
        {
            $phone = NULL;
        }
        else
        {
            $phone = $_POST['phone'];
        }
        
    
        
        if(empty($errors))
        {
            echo 'pas erreur';
            addContestant($_POST['name'], $_POST['firstname'], $date, $_POST['sexe'], $_POST['street'], $_POST['pcode'], $_POST['city'], $_POST['email'], $phone, $_POST['size'], $numPermit);
            $msg = "Votre inscription a bien été prise en compte";
            header("Location: ../Vue/registration.php?msg=" .$msg);
        }
        
        
        
    }
    
    
    
    
    




?>