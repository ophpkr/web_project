<?php include("./header_homepage.php"); ?>
<?php require_once("../Controller/cont_tools.php"); ?>

<?php if(isset($_GET['msg']))
      {echo $msg;} ?>
<div id="modal2" class="modal modal-fixed-footer">
 
 
      <?php if (isset($_GET["msg"])) 
  {  
  echo $_GET["msg"];
  } ?>
  </div>
</div>
<h1 class="center-align flow-text">S'inscrire à la compétition</h1>


          <div class="row">
            <form method="POST" action = "../Controller/cont_registration_contestant.php" class="col s12 m8 l6 offset-m2 offset-l3">
              <div class="row">
                <div class="input-field s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input placeholder="Prenom" type="text" class="validate s12 m5 l5 offset-m1 offset-l1" name="firstname" required>
                </div>
              </div>
              <div class="row">
                <div class="input-field s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input placeholder="Nom" type="text" class="validate" name="name" required>
                </div>
              </div>
              <div class="row">
                  <div class="input-field col s12 center-align">
                  <input name="sexe" type="radio" value = "H" id="test1"/>
                  <label for="test1">Homme</label>
                  <input name="sexe" value = "F" type="radio" id="test2" />
                  <label for="test2">Femme</label>
                  </div>
              </div>
              
              
                
              <div class="row">
                <label>Date de naissance :</label>
              </div>
              <div class="row">
                 <div class= "input-field col s4 ">
                 
                  <select name="day">
                    <?php for ($day = 01 ; $day <= 31 ; $day++)
                      {
                      ?>
                        <option value="<?php echo $day?>"><?php echo $day; ?></option>
                    <?php }?>
                  </select>
                  <label>Jour</label>
                 </div>
                     
                      
                      <div class= "input-field col s4 ">
                      <select name="month">
                        <?php for ($month = 1 ; $month <= 12 ; $month++)
                          {
                          ?>
                            <option value="<?php echo $month?>"><?php echo $month; ?></option>
                        <?php }?>
                      </select>
                      <label>Mois</label>
                      
                      </div>
                    <div class= "input-field col s4">
                      
                        <select name="year">
                        <?php for ($year = date(Y)-12 ; $year >= date(Y)-100 ; $year--)
                          {
                          ?>
                            <option value="<?php echo $year ?>"><?php echo $year; ?></option>
                        <?php }?>
                      </select>
                      <label>Année</label>
                    </div>
                </div>
                
                <div class="row">
                  <div class="input-field s12">
                  <i class="material-icons prefix">contacts</i>      
                  <input placeholder="Adresse" type="text" class="validate" name="street" required>
                  </div>
                </div>
                
                <div class="input-field s6">
                  <i class="material-icons prefix">contacts</i> 
                  <input placeholder="Code Postal" type="text" class="validate" name="pcode" required>
                </div>
                
                
                <div class="input-field s6">
                  <i class="material-icons prefix">contacts</i> 
                  <input placeholder="Ville" type="text" class="validate" name="city" required>
                
                </div>
                <div class="row">
                <div class="input-field s12">
                  <i class="material-icons prefix">email</i> 
                  <input placeholder="email" type="email" class="validate" name="email" required>
                </div>
                </div>
                <div class="row">
                <div class="input-field s12" name="phone">
                  <i class="material-icons prefix">contact_phone</i> 
                  <input placeholder="tel" type="text" class="validate">
                </div>
                </div>
                <div class="row">
                <div class= "s12">
                  <input class="with-gap" name="havepermit" type="checkbox" id="havepermit">
                  <label for="havepermit">J'ai une licence</label>
                </div>
                </div>
                <div class="row">
                <div class="input-field s12" >
                  <input placeholder="Numéro licence" type="text" class="validate hide" name="numpermit" id= "permit">
                </div>
                </div>
              <div class="row">
              <div>
                <button class = "waves-effect waves-light btn orange lighten-1 col s6 m4 l2 offset-s3 offset-m4 offset-l5" type="submit">M'inscrire</button>
              </div>
              </div>
            </form>
          </div>

<?php include("./footer_homepage.php"); ?>