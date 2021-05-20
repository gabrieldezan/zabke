<?php

require_once "Conexao.class.php";

class Servicos extends Conexao {
    /* =============== VARIAVEIS =============== */

    private $id_servicos;
    private $titulo;
    private $titulo_secao;
    private $resumo;
    private $descricao;
    private $icone;
    private $imagem;
    private $posicao;
    private $status;
    private $layout;
    private $plano_personalizado;
    private $url_amigavel;
    private $retorno_dados;

    /* =============== FUNÇÃO SALVA DADOS =============== */

    public function salva_dados() {
        try {

            $pdo = parent::getDB();

            if ($this->id_servicos === "") {
                $salva_dados = $pdo->prepare('
                    INSERT INTO servicos (
                        titulo,
                        titulo_secao,
                        resumo,
                        descricao,
                        icone,
                        imagem,
                        posicao,
                        status,
                        layout,
                        plano_personalizado,
                        url_amigavel
                    ) VALUES (
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
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
                    "$this->titulo_secao",
                    "$this->resumo",
                    "$this->descricao",
                    "$this->icone",
                    "$this->imagem",
                    "$this->posicao",
                    "$this->status",
                    "$this->layout",
                    "$this->plano_personalizado",
                    "$this->url_amigavel"
                ));
                $this->setRetorno_dados($pdo->lastInsertId());
            } else {
                $salva_dados = $pdo->prepare('
                    UPDATE servicos SET 
                        titulo = ?,
                        titulo_secao = ?,
                        resumo = ?,
                        descricao = ?,
                        icone = ?,
                        imagem = ?,
                        posicao = ?,
                        status = ?,
                        layout = ?,
                        plano_personalizado = ?,
                        url_amigavel = ?
                    WHERE 
                        id_servicos = ?;
                ');
                $salva_dados->execute(array(
                    "$this->titulo",
                    "$this->titulo_secao",
                    "$this->resumo",
                    "$this->descricao",
                    "$this->icone",
                    "$this->imagem",
                    "$this->posicao",
                    "$this->status",
                    "$this->layout",
                    "$this->plano_personalizado",
                    "$this->url_amigavel",
                    "$this->id_servicos"
                ));
                $this->setRetorno_dados($this->id_servicos);
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
                    id_servicos,
                    titulo,
                    posicao,
                    CASE status
                        WHEN 1 THEN 'success'
                        WHEN 0 THEN 'danger'
                    END AS status_class,
                    CASE status
                        WHEN 1 THEN 'Ativo'
                        WHEN 0 THEN 'Inativo'
                    END AS status
                FROM
                    servicos
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
                    titulo_secao,
                    resumo,
                    descricao,
                    icone,
                    imagem,
                    posicao,
                    status,
                    layout,
                    plano_personalizado,
                    url_amigavel
                FROM
                    servicos
                WHERE
                    id_servicos =  ?
            ");
            $edita_dados->execute(array(
                "$this->id_servicos"
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
    
    function getId_servicos() {
        return $this->id_servicos;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTitulo_secao() {
        return $this->titulo_secao;
    }

    function getResumo() {
        return $this->resumo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getIcone() {
        return $this->icone;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getPosicao() {
        return $this->posicao;
    }

    function getStatus() {
        return $this->status;
    }

    function getLayout() {
        return $this->layout;
    }

    function getPlano_personalizado() {
        return $this->plano_personalizado;
    }

    function getUrl_amigavel() {
        return $this->url_amigavel;
    }

    function getRetorno_dados() {
        return $this->retorno_dados;
    }

    function setId_servicos($id_servicos) {
        $this->id_servicos = $id_servicos;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTitulo_secao($titulo_secao) {
        $this->titulo_secao = $titulo_secao;
    }

    function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setIcone($icone) {
        $this->icone = $icone;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setPosicao($posicao) {
        $this->posicao = $posicao;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setLayout($layout) {
        $this->layout = $layout;
    }

    function setPlano_personalizado($plano_personalizado) {
        $this->plano_personalizado = $plano_personalizado;
    }

    function setUrl_amigavel($url_amigavel) {
        $this->url_amigavel = $url_amigavel;
    }

    function setRetorno_dados($retorno_dados) {
        $this->retorno_dados = $retorno_dados;
    }

}