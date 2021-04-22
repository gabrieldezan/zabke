<?php

require_once "Conexao.class.php";

class Metricas extends Conexao {
    /* =============== VARIAVEIS =============== */

    private $id_metricas;
    private $descricao;
    private $imagem;
    private $valor;
    private $id_servicos;
    private $retorno_dados;

    /* =============== FUNÇÃO SALVA DADOS =============== */

    public function salva_dados() {
        try {

            $pdo = parent::getDB();

            if ($this->id_metricas === "") {
                $salva_dados = $pdo->prepare('
                    INSERT INTO metricas (
                        descricao,
                        imagem,
                        valor,
                        id_servicos
                    ) VALUES (
                        ?,
                        ?,
                        ?,
                        ?
                    );
                ');
                $salva_dados->execute(array(
                    "$this->descricao",
                    "$this->imagem",
                    "$this->valor",
                    "$this->id_servicos"
                ));
                $this->setRetorno_dados($pdo->lastInsertId());
            } else {
                $salva_dados = $pdo->prepare('
                    UPDATE metricas SET 
                        descricao = ?,
                        imagem = ?,
                        valor = ?,
                        id_servicos = ?
                    WHERE 
                        id_metricas = ?;
                ');
                $salva_dados->execute(array(
                    "$this->descricao",
                    "$this->imagem",
                    "$this->valor",
                    "$this->id_servicos",
                    "$this->id_metricas"
                ));
                $this->setRetorno_dados($this->id_metricas);
            }
            return true;
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
            return false;
        }
    }

    /* =============== FUNÇÃO CONSULTA DADOS =============== */

    public function consulta_dados() {

        try {
            $pdo = parent::getDB();

            $consulta_dados = $pdo->prepare("
                SELECT
                    id_metricas,
                    descricao,
                    imagem,
                    valor
                FROM
                    metricas
                WHERE
                    id_servicos = $this->id_servicos
            ");
            $consulta_dados->execute();
            if ($consulta_dados->rowCount() > 0):
                $this->setRetorno_dados(json_encode($consulta_dados->fetchAll()));
                return true;
            else:
                return false;
            endif;
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
            return false;
        }
    }

    /* =============== FUNÇÃO EDITA DADOS =============== */

    public function edita_dados() {

        try {
            $pdo = parent::getDB();

            $edita_dados = $pdo->prepare("
                SELECT
                    descricao,
                    imagem,
                    valor
                FROM
                    metricas
                WHERE
                    id_metricas =  ?
            ");
            $edita_dados->execute(array(
                "$this->id_metricas"
            ));
            if ($edita_dados->rowCount() > 0):
                $this->setRetorno_dados(json_encode($edita_dados->fetchAll()));
                return true;
            else:
                return false;
            endif;
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
            return false;
        }
    }

    /* =============== GETTERS E SETTERS =============== */

    function getId_metricas() {
        return $this->id_metricas;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getValor() {
        return $this->valor;
    }

    function getId_servicos() {
        return $this->id_servicos;
    }

    function getRetorno_dados() {
        return $this->retorno_dados;
    }

    function setId_metricas($id_metricas) {
        $this->id_metricas = $id_metricas;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setId_servicos($id_servicos) {
        $this->id_servicos = $id_servicos;
    }

    function setRetorno_dados($retorno_dados) {
        $this->retorno_dados = $retorno_dados;
    }

}
