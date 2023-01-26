<?php
$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">' . $alertaLogin . '</div>' : '';
?>
<div class="container">
    <div class="jumbotron text-dark bg-white">
        <div class="row">
            <div class="col">
                <form method="post">
                    <h2>Login</h2>

                    <?= $alertaLogin ?>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <form method="post">
                    <h2>Cadastre-se</h2>

                    <? //$alertaCadastro 
                    ?>

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>