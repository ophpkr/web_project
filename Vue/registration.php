<?php include("./header_homepage.php"); ?>


<h1 class="center-align">S'inscrire à la compétition</h1>


        
          <div class="row">
            <form method="POST" action = "#" class="col s12">
              <div class="row">
                <div class="input-field col s12 center-align">
                  <input placeholder="Prenom" type="text" class="validate" name="firstname" required>
                </div>
                <div class="input-field col s12 center-align">
                  <input placeholder="Nom" type="text" class="validate" name="name" required>
                </div>
                <div class="center-align">
                  <input name="sexe" type="radio" id="test1"/>
                  <label for="test1">Homme</label>
                  <input name="sexe" type="radio" id="test2" />
                  <label for="test2">Femme</label>
                </div>
                  <p class="center-align">Date de naissance :</p>
                   <div class="center-align">
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
                      <?php for ($month = 01 ; $month <= 12 ; $month++)
                        {
                        ?>
                          <option value="<?php echo $month?>"><?php echo $month; ?></option>
                      <?php }?>
                    </select>
                    <label>Année</label>
                    <select class = "numberInput" name="year">
                      <?php for ($year = date(Y)-12 ; $year >= 1930 ; $year--)
                        {
                        ?>
                          <option value="<?php echo $year ?>"><?php echo $year; ?></option>
                      <?php }?>
                    </select>
                    </div>
                  <div class="input-field col s12 center-align">
                  <input placeholder="Adresse" type="text" class="validate" name="street" required>
                </div>
                <div class="input-field col s12 center-align">
                  <input placeholder="Code Postal" type="text" class="validate" name="pcode" required>
                </div>
                <div class="input-field col s12 center-align">
                  <input placeholder="Ville" type="text" class="validate" name="city" required>
                </div>
                <div class="input-field col s12 center-align">
                  <input placeholder="email" type="email" class="validate" name="email" required>
                </div>
                <div class="input-field col s12 center-align" name="telephone">
                  <input placeholder="tel" type="text" class="validate">
                </div>
                <div class="input-field col s12 center-align">
                  <select>
                    <option value="" disabled selected>taille</option>
                    <option value="1">XS</option>
                    <option value="2">S</option>
                    <option value="3">M</option>
                    <option value="3">L</option>
                    <option value="3">XL</option>
                    <option value="3">XXL</option>
                  </select>
                </div>
                <div class= "col s12 center-align">
                  <input class="with-gap" name="havepermit" type="checkbox" id="havepermit" oncheck=show(permit) required/>
                  <label for="havepermit">J'ai une licence</label>
                </div>
                <div class="input-field col s12 center-align" id= "permit">
                  <input placeholder="Numéro licence" type="text" class="validate" name="numpermit">
                </div>
              </div>
            </form>
          </div>

<?php include("./footer_homepage.php"); ?>