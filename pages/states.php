<?php
require_once 'header.php';
?>
<div class="container" style="background:#f5f5f5; padding: 10px">
    <div class="row">
        <form id="form"></form>
        <div class="col-md-2">
            <input type="text" readonly class="form-control" id="name" name="name" placeholder="Sigla">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary" style="margin: 3px">Salvar</button>
            <!-- Quando o botão for pressionado ele irá fazer uma submissão do formulário, dispara as informações 
            do formulário sendo enviado via JavaScript que vai tentar chamar um arquivo no qual tentará inserir sem
            recarregar a página, ele vai atualizar os dados na tabela, que irá está dentro do id list
            iremos utilizar o AJAX, mais info de como funciona comentário no bloco AJAX -->
        </div>
    </div>

    <div id="list">
        <!-- Iremos trabalhar com o list para fazer referencia com o JavaScript -->

        <!-- Tabela -->
        <table class="table" style="margin-top: 20px">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
        </table>
    </div>
</div>

<!-- AJAX -->

<!-- Chamada do Formulário -->
<script></script>

<!-- PHP e JavaScript -->
<!-- Iremos utilizar o método POST -->
<!-- o id name vai para o JavaScript, no id daremos a referencia do campo input no JavaScript -->
<!-- o name name vai para o PHP, no caso como daremos referencia ao campo input no PHP -->