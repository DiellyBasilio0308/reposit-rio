<?php

require_once "Conexao.php";

class Solteiro{
    private $id;
    private $nome;
    private $cidade;
    private $idade;
    private $whatsapp;
    private $instagram;
    private $expectativas;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    
    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
        return $this;
    }
    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($idade){
        $this->idade = $idade;
        return $this;
    }
    
    public function getWhatsapp(){
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp){
        $this->whatsapp = $whatsapp;
        return $this;
    }
    public function getInstagram(){
        return $this->instagram;
    }

    public function setInstagram($instagram){
        $this->instagram = $instagram;
        return $this;
    }
    public function getExpectativas(){
        return $this->expectativas;
    }

    public function setExpectativas($expectativas){
        $this->expectativas = $expectativas;
        return $this;
    }
    public function atualizar(){
        $tabela = "solteiros";
        $parametros = "nome='". $this->nome ."', cidade='". $this->cidade ."',
         idade=".$this->idade.", whatsapp='". $this->whatsapp ."', instagram='". $this->instagram ."',
         expectativas='". $this->expectativas ."'";
        
        Conexao::update($tabela,
        $parametros, $this->id);
    }

    public function salvar(){
   
        $tabela = "solteiros";
        $colunas = "nome, cidade, idade, whatsapp, instagram, expectativas";
        $valores =  "'". $this->nome ."', '". $this->cidade ."', ". $this->idade .", '". $this->whatsapp ."', '". $this->instagram ."',
        '". $this->expectativas . "'";
        Conexao::insert($tabela, $colunas, $valores);
    }

    public static function retornarTodos(){
        $tabela = "solteiros";
        $colunas = "id, nome, cidade, idade, whatsapp, instagram, expectativas";

        $dados = Conexao::select($tabela, $colunas);
        $solteiros = [];
        foreach($dados as $d){
            $solteiro = new Solteiro();
            $solteiro->id = $d["id"];
            $solteiro->nome = $d["nome"];
            $solteiro->cidade = $d["cidade"];
            $solteiro->idade = $d["idade"];
            $solteiro->whatsapp = $d["whatsapp"];
            $solteiro->instagram = $d["instagram"];
            $solteiro->expectativas = $d["expectativas"];
            $solteiros[] = $solteiro;
        }
        return $solteiros;
    }

    public static function retornarPorId($id){
        $tabela = "solteiros";
        $colunas = "id, nome, cidade, idade, whatsapp, instagram, expectativas";

        $dados = Conexao::selectById($tabela, $colunas, $id);
        
        foreach($dados as $d){
            $solteiro = new Solteiro();
            $solteiro->id = $d["id"];
            $solteiro->nome = $d["nome"];
            $solteiro->cidade = $d["cidade"];
            $solteiro->idade = $d["idade"];
            $solteiro->whatsapp = $d["whatsapp"];
            $solteiro->instagram = $d["instagram"];
            $solteiro->expectativas = $d["expectativas"];
            return $solteiro;
        }
        return null;
    }

    public static function deletar($id){
        Conexao::delete("solteiros", $id);
    }

}