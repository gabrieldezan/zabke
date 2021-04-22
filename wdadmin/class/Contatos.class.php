<?php

require_once "Conexao.class.php";

class Contatos extends Conexao {
    /* =============== VARIAVEIS =============== */

    private $id_contatos;
    private $titulo;
    private $icone;
    private $link;
    private $tipo;
    private $retorno_dados;

    /* =============== FUNÇÃO SALVA DADOS =============== */

    public function salva_dados() {
        try {

            $pdo = parent::getDB();

            if ($this->id_contatos === "") {
                $salva_dados = $pdo->prepare('
                    INSERT INTO contatos (
                        titulo,
                        icone,
                        link,
                        tipo
                    ) VALUES (
                        ?,
                        ?,
                        ?,
                        ?
                    );
                ');
                $salva_dados->execute(array(
                    "$this->titulo",
                    "$this->icone",
                    "$this->link",
                    "$this->tipo"
                ));
                $this->setRetorno_dados($pdo->lastInsertId());
            } else {
                $salva_dados = $pdo->prepare('
                    UPDATE contatos SET 
                        titulo = ?,
                        icone = ?,
                        link = ?,
                        tipo = ?
                    WHERE 
                        id_contatos = ?;
                ');
                $salva_dados->execute(array(
                    "$this->titulo",
                    "$this->icone",
                    "$this->link",
                    "$this->tipo",
                    "$this->id_contatos"
                ));
                $this->setRetorno_dados($this->id_contatos);
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
                    id_contatos,
                    titulo,
                    icone,
                    link,
                    CASE tipo
                        WHEN 1 THEN 'Telefônico'
                        WHEN 2 THEN 'E-mail'
                    END AS tipo
                FROM
                    contatos
                ORDER BY
                    titulo
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
                    titulo,
                    icone,
                    link,
                    tipo
                FROM
                    contatos
                WHERE
                    id_contatos =  ?
            ");
            $edita_dados->execute(array(
                "$this->id_contatos"
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

    function getId_contatos() {
        return $this->id_contatos;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getIcone() {
        return $this->icone;
    }

    function getLink() {
        return $this->link;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getRetorno_dados() {
        return $this->retorno_dados;
    }

    function setId_contatos($id_contatos) {
        $this->id_contatos = $id_contatos;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setIcone($icone) {
        $this->icone = $icone;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setRetorno_dados($retorno_dados) {
        $this->retorno_dados = $retorno_dados;
    }

}
