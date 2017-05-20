<?php require_once('../Controller/tools.php'); ?>


<div>  
    <ul id= "nav-side" class= "side-nav fixed col s3  brown darken-1" >
        <li>
            <a href= "../Controller/deconnect.php" >Déconnexion</a>
        </li>
        <li class= "logo">
            <a href= "tournament_management.php" class= "brand-logo">yo</a>
        </li>
        
        <?php for($i=0; $i<sizeof($namesTourndesc); $i++)
        {?>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <option class="collapsible-header waves-teal"><?php echo $namesTourndesc[$i]; ?></option>
                  <div class="collapsible-body ">
                    <ul>
                      <li class= "brown lighten-1"><a href="#">Gérer les inscriptions</a></li>
                      <li class= "brown lighten-1"><a href="#">Gérer les manches</a></li>
                      <li class= "brown lighten-1"><a href="#">Résultats</a></li>
                    </ul>
                  </div>
            </li>
          </ul>
        </li>
            
        <?php } ?>
    
</div>  