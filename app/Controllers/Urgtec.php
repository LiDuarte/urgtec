<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Urgtec extends BaseController
{

    public function __construct(){
         helper('form');
         $this->session = \Config\Services::session();
             
    }

    public function index(){

 
        $departamento = new \App\Models\DepartamentoModel();
        $data["titulo"] =  "Ínicio";
        $data["view"] = "inicio";

        echo  view('urgtec', $data);
    }





    public function CadastrarFuncionario()
    {

        $departamento = new \App\Models\DepartamentoModel();

           if($this->request->getMethod() === "post"){

                $funcionario = new \App\Models\FuncionarioModel();
                $funcionario->set("nome", $this->request->getPost("nome"));
                $funcionario->set("email", $this->request->getPost("email"));
                $funcionario->set("data_nascimento", $this->request->getPost("data_nascimento"));
                $funcionario->set("sexo", $this->request->getPost("sexo"));
                $funcionario->set("departamento", $this->request->getPost("departamento"));
                $funcionario->set("status", $this->request->getPost("status"));
                if($funcionario->insert()):
                    $nome = $this->request->getPost("nome");
                    $sexo = $this->request->getPost("sexo") === "ferminino" ? "a" : "o";
                    $this->session->setFlashdata("alert", "success");
                    $this->session->setFlashdata("erros", $funcionario->errors());
                    $this->session->setFlashdata("msg", "Funcionari{$sexo} ${nome} adicionado com sucesso!");
                    $this->session->setFlashdata("alertInfo", "alert alert-success");
                
                    return redirect()->to(base_url("cadastrar-funcionario"));
                else:
                    $this->session->setFlashdata("nome", $this->request->getPost("nome"));
                    $this->session->setFlashdata("email", $this->request->getPost("email"));
                    $this->session->setFlashdata("sexo", $this->request->getPost("sexo"));
                    $this->session->setFlashdata("data_nascimento", $this->request->getPost("data_nascimento"));
                    $this->session->setFlashdata("inputDepartamento", $this->request->getPost("departamento"));
                    $this->session->setFlashdata("status", $this->request->getPost("status"));
                    $this->session->setFlashdata("alert", "danger");
                    $this->session->setFlashdata("erros", $funcionario->errors());
                    $this->session->setFlashdata("msg", 'Preencha o formulário corretamente');
                    $this->session->setFlashdata("alertInfo", "alert alert-danger");
                    return redirect()->to(base_url("cadastrar-funcionario"));
                endif;
            }

               $data = [
                "nome" =>      $this->session->getFlashdata("nome"),
                "email" =>      $this->session->getFlashdata("email"),
                "sexo" =>      $this->session->getFlashdata("sexo"),
                "data_nascimento" =>      $this->session->getFlashdata("data_nascimento"),
                "inputDepartamento" =>      $this->session->getFlashdata("inputDepartamento"),
                "status" =>      $this->session->getFlashdata("status"),
                "msg" =>       $this->session->getFlashdata("msg"),
                "alertInfo" => $this->session->getFlashdata("alertInfo"),
                "erros" =>     $this->session->getFlashdata("erros"),
                "alert" =>     $this->session->getFlashdata("alert"),
                "departamento" => $departamento->find(),
                "titulo" => "Cadastros de Funcionários",
                "view" => "cadastroFuncionario"
            ];

        echo  view('urgtec', $data);
       
    }

        public function CadastrarDepartamento(){
         
            $departamento = new \App\Models\DepartamentoModel();

            if($this->request->getMethod() === "post"):
                $departamento->set("nome_departamento", $this->request->getPost("nome_departamento"));
                  if($departamento->insert()):
                        $nome_departamento = $this->request->getPost("nome_departamento");
                                // definindo variváveis temporarias de sessão
                             $this->session->setFlashdata("msg", "Novo Departamento de ${nome_departamento} adicionado com sucesso!");
                             $this->session->setFlashdata("alertInfo", "alert alert-success");
                             $this->session->setFlashdata("alert", "success");
                 
                            return redirect()->to(base_url("cadastrar-departamento"));
                    else:
                             $this->session->setFlashdata("msg", "Não foi possível adicionar este departamento...");
                             $this->session->setFlashdata("alertInfo", "alert alert-danger");
                             $this->session->setFlashdata("erros", $departamento->errors());
                             $this->session->setFlashdata("alert", "danger");
                             return redirect()->to(base_url("cadastrar-departamento"));
                    
                    endif;
            endif;

        
            $data = [
                "msg" =>       $this->session->getFlashdata("msg"),
                "alertInfo" => $this->session->getFlashdata("alertInfo"),
                "erros" =>     $this->session->getFlashdata("erros"),
                "alert" =>     $this->session->getFlashdata("alert"),
                "departamento" => $departamento->find(),
                "titulo" => "Adicionar Departamento",
                "view" => "cadastroDepartamento"
            ];
                         
          

            
              echo  view('urgtec', $data);

        }


            public function listaFuncionarios(){
                    $funcionario = new \App\Models\FuncionarioModel();
                    $departamento = new \App\Models\DepartamentoModel();
                    $data["msg"] = $this->session->getFlashdata("msg");
                    $data["alertInfo"] = $this->session->getFlashdata("alertInfo");
                    $data["alert"] = $this->session->getFlashdata("success");
                    $data["titulo"] =  "Lista de Funcionários Registrados";
                    $data["view"] = "listaFuncionarios";
                    $data["listaFuncionarios"] = $funcionario->find();
                    $data["departamentos"] = $departamento->find();

                    echo  view('urgtec', $data);

                }

        public function ExcluirFuncionario($id_funcionario){
                if(is_null($id_funcionario)){
                    $this->session->setFlashdata('msg', "Funcionário não encontrado");
                    return redirect()->to(base_url("funcionarios-registrados"));
                }

                $funcionario = new \App\Models\FuncionarioModel();
                if($funcionario->delete($id_funcionario)){
                    
                    $this->session->setFlashdata('msg', "Funcionário Deletado com sucesso.");
                    $this->session->setFlashdata("alertInfo", "alert alert-success");
                    $this->session->setFlashdata("alert", "success");
                    
                    return redirect()->to(base_url("funcionarios-registrados"));
                }else{
                    $this->session->setFlashdata('msg', "ERRO");
                }
                return redirect()->to(base_url("funcionarios-registrados"));

        }

        public function ExcluirDepartamento($id_departamento){
                if(is_null($id_departamento)){
                    $this->session->setFlashdata('msg', "Departamento não encontrado");
                    return redirect()->to(base_url("funcionarios-registrados"));
                }

                $departamento = new \App\Models\DepartamentoModel();
                if($departamento->delete($id_departamento)){
                    
                    $this->session->setFlashdata('msg', "Departamento Deletado com sucesso.");
                    $this->session->setFlashdata("alertInfo", "alert alert-success");
                    $this->session->setFlashdata("alert", "success");
                    
                    return redirect()->to(base_url("lista-de-departamentos"));
                }else{
                    $this->session->setFlashdata('msg', "ERRO");
                }
                return redirect()->to(base_url("lista-de-departamentos"));

        }

        public function listaDepartamento(){
                    $data["msg"] = $this->session->getFlashdata("msg");
                    $data["alertInfo"] = $this->session->getFlashdata("alertInfo");
                    $data["alert"] = $this->session->getFlashdata("success");
                    $departamento = new \App\Models\DepartamentoModel();
                    $data["titulo"] =  "Lista de Departamentos Registrados";
                    $data["view"] = "listaDepartamento";
                    $data["departamentos"] = $departamento->find();

                     echo  view('urgtec', $data);
                    

        }

        public function mudarStatusFuncionario($id, $status){
            if($status === "0") {
                 $funcionario = new \App\Models\FuncionarioModel();
                    $funcionarioIn = $funcionario->find($id);
                    
                    $data = [
                        'status' => 1,
                    ]; 
                        
           
                    $funcionario->update($id,$data);
                       $this->session->setFlashdata('msg', "Funcionário Ativado.");
                        $this->session->setFlashdata("alertInfo", "alert alert-success");
                        $this->session->setFlashdata("alert", "success");
                    return redirect()->to(base_url("funcionarios-registrados"));
            }else{
                    $funcionario = new \App\Models\FuncionarioModel();
                    $funcionarioIn = $funcionario->find($id);
                
                $data = [
                    'status' => 0,
                ];
       
                $funcionario->update($id,$data);
                    $this->session->setFlashdata('msg', "Funcionário desativado.");
                    $this->session->setFlashdata("alertInfo", "alert alert-warning");
                    $this->session->setFlashdata("alert", "danger");
                return redirect()->to(base_url("funcionarios-registrados"));
                }
        }

        public function departamento($id_departamento){
                    
                    if($id_departamento === "finalizar"){

                    }


                    $data["msg"] = $this->session->getFlashdata("msg");
                    $data["alertInfo"] = $this->session->getFlashdata("alertInfo");
                    $data["alert"] = $this->session->getFlashdata("success");
                    $data["erros"] = $this->session->getFlashdata("erros");
                    $departamento = new \App\Models\DepartamentoModel();
                    $data["titulo"] =  "Editar Departamento";
                    $data["view"] = "editarDepartamento";
                    $data["departamento"] = $departamento->find($id_departamento);

             

                     echo  view('urgtec', $data);
        }

        public function EditarDepartamento(){
                if($this->request->getMethod() === "post"):
            
                        $departamento = new \App\Models\DepartamentoModel();
                        $departamento->set("nome_departamento", $this->request->getPost("nome_departamento"));
                        $departamentopost =  $departamento->find($this->request->getPost("id_departamento"));
                        $departamentopost->nome_departamento = $this->request->getPost("nome_departamento");

                        if($departamento->update($this->request->getPost("id_departamento"), $departamentopost)):
                                $this->session->setFlashdata('msg', "Departamento foi alterado.");
                                $this->session->setFlashdata("alertInfo", "alert alert-success");
                                $this->session->setFlashdata("alert", "success");
                                return redirect()->to(base_url("departamento/{$this->request->getPost("id_departamento")}"));
                        else:
                                $this->session->setFlashdata("status", $this->request->getPost("status"));
                                $this->session->setFlashdata('msg', "Algo deu errado...");
                                $this->session->setFlashdata("alertInfo", "alert alert-danger");
                                $this->session->setFlashdata("erros", $departamento->errors());
                                $this->session->setFlashdata("alert", "danger");
                                return redirect()->to(base_url("departamento/{$this->request->getPost("id_departamento")}"));
                        
                        endif;
            
                endif;
        }


        public function funcionario($id_funcionario){
            
        $departamento = new \App\Models\DepartamentoModel();
        $funcionario = new \App\Models\FuncionarioModel();
        
        

           if($this->request->getMethod() === "post"){


                $funcionario->set("nome", $this->request->getPost("nome"));
                $funcionario->set("email", $this->request->getPost("email"));
                $funcionario->set("data_nascimento", $this->request->getPost("data_nascimento"));
                $funcionario->set("sexo", $this->request->getPost("sexo"));
                $funcionario->set("departamento", $this->request->getPost("departamento"));
                $funcionario->set("status", $this->request->getPost("status"));
                if($funcionario->update()):
                    $nome = $this->request->getPost("nome");
                    $sexo = $this->request->getPost("sexo") === "ferminino" ? "a" : "o";
                    $this->session->setFlashdata("alert", "success");
                    $this->session->setFlashdata("erros", $funcionario->errors());
                    $this->session->setFlashdata("msg", "Funcionari{$sexo} ${nome} adicionado com sucesso!");
                    $this->session->setFlashdata("alertInfo", "alert alert-success");
                
                    return redirect()->to(base_url("cadastrar-funcionario"));
                else:
                    $this->session->setFlashdata("alert", "danger");
                    $this->session->setFlashdata("erros", $funcionario->errors());
                    $this->session->setFlashdata("msg", 'Preencha o formulário corretamente');
                    $this->session->setFlashdata("alertInfo", "alert alert-danger");
                    return redirect()->to(base_url("cadastrar-funcionario"));
                endif;
            }

              $dadosFuncionario = $funcionario->find($id_funcionario);
    
               $data = [
                "nome" =>      $this->session->getFlashdata("nome"),
                "email" =>      $this->session->getFlashdata("email"),
                "sexo" =>      $this->session->getFlashdata("sexo"),
                "data_nascimento" =>      $this->session->getFlashdata("data_nascimento"),
                "inputDepartamento" =>      $this->session->getFlashdata("inputDepartamento"),
                "status" =>    $this->session->getFlashdata("status"),
                "msg" =>       $this->session->getFlashdata("msg"),
                "alertInfo" => $this->session->getFlashdata("alertInfo"),
                "erros" =>     $this->session->getFlashdata("erros"),
                "alert" =>     $this->session->getFlashdata("alert"),
                "titulo" => "Editar de Funcionários",
                "view" => "editarFuncionario",
                "todosDepartamentos" => $departamento->find(),
                "funcionario" => $funcionario->find($id_funcionario),
                "departamento" => $departamento->find($dadosFuncionario->departamento),
                ];
              

        echo  view('urgtec', $data);

        }

          public function EditarFuncionario(){
            
                if($this->request->getMethod() === "post"):
                
                        $funcionario = new \App\Models\FuncionarioModel();
            
                            $funcionario->find($this->request->getPost("id_funcionario"));
                            $funcionarioPost = $this->request->getPost();
                        
                        
                        if($funcionario->update($this->request->getPost("id_funcionario"), $funcionarioPost)):
                                $this->session->setFlashdata('msg', "Funcionario(a) foi alterado.");
                                $this->session->setFlashdata("alertInfo", "alert alert-success");
                                $this->session->setFlashdata("alert", "success");
                                return redirect()->to(base_url("funcionario/{$this->request->getPost("id_funcionario")}"));
                        else:
                                $this->session->setFlashdata("nome", $this->request->getPost("nome"));
                                $this->session->setFlashdata("email", $this->request->getPost("email"));
                                $this->session->setFlashdata("sexo", $this->request->getPost("sexo"));
                                $this->session->setFlashdata("data_nascimento", $this->request->getPost("data_nascimento"));
                                $this->session->setFlashdata("inputDepartamento", $this->request->getPost("departamento"));
                                $this->session->setFlashdata("status", $this->request->getPost("status"));
                                $this->session->setFlashdata('msg', "Algo deu errado...");
                                $this->session->setFlashdata("alertInfo", "alert alert-danger");
                                $this->session->setFlashdata("erros", $funcionario->errors());
                                $this->session->setFlashdata("alert", "danger");
                                return redirect()->to(base_url("funcionario/{$this->request->getPost("id_funcionario")}"));
                        
                        endif;
            
                endif;

        }
  
    }

