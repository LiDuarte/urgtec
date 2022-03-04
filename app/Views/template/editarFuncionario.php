    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Ínicio</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url("funcionarios-registrados"); ?>">Funcionarios Registrados</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Funcionário</li>
      </ol>
    </nav>
          
        <div class="col-12">
          <h5 class="<?php  echo isset($alertInfo) ? $alertInfo : null ?> text-<?php echo isset($alert) ? $alert : null;  ?> text-center"><strong><?php echo isset($msg) ? $msg : null ?></strong></h5>
        </div>
        <?php if(isset($erros)): ?>
          <ul class="text-danger">
            <?php foreach ($erros as $erro): ?>
              <li> <?php echo $erro; ?> </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <form action="<?= base_url("editar-funcionario"); ?>" method="post">
          <input type="hidden" name="id_funcionario" value="<?= set_value('id_funcionario', $funcionario->id_funcionario); ?>" 
          class="form-control" id="exampleFormControlInput1" placeholder="Informe o nome Completo do Funcionário">

        <label for="exampleFormControlInput1"  class="form-label">Nome</label>
        <input type="text" name="nome" value="<?= set_value('nome', $funcionario->nome); ?>" class="form-control" id="exampleFormControlInput1" placeholder="Informe o nome Completo do Funcionário">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" disabled="disable" value="<?= $funcionario->email; ?>" class="form-control" id="email" placeholder="name@example.com">
        </div>

         <div class="form-check">
          <input class="form-check-input" value="masculino" <?= $funcionario->sexo === "masculino" ? "checked" : null; ?> type="radio" name="sexo" id="sexo">
          <label class="form-check-label" for="sexo">
            Masculino
          </label> 

        </div>
          <div class="form-check">
          <input class="form-check-input" value="ferminino" <?= $funcionario->sexo === "ferminino" ? "checked" : null; ?>  type="radio" name="sexo" id="sexo">
          <label class="form-check-label"  for="sexo">
            Ferminino
          </label>     
        </div>

        <label for="DataDeNascimento"  class="form-label">Data de Nascimento</label>
        <input type="date" name="data_nascimento" value="<?= set_value('data_nascimento', $funcionario->data_nascimento)?>" class="form-control" id="DataDeNascimento" placeholder="Informe a data do seu Nascimento">
         <div class="form-group">
            <label for="SetorFuncionario">Selecione o departamento do Funcionário</label>
           <select class="form-select form-select-sm mb-3" name="departamento" aria-label="Default select example">

            <?php 
                    if($funcionario->departamento === $departamento->id_departamento): ?>
                      <option value="<?= $funcionario->departamento; ?>"><?php echo $departamento->nome_departamento; ?></option>
                    <?php endif; ?>
           

            <?php foreach ($todosDepartamentos as $dp): ?>  

             <?php if($dp->nome_departamento != $departamento->nome_departamento): ?>             
                <option value="<?php echo $dp->id_departamento; ?>"><?php echo $dp->nome_departamento; ?></option>
              <?php endif; ?>
              </option>
              <?php endforeach; ?>
            </select>
        </div>

          <div class="form-check">
          <input class="form-check-input" value="1" <?= $funcionario->status === "1" ? "checked" : null; ?> type="radio" name="status" id="status">
          <label class="form-check-label" for="status">
            Ativo
          </label> 
        </div>

        <div class="form-check">
          <input class="form-check-input" value="0" <?= $funcionario->status === "0" ? "checked" : null; ?> type="radio" name="status" id="status">
          <label class="form-check-label"  for="status">
            Inativo
          </label>     
        </div>
          <div class="col-12">
            <button class="btn btn-info" name="cadastrar" type="submit">Realizar Alteração!</button>
          </div>
          </form>
