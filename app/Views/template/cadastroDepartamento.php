  

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(""); ?>">Ínicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar Departamento</li>
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
        <form action="<?= base_url("cadastrar-departamento"); ?>" method="post">
        <div class="mb-3">
          <label for="nome_departamento" class="form-label">Nome Departamento</label>
          <input type="text" class="form-control" name="nome_departamento" id="nome_departamento" placeholder="Digite o nome do Departamento">
        </div>

          <div class="col-12">
            <button class="btn btn-info" name="cadastrar" type="submit">Cadastrar Departamento</button>
          </div>
          </form>


        <div class="col-12">
          <table class="table" id="tabela">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"></i> Nome Departamento</th>
              <th scope="col"><i class="fa-solid fa-marker"></i> Editar</th>
              <th><i class="fa-solid fa-trash-can"></i> Excluir</th>
            </tr>
            <tr>
                <th>#</th>
                <th><input type="text" size="50" placeholder="filtrar por nome do departamento..."  id="txtColuna1"/></th>            
                <th><i class="fa-solid fa-marker"></i></th>
                <th><i class="fa-solid fa-trash-can"></i></th>
            </tr>
          </thead>
          <?php foreach($departamento as $dp): ?>
              <tbody>
            <tr>
              <th scope="row"><?php echo $dp->id_departamento; ?></th>
              <td><?php echo $dp->nome_departamento; ?></td>

                 <td> <a href="<?= base_url("departamento/{$dp->id_departamento}"); ?>" class="btn btn-info btn-sm">Editar</a></td>
              <td><a href="<?= base_url("excluir-departamento/{$dp->id_departamento}"); ?>" class="btn btn-danger btn-sm">Excluir</a></td>
            </tr>
          </tbody>
        <?php endforeach; ?>
        </table>
        </div>


        