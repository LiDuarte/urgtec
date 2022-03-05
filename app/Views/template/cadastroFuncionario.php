    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Ínicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar Funcionário</li>
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
        <form action="<?= base_url("cadastrar-funcionario"); ?>" method="post">
        <label for="exampleFormControlInput1"  class="form-label">Nome</label>
        <input type="text" name="nome" value="<?= $nome; ?>" class="form-control" id="exampleFormControlInput1" placeholder="Informe o nome Completo do Funcionário">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" value="<?= $email; ?>" class="form-control" id="email" placeholder="name@example.com">
        </div>

         <div class="form-check">
          <input class="form-check-input" value="masculino" <?php echo $sexo === "masculino" ? "checked" : null ?>  type="radio" name="sexo" id="sexo">
          <label class="form-check-label" for="sexo">
            Masculino
          </label> 

        </div>
          <div class="form-check">
          <input class="form-check-input" value="ferminino" <?php echo $sexo === "ferminino" ? "checked" : null ?>  type="radio" name="sexo" id="sexo">
          <label class="form-check-label"  for="sexo">
            Ferminino
          </label>     
        </div>

        <label for="DataDeNascimento"  class="form-label">Data de Nascimento</label>
        <input type="date" name="data_nascimento" value="<?= $data_nascimento; ?>" class="form-control" id="DataDeNascimento" placeholder="Informe a data do seu Nascimento">

         <div class="form-group">
            <label for="SetorFuncionario">Selecione o departamento do Funcionário</label>
           <select class="form-select form-select-sm mb-3" value="<?= set_value('departamento', null)?>" name="departamento" aria-label="Default select example">

            <?php foreach ($departamento as $dp): ?>    
              <option value="<?php echo $dp->id_departamento; ?>" <?php echo $inputDepartamento == $dp->id_departamento ? "selected" : null; ?>><?php echo $dp->nome_departamento; ?></option>
              <?php endforeach; ?>
              <?php if(empty($departamento)): ?>
              <option>É preciso cadastrar pelo menos um departamento antes</option>
              option
            <?php endif; ?>            
            </select>
        </div>
        

          <div class="form-check">
          <input class="form-check-input" value="1" <?= $status === "1" ? "checked" : null; ?>  type="radio" name="status" id="status">
          <label class="form-check-label" for="status">
            Ativo
          </label> 
        </div>

        <div class="form-check">
          <input class="form-check-input" value="0" <?= $status === "0" ? "checked" : null; ?> type="radio" name="status" id="status">
          <label class="form-check-label"  for="status">
            Inativo
          </label>     
        </div>
          <div class="col-12">
            <button class="btn btn-info" name="cadastrar" type="submit">Cadastrar Funcionário</button>
          </div>
          </form>
