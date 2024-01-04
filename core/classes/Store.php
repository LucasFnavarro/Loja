<?php 

namespace core\classes;

use Exception;

class Store
{

    public static function Layout($structures, $dados = []){

        if(!is_array($structures)){
            throw new Exception("[ERROR] - INVÁLIDO !");
        }

        if(!empty($dados) && is_array($dados)){
            extract($dados);
        }

        foreach($structures as $structure){
            include("../build/views/$structure.php");
        }
    }

    public static function verifica_sessao_usuario(){
        return isset($_SESSION['cliente']);
    }

    public static function gerar_hash_senhas($num_caracters = 16 ){

        $chars = "0123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ";

        return substr(str_shuffle($chars), 0, $num_caracters);

    }

}