<?php require_once('../Controller/tools_regist_manag.php') ?>
<?php include('header_management.php')?>
<?php include('menu.php')?>

<div class= "row">
    <div>
        <h1 class= "col s12 m9 l7 offset-m5 offset-l5">LES INSCRITS</h1>
    </div>
    <div>
        <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Liste de tous les inscrits</h2>
    </div>
    <?php if(!empty($nameRegOk))
    { ?>
    <div>
            <div>               
                <table class="bordered responsive-table col s12 m9 l7 offset-m4 offset-l4">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Numéro d'inscription</th>
                        </tr>
                    </thead>
        
                <tbody>
                  
                    <?php for($i = 0; $i<sizeof($fNameRegOk); $i++)
                    {?>
                    <tr>
                    <td><?php echo $nameRegOk[$i]; ?></td>
                    <td><?php echo $fNameRegOk[$i]; ?></td>
                    <td><?php echo $numRegOk[$i]; ?></td>
                    <td>
                        <form method="POST" action = "../Controller/tournament_paid.php" >
                        <input type= "hidden" name= "numreg" value = "<?php echo $numContRegOk[$i] ; ?>"></input>
                        <button class = "waves-effect waves-light btn" type="submit">Voir</button>
                    </form>
                    </td>
                    </tr>
                    <?php }?>
                    
                  
                </tbody>
              </table>
                    
            
            </div>
        
            
    </div>
    <?php }else{ ?>
        <div>
            <div>               
                <table class="bordered responsive-table col s12 m9 l7 offset-m4 offset-l4">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Numéro d'inscription</th>
                        </tr>
                    </thead>
        
                </table>
            </div>
        </div>
    <?php } ?>
</div>
    