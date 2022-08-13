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
            input{
              padding: 0px;
              border: none;
              font: 16px Arial;
              width: 100%;
              text-align: center;

            }
            .budgetItemTotal{
                width:82%;
            }
            .observationItem{
                width: 97%;
            }
            table{
                border: 3px solid;
                border-collapse: collapse;
            }
            tr, td{
                border: 1px solid;
            }
            th {
                border: 2px solid;
            }

            textarea{
                width: 99%;
                min-height: 30px;
            }

            #row{
                display: flex;
                flex-direction: row !important;
            }

            #colum{
                display: flex;
                flex-direction: column !important;
            }
            
        </style>
        </head>
    <body class="antialiased" onLoad="initialValue()">
        <button onClick="adicionarItem()">Adicionar Item</button>
        <button onClick="adicionarObservacao()">Adicionar Observação</button>
        <button onClick="gerarPDF()">Gerar orçamento em PDF</button>


        
        <!-- Start Budget -->
        <div id="budget">
        <table>
            <thead>
            <tr>
                <td colspan="4" style="text-align:center;">AV Ascaz Natal, 161</td>
                <td  style="text-align:center;">Pedido</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;"><strong>CNPJ: </strong>26.772.543/0001-06</td>
                <td  style="text-align:center;">2005</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;"><strong>Tel e WhatsApp: </strong>(11) 93078-1538</td>
                <td></td>
            </tr>
            <tr>
                <th>Consultor</th>
                <td colspan="4"><input type="text" value="Lucas Mendes"  style="text-align:center;"></td>
                
            </tr>
            <tr>
                <th>Cliente</th>
                <td colspan="2"><input type="text" style="text-align:center;"></td>
                <th>Data</th>
                <td><input type="date" style="text-align:center;"></td>
            </tr>
            <tr>
                <th>Logradouro</th>
                <td colspan="2"><input type="text" style="text-align:center;"></td>
                <th>Número</th>
                <td><input type="text" style="text-align:center;"></td>
            </tr>
            <tr>
                <th>Bairro</th>
                <td colspan="2"><input type="text" style="text-align:center;"></td>
                <th>Cidade</th>
                <td><input type="text" value="São Paulo"  style="text-align:center;"></td>
            </tr>
            <tr>
                <th>Complemento</th>
                <td colspan="4"><input type="text"  style="text-align:center;"></td>
                
            </tr>
            <tr><td colspan="5"><hr><td></tr>
           <tr>
                <th style="width:160px;">Quantidade</th>
                <th style="width:80px;">Unidade</th>
                <th style="width:500px;">Descrição</th>
                <th style="width:140px;">Valor Unitário</th>
                <th style="width:130px;">Total</th>
            </tr>
            </thead>
            <tbody id="budgetBody">
                <tr id='budgetItem_0'>
                    <td><input id="budgetItemQuantity_0" Type="number"  min="0" oninput="calcularTotalItem(0)"></td>
                    <td><input Type="text" value="m²"></td>
                    <td><input Type="text" value="Restauração de piso de madeira"></td>
                    <td><input id="budgetItemUnityValue_0" type='currency'  min="0" oninput="calcularTotalItem(0)"></td>
                    <td><input id="budgetItemTotal_0" class="budgetItemTotal" type='currency' readonly value="0.00" min="0" ><button class="removeBudgetItemButton" onClick='removeBudgetItem(0)'>X</button></td>
                </tr>
            </tbody>
            <tfoot id="budgetFooter">
                <tr><td colspan="5"><hr><td></tr>
                <tr>
                    <td colspan="5" style="text-align:center;"><span>Observações</span></td>
                </tr>
                <tr id="observationItem_0">
                    <td colspan="5" ><input class="observationItem" style="text-align:center;" type="text"><button class="removeObservationButton" onClick='removeObservationItem(0)'>X</button></td>
                </tr>

                <tr>
                    <td colspan="4" style="text-align:center;"><span> Excelência é a nossa base!</span></td>
                    <td><span>Sub total</span> <br> <input id="budgetSubtotal" type="currency" min="0"></td>
                </tr>
            </tfoot>
        </table>
        </div>
        <!-- End Budget -->
        
        
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
                const firstBudgetItem = document.getElementById("budgetBody").children[0];
                // Start Budget Item Model
                let html = 
                `<tr id='budgetItem_${itemId}'>\

                 <td><input id='budgetItemQuantity_${itemId}' value='1' Type='number' min='0' oninput='calcularTotalItem(${itemId})'></td>\

                 <td><input value='m²' Type='text'></td>\

                 <td><input value='Restauração de piso de madeira' Type='text'></td>\<td><input id='budgetItemUnityValue_${itemId}' type='currency' value='1.00' min='0' oninput='calcularTotalItem(${itemId})'></td>\

                 <td><input id='budgetItemTotal_${itemId}' class='budgetItemTotal' min='0' readonly><button id='budgetItemRemove_${itemId}' class="removeBudgetItemButton" onClick='removeBudgetItem(${itemId})'>X</button></td></tr>`;
                // End Budget Item Model
                
                firstBudgetItem.insertAdjacentHTML("afterend", html);

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
                const observations = document.getElementById("budgetFooter").children[1];

                // Start observation  Model
                let html = `<tr id='observationItem_${observationId}'><td colspan="5"><input class='observationItem' style="text-align:center;" type="text"><button class="removeObservationButton" onClick="removeObservationItem('${observationId}')">X</button></td></tr>`
                // End Budget Item Model
                
                observations.insertAdjacentHTML("afterend", html);

                
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
