<?php require_once('../Controller/cont_tools.php'); ?>


<div>  
    <ul id= "nav-side" class= "side-nav fixed col s3 indigo lighten-1" >
        <li>
            <a href= "../Controller/cont_deconnect.php" >Déconnexion</a>
        </li>
        <li class= "logo">
            <a href= "./tournament_management.php" class= "brand-logo">Gestion des compétitions</a>
        </li>
        
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <option class="collapsible-header waves-teal"><?php echo $nameCourTourn; ?></option>
                  <div class="collapsible-body ">
                    <ul >
                      <li class= "indigo lighten-2"><a href="./registration_ok_management.php">Liste des inscrits</a></li>
                      <li class= "indigo lighten-2"><a href="registration_management.php">Gérer les inscriptions</a></li>
                      <li class= "indigo lighten-2"><a href="course_management.php">Gérer les manches</a></li>
                      <li class= "indigo lighten-2"><a href="results_management.php">Résultats</a></li>
                    </ul>
                  </div>
                <li class="collapsible-header waves-teal"><a href =#>Anciens résultats</a></li>
            </li>
          </ul>
        </li>
    </ul>        
    
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<script type="text/javascript" src="js/adds.js"></script>
    