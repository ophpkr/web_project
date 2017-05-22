<?php require_once('../Controller/tools_regist_manag.php') ?>
<?php include('header_management.php')?>
<?php include('menu.php')?>

<div class= "row">
    <div>
        <h1 class= "col s12 m9 l7 offset-m5 offset-l5">LES MANCHES</h1>
    </div>
    <div>
        <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Création d'une manche</h2>
    </div>
    
    <form method="POST" action = "../Controller/course_creation.php" >
        <div class= "col s12 m9 l7 offset-m3 offset-l3">
           
            <input  placeholder="nom de la manche" type="text" classe = "col s12 m9 l7  validate" name="namecourse" size = "15" required>
           

            <input placeholder="coefficient" type="number" class="col s12 m2 l2 validate" name="coeff" min="1" max="10" required>

            <button class = "waves-effect waves-light btn" type="submit">Créer</button>
                
        
        </div>
    </form>
        
    </div>
</div>