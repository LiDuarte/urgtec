  

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(""); ?>">Ínicio</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url("lista-de-departamentos"); ?>">Lista de Departamentos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Departamento</li>
      </ol>
    </nav>
          
       <div class="col-12 text-center">
          <div><h5 class="<?php  echo isset($alertInfo) ? $alertInfo : null ?> text-<?php echo isset($alert) ? $alert : null;  ?> text-center"><?php echo isset($msg) ? $msg : null ?></strong></h5></div>
        </div>
        <?php if(isset($erros)): ?>
          <ul class="text-danger">
            <?php foreach ($erros as $erro): ?>
              <li> <?php echo $erro; ?> </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <form action="<?= base_url("editar-departamento"); ?>" method="post">
        <div class="mb-3">
          <label for="nome_departamento" class="form-label">Nome Departamento</label>
          <input type="hidden" name="id_departamento" value="<?php echo $departamento->id_departamento; ?>">
          <input type="text" class="form-control" value="<?php echo $departamento->nome_departamento; ?>" name="nome_departamento" id="nome_departamento" placeholder="Digite o nome do Departamento">
        </div>

        <div class="col-12">
          <button class="btn btn-info" type="submit">Realizar Alteração</button>
        </div>
        </form>



        