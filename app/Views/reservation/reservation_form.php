<?php $this->layout('layout_principal', ['title' => 'Ajout Réservation']) ?>

<?php $this->start('main_content') ?>

	<!-- <div class="col-sm-8 col-sm-push-4 col-xs-10 col-xs-push-1"> -->
        <form id="contact-form" style="padding: 45px;" class="form-horizontal" method="post" action="<?= $this->url('ajouter_reservation') ?>"> <!-- ajouter_commentaire -->
                 
            <div class="form-group">
                <div class="col-sm-6">
                <!-- Vérification: -->
                    <!-- <label>Id. User : <em style="color: blue">< ?= $_SESSION['user']['id'] ?></em> | </label>
                    <label>Role : <em style="color: blue">< ?= $_SESSION['user']['role'] ?></em> | </label>
                    <label>Id. Resto : <em style="color: blue"><?= $id; ?></em> </label><br />
                    <label>Plat : <em style="color: blue">< ?= $_SESSION['plat']['id'] .' - '. $_SESSION['plat']['nom'] ?></em> </label>
                    <label>Date_enr : <em style="color: blue">< ?= date("Y-m-d H:i:s"); ?></em></label> -->
                    <!-- Infos cachées à récupérer en POST: IdUser, Role, IdResto, DatePost et IdPlat -->
                    <input id="IdUser" name="idUser" type="hidden" class="form-control" value="<?= $_SESSION['user']['id'] ?>"> 
                    <input id="IdResto" name="idResto" type="hidden" class="form-control" value="<?= $id; ?>"> 
                    <input id="IdPlat" name="idPlat" type="hidden" class="form-control" value="<?= $_SESSION['plat']['id'] ?>"> 
                    <input id="DateEnr" name="dateEnr" type="hidden" class="form-control" value="<?= date("Y-m-d H:i:s"); ?>">
                </div>    
            </div>

            <br />
            <h3 style="color: white;"><b> Réservation :</b></h3>
            <br /><br />

            <div class="form-group">
                <div class="col-sm-6">
                    <label value='dateResa' style="color: white;"">Je réserve pour le  : </label>
                    <input id="DateResa" name="dateResa" type="date" class="form-control" style="color: blue" >   
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-8 col-md-6 col-xs-10">
                    <label value='service' style="color: white;">Service : </label>
                    <select id="Service" name="service" style="color: blue" >
                        <option value="Midi"> Midi </option>
                        <option value="Soir"> Soir </option>
                    </select>   
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-8 col-md-6 col-xs-10">
                    <label value='nbPers' style="color: white;">Nombre de personnes : </label>
                    <select id="NbPers" name="nbPers" style="color: blue" >
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                        <option value="6"> 6 </option>
                        <option value="7"> 7 </option>
                        <option value="8"> 8 </option>
                        <option value="9"> 9 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                    </select>
                    <!-- <input id="note-resto" name="note-resto" type="text" placeholder="Donnez une note au restaurant" class="form-control"> -->
                </div>    
            </div>

            <p style="color: white">Le <em style="color: white"><?= strtolower($_SESSION['plat']['nom']) ?></em> fera partie des plats commandés. </p><br />

            <div class="form-group">
                <div class="col-sm-8 col-md-6 col-xs-10">
                    <button type="submit" class="btn btn-primary">Envoyer votre réservation</button>    
                </div>    
            </div> 
            
		</form>    
                        
	<!-- </div> -->
<?php $this->stop('main_content') ?>