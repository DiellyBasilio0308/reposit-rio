<pre>
    <?php
    require_once "../model/Solteiro.php";

    $novoSolteiro = new Solteiro();
    $novoSolteiro->setNome($_POST["nome"]);
    $novoSolteiro->setCidade($_POST["cidade"]);
    $novoSolteiro->setIdade($_POST["idade"]);
    $novoSolteiro->setWhatsapp($_POST["whatsapp"]);
    $novoSolteiro->setInstagram($_POST["instagram"]);
    $novoSolteiro->setExpectativas($_POST["expectativas"]);
    $novoSolteiro->setId($_POST["id"]);

    print_r($novoSolteiro);
    
    if($novoSolteiro->getId() == ''){
        $novoSolteiro->salvar();
    }
    else{
        $novoSolteiro->atualizar();
    }
    header('Location:../listar.php');
    ?>
</pre>