<?php include('header_management.php'); ?>
<?php include('menu.php'); ?>
<?php require_once('../Controller/cont_tools.php'); ?>
<?php require_once('../Controller/cont_tools_regist_manag.php'); ?>


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
            <table class = "bordered responsive-table col s12 m9 l9 offset-m4 offset-l4">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Numéro d'inscription</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
        
                <tbody>
              
                <?php for($i = 0; $i<sizeof($numRegNotPaid); $i++)
                {?>
                    
                    <tr>
                        <td>
                            <a class="waves-effect waves-light" href="<?php echo '#modrnp' . $numRegNotPaid[$i]; ?>">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                        <td><?php echo $nameRegNotPaid[$i]; ?></td>
                        <td><?php echo $fNameRegNotPaid[$i]; ?></td>
                        <td><?php echo $numRegNotPaid[$i]; ?></td>                    
                        <td>
                            <form method="GET" action = "../Controller/cont_tournament_paid.php" >
                                <input type= "hidden" name= "numreg" value = "<?php echo $numRegNotPaid[$i] ; ?>"></input>
                                <button class = "waves-effect waves-light btn orange lighten-1" type="submit">a payé</button>
                            </form>
                        </td>
                        <td>
                            <a class="waves-effect waves-light" href="<?php echo '#modseecontnp' . $numRegNotPaid[$i]; ?>">
                                <i class="material-icons">description</i>
                            </a>
                        </td>
                    </tr>
        
                
                <?php } ?>
                </tbody>
            </table>
                
        </div>  
            
            

        <?php for($i = 0; $i<sizeof($numRegNotPaid); $i++)
        {?>
        <div id="<?php echo 'modseecontnp' . $numRegNotPaid[$i]; ?>" class="modal">
            <div class="modal-content">
                <h4>Description :</h4>
                <p><?php echo $nameRegNotPaid[$i] . ' ' . $fNameRegNotPaid[$i] . ' (' . $sexeNotPaid[$i] . ')'; ?></p>
                <p><?php echo $streetNotPaid[$i]; ?></p>
                <p><?php echo $pcodeNotPaid[$i] . ' ' . $cityNotPaid[$i]; ?></p>
                <p><?php echo $mailNotPaid[$i]; ?></p>
                <p><?php echo $telNumNotPaid[$i]; ?></p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
            </div>
        </div>
    
        <div id="<?php echo 'modrnp' . $numRegNotPaid[$i]; ?>" class="modal">
            <div class="modal-content">
                <h4>Etes-vous sûr de vouloir supprimer cette inscription?</h4>
                <p>Attention : cette action sera irréversible</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
                <form method="GET" action = "../Controller/cont_delete_registration.php" >
                    <input type= "hidden" name= "numreg" value = "<?php echo $numRegNotPaid[$i] ; ?>"></input>
                    <button class = "modal-action modal-close waves-effect waves-green btn-flat" type="submit">Oui</button>
                </form>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
            </div>
        </div> 
            
        <?php } ?>
        
        <?php }else{ ?>
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
        
        <?php } ?>

        <div>
            <h2 class= "col s12 m9 l7 offset-m3 offset-l3">Gestion des compétiteurs n'ayant pas fourni leur autorisation parentale</h2>
        </div>
        <?php if(!empty($fNameRegNotAP))
        { ?>

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
                        <td>
                            <a class="waves-effect waves-light" href="<?php echo '#modrnap' . $numRegNotAP[$i]; ?>">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                        <td><?php echo $nameRegNotAP[$i]; ?></td>
                        <td><?php echo $fNameRegNotAP[$i]; ?></td>
                        <td><?php echo $numRegNotAP[$i]; ?></td>
                        <td><a class="waves-effect waves-light" href="<?php echo '#modseecontnap' . $numRegNotAP[$i]; ?>"><i class="material-icons">description</i></a></td>
                        <td>
                            <form method="GET" action = "../Controller/cont_tournament_AP_ok.php" >
                                <input type= "hidden" name= "numreg" value = "<?php echo $numRegNotAP[$i] ; ?>"></input>
                                <button class = "waves-effect waves-light btn orange lighten-1" type="submit">autorisation ok</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
              
                </tbody>
            </table>
                
        
        </div>
        

        <?php for($i = 0; $i<sizeof($numRegNotAP); $i++)
        {?>
        <div id="<?php echo 'modseecontnap' . $numRegNotPaid[$i]; ?>" class="modal">
            <div class="modal-content">
                <h4>Description :</h4>
                <p><?php echo $nameRegNotAP[$i] . ' ' . $fNameRegNotAP[$i] . ' (' . $sexeNotAP[$i] . ')'; ?></p>
                <p><?php echo $streetNotAP[$i]; ?></p>
                <p><?php echo $pcodeNotAP[$i] . ' ' . $cityNotAP[$i]; ?></p>
                <p><?php echo $mailNotAP[$i]; ?></p>
                <p><?php echo $telNumNotAP[$i]; ?></p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
            </div>
        </div>


        <div id="<?php echo 'modseecont' . $numRegNotAP[$i]; ?>" class="modal">
            <div class="modal-content">
                <h4>Description :</h4>
                <p>Attention : cette action sera irréversible</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
            </div>
        </div>
   
    <div id="<?php echo 'modrnp' . $numRegNotAP[$i]; ?>" class="modal">
        <div class="modal-content">
            <h4>Etes-vous sûr de vouloir supprimer cette inscription?</h4>
            <p>Attention : cette action sera irréversible</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
        </div>
    </div>
   
    <?php } ?>
    <?php }
    else {?>

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



<?php include('footer_management.php'); ?>