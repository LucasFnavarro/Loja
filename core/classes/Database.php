<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database
{
    
    private $ligar;

    private function ligarDataBase(){

        $this->ligar = new PDO(
            "mysql:" . "host=" . MYSQL_HOST . ';' . "dbname=" . MYSQL_DBNAME . ';' . "charset=" . MYSQL_CHARSET, MYSQL_USER, MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => TRUE)
        );
        $this->ligar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    #===================================================================================
    private function desligarDataBase(){
        $this->ligar = null;
    }

    #===================================================================================
    public function select($sql, $params = null){
    
        $sql = trim($sql);

        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception("Instrução SELECT inválida!");
        }

        $this->ligarDataBase();
        $resultados = null;

        try{
            if(!empty($params)){
                $execute = $this->ligar->prepare($sql);
                $execute->execute($params);
                $resultados = $execute->fetchAll(PDO::FETCH_CLASS);
            }else{
                $execute = $this->ligar->prepare($sql);
                $execute->execute();
                $resultados = $execute->fetchAll(PDO::FETCH_CLASS);
            }
        }catch(PDOException $e){

            return false;

        }
        $this->desligarDataBase();
        return $resultados;
    }

    #===================================================================================
    public function insert($sql, $params = null){
        
        $sql = trim($sql);

        if(!preg_match("/^INSERT/i", $sql)){
            throw new Exception("Instrução INSERT inválida!");
        }

        $this->ligarDataBase();

        try{
            if(!empty($params)){
                $execute = $this->ligar->prepare($sql);
                $execute->execute($params);
            }else {
                $execute = $this->ligar->prepare($sql);
                $execute->execute();
            }
        }catch(PDOException $e){
            return false;
        }
        $this->desligarDataBase();
    }

    #===================================================================================
    public function update($sql, $params = null){

        $sql = trim($sql);

        if(!preg_match("/^UPDATE/i", $sql)){
            throw new Exception("Instrução UPDATE inválida!");
        }

        $this->ligarDataBase();
        $resultados = null;

        try{
            if(!empty($params)){
                $execute = $this->ligar->prepare($sql);
                $execute->execute($params);
                $resultados= $execute->fetchAll(PDO::FETCH_CLASS);
            }else {
                $execute = $this->ligar->prepare($sql);
                $execute->execute();
                $resultados= $execute->fetchAll(PDO::FETCH_CLASS);
            }
        }catch(PDOException $e){
            return false;
        }
        $this->desligarDataBase();
        return $resultados;
    }

    #===================================================================================
    public function delete($sql, $params = null){

        $sql = trim($sql);

        if(!preg_match("/^DELETE/i", $sql)){
           throw new Exception('Instrução DELETE inválida');
        }

        $this->ligarDataBase();
        $resultados = null;

        try{
            if(!empty($params)){
                $execute = $this->ligar->prepare($sql);
                $execute->execute($params);
                $resultados = $execute->fetchAll(PDO::FETCH_CLASS);
            }else {
                $execute = $this->ligar->prepare($sql);
                $execute->execute();
                $resultados = $execute->fetchAll(PDO::FETCH_CLASS);
            }
        }catch(PDOException $e){
            return false;
        }
        $this->desligarDataBase();
        return $resultados;
    }
    
  #===================================================================================
   public function stetement($sql, $params = null){

    $sql = trim($sql);

    if(!preg_match("/^SELECT|INSERT|UPDATE|DELETE/i", $sql)){
       throw new Exception('Instrução DELETE inválida');
    }

    $this->ligarDataBase();
    $resultados = null;

    try{
        if(!empty($params)){
            $execute = $this->ligar->prepare($sql);
            $execute->execute($params);
            $resultados = $execute->fetchAll(PDO::FETCH_CLASS);
        }else {
            $execute = $this->ligar->prepare($sql);
            $execute->execute();
            $resultados = $execute->fetchAll(PDO::FETCH_CLASS);
        }
    }catch(PDOException $e){
        return false;
    }
    $this->desligarDataBase();
    return $resultados;
}



}