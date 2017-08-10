<?php

class Evento{
    
    var $id;
    var $CI;
    var $titulo;
    var $imgPadrao;
    var $descricao;
    var $data;
    
    
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        function getCI() {
        return $this->CI;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getImgPadrao() {
        return $this->imgPadrao;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getData() {
        return $this->data;
    }

    function setCI($CI) {
        $this->CI = $CI;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setImgPadrao($imgPadrao) {
        $this->imgPadrao = $imgPadrao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setData($data) {
        $this->data = $data;
    }


}
