<?php
require_once("../Modele/db_connect.php");
    

    $db = db_connection();
    
    //creation of an array containing data about the contestant
    $data = array("coucou", 12, 15);

    $req = $db->prepare('INSERT INTO category(nameCat, miniAge, maxiAge)
                        VALUES(?,?,?)');
    
 	$req->execute($data);
    
    echo 'essai';
    


<div class="center-align">
?>
                <form method="POST" action = "" class="col s12">
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
                    <div class= "center-align">
                     <button class = "waves-effect waves-light btn" type="submit">M'inscrire</button>
                    </div>
                </form>


?>