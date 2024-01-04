<?php

namespace core\models;

use core\classes\Database;
use core\classes\Store;

class Clientes
{

    public function verifica_se_existe_email($email)
    {
    
        $db = new Database();
        $parametros = [
            ':e' => strtolower(trim($email))
        ];
        
        $resultados = $db->select('SELECT email FROM clientes WHERE email = :e', $parametros);

        if(count($resultados) !== 0){
            return true;
        }else {
            return false;
        }
    }

    public function registrar_cliente(){

        $bd = new Database();
        $purl = Store::gerar_hash_senhas();
        
        $parametros = [
            ':email' => strtolower(trim($_POST['text_email'])),
            ':nomecompleto' => trim($_POST['text_nomecompleto']),
            ':senha' => password_hash($_POST['text_senha_1'], PASSWORD_DEFAULT),
            ':endereco' => trim($_POST['text_endereco']),
            ':cidade' => trim($_POST['text_cidade']),
            ':telefone' => trim($_POST['text_telefone']),
            ':purl' => $purl,
            ':ativo' => 0
        ];

        $bd->insert('INSERT INTO clientes VALUES(0, :email, :nomecompleto, :senha, :endereco, :cidade, :telefone, :purl, :ativo, NOW(), NOW(), NULL)', $parametros);
        
        return $purl;

    }
}
