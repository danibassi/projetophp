<?php

class Livro{
    private $nome;
    private $anopublicacao;
    private $edicao;
    private $estado;
    private $editora;
    private $autor;
    private $genero;
    private $isbd;
    private $capa;

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setAnopublicacao($anopublicacao){
        $this->anopublicacao = $anopublicacao;
    }

    public function getAnopublicacao(){
        return $this->anopublicacao;
    }

    public function setEdicao($edicao){
        $this->edicao = $edicao;
    }

    public function getEdicao(){
        return $this->edicao;
    }

    public function setEditoria($editora){
        $this->editoria = $editora;
    }

    public function getEditora(){
        return $this->editora;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setIsbd($isbd){
        $this->isbd = $isbd;
    }

    public function getIsbd(){
        return $this->isbd;
    }

    public function setCapa($capa){
        $this->capa = $capa;
    }
    public function getCapa(){
        return $this->capa;
    }
}









?>