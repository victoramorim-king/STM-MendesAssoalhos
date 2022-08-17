<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <title>Aprendendo PHP</title>
    <style>
        body{
            background-color: #e5e8ef;
        }

        * {
            font-family: helvetica;
        }
        input{
          padding: 0px;
          border: none;
          font: 16px Arial;
          width: 100%;
          text-align: center;
          background-color: transparent;

      }

      .budgetItemTotal{
        width:82%;
    }


    table{

        border-collapse: collapse;
    }

    tr, td{
        padding: 0px;
    }

    th {

    }


    .row{
        display: flex;
        flex-direction: row !important;
    }

    .colum{
        display: flex;
        flex-direction: column !important;
    }

    /* -Start budget container */
    .budgetContainer{
        border: 1px solid #404040;
        border-radius: 5px;
        color: white;
        font-family: helvetica;
    }
    /* --End budget container */

    /* -Start budget header */
    #headerLogo{
        max-width: 130px;
        align-self: center;
        transform: translateX(-15px);


    }

    .budgetHeaderTitle{
        align-content: center; 
        text-align: center;
        align-items: center;
        font-family: helvetica;
        width: 100%;
    }

    .budgetHeaderTitle h1{
        margin: 5px 0px -15px;
        padding: 0px;
        font-size: 18px;
        font-weight: normal;
        color: #c0c1c1;
        width: 25%;
    }

    .budgetHeaderTitle input{
        margin: 5px 0px -15px;
        padding: 0px;
        font-size: 18px;
        font-weight: normal;
        color: #c0c1c1;
        width: 25%;
    }

    .budgetHeader{
        border-bottom: 1px solid #2f2f2f;
        background-image: linear-gradient(#373737, #414141);
        padding: 5px 0px 0px 15px;
    }

    .budgetHeaderMenu{
        width: 250px;
    }

    .budgetHeaderForm{
        width: 270px;
        padding: 15px 0px 10px 0px;


    }

    .budgetHeaderOrderNumber{
        width: 100px;
        padding: 20px 0px;

    }

    .budgetHeaderFormInputs{
        width: 250px;
        background-image: linear-gradient(#616161, #696969);
        border-top: 1px solid #6f6f6f;
        border-left: 1px solid #5c5c5c;
        border-right: 1px solid #484848;
        border-radius: 5px;
        color: white;
        font-family: helvetica;
        font-weight: bold;
        margin: 3px 0px 0px 0px ;
        padding: 5px 2px 5px 2px;
    }

    .budgetHeaderForm label{
        color: #c0c1c1;
        margin-top: 5px;
    }
    /* --End budget header */

    /* -Start budget body */
    .budgetBody{
        border-top: 1px solid #141414;

    }

    .budgetBodyMenu{
        width: 250px;
        border-right: 1px solid #1b1b19;
        background-image: linear-gradient(#393835, #41403c);
        padding: 20px 0px 0px 15px;
    }

    .budgetBodyMenuLabel{
        color: #bdbcb8;
        font-family: helvetica;
        margin-bottom: 0px;
    }

    #budgetBodyItemLabel{
        background-color: #2d2d2d;


    }

    #budgetBodyItemLabel tr{
        background-color: blue;

    }

    .budgetBodyMenuButton{
        background-color: transparent;
        border: none;
        font-family: helvetica;
        font-weight: bold;
        font-size: 16px;
        text-align: left;
        color: #f8f7f6;
        margin: 5px 0px 5px 3px;
        cursor: pointer;
    }

    .budgetBodyItemsTest tr:nth-child(odd){
        width: 100%;
        background-color: blue;
        background-image: linear-gradient(#2a2a2a, #292929);

    }

    .budgetBodyItemsTest tr:nth-child(even){
        width: 100%;
        background-image: linear-gradient(#212121, #212121);

    }

    .removeBudgetItemButton{
        position: relative;
        height: 30px;
        background-color: #00000022;
        backdrop-filter: blur(5px);
        border: none;

    }

    .removeBudgetItemButton:hover{
        position: relative;
        height: 30px;
        background-color: black;
        backdrop-filter: blur(5px);

    }



    .budgetBodyItemsTest *{
        color: #d5d5d5;

    }
    /* End budget body */

    /* -Start budget footer */
    #budgetFooter{
        border-top: 1px solid #252525;
        background-image: linear-gradient(#333333, #413f41);
        text-align: center;
    }    

    .budgetFooter{
        text-align: center;
        background-color: black;

        justify-content: center;
        vertical-align: middle;
        background-image: linear-gradient(#333333, #413f41);
    }  

    #budgetFooter tr:nth-child(odd){
        width: 95%;
        background-color: blue;
        background-image: linear-gradient(#2a2a2a, #292929);

    }

    #budgetFooter input{
        width: 95%;
        color: white;
    }
    #budgetFooter button{
        position: relative;
        height: 30px;
        background-color: #00000022;
        backdrop-filter: blur(5px);
        border: none;


    }
    /* --End budget footer */

</style>
</head>
<body class="antialiased" onLoad="initialValue()">
    <div class="row ">
        <!-- Start Budget -->
        <div id="budget">
        
        </div>
        <!-- End Budget -->
        <form method="post" action="create-budget">
            @csrf

            <div class="colum budgetContainer">
                <div class="row budgetHeader">
                    <div class="colum ">
                        <div class="row ">
                            <div class="colum budgetHeaderTitle">
                               <h1>Pedido<input type="number" name="pedido" style="background-color: transparent; border: none;" value="2004" readonly></h1>
                           </div>
                       </div>
                       <div class="row">
                        <div class="colum budgetHeaderMenu">
                            <img id="headerLogo" src="https://res.cloudinary.com/dqxsegouk/image/upload/v1660414713/Mendes%20Assoalhos/mendesAssolahos-logo2_z1qumc.png">

                        </div>

                        <div class="colum budgetHeaderForm">
                            <label for="consultor">Consultor</label>
                            <input name="consultor" class="budgetHeaderFormInputs" type="text" value="Lucas Mendes">

                            <label for="logradouro">Logradouro</label>
                            <input name="logradouro" class="budgetHeaderFormInputs" type="text">
                        </div>

                        <div class="colum budgetHeaderForm">
                            <label for="cliente">Cliente</label>
                            <input name="cliente" class="budgetHeaderFormInputs" type="text">

                            <label for="numero">Número</label>
                            <input name="numero" class="budgetHeaderFormInputs" type="text">
                        </div>

                        <div class="colum budgetHeaderForm">
                            <label for="data">Data</label>
                            <input name="data" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31" class="budgetHeaderFormInputs"type="date">
                           

                            <label for="bairro">Bairro</label>
                            <input name="bairro" class="budgetHeaderFormInputs"type="text">
                        </div>

                        <div class="colum budgetHeaderForm">
                            <label for="cidade">Cidade</label>
                            <input name="cidade" class="budgetHeaderFormInputs"type="text" value="São Paulo">

                            <label for="complemento">Complemento</label>
                            <input name="complemento" class="budgetHeaderFormInputs" type="text">
                        </div>


                    </div>
                </div>
            </div>
            <div class="row budgetBody">
                <div class="colum budgetBodyMenu">
                    <label class="budgetBodyMenuLabel">Opções</label>
                    <button class="budgetBodyMenuButton" type="button" onClick="adicionarItem()">Adicionar Item</button>
                    <button class="budgetBodyMenuButton" type="button" onClick="adicionarObservacao()">Adicionar Observação</button>
                    <button class="budgetBodyMenuButton" onClick="gerarPDF()">Gerar PDF</button>
                    <button type="submit" class="budgetBodyMenuButton">Enviar</button>
                </div>
                <div class="colum budgetBodyItems">
                    <table>
                        <thead>
                         <tr id="budgetBodyItemLabel">
                            <th style="width:160px">Quantidade</th>
                            <th style="width:80px;">Unidade</th>
                            <th style="width:500px;">Descrição</th>
                            <th style="width:140px;">Valor Unitário</th>
                            <th style="width:140; height: 30px;">Total</div></th>
                        </tr>
                    </thead>
                    <tbody id="budgetBody" class="budgetBodyItemsTest" name='budgetBody'>
                        <tr id='budgetItem_0'>
                            <td><input id="budgetItemQuantity_0" name="budgetItemQuantity_0" Type="number"  min="0" oninput="calcularTotalItem(0)"></td>
                            <td><input name="budgetItemUnity_0" Type="text" value="m²"></td>
                            <td><input name="budgetItemDescription_0" Type="text" value="Restauração de piso de madeira"></td>
                            <td><input name="budgetItemUnityValue_0" id="budgetItemUnityValue_0" type='currency'  min="0" oninput="calcularTotalItem(0)"></td>
                            <td><input name="budgetItemTotal_0" id="budgetItemTotal_0" class="budgetItemTotal" type='currency' readonly value="0.00" min="0" ><button class="removeBudgetItemButton" onClick='removeBudgetItem(0)'>X</button></td>
                        </tr>
                    </tbody>
                    <tfoot id="budgetFooter">
                        <tr>
                            <td colspan="5" style="text-align:center; height: 30px;"><span>Observações</span></td>
                        </tr>
                        <tr id="observationItem_0">
                            <td colspan="5" ><input class="observationItem" style="text-align:center;" type="text"><button class="removeObservationButton" onClick='removeObservationItem(0)'>X</button></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td><span>Sub total</span> <br> <input id="budgetSubtotal" type="currency" min="0"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row budgetFooter">
            <div class="colum" style="width:100% vertical-align:middle; font-size: 18px; margin: 10px;">
                Excelência é a nossa base!
            </div>
        </div>

    </div>
</div>

</form>



<script>

            // Start pdf functions

            function gerarPDF(){
                var conteudo = document.getElementById('budget').innerHTML,
                tela_impressao = window.open('about:blank');

                tela_impressao.document.write(conteudo);
                tela_impressao.window.print();
                tela_impressao.window.close(); 
            }

            // End pdf functions

            // Start budget body functions
            document.getElementsByClassName("removeBudgetItemButton")[0].disabled = true
            var itemId = 1
            function adicionarItem(){
                document.getElementsByClassName("removeBudgetItemButton")[0].disabled = false
                const lastBudgetItem = document.getElementById("budgetBody").lastElementChild;
                // Start Budget Item Model
                let html = 
                `<tr id='budgetItem_${itemId}'>\

                <td><input name='budgetItemQuantity_${itemId}' id='budgetItemQuantity_${itemId}' value='1' Type='number' min='0' oninput='calcularTotalItem(${itemId})'></td>\

                <td><input name='budgetItemUnity_${itemId}' value='m²' Type='text'></td>\

                <td><input name="budgetItemDescription_${itemId}" value='Restauração de piso de madeira' Type='text'></td>\<td><input name='budgetItemUnityValue_${itemId}' id='budgetItemUnityValue_${itemId}' type='currency' value='1.00' min='0' oninput='calcularTotalItem(${itemId})'></td>\

                <td><input name='budgetItemTotal_${itemId}' id='budgetItemTotal_${itemId}' class='budgetItemTotal' min='0' readonly><button id='budgetItemRemove_${itemId}' class="removeBudgetItemButton" type='button' onClick='removeBudgetItem(${itemId})'>X</button></td></tr>`;
                // End Budget Item Model
                
                lastBudgetItem.insertAdjacentHTML("afterend", html);

                const initialValue = 0;
                document.getElementById(`budgetItemTotal_${itemId}`).value = 0
                document.getElementById(`budgetItemUnityValue_${itemId}`).value = 0
                itemId++;

                
            }


            function removeBudgetItem(id){
                const budgetBody = document.getElementById("budgetBody");
                document.getElementById(`budgetItem_${id}`).remove()
                if(budgetBody.childElementCount == 1){
                    document.getElementsByClassName("removeBudgetItemButton")[0].disabled = true
                }
                calcularSubTotal()
                
            }

            function initialValue(){
                const firstItemQuantity = document.getElementById("budgetItemQuantity_0");
                const firstItemUnitaryValue = document.getElementById("budgetItemUnityValue_0");
                const firstItemTotal = document.getElementById("budgetItemTotal_0");

                firstItemQuantity.value = 95
                firstItemUnitaryValue.value = 30
                firstItemTotal.value = firstItemQuantity.value*firstItemUnitaryValue.value
                document.getElementById('budgetSubtotal').value = firstItemTotal.value 
                
            }

            
            function calcularSubTotal(){
                const id =  document.getElementById('budgetSubtotal')
                var inputs = document.getElementsByClassName("budgetItemTotal");
                var soma = 0;

                for( var i = 0; i < inputs.length; i++ ){
                    soma += parseFloat( inputs[i].value );
                }

                id.value = soma;
                
            }

            // End budget body functions
            
            // Start observation functions
            document.getElementsByClassName("removeObservationButton")[0].disabled = true
            var observationId = 1
            function adicionarObservacao(){
                document.getElementsByClassName("removeObservationButton")[0].disabled = false
                const observations = document.getElementById("budgetFooter").lastElementChild;

                // Start observation  Model
                let html = `<tr id='observationItem_${observationId}'><td colspan="5"><input class='observationItem' style="text-align:center;" type="text"><button class="removeObservationButton" onClick="removeObservationItem('${observationId}')">X</button></td></tr>`
                // End Budget Item Model
                
                observations.insertAdjacentHTML('afterend', html);

                
                document.getElementById(`observationItem_${observationId}`).value = ""
                observationId++;

                
            }

            function removeObservationItem(id){
                document.getElementById(`observationItem_${id}`).remove();
                
                const budgetFooter = document.getElementById('budgetFooter');
                if(budgetFooter.childElementCount == 4){
                    document.getElementsByClassName("removeObservationButton")[0].disabled = true
                }
            }

            // End observation functions

            //Define the initial amount of itens the budget have and initial values
            initialItemsQuatity = 0

            for (let i = 0; i < initialItemsQuantity; i++) {
              adicionarItem()
          } 




          function calcularTotalItem(id){
            const budgetItemTotal = document.getElementById(`budgetItemTotal_${id}`)
            const budgetItemUnityValue = parseFloat(document.getElementById(`budgetItemUnityValue_${id}`).value)
            const budgetItemQuantity = parseFloat(document.getElementById(`budgetItemQuantity_${id}`).value)
            const result = budgetItemUnityValue * budgetItemQuantity;

            budgetItemTotal.value = result

            calcularSubTotal()
        }

    </script>
</body>
</html>
