<?php include('header_management.php')?>
<?php include('menu.php')?>
<?php require_once('../Controller/tools.php'); ?>
<?php require_once('../Controller/tools_regist_manag.php'); ?>


<div class= "row">
    <div>
        <h1 class= "col s12 m9 l7 offset-m5 offset-l5">LES INSCRIPTIONS</h1>
    </div>
    <div>
        <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Gestion des compétiteurs n'ayant pas payé leur inscription</h2>
    </div>
    <?php if(!empty($fNameRegNotPaid))
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
                  
                    <?php for($i = 0; $i<sizeof($numRegNotPaid); $i++)
                    {?>
                    <tr>
                    <td><?php echo $nameRegNotPaid[$i]; ?></td>
                    <td><?php echo $fNameRegNotPaid[$i]; ?></td>
                    <td><?php echo $numRegNotPaid[$i]; ?></td>
                    <td>
                        <form method="POST" action = "../Controller/tournament_paid.php" >
                        <input type= "hidden" name= "numreg" value = "<?php echo $numRegNotPaid[$i] ; ?>"></input>
                        <button class = "waves-effect waves-light btn" type="submit">a payé</button>
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
    
<div class= "row">   
    <div>
        <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Gestion des compétiteurs n'ayant pas fourni leur autorisation parentale</h2>
    </div>
    <?php if(!empty($fNameRegNotAP))
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
                  
                    <?php for($i = 0; $i<sizeof($numRegNotAP); $i++)
                    {?>
                    <tr>
                    <td><?php echo $nameRegNotAP[$i]; ?></td>
                    <td><?php echo $fNameRegNotAP[$i]; ?></td>
                    <td><?php echo $numRegNotAP[$i]; ?></td>
                    <td>
                        <form method="POST" action = "../Controller/tournament_AP.php" >
                        <input type= "hidden" name= "numreg" value = "<?php echo $numRegNotAP[$i] ; ?>"></input>
                        <button class = "waves-effect waves-light btn" type="submit">a payé</button>
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
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Numéro d'inscription</th>
                        </tr>
                    </thead>
                </table>
                    
            
            </div>
        
            
    </div> <?php } ?> 
</div>






<?php include('footer_management.php')?>