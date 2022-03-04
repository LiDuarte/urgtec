
           <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url(""); ?>">Ínicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Lista de Departamentos
</li>
            </ol>
          </nav>

        <div class="col-12">
           <div><h5 class="<?php  echo isset($alertInfo) ? $alertInfo : null ?> text-<?php echo isset($alert) ? $alert : null;  ?> text-center"><?php echo isset($msg) ? $msg : null ?></strong></h5></div>
        </div>

     <div class="col-12">
          <table class="table" id="tabela">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Nome Departamento</th>
              <th scope="col"><i class="fa-solid fa-marker"></i> Editar</th>
              <th scope="col"><i class="fa-solid fa-trash-can"></i> Excluir</th>
            </tr>
            <tr>
                <th>#</th>
                <th><input type="text" size="50" placeholder="filtrar por nome do departamento..."  id="txtColuna1"/></th>            
                <th><i class="fa-solid fa-marker"></i> </th>
                <th><i class="fa-solid fa-trash-can"></i></th>
            </tr>
          </thead>
          <?php foreach($departamentos as $dp): ?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $dp->id_departamento; ?></th>
              <td><?php echo $dp->nome_departamento; ?></td>
               <td>
                  <a href="<?= base_url("departamento/{$dp->id_departamento}"); ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-marker"></i> Editar</a></td>

              <td><a href="<?= base_url("excluir-departamento/{$dp->id_departamento}"); ?>" class="btn btn-danger btn-sm">
            <i class="fa-solid fa-trash-can"></i> Excluir</a></td> 

            </tr>
          </tbody>
        <?php endforeach; ?>
        </table>
        </div>
