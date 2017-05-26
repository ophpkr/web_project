<?php include('header_management.php')?>
<?php include('menu.php')?>
<?php require_once('../Controller/cont_calc_score.php'); ?>

<div class= "row">
    <div>
        <h1 class= "col s12 m9 l7 offset-m5 offset-l5">RESULTATS</h1>
    </div>
    <div>
        <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Resultat général</h2>
    </div>



    <?php if(!empty($namescour))
    { ?>

<div>
        <div class="col s12 m9 l9 offset-m4 offset-l4">              
            <table class = "bordered responsive-table">
                <thead>
                    <tr>
                        <th>Rang</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Dossard</th>
                        <th>Points</th>
                    </tr>
                </thead>
    
            <tbody>
                  
                    
                    <?php
                        $rank = 0;
                        for($i = 0; $i < sizeof($namescour); $i++)
                    { ?>
                <div class="col s12 m9 l9 offset-m4 offset-l4">      
                    <tr>
                        <td><?php if($i == 0)
                            {
                                echo $rank + 1;
                                $rank ++;
                            }
                            elseif($i > 0 && $scorescour[$i] == $scorescour[$i-1])
                            {
                                echo $rank;
                            }
                            else
                            {
                                echo $rank + 1;
                                $rank ++;
                            } ?>
                        </td>
                            
                        <td><?php echo $namescour[$i]; ?></td>
                        <td><?php echo $fnamescour[$i]; ?></td>
                        <td><?php echo $bibscour[$i]; ?></td>
                        <td><?php echo $scorescour[$i]; ?></td>
                    </tr>
                    <?php } ?>
                  
                </tbody>
              </table>
                    
        </div>
        </div>

        </div>    
    
   
    <?php }
    else {?>

            <div>               
                <table class="bordered responsive-table col s12 m9 l7 offset-m4 offset-l4">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Manche</th>
                            <th>Dossard</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
                    
            
            </div>
        
            
     <?php } ?> 
</div>
    
        
    

<?php include('footer_management.php'); ?>