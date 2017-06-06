<?php $this->layout('layout_principal', ['title' => 'Modifier User']) ?>

<?php $this->start('main_content') ?>

<body style="background-image: none;">

	
        <form id="contact-form" class="form-horizontal" method="post" action="<?= $this->url('modifier_user', ["id" => $id] ) ?>">
                 

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Nom</label>
                    <input id="nom" name="nom" type="text" placeholder="Nom" value="<?= $user['nom'] ?>" class="form-control">    
                </div> 
            </div> 

             <div class="form-group">
                <div class="col-sm-6">
                    <label>Prenom</label>
                    <input id="prenom" name="prenom" type="text" placeholder="Prénom" value="<?= $user['prenom'] ?>" class="form-control">    
                </div>    
            </div> 

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Email</label>
                    <input id="email" name="email" type="text" placeholder="Email" value="<?= $user['email'] ?>" class="form-control">    
                </div>    
            </div>          

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Pseudo</label>
                    <input id="pseudo" name="pseudo" type="text" placeholder="Pseudo" value="<?= $user['pseudo'] ?>" class="form-control">    
                </div>    
            </div>

             <div class="form-group">
                <div class="col-sm-6">
                    <label>Role</label>
                    <input id="role" name="role" type="text" placeholder="Role" value="<?= $user['role'] ?>" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Code postal</label>
                    <input id="cp" name="cp" type="text" placeholder="Cp" value="<?= $user['cp'] ?>" class="form-control">    
                </div>    
            </div>

           
            <div class="form-group">
                <div class="col-sm-6">
                    <label>Ville</label>
                    <input id="ville" name="ville" type="text" placeholder="Ville" value="<?= $user['ville'] ?>" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Adresse</label>
                    <input id="adresse" name="adresse" type="text" placeholder="Adresse" value="<?= $user['adresse'] ?>" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Téléphone</label>
                    <input id="tel" name="tel" type="text" placeholder="Téléphone" value="<?= $user['tel'] ?>" class="form-control">    
                </div>    
            </div>


            <div class="form-group">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Envoyer</button>    
                </div>    
            </div> 

            
		</form>    
                        

</body>

<?php $this->stop('main_content') ?>