<?php
    $alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger" style="text-align: center; margin-top: 5%; margin-bottom: 2%;">' . $alertaLogin . '</div>' : '<p></p>';
?>
<div class="container centerHorizontal">
    <div class="jumbotron text-dark bg-white">
        <div class="row centerVertical">
            <a  href="#" style="width: 85px; margin-bottom: 2%;">
                <img src="src/images/Logotop.png" width="85" alt=""> </a>
            <div class="col blocos corpo1" style="margin-right:0%;">
                <form method="post">
                    <h2 style="text-align: center;">Login</h2>
                    <?= $alertaLogin ?>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>