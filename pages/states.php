<?php
require_once 'header.php';
?>
<div class="container" style="background:#f5f5f5; padding: 10px">
    <form id="form"> <!-- Esse id como form faz referencia trabalhando com o Jquery -->
    <div class="row">     
        <div class="col-md-2">
            <input type="text" readonly class="form-control" id="name" name="name" placeholder="Sigla"> 
        </div>                                                        <!-- O name = "name" vai fazer refencia com o form data do js -->
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary" style="margin: 3px">Salvar</button>
            <!-- Quando o botão for pressionado ele irá fazer uma submissão do formulário, dispara as informações 
            do formulário sendo enviado via JavaScript que vai tentar chamar um arquivo no qual tentará inserir sem
            recarregar a página, ele vai atualizar os dados na tabela, que irá está dentro do id list
            iremos utilizar o AJAX, mais info de como funciona comentário no bloco AJAX -->
        </div>

        <div class="col-md-7">
            <div id="message"></div> <!-- No AJAX vai fazer referencia a esse id -->
        </div>
        </form>
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
<!-- Utilizar o AJAX significa não dar refresh na página -->
<!-- O que eu devo fazer quando usar um AJAX -->
<!-- Apontar para o arquivo de execução  url: "states/save.php",  -->
<!-- Ter o cuidado se o formulário tenha o id que está nessa linha $("#form").submit(function () { nesse caso é o form, escrito no id do html -->
<!-- Verificar o que eu irei tratar, tomar uma decisão após a inserção -->
<!--  success: function (message) { //Depois que ele fez a execução ele vai retornar uma mensagem
            $('#message').text(''); //Podemos criar caso tem algum erro ele vai dar uma mensagem, resumindo pega a área mensagem no html
            $('#message').removeClass() //Caso tenha alguma class, ele irá remover no caso se eu quiser colocar uma class de erro eu posso adicionar via script uma class text-danger, que vai mostrar o texto em vermelho
            
            if (message.trim() == "Salvo com Sucesso") { //A mensagem irá retornar caso foi com sucesso, a mensagem "Salvo com Sucesso então ele inseriu
                $('#message').addClass('text-sucess')//Irá exibir na caixa de mensagem, o texto em verde dizendo que houve sucesso
                $('#message').text(message) //O "Salvo com Sucesso" é exibido aqui
                //$('#btn-fechar').click(); funcionaria um botão caso existisse e chamaria ele via script
                //list();          

            } else {
                $('#message').addClass('text-danger')
                $('#message').text(message)
            }
                //No else caso tenham algum erro ele vai exibir aqui, com a cor ver vermelha e exibindo a mensagem na caixa do id da mensagem

        }, -->
<!-- Chamada do Formulário -->
<script>

    $("#form").submit(function () {
    //Jquery
    //Quando temos o $ estamos chamando o jquery no qual, queremos dar referencia ou chamar um objeto ou seja um elemento que tem um id, nesse caso o form    
    //Dica Sempre que precisar referencia um elemento, utilizar essa estrutura
    //A requisição com o jquery é a msm com o JavaScript puro. Jquery, facilita a escrita ou seja o código fica menor e outro detalher importante é que ele esconde as diferenças entre os navegadores antigos


    //Referencia ao elemento via javaScript 
    //Seria com o document.getElementById("form"), nesse caso o form seria o nome dado ao id lá no html alem do id, poderia ser um dv, no caso urtilizaria o #
    //utilizar o Jquery é mais simples para fazer isso, porém vai de Dev para Dev


    event.preventDefault(); // Essa linha não deixa a página atualizado, no caso o responsavel é o preventDefault, nesse caso desse evento ele vai barrar isso
    var formData = new FormData(this);// o form data recupera os dados do formulário, para passar para o AJAX, recuperado o que colocamos lá encima para recuperar no caso o name

    //AJAX
    //Esse código AJAX pego os dados do formulário formDara id - form e name - name e passa para essee caminho url: 'paginas/' + pag + "/salvar.php",
    //Nessa parte precisamos passar o caminho aonde está o arquivo que será executado, nesse caso fazer a inserção, vai está dentro da pasta states e com o arquivo save.php
    $.ajax({
        url: "states/save.php", 
        type: 'POST',
        data: formData,

        //A mensagem que ele irá retornar caso fez a execução, venha escrito "Salvo com Sucesso" significa que ele inseriu e quero que a mesagem fique verde $('#mensagem').addClass('text-sucess')  e $('#message').text(message) exiba a mensagem na caixa de mensage no caso "Salvo com Sucesso", podendo ser ela ou outra qualquer
        //Explicando esse código if (message.trim() == "Salvo com Sucesso"), o .trim é apenas para tirar espaço,
        success: function (message) { //Depois que ele fez a execução ele vai retornar uma mensagem
            $('#message').text(''); //Podemos criar caso tem algum erro ele vai dar uma mensagem, resumindo pega a área mensagem no html
            $('#message').removeClass() //Caso tenha alguma class, ele irá remover no caso se eu quiser colocar uma class de erro eu posso adicionar via script uma class text-danger, que vai mostrar o texto em vermelho
            
            if (message.trim() == "Salvo com Sucesso") { //A mensagem irá retornar caso foi com sucesso, a mensagem "Salvo com Sucesso então ele inseriu
                $('#message').addClass('text-sucess')//Irá exibir na caixa de mensagem, o texto em verde dizendo que houve sucesso
                $('#message').text(message) //O "Salvo com Sucesso" é exibido aqui
                //$('#btn-fechar').click(); funcionaria um botão caso existisse e chamaria ele via script
                //list();          

            } else {
                $('#message').addClass('text-danger')
                $('#message').text(message)
            }
                //No else caso tenham algum erro ele vai exibir aqui, com a cor ver vermelha e exibindo a mensagem na caixa do id da mensagem

        },

        //Importante para processar os dados do formulário, caso tenha imagem ou texto eles enviam juntos
        cache: false,
        contentType: false,
        processData: false,

    });

});

</script>

<!-- PHP e JavaScript -->
<!-- Iremos utilizar o método POST -->
<!-- o id name vai para o JavaScript, no id daremos a referencia do campo input no JavaScript -->
<!-- o name name vai para o PHP, no caso como daremos referencia ao campo input no PHP -->