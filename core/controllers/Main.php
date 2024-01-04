<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\Store;
use core\models\Clientes;

class Main
{

    public function index()
    {

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'pagina_inicial',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    #===================================================================================
    public function cadastro_novo_user()
    {

        if (Store::verifica_sessao_usuario()) {
            $this->index();
            return;
        }

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'cadastro_user',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    #===================================================================================
    public function cadastro_user_submit()
    {

   
     if(Store::verifica_sessao_usuario()){
            $this->index();
            return;
        }

        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            $this->index();
            return;
        }

        if($_POST['text_senha_1'] !== $_POST['text_senha_2']){
            $_SESSION['erro'] = 'As senhas não correspondem!';
            $this->cadastro_novo_user();
            return;
        }

        $clientes = new Clientes();
        
        if($clientes->verifica_se_existe_email($_POST['text_email'])){
            $_SESSION['erro'] = 'Já existe um cliente com este e-mail cadastrado';
            $this->cadastro_novo_user();
            return;
        }

      $purl = $clientes->registrar_cliente();
      return $this->index();

    }
}
