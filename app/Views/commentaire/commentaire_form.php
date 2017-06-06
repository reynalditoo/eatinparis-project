<?php $this->layout('layout_principal', ['title' => 'Ajout Commentaire']) ?>

<?php $this->start('main_content') ?>  <!-- - Jek - 27 -->

	
        <form id="contact-form" class="form-horizontal" method="post" action="<?= $this->url('ajouter_commentaire') ?>"> <!-- ajouter_commentaire -->
                 
            <div class="form-group">
                <div class="col-sm-6">
                <!-- Vérification: -->
                    <!-- <label>IdUser : <em style="color: blue">< ?= $_SESSION['user']['id'] ?></em> | Role : <em style="color: blue">< ?= $_SESSION['user']['role'] ?></em> | IdResto : <em style="color: blue">< ?= $id; ?></em> <br />
                    DatePost : <em style="color: blue">< ?= date("Y-m-d H:i:s"); ?></em> | IdPlat : <em style="color: blue">< ?= $_SESSION['plat']['id'] ?></em> -->
                <!-- Infos cachées à récupérer en POST: IdUser, Role, IdResto, DatePost et IdPlat -->
                    <input id="IdUser" name="idUser" type="hidden" class="form-control" value="<?= $_SESSION['user']['id'] ?>"> 
                    <input id="Role" name="role" type="hidden" class="form-control" value="<?= $_SESSION['user']['role'] ?>"> 
                    <input id="IdResto" name="idResto" type="hidden" class="form-control" value="<?= $id; ?>"> 
                    <input id="DatePost" name="datePost" type="hidden" class="form-control" value="<?= date("Y-m-d H:i:s"); ?>"> 
                    <input id="IdPlat" name="idPlat" type="hidden" class="form-control" value="<?= $_SESSION['plat']['id'] ?>"> 
                </div>    
            </div>            

            <div class="form-group">
                <div class="col-sm-6">
                    <label  style="color: white"value='commentaire'>Donnez votre avis :</label>
                    <textarea id="Commentaire" name="commentaire" type="text" class="form-control" rows="10" placeholder="..."></textarea>
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label  style="color: white"value='noteResto'>Note du restaurant : (Donnez une note au restaurant)</label>
                    <select id="NoteResto" name="noteResto" style="color: blue" >
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                    </select>
                    <!-- <input id="note-resto" name="note-resto" type="text" placeholder="Donnez une note au restaurant" class="form-control"> -->
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label  style="color: white"value='nomPlat'>Le plat que vous avez pris : <em style="color: white"><?= $_SESSION['plat']['nom'] ?></em> </label>   
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label style="color: white" value='notePlat'>Note du plat : (Donnez une note au plat consommé)</label>
                    <select id="NotePlat" name="notePlat" style="color: blue" >
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                    </select>  
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Envoyer votre avis</button>    
                </div>    
            </div> 

		</form>    
                        
	
<?php $this->stop('main_content') ?>