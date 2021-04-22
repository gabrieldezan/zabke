<?php

require_once "Conexao.class.php";

class Diferenciais extends Conexao {
    /* =============== VARIAVEIS =============== */

    private $id_diferenciais;
    private $descricao;
    private $texto;
    private $icone;
    private $id_servicos;
    private $retorno_dados;

    /* =============== FUNÇÃO SALVA DADOS =============== */

    public function salva_dados() {
        try {

            $pdo = parent::getDB();

            if ($this->id_diferenciais === "") {
                $salva_dados = $pdo->prepare('
                    INSERT INTO diferenciais (
                        descricao,
                        texto,
                        icone,
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
                    "$this->texto",
                    "$this->icone",
                    "$this->id_servicos"
                ));
                $this->setRetorno_dados($pdo->lastInsertId());
            } else {
                $salva_dados = $pdo->prepare('
                    UPDATE diferenciais SET 
                        descricao = ?,
                        texto = ?,
                        icone = ?,
                        id_servicos = ?
                    WHERE 
                        id_diferenciais = ?;
                ');
                $salva_dados->execute(array(
                    "$this->descricao",
                    "$this->texto",
                    "$this->icone",
                    "$this->id_servicos",
                    "$this->id_diferenciais"
                ));
                $this->setRetorno_dados($this->id_diferenciais);
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
                    id_diferenciais,
                    descricao,
                    texto,
                    icone
                FROM
                    diferenciais
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
                    texto,
                    icone
                FROM
                    diferenciais
                WHERE
                    id_diferenciais =  ?
            ");
            $edita_dados->execute(array(
                "$this->id_diferenciais"
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

    function getId_diferenciais() {
        return $this->id_diferenciais;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getTexto() {
        return $this->texto;
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

    function setId_diferenciais($id_diferenciais) {
        $this->id_diferenciais = $id_diferenciais;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setTexto($texto) {
        $this->texto = $texto;
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
