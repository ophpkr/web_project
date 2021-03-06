<?php require_once('../Controller/cont_tools_regist_manag.php'); ?>
<?php include('header_management.php') ; ?>
<?php include('menu.php'); ?>

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
        <table class="bordered responsive-table col s12 m9 l7 offset-m4 offset-l4">
            <thead>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro d'inscription</th>
                </tr>
            </thead>

            <tbody>
          
            <?php for($i = 0; $i<sizeof($fNameRegOk); $i++)
            {?>
                <tr>
                    <td>
                        <a class="waves-effect waves-light" href="<?php echo '#modreg' . $numRegOk[$i]; ?>">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                    <td><?php echo $nameRegOk[$i]; ?></td>
                    <td><?php echo $fNameRegOk[$i]; ?></td>
                    <td><?php echo $numRegOk[$i]; ?></td>
                    <td>
                            <a class="waves-effect waves-light" href="<?php echo '#modseecontok' . $numRegOk[$i]; ?>">
                                <i class="material-icons">description</i>
                            </a>
                        </td>
                </tr>
                
            <?php } ?>
            
            </tbody>
        </table>   
    </div>
    
    <?php for($i = 0; $i<sizeof($fNameRegOk); $i++)
    {?>
    
    <div id="<?php echo 'modreg' . $numRegOk[$i]; ?>" class="modal">
        <div class="modal-content">
            <h4>Etes-vous sûr de vouloir supprimer cette inscription?</h4>
            <p>Attention : cette action sera irréversible</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
            <form method="GET" action = "../Controller/cont_delete_registration.php" >
                <input type= "hidden" name= "numreg" value = "<?php echo $numRegOk[$i] ; ?>"></input>
                <button class = "modal-action modal-close waves-effect waves-green btn-flat" type="submit">Oui</button>
            </form>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div> 

    <?php }?>
    
     <?php for($i = 0; $i<sizeof($numRegOk); $i++)
        {?>
        <div id="<?php echo 'modseecontok' . $numRegOk[$i]; ?>" class="modal">
            <div class="modal-content">
                <h4>Description :</h4>
                <p><?php echo $nameRegOk[$i] . ' ' . $nameRegOk[$i] . ' (' . $sexeRegOk[$i] . ')'; ?></p>
                <p><?php echo $streetRegOk[$i]; ?></p>
                <p><?php echo $pcodeRegOk[$i] . ' ' . $cityRegOk[$i]; ?></p>
                <p><?php echo $mailRegOk[$i]; ?></p>
                <p><?php echo $telNumRegOk[$i]; ?></p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
            </div>
        </div> <?php } ?>
    
    <?php }else{ ?>
        <div>               
            <table class="bordered responsive-table col s12 m9 l7 offset-m4 offset-l4">
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
    
            </table>
        </div>
    <?php } ?>
</div>
    
<?php include('footer_management.php'); ?>