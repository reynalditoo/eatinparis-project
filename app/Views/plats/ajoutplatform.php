<?php $this->layout('layout_principal', ['title' => 'Ajout plat']) ?>

<?php $this->start('main_content') ?>

<body style="background-image: none">

	
        <form id="contact-form" class="form-horizontal" method="post" action="<?= $this->url('ajouter_restaurant') ?>">
       
             <div class="form-group">
                <div class="col-sm-6">
                    <label>Nom</label>
                    <input id="nom" name="nom" type="text" placeholder="Nom du plat" class="form-control">    
                </div>    
            </div>

             <div class="form-group">
                <div class="col-sm-6">
                    <label>Ingredients</label>
                    <input id="ingredients" name="ingredients" type="text" placeholder="Ingredients" class="form-control">    
                </div>    
            </div>

             <div class="form-group">
                <div class="col-sm-6">
                    <label>Origine</label>
                    <input id="origine" name="origine" type="text" placeholder="Origine" class="form-control">    
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