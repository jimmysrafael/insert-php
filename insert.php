<?php

require_once '../../../conexao_bd/db/ConMysqlPdo.php'; //Importando conexão do banco de dados
require_once '../../../classe/classe/model/classe.php'; //Importando classe

class Classe {

    public static function insert(Linha $Linha) {

        try {

            $PDO = ConMysqlPdo::getInstance();

            $sql = "INSERT INTO linha (idempresa, descricao) 
                   values (:idempresa, :descricao)";

            $stm = $PDO->prepare($sql);

            $stm->bindValue(":descricao", $Linha->get_descricao());
            $stm->bindValue(":idempresa", $Linha->get_idempresa());

            $stm->execute();

            return true;
        } catch (Exception $e) {
            throw new Exception("Mensagem: Erro de Banco" . $e->getMessage());
        }
    }

}