<?php

require_once "Conexao.class.php";

class Video extends Conexao {
    /* =============== VARIAVEIS =============== */

    private $id_video;
    private $titulo;
    private $detalhes;
    private $imagem;
    private $link;
    private $id_servicos;
    private $retorno_dados;

    /* =============== FUNÇÃO SALVA DADOS =============== */

    public function salva_dados() {
        try {

            $pdo = parent::getDB();

            if ($this->id_video === "") {
                $salva_dados = $pdo->prepare('
                    INSERT INTO video (
                        titulo,
                        detalhes,
                        imagem,
                        link,
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
                    "$this->titulo",
                    "$this->detalhes",
                    "$this->imagem",
                    "$this->link",
                    "$this->id_servicos"
                ));
                $this->setRetorno_dados($pdo->lastInsertId());
            } else {
                $salva_dados = $pdo->prepare('
                    UPDATE video SET 
                        titulo = ?,
                        detalhes = ?,
                        imagem = ?,
                        link = ?,
                        id_servicos = ?
                    WHERE 
                        id_video = ?;
                ');
                $salva_dados->execute(array(
                    "$this->titulo",
                    "$this->detalhes",
                    "$this->imagem",
                    "$this->link",
                    "$this->id_servicos",
                    "$this->id_video"
                ));
                $this->setRetorno_dados($this->id_video);
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
                    id_video,
                    titulo,
                    detalhes,
                    imagem,
                    link
                FROM
                    video
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
                    detalhes,
                    imagem,
                    link
                FROM
                    video
                WHERE
                    id_video =  ?
            ");
            $edita_dados->execute(array(
                "$this->id_video"
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

    function getId_video() {
        return $this->id_video;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDetalhes() {
        return $this->detalhes;
    }

    function getImagem() {
        return $this->imagem;
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

    function setId_video($id_video) {
        $this->id_video = $id_video;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDetalhes($detalhes) {
        $this->detalhes = $detalhes;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
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
