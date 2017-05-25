<?php require_once("../Modele/user.php"); ?>
<?php require_once("../Modele/registration.php"); ?>
<?php require_once("../Modele/category.php"); ?>
<?php require_once("../Modele/tournament.php"); ?>
<?php require_once("./cont_tools.php"); ?>

<?php


        
if(!empty(getCurrentTourn()[0]))
{
    if(!compareDatesStrict((getCurrentTourn()[0] -> dStart), date('Y-m-d')))
    {
        
        if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['day']) && isset($_POST['month'])
           && isset($_POST['year']) && isset($_POST['sexe']) && isset($_POST['street']) && isset($_POST['pcode'])
           && isset($_POST['city']) && isset($_POST['email']))
        {
            
            if(!preg_match('/^[a-zA-Z-\s]+$/', $_POST['name']))
            {
    
                $msg = "Votre nom est incorrect \n Attention : les symboles '/', '-', '_' sont refusés";
                header("Location : ../Vue/registration.php");
            }
        
            if(!preg_match('/^[a-zA-Z-\s]+$/', $_POST['firstname']))
            {
                $msg = "Votre prénom est incorrect \n Attention : les symboles '/', '-', '_' sont refusés";
           
            }
        
            if(!preg_match('/^[0-9a-zA-Z-\s]+$/', $_POST['street']))
            {
                $msg = "La ville entrée est incorrecte \n Attention : les symboles '/', '-', '_' sont refusés";
       
            }
            
            if(!preg_match('/^[a-zA-Z-\s]+$/', $_POST['city']))
            {
                $msg = "La ville entrée est incorrecte \n Attention : les symboles '/', '-', '_' sont refusés";
            
            }
            
            if(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
                {
                    $msg = "Votre email n'est pas valide";
                  
                }
                
            if(!preg_match('[F,H]', $_POST['sexe']))
            {
                $msg = "Aucun sexe renseigné";
            }
            //check the date
            $bDate = convertToDate($_POST['day'] ,$_POST['month'], $_POST['year']);
            
            
            if(!preg_match('/^[0-9]+$/', $_POST['day']) || intval($_POST['day'])>31 || intval($_POST['day'])<1 )
            {
                $msg = "Cette date n'existe pas";
                
            }
            elseif(!preg_match('/^[0-9]+$/', $_POST['month']) || intval($_POST['month'])>12 || intval($_POST['month'])<1 )
            {                
                $msg = "Cette date n'existe pas";
            }  
            elseif(!preg_match('/^[0-9]+$/', $_POST['year']))
            { 
                $msg = "Cette date n'existe pas";
            }
            
            else
            {
                
           

            $datemini = new DateTime(getCurrentTourn()[0] -> dStart);
            $datemini->sub(new DateInterval('P12Y'));
            
            //$datemini->format('Y-m-d');
           
            
                if(compareDates($bDate, $datemini -> format('Y-m-d')) != 1)
                {
                    $msg = "Vous n'avez pas l'âge requis pour participer à cette compétition";
                }
                
            }

            if(!preg_match('/^[0-9]+$/', $_POST['pcode']) || strlen($_POST['pcode']) != 5)
            {
                $msg = "Le code postal est incorect";
            }
            
            if(isset($_POST['phone']) && strlen($_POST['phone']) != 10)
            {
                $msg = "Le numéro de téléphone est incorrect";
            }
            
            
            if (isset($_POST['havepermit']) && !isset($_POST['numpermit']))
            {
                $msg = "Vous n'avez pas renseigné votre numéro de licence";
            }
            
            if(!isset($_POST['havepermit']))
            {
                $numPermit = NULL;
            }
            else
            {
                $numPermit = $_POST['numpermit'];
            }
            
            if(!isset($_POST['sexe']))
            {
                $msg = "Vous n'avez pas mentionné votre sexe";
            }
            
            if(empty($_POST['phone']))
            {
                $phone = NULL;
            }
            else
            {
                $phone = $_POST['phone'];
            }
            
        
            
            if(mailExists($_POST['email']))
            {
                
                echo 'mail existant';
                $street = getStreet($_POST['email']);
                
                if(strtolower(noAccent($_POST['street'])) != $street)
                {
                    updateContInfos($_POST['email'], strtolower(noAccent($_POST['street'])), $_POST['pcode'], ucwords(strtolower(noAccent($_POST['city']))), $phone);
                    $msg = "Votre inscription a bien été prise en compte";
                    header("Location: ../Vue/homepage.php/#regvalide?msg=" .$msg);
                }
                
                $num = getNumCont($_POST['email']);
                
                
            }
            else
            {
                addContestant(ucwords(strtolower(noAccent($_POST['name']))), ucwords(strtolower(noAccent($_POST['firstname']))), $bDate,
                        $_POST['sexe'], strtolower(noAccent($_POST['street'])), $_POST['pcode'], ucwords(strtolower(noAccent($_POST['city']))),
                        $_POST['email'], $phone, $numPermit);
                
                $num = getNumCont($_POST['email']);
                
                $msg = "Votre inscription a bien été prise en compte";
                header("Location: ../Vue/homepage.php?msg=" .$msg);
            }
            
            
            $dbirthminmaj = new DateTime(getCurrentTourn()[0] -> dStart);
            $dbirthminmaj -> sub(new DateInterval('P18Y'));
            if(compareDatesStrict($bDate, $dbirthminmaj -> format('Y-m-d')) != 1)
            {
                $paraut = NULL;
            }
            else
            {
                $paraut = 0;
            }
            
            $yearcurtourn = date("Y", strtotime(getCurrentTourn()[0] -> dStart));
            $yearcurtourn = intval($yearcurtourn);
            $yearbirth = date("Y", intval($bDate));
            $yearbirth = intval($yearbirth);
            
            $diff = $yearcurtourn - $yearbirth;
            
            $cat = 0;
            $cats = getAges();
            $i = 0;
            while($cat == 0)
            {   
                if($diff <= $cats[$i]->maxiAge && $diff >= $cats[$i]->miniAge)
                {
                    $cat = $cats[$i] -> numCat;
                }
                
                $i++;
            }
            

            
            
            
            setRegistration($numPermit, $paraut, $num, (getCurrentTourn()[0] -> numTourn), $cat);
            echo'reg ok';
            
        }
        else
        {
            header("Location : ../Vue/homepage.php");
            $msg = "Vous 'avez pas rempli tous les champs obligatoires";
        }
        
    }
    else
    {
        $msg = "Les dates d'inscriptions pour cette compétition ont pris fin";
    }
    
}
else
{
    $msg = "Il n'y a pas de compétition à laquelle s'inscrire";
    
}
    
    
    




?>