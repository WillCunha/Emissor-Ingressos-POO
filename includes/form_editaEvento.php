<?php

$dados = '';

foreach ($dadosIngresso as $ingresso) {
    $dados .= '<div class="col-lg-auto">
                <label for="valorIngresso"><h5><b>' . $ingresso->nome_ingresso . ':</b></h5></label>
                <input type="text" name="valorIngresso[]" id="valorIngresso" value="' . $ingresso->valor . '" class="form-control col-sm-2" required>
                <label for="dataIngresso">Data limite: </label>
                <input type="text" name="dataIngresso[]" id="dataIngresso" value="' . $ingresso->prazo . '" class="form-control col-sm-2" >
                <label for="dataIngresso">Quantidade máxima: </label>
                <input type="text" name="quantidadeIngresso[]" id="quantidadeIngresso" value="' . $ingresso->quantidade . '" class="form-control col-sm-2" >
                <input type="text" name="idIngresso[]" id="idIngresso" value="' . $ingresso->id . '" class="form-control" hidden>
                <input type="text" name="nomeIngresso[]" id="nomeIngresso" value="' . $ingresso->nome_ingresso . '" class="form-control" hidden>
                </div></br>';
}

?>
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <h1 class="mt-5 mb-5"><?= TITULOPAGE . $obEvento->titulo ?> </h1>
        <div class="modal-body p-4 bg-light ps-5 pe-5">
            <div class="row">
                <h3>Dados do evento:</h3>
                <div class="col-lg-auto">
                    <label for="titulo">Nome do evento</label>
                    <input type="text" name="titulo" id="titulo" value="<?= $obEvento->titulo ?>" class="form-control" required>
                </div>
                <div class="col-lg-auto">
                    <label for="data">Data do evento</label>
                    <input type="text" name="data" id="data" value="<?= $obEvento->data ?>" class="form-control" required>
                </div>
                <div class="my-2">
                    <label for="local">Local</label>
                    <input type="text" name="local" id="local" value="<?= $obEvento->local ?> " class="form-control" required>
                </div>
                <div class="my-2">
                    <label for="descricao">Descrição do evento</label>
                    <textarea name="descricao" class="form-control" id="descricao" cols="30" rows="2" required><?= $obEvento->descricao ?></textarea>
                </div>
                <h3>Ingressos:</h3>
                <div class="my-2">
                    <?= $dados ?>
                </div>
                <h3>Imagem:</h3>
                <div class="my-2">
                    <label for="arquivo">Imagem do evento</label>
                    <input type="file" accept="image/*" name="arquivo" class="form-control" id="arquivo">
                </div>
            </div>
            <div class="modal-footer">
                <a href="index.php">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100%;">Cancelar</button>
                </a>
                <button type="submit" class="btn btn-primary" id="add_evento_btn">Gerar evento</button>
            </div>
        </div>
    </form>