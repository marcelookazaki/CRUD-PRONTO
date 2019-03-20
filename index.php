<?php

    require_once 'conexao.php';
    // require_once 'crudoo.php';
    require_once 'usuariosOO.php';   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulário de cadastro</title>
    <!-- <link href="estilo.css" rel="stylesheet" type="text/css" > -->
</head>
<body>
    <?php
    //Criar obj usuarios e cadastrar
    $usuario = new usuariosOO();
    //inserir no banco
    if(isset($_POST['btnCadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        //pegando o obj
        $usuario->setNome($nome);
        $usuario->setEmail($email);

        //Inserir no Banco 
        if($usuario->insert()){
            echo "Inserido com Sucesso" . "<br>";
            header("Location:index.php");
        }
        else{
            echo "DEU RUIM NO INSERT";
        }
    }
    //listar
    foreach ($usuario->findAll() as $key => $value) {

        if($value['status'] == 1){
            echo $value['id'].'<br>';
            echo $value['nome'].'<br>';
            echo $value['email'].'<br>';

            echo "<div><a href='index.php?acao=alterar&id=". $value['id'] ."'>ALTERAR</a></div>";
            echo "<div><a href='index.php?acao=deletar&id=". $value['id'] ."'onclick='return confirm(\"DESEJA DELETAR?\")'>DELETAR</a><hr>";
        }
    }
    //delete logico
    if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'){

        $id = (int)$_GET['id'];
         if($usuario->deleteLogico($id)){
            echo "deletado com Sucesso";
        } 
    }
    //UPDATE
    if (isset($_GET['acao']) && $_GET['acao'] == 'alterar')
    {
        $id = (int)$_GET['id'];

        $resultado = $usuario->find($id);
        
        // if($usuario->update($id)){ ?>
            <form method="POST">
                <label>Novo Nome: </label><br>
                <input type="text" name="nome" value="<?php echo $resultado['nome'];?>"><br>
                <label>Novo E-mail: </label><br>
                <input type="mail" name="email" value="<?php echo $resultado['email'] ?>"><br>
                <input type="submit" name="btnAtualizar" value="Atualizar">
            </form>

    <?php
           
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            // $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE,SPECIAL_CHARS);
            // $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE,SPECIAL_CHARS);

            if(isset($_POST['btnAtualizar'])){
                 //Inserir no Banco 
                
                if($usuario->update($id,$nome,$email)){
                    echo "cadastrado com Sucesso com Sucesso" . "<br>";

                    header("Location:index.php");
                }
                else{
                    echo "DEU RUIM NO INSERT";
                }
            } 
    }    
    ?>

    <div id="formulario">
        <form name="formCad" action="" method="POST">
            <label>Nome: </label><br>
            <input type="text" name="nome" value=""><br>
            <label>E-mail: </label><br>
            <input type="mail" name="email"><br>
            <br>
            <input type="submit" name="btnCadastrar" value="Cadastrar">
        </form>
    </div>
</body>
</html>