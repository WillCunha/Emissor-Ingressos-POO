<?php

$dados = '';
foreach ($listaEventos as $eventos) {
    $quantidade = $info->getData($eventos->id);
    $ternaria = ($quantidade > 0) ? $quantidade : "Aguardando vendas!";
    $dados .= "<tr>
                <td>Ativo</td>
                <td>" . $eventos->id . "</td>
                <td>" . $eventos->titulo . "</td>
                <td>" . $eventos->data . "</td>
                <td>" .  $ternaria . "</td>
                <td><a href='edita_evento.php?id=" . $eventos->id . "'>Editar</a> | <a href='gerenciar.php?id=" . $eventos->id . "'>Gerenciar</a></td>
            ";
}

?>
<div class="container">
    <div class="px-2 container">
        <div class="boas-vindas">
            <h2>Seja bem vindo, <?= $nomeUser; ?>!</h2>
            <p class="horario"><?= date('d/m/Y H:i:s'); ?></p>
        </div>
        <div class="px-2">
            <div class="line first">
                <div class="blocos corpo_inicio">
                    <h4>TODOS OS EVENTOS:</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>STATUS</th>
                                <th>CÓDIGO</th>
                                <th>EVENTO</th>
                                <th>DATA</th>
                                <th>INGRESSOS</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $dados ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>