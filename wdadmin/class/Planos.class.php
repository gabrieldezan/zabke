<?php

require_once "Conexao.class.php";

class Planos extends Conexao {
    /* =============== VARIAVEIS =============== */

    private $id_planos;
    private $descricao;
    private $detalhes;
    private $valor;
    private $icone;
    private $id_servicos;
    private $retorno_dados;

    /* =============== FUNÇÃO SALVA DADOS =============== */

    public function salva_dados() {
        try {

            $pdo = parent::getDB();

            if ($this->id_planos === "") {
                $salva_dados = $pdo->prepare('
                    INSERT INTO planos (
                        descricao,
                        detalhes,
                        valor,
                        icone,
                        id_servicos
                    ) VALUES (
                        ?,
                        ?,
                        ?,
                        ?,
                        ?
                    );
                ');
                $salva_dados->execute(array(
                    "$this->descricao",
                    "$this->detalhes",
                    "$this->valor",
                    "$this->icone",
                    "$this->id_servicos"
                ));
                $this->setRetorno_dados($pdo->lastInsertId());
            } else {
                $salva_dados = $pdo->prepare('
                    UPDATE planos SET 
                        descricao = ?,
                        detalhes = ?,
                        valor = ?,
                        icone = ?,
                        id_servicos = ?
                    WHERE 
                        id_planos = ?;
                ');
                $salva_dados->execute(array(
                    "$this->descricao",
                    "$this->detalhes",
                    "$this->valor",
                    "$this->icone",
                    "$this->id_servicos",
                    "$this->id_planos"
                ));
                $this->setRetorno_dados($this->id_planos);
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
                    id_planos,
                    descricao,
                    detalhes,
                    valor,
                    icone
                FROM
                    planos
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
                    detalhes,
                    valor,
                    icone
                FROM
                    planos
                WHERE
                    id_planos =  ?
            ");
            $edita_dados->execute(array(
                "$this->id_planos"
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

    function getId_planos() {
        return $this->id_planos;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDetalhes() {
        return $this->detalhes;
    }

    function getValor() {
        return $this->valor;
    }

    function getIcone() {
        return $this->icone;
    }

    function getId_servicos() {
        return $this->id_servicos;
    }

    function getRetorno_dados() {
        return $this->retorno_dados;
    }

    function setId_planos($id_planos) {
        $this->id_planos = $id_planos;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDetalhes($detalhes) {
        $this->detalhes = $detalhes;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setIcone($icone) {
        $this->icone = $icone;
    }

    function setId_servicos($id_servicos) {
        $this->id_servicos = $id_servicos;
    }

    function setRetorno_dados($retorno_dados) {
        $this->retorno_dados = $retorno_dados;
    }



}
