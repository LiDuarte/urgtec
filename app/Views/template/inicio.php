  <div class="row">
    <div class="col-4">
			      <div class="card" style="width: 18rem;">
				  <img class="card-img-top class="rounded float-left" src="<?php echo base_url("public/images/funcionario-02.png"); ?>" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><strong>GERENCIAR FUNCIONÁRIOS</strong></h5>
				    <p class="card-text">Gerencie seus Funcionários, atráves deste card.</p>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"><a href="<?php echo base_url("cadastrar-funcionario") ?>" class="btn btn-outline-primary">Cadastrar Funcionários</a></li>
				    <li class="list-group-item"><a href="<?php echo base_url("funcionarios-registrados"); ?>" class="btn btn-outline-primary">Visualizar todos Funcionários</a></li>
				  </ul>
				</div>


	</div>
   				 <div class="col-3">
      		      <div class="card" style="width: 18rem;">
				  <img class="card-img-top rounded float-left"  src="<?php echo base_url("public/images/departamento-01.png"); ?>" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><strong>GERENCIAR DEPARTAMENTO</strong></h5>
				    <p class="card-text">Gerencie os departamentos da Urgtec.</p>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item"><a href="<?php echo base_url("cadastrar-departamento") ?>" class="btn btn-outline-primary">Adicionar Departamentos</a></li>
				    <li class="list-group-item"><a href="<?= base_url("lista-de-departamentos"); ?>" class="btn btn-outline-primary">Visualizar todos Departamentos</a></li>
				  </ul>
				</div>
   			 </div>

  </div>
