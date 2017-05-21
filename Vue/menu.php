<?php require_once('../Controller/tools.php'); ?>


<div>  
    <ul id= "nav-side" class= "side-nav fixed col s3  brown darken-1" >
        <li>
            <a href= "../Controller/deconnect.php" >Déconnexion</a>
        </li>
        <li class= "logo">
            <a href= "tournament_management.php" class= "brand-logo">yo</a>
        </li>
        
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <option class="collapsible-header waves-teal"><?php echo $nameCourTourn; ?></option>
                  <div class="collapsible-body ">
                    <ul >
                      <li class= "brown lighten-1"><a href="#">Liste des inscrits</a></li>
                      <li class= "brown lighten-1"><a href="registration_management.php">Gérer les inscriptions</a></li>
                      <li class= "brown lighten-1"><a href="#">Gérer les manches</a></li>
                      <li class= "brown lighten-1"><a href="#">Résultats</a></li>
                    </ul>
                  </div>
                <li class="collapsible-header waves-teal"><a href =#>Anciens résultats</a></li>
            </li>
          </ul>
        </li>
            
    
</div>
<script type="text/javascript" src="js/adds.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>     