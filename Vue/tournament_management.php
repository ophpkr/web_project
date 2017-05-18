    <?php include('header_management.php')?>
    <?php include('menu.php')?>
   
   <div class= "row"> 
    <h1 class= "col s12 m9 l7 offset-m4 offset-l4">GESTION DE MES COMPÉTITIONS</h1>
    </div>
   
<div class= "row">
    <div class="col s12 m9 l7 offset-m4 offset-l4">
        <div class="card horizontal l2">
      <div class="card-image cardheight">
        <img src="http://lorempixel.com/100/190/nature/6">
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
    <form class="input-field center-align col s12 m9 l7 offset-m4 offset-l4 hide" id= "formtourn" method="POST" action = "#">
        <div>
         <input placeholder="Nom de la compétition" type="text" class="validate" name="nametourn" required>
        </div>
        <div class= "col s5 m2 l2 offset-m5 offset-l5 center-align">
         <input placeholder="date de début" id= "sdate" type="date" class="datepicker"> 
        </div>
        <div class= "col s5 m2 l2 offset-m5 offset-l5 center-align">            
         <input placeholder="date de fin" id= "edate" type="date" class="datepicker">
        </div>
        <div class= "center-align">
         <button class = "waves-effect waves-light btn" type="submit">Créer</button>
        </div>
    </form>
    <div class="col s12 m9 l7 offset-m4 offset-l4">
    <div class="card horizontal l2">
      <div class="card-image cardheight">
        <img src="http://lorempixel.com/100/190/nature/6">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.</p>
        </div>
        <div class="card-action">
          <a href="#">Gérer</a>
          <a href="#">Modifier</a>
          <a href="#">Supprimer</a>
        </div>
      </div>
    </div>
  </div>
</div>
    
    <?php include('footer_management.php')?>