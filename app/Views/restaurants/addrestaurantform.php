<?php $this->layout('layout_principal', ['title' => 'Ajout Restaurants']) ?>

<?php $this->start('main_content') ?>
<body style="background-image: none">

	
        <form id="contact-form" class="form-horizontal" method="post" action="<?= $this->url('ajouter_restaurant') ?>">
            
            
            <div class="form-group">
                <div class="col-sm-6">
                    <label>Slug</label>
                    <input id="slug" name="slug" type="text" placeholder="slug" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Nom</label>
                    <input id="nom" name="nom" type="text" placeholder="Nom" class="form-control">    
                </div> 
            </div>            

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Adresse</label>
                    <input id="adresse" name="adresse" type="text" placeholder="Adresse" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Code postal</label>
                    <input id="cp" name="cp" type="text" placeholder="Code postal" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Ville</label>
                    <input id="ville" name="ville" type="text" placeholder="Ville" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Téléphone</label>
                    <input id="tel" name="tel" type="text" placeholder="Téléphone" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Email</label>
                    <input id="email" name="email" type="text" placeholder="Email" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Site</label>
                    <input id="site" name="site" type="text" placeholder="Site" class="form-control">    
                </div>    
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label>Catégorie</label>
                    <input id="categorie" name="categorie" type="text" placeholder="Catégorie" class="form-control">    
                </div>    
            </div>

             <div class="form-group">
                <div class="col-sm-6">
                    <label>Note</label>
                    <input id="note_resto" name="note_resto" type="text" placeholder="Note" class="form-control">    
                </div>    
            </div>

             <div class="form-group">
                <div class="col-sm-6">
                    <label>Description</label>
                    <input id="description" name="description" type="text" placeholder="Description" class="form-control">    
                </div>    
            </div>

             <div class="form-group">
                <div class="col-sm-6">
                    <label>Photo</label>
                    <input id="photo" name="photo" type="file" placeholder="Photo" class="form-control">    
                </div>    
            </div>

             <div class="form-group">
                <div class="col-sm-6">
                    <label>Gmap</label>
                    <input id="gmap" name="gmap" type="text" placeholder="Gmap" class="form-control">    
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