<?php require_once('../Controller/tools_regist_manag.php') ?>
<?php require_once('../Controller/tools_course_management.php') ?>
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

<div class= "row">   
    <div>
        <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Entrer les résultats</h2>
    </div>
    <?php if(!empty($namecourse))
    { ?>
    <div>
            <div>               
                <table class="bordered responsive-table col s12 m9 l7 offset-m4 offset-l4">
                    <thead>
                        <tr>
                            <th>Manche</th>
                            <th>Coefficient</th>
                            <th>Dossard</th>
                        </tr>
                    </thead>
        
                <tbody>
                  
                    <?php for($i = 0; $i<sizeof($namecourse); $i++)
                    {?>
                    <tr>
                    <td><?php echo $namecourse[$i]; ?></td>
                    <td><?php echo $coeffcourse[$i]; ?></td>
                    <td>
                        <form method="POST" action = "../Controller/add_result.php" >
                        <input type= "text" name= "bib"></input>
                        <input type= "hidden" name= "numcourse" value = "<?php echo $numcourse[$i] ; ?>"></input>
                        <button class = "waves-effect waves-light btn" type="submit">ok</button>
                    </form>
                    </td>
                    </tr>
                    <?php }?>
                    
                  
                </tbody>
              </table>
                    
            
            </div>
        
            
    </div>
</div>
    <?php }
    else {?>
<div class= "row ">
    <div>
            <div>               
                <table class="bordered responsive-table col s12 m9 l7 offset-m4 offset-l4">
                    <thead>
                        <tr>
                            <th>Manche</th>
                            <th>Dossard</th>
                        </tr>
                    </thead>
                </table>
                    
            
            </div>
        
            
    </div> <?php } ?> 
</div>