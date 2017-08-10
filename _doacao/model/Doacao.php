<?php

class Doacao {

    var $id;
    var $inst_CI;
    var $id_cat;
    var $id_subcat;
    var $img_padrao;
    var $descricao;
    var $quantidade;
    var $data;
    
    function getId() {
        return $this->id;
    }

    function getInst_CI() {
        return $this->inst_CI;
    }

    function getId_cat() {
        return $this->id_cat;
    }

    function getId_subcat() {
        return $this->id_subcat;
    }

    function getImg_padrao() {
        return $this->img_padrao;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getData() {
        return $this->data;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setInst_CI($inst_CI) {
        $this->inst_CI = $inst_CI;
    }

    function setId_cat($id_cat) {
        $this->id_cat = $id_cat;
    }

    function setId_subcat($id_subcat) {
        $this->id_subcat = $id_subcat;
    }

    function setImg_padrao($img_padrao) {
        $this->img_padrao = $img_padrao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setData($data) {
        $this->data = $data;
    }


}

?>