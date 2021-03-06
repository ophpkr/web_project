    <?php include('header_management.php')?>
    <?php include('menu.php')?>
    <?php require_once('../Controller/cont_tools.php'); ?>
     <?php require_once('../Controller/cont_tools_tournament_management.php'); ?>
   
   <div class= "row"> 
    <h1 class= "col s12 m9 l7 offset-m4 offset-l4">GESTION DES COMPÉTITIONS</h1>
    </div>
   
<div class= "row">
    <div class="col s12 m9 l7 offset-m4 offset-l4">
      <div class="card horizontal l2">
      <div class="card-image cardheight">
        <img>
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.</p>
        </div>
        <div class="card-action">
          <a id= "addtourn" href="#formtourn">Créer une nouvelle compétition</a>
        </div>
      </div>
      </div>
    </div>
    <form class="input-field center-align col s12 m9 l7 offset-m4 offset-l4 hide" id= "formtourn" method="POST" action = "../Controller/cont_tournament_creation.php">
        <div>
         <input placeholder="Nom de la compétition" type="text" class="validate" name="nametourn" required>
        </div>
        <div class= "col s5 m2 l2 offset-m5 offset-l5 center-align">
         <input placeholder="date de début" name = "sdate" id= "sdate" type="date" class="datepicker"> 
        </div>
        <div class= "col s5 m2 l2 offset-m5 offset-l5 center-align">            
         <input placeholder="date de fin" name = "edate" id= "edate" type="date" class="datepicker">
        </div>
        <div class= "center-align">
         <button class = "waves-effect waves-light btn" type="submit">Créer</button>
        </div>
    </form>
<?php if($existtourncurr!=0)
{ ?>
    <div class="col s12 m9 l7 offset-m4 offset-l4">
    <div class="card horizontal s3 m9 l7">
      <div class="card-image cardheight">
        <img src= "image/windsurf3.png">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <h2><?php echo $nameCourTourn; ?></h2>
          <p><?php echo $dStartCurrentTourn; ?></p>
          <p><?php echo $dEndCurrentTourn; ?></p>
        </div>
        <div class="card-action">
          <a href="registration_management.php">Gérer</a>
          <a id = "updateform" href="#updatetourn">Modifier</a>      
          <a class="waves-effect waves-light" href="<?php echo '#modreg' . $numCurrentTourn; ?>">Supprimer</a>
        </div>
      </div>        
    </div>
    
  </div>
    <form class="input-field center-align col s12 m9 l7 offset-m4 offset-l4 hide" id= "updatetourn" method="POST" action = "../Controller/cont_tournament_modification.php">
          <div class= "col s5 m2 l2 offset-m5 offset-l5 center-align">
           <input placeholder="date de début" name = "newsdate" type="date" class="datepicker"> 
          </div>
          <div class= "col s5 m2 l2 offset-m5 offset-l5 center-align">            
           <input placeholder="date de fin" name = "newedate" type="date" class="datepicker">
          </div>
          <div class= "center-align">
           <button class = "waves-effect waves-light btn" type="submit">Modifier</button>
          </div>
      </form>  
</div>
<?php } ?>

<div id="<?php echo 'modreg' . $numCurrentTourn; ?>" class="modal">
         <div class="modal-content">
           <h4>Etes-vous sûr de vouloir supprimer cette compétition?</h4>
           <p>Attention : cette action sera irréversible</p>
         </div>
         <div class="modal-footer">
           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
            <form method="GET" action = "../Controller/cont_delete_tourn.php" >
                <input type= "hidden" name= "numtourn" value = "<?php echo $numCurrentTourn ; ?>"></input>
                <button class = "modal-action modal-close waves-effect waves-green btn-flat" type="submit">Oui</button>
            </form>
           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
         </div>
       </div> 




<?php for($i = 0; $i < sizeof($nameTournPast); $i++)
 { ; ?>
<div class = "row">
<div class="col s12 m9 l7 offset-m4 offset-l4">
    <div class="card horizontal s3 m4 l4">
      <div class="card-image cardheight">
        <img src="http://lorempixel.com/100/190/nature/6">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <h2><?php echo $nameTournPast[$i]; ?></h2>
          <p><?php echo $dSartTournPast[$i]; ?></p>
          <p><?php echo $dEndTournPast[$i]; ?></p>
        </div>
        <div class="card-action">
          <a href="#">Voir les résultats</a>      
          <a class="waves-effect waves-light" href="<?php echo '#modal' . $i ?>">Supprimer</a>
        </div>
      </div>        
    </div> 
   </div>
</div>

   <!-- Modal Structure -->
<div id="<?php echo 'modal' . $i ?>" class="modal">
     <div class="modal-content">
       <h4>Etes-vous sûr de vouloir supprimer la compétition?</h4>
       <p>Attention : cette action sera irréversible</p>
     </div>
     <div class="modal-footer">
       <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
        <form method="GET" action = "../Controller/cont_delete_tourn.php" >
            <input type= "hidden" name= "numtourn" value = "<?php echo $numTournPast[$i] ; ?>"></input>
            <button class = "modal-action modal-close waves-effect waves-green btn-flat" type="submit">Oui</button>
        </form>
       <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
     </div>
   </div> 
 <?php } ?>

    
    <?php include('footer_management.php')?>