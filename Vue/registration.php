<?php include("./header_homepage.php"); ?>
<?php require_once("../Controller/cont_tools.php"); ?>

<div id="modal2" class="modal modal-fixed-footer">
 
 
      <?php if (isset($_GET["msg"])) 
  {  
  echo $_GET["msg"];
  } ?>
  </div>
</div>
<h1 class="center-align">S'inscrire à la compétition</h1>


        <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
          <label for="disabled">Disabled</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          This is an inline input field:
          <div class="input-field inline">
            <input id="email" type="email" class="validate">
            <label for="email" data-error="wrong" data-success="right">Email</label>
          </div>
        </div>
      </div>
    </form>
  </div>
        
          <div class="row">
            <form method="POST" action = "../Controller/cont_registration_contestant.php" class="col s12 m24 l24">
              <div class="row">
                <div class="input-field col s612">
                  <input placeholder="Prenom" type="text" class="validate m10 l10 offset-m1 offset-l1" name="firstname" required>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Nom" type="text" class="validate" name="name">
                </div>
              </div>
              <div class="row">
                  <input name="sexe" type="radio" value = "H" id="test1"/>
                  <label for="test1">Homme</label>
                  <input name="sexe" value = "F" type="radio" id="test2" />
                  <label for="test2">Femme</label>
                </div>
                <div class="row">
                  <p>Date de naissance :</p>
                   <div>
                    <label>Jour</label>
                    <select class = "numberInput" name="day">
                      <?php for ($day = 01 ; $day <= 31 ; $day++)
                        {
                        ?>
                          <option value="<?php echo $day?>"><?php echo $day; ?></option>
                      <?php }?>
                    </select>
                    <label>Mois</label>
                    <select class = "numberInput" name="month">
                      <?php for ($month = 1 ; $month <= 12 ; $month++)
                        {
                        ?>
                          <option value="<?php echo $month?>"><?php echo $month; ?></option>
                      <?php }?>
                    </select>
                    <label>Année</label>
                    <select class = "numberInput" name="year">
                      <?php for ($year = date(Y)-12 ; $year >= date(Y)-100 ; $year--)
                        {
                        ?>
                          <option value="<?php echo $year ?>"><?php echo $year; ?></option>
                      <?php }?>
                    </select>
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                  <input placeholder="Adresse" type="text" class="validate" name="street" required>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Code Postal" type="text" class="validate" name="pcode" required>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Ville" type="text" class="validate" name="city" required>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                  <input placeholder="email" type="email" class="validate" name="email" required>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s12" name="phone">
                  <input placeholder="tel" type="text" class="validate">
                </div>
                </div>
                <div class="row">
                <div class= "col s12">
                  <input class="with-gap" name="havepermit" type="checkbox" id="havepermit">
                  <label for="havepermit">J'ai une licence</label>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s12" >
                  <input placeholder="Numéro licence" type="text" class="validate hide" name="numpermit" id= "permit">
                </div>
                </div>
              <div class="row">
              <div>
                <button class = "waves-effect waves-light btn orange lighten-1" type="submit">M'inscrire</button>
              </div>
              </div>
            </form>
          </div>

<?php include("./footer_homepage.php"); ?>