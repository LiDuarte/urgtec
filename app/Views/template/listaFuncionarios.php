             
        <div class="col-12">
           <div><h5 class="<?php  echo isset($alertInfo) ? $alertInfo : null ?> text-<?php echo isset($alert) ? $alert : null;  ?> text-center"><?php echo isset($msg) ? $msg : null ?></strong></h5></div>
        </div>

   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(""); ?>">Ínicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Funcionários Registrados</li>
      </ol>
    </nav>
        <div class="col-12">
          <table class="table table-hover" id="tabela">
          <thead>

            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Funcionário</th>
              <th scope="col">Email</th>
              <th scope="col">Sexo</th>
              <th scope="col">Data de Nascimento</th>
              <th scope="col">Departamento</th>
              <th scope="col">Status</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
             <tr>
                <th>#</th>
                <th><input type="text" placeholder="Nome do Funcionário" size="20" id="txtColuna2"/></th>
                <th><input type="text" placeholder="E-mail" size="15" id="txtColuna3"/></th>
                <th><input type="text" placeholder="sexo" size="10" id="txtColuna4"/></th>
                <th><input type="text" placeholder="Data de Nascimento" id="txtColuna5"/></th>
                <th><input type="text" placeholder="Departamento" size="10"  id="txtColuna6"/></th>
                <th>#status</th>
                <th><i class="fa-solid fa-marker"></i> </th>
                <th><i class="fa-solid fa-trash-can"></i></th>
            </tr>
          </thead>
          <?php foreach($listaFuncionarios as $funcionario){
                    foreach($departamentos as $departamento){
                        if($funcionario->departamento === $departamento->id_departamento){ ?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $funcionario->id_funcionario; ?></th>
              <td><?php echo $funcionario->nome; ?></td>
              <td><?php echo $funcionario->email; ?></td>
              <td><?php echo $funcionario->sexo; ?></td>
              <td><?php echo $funcionario->data_nascimento; ?></td>
              <td><?php echo $departamento->nome_departamento;?> </td> 
              <td> 
                <?php if($funcionario->status === "1"): ?>
                  <a href="<?php echo base_url("mudar-status/{$funcionario->id_funcionario}/{$funcionario->status}"); ?>" class="btn btn-danger btn-sm">Clique para Desativar</a>
                <?php endif; ?>
                  <?php if($funcionario->status === "0"): ?>
                  <a href="<?php echo base_url("mudar-status/{$funcionario->id_funcionario}/{$funcionario->status}"); ?>" class="btn btn-success btn-sm">Clique para Ativar</a>
                <?php endif; ?>

              </td>

                <td> 
                <a href="<?= base_url("funcionario/{$funcionario->id_funcionario}"); ?>" class="btn btn-info btn-sm">Editar</a></td>
              <td><a href="<?= base_url("excluir-funcionario/{$funcionario->id_funcionario}"); ?>" class="btn btn-danger btn-sm">Excluir</a></td>

            </tr>
          </tbody>
        <?php }}} ?>
        </table>
        </div>

      
        