<?php require_once('../Controller/cont_tools_regist_manag.php'); ?>
<?php require_once('../Controller/cont_tools_course_management.php'); ?>
<?php include('header_management.php');?>
<?php include('menu.php');?>

<div class= "row">
    <div>
        <h1 class= "col s12 m9 l7 offset-m5 offset-l5">LES MANCHES</h1>
    </div>
    <div>
        <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Création d'une manche</h2>
    </div>
    
    <form method="POST" action = "../Controller/cont_course_creation.php" >
        <div class= "col s12 m9 l7 offset-m3 offset-l3">
           
            <input  placeholder="nom de la manche" type="text" classe = "col s12 m9 l7  validate" name="namecourse" size = "15" required>
           

            <input placeholder="coefficient" type="number" class="col s12 m2 l2 validate" name="coeff" min="1" max="10" required>

            <button class = "waves-effect waves-light btn orange lighten-1" type="submit">Créer</button>
                
        
        </div>
    </form>




    <div>
        <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Entrer les résultats</h2>
    </div>



    <?php if(!empty($namecourse))
    { ?>

<div>
        <div class="col s9 m9 l9 offset-m3 offset-l3 ">              
            <table class = "bordered responsive-table">
                <thead>
                    <tr>
                        <th>Sup</th>
                        <th>Fin</th>
                        <th>Manche</th>
                        <th>Coefficient</th>
                        <th>Dossard</th>
                    </tr>
                </thead>
    
            <tbody>
                  
                    
                    <?php for($i = 0; $i < sizeof($namecourse); $i++)
                    { ?>
                   
                <div class="col s4 m4 l4 offset-m4 offset-l4">
                     
                    <tr>                        
                        <td> <a class="waves-effect waves-light" href="<?php echo '#modc' . $numcourse[$i]; ?>"><i class="material-icons">delete</i></a></td>
                        <td><a class="waves-effect waves-light" href="<?php echo '#modcclosed' . $numcourse[$i]; ?>"><i class="material-icons">flag</i></a></td>
                        <td><?php echo $namecourse[$i]; ?></td>
                        <td><?php echo $coeffcourse[$i]; ?></td>
                        <td>
                            
                            <form method="POST" action = "../Controller/cont_add_result.php" >
                                <div class="row">
                                    
                                    <input class="col m2 l2 offset" type= "text" name= "bib" width="50px"></input>
                                    <input type= "hidden" name= "numcourse" value = "<?php echo $numcourse[$i] ; ?>"></input>
                                    <button class = "waves-effect waves-light btn orange lighten-1" type="submit">ok</button>
                                </div>
                            </form>
                            
                        </td>
                    </tr>
                    </div>
                  
                
    
    <?php } ?>
    </tbody>
              </table>
                    
        </div>
        </div>

        
    <?php for($i = 0; $i < sizeof($namecourse); $i++)
    { ?>
    <div id="<?php echo 'modc' . $numcourse[$i]; ?>" class="modal">
         <div class="modal-content">
           <h4>Etes-vous sûr de vouloir supprimer cette manche?</h4>
           <p>Attention : cette action sera irréversible</p>
         </div>
         <div class="modal-footer">
           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
            <form method="GET" action = "../Controller/cont_delete_course.php" >
                <input type= "hidden" name= "numcourse" value = "<?php echo $numcourse[$i] ; ?>"></input>
                <button class = "modal-action modal-close waves-effect waves-green btn-flat" type="submit">Oui</button>
            </form>
           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
         </div>
       </div> 
    
    <div id="<?php echo 'modcclosed' . $numcourse[$i]; ?>" class="modal">
         <div class="modal-content">
           <h4>Etes-vous sûr de vouloir clôturer?</h4>
           <p>Attention : cette action sera irréversible</p>
         </div>
         <div class="modal-footer">
           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
            <form method="GET" action = "../Controller/cont_closed.php" >
                <input type= "hidden" name= "numcourse" value = "<?php echo $numcourse[$i] ; ?>"></input>
                <button class = "modal-action modal-close waves-effect waves-green btn-flat" type="submit">Oui</button>
            </form>
           <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
         </div>
       </div> 
    
    <?php }}
    else {?>

            <div>               
                <table class="bordered responsive-table col s12 m9 l7 offset-m4 offset-l4">
                    <thead>
                        <tr>
                            <th>Sup</th>
                            <th>Fin</th>
                            <th>Manche</th>
                            <th>Coefficient</th>
                            <th>Dossard</th>
                        </tr>
                    </thead>
                </table>
                    
            
            </div>
        
            
     <?php } ?> 
</div>


<?php include('footer_management.php')?>