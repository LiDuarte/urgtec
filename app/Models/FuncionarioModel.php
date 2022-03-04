<?php

namespace App\Models;

use CodeIgniter\Model;

class FuncionarioModel extends Model{
    
    protected $table = "funcionario";

    protected $primaryKey = "id_funcionario ";
    protected $nome = "nome";
    protected $email = "email";
    protected $sexo = "sexo";
    protected $data_nascimento = "data_nascimento";
    protected $departamento = "departamento";
    protected $status = "status";
    protected $returnType = "object";
    protected $allowedFields  = ["nome","email","sexo","data_nascimento","departamento","status"];

    protected $validationRules = [
        "nome" => "required|min_length[3]",
        "email" => "required|valid_email|is_unique[funcionario.email]",
        "data_nascimento" => "required|min_length[10]",
        "departamento" => "required|alpha_numeric",
        "sexo" => "required|alpha",
        "status" => "required", 
    ];
    protected $validationMessages = [
        "nome" => [
            'required' => "O Nome é obrigatório",
            'min_length' => "O nome deve ter no mínimo 3 caracteres",
        ],

        "email" => [
            "required" => "O Email é obrigatório",
            "valid_email" => "Digite um Email valido",
            "is_unique" => "Já existe um funcionário cadastrado com este Email",
        ],
         "data_nascimento" => [
            "required" => "A Data de Nascimento é obrigatório",
            "min_length" => "A data de Nascimento deve conter pelo menos 10 caracteres"
        ],
        "sexo" => [
            "required" => "Selecione o Sexo do Funcionário",
            "alplha" => "Sexo só pode ser alfanuméricos",
        ],
        "departamento" => [
            "required" => "O Departamento é obrigatório",
            "alpha_numeric" => "Selecione um Departamento existente"
        ],
        "status" => [
            "required" => "Selecione o Status do Funcionário",
        ]
    ];

}
