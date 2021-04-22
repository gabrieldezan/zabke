<?php

require_once "Conexao.class.php";

class ChamadaTeste extends Conexao {
    /* =============== VARIAVEIS =============== */

    private $id_chamada_teste;
    private $titulo;
    private $imagem;
    private $texto;
    private $texto_botao;
    private $link;
    private $id_servicos;
    private $retorno_dados;

    /* =============== FUNÇÃO SALVA DADOS =============== */

    public function salva_dados() {
        try {

            $pdo = parent::getDB();

            if ($this->id_chamada_teste === "") {
                $salva_dados = $pdo->prepare('
                    INSERT INTO chamada_teste (
                        titulo,
                        imagem,
                        texto,
                        texto_botao,
                        link,
                        id_servicos
                    ) VALUES (
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?
                    );
                ');
                $salva_dados->execute(array(
                    "$this->titulo",
                    "$this->imagem",
                    "$this->texto",
                    "$this->texto_botao",
                    "$this->link",
                    "$this->id_servicos"
                ));
                $this->setRetorno_dados($pdo->lastInsertId());
            } else {
                $salva_dados = $pdo->prepare('
                    UPDATE chamada_teste SET 
                        titulo = ?,
                        imagem = ?,
                        texto = ?,
                        texto_botao = ?,
                        link = ?,
                        id_servicos = ?
                    WHERE 
                        id_chamada_teste = ?;
                ');
                $salva_dados->execute(array(
                    "$this->titulo",
                    "$this->imagem",
                    "$this->texto",
                    "$this->texto_botao",
                    "$this->link",
                    "$this->id_servicos",
                    "$this->id_chamada_teste"
                ));
                $this->setRetorno_dados($this->id_chamada_teste);
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
                    id_chamada_teste,
                    titulo,
                    imagem,
                    texto,
                    texto_botao,
                    link
                FROM
                    chamada_teste
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
                    titulo,
                    imagem,
                    texto,
                    texto_botao,
                    link
                FROM
                    chamada_teste
                WHERE
                    id_chamada_teste =  ?
            ");
            $edita_dados->execute(array(
                "$this->id_chamada_teste"
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

    function getId_chamada_teste() {
        return $this->id_chamada_teste;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getTexto() {
        return $this->texto;
    }

    function getTexto_botao() {
        return $this->texto_botao;
    }

    function getLink() {
        return $this->link;
    }

    function getId_servicos() {
        return $this->id_servicos;
    }

    function getRetorno_dados() {
        return $this->retorno_dados;
    }

    function setId_chamada_teste($id_chamada_teste) {
        $this->id_chamada_teste = $id_chamada_teste;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setTexto_botao($texto_botao) {
        $this->texto_botao = $texto_botao;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setId_servicos($id_servicos) {
        $this->id_servicos = $id_servicos;
    }

    function setRetorno_dados($retorno_dados) {
        $this->retorno_dados = $retorno_dados;
    }

}
