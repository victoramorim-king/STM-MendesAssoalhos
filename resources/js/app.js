import './bootstrap';

// Start pdf functions

function gerarPDF() {
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
function adicionarItem() {
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


function removeBudgetItem(id) {
  const budgetBody = document.getElementById("budgetBody");
  document.getElementById(`budgetItem_${id}`).remove()
  if (budgetBody.childElementCount == 1) {
    document.getElementsByClassName("removeBudgetItemButton")[0].disabled = true
  }
  calcularSubTotal()

}

function initialValue() {
  const firstItemQuantity = document.getElementById("budgetItemQuantity_0");
  const firstItemUnitaryValue = document.getElementById("budgetItemUnityValue_0");
  const firstItemTotal = document.getElementById("budgetItemTotal_0");

  firstItemQuantity.value = 95
  firstItemUnitaryValue.value = 30
  firstItemTotal.value = firstItemQuantity.value * firstItemUnitaryValue.value
  document.getElementById('budgetSubtotal').value = firstItemTotal.value

}


function calcularSubTotal() {
  const id = document.getElementById('budgetSubtotal')
  var inputs = document.getElementsByClassName("budgetItemTotal");
  var soma = 0;

  for (var i = 0; i < inputs.length; i++) {
    soma += parseFloat(inputs[i].value);
  }

  id.value = soma;

}

// End budget body functions

// Start observation functions
document.getElementsByClassName("removeObservationButton")[0].disabled = true
var observationId = 1
function adicionarObservacao() {
  document.getElementsByClassName("removeObservationButton")[0].disabled = false
  const observations = document.getElementById("budgetFooter").lastElementChild;

  // Start observation  Model
  let html = `<tr id='observationItem_${observationId}'><td colspan="5"><input class='observationItem' style="text-align:center;" type="text"><button class="removeObservationButton" onClick="removeObservationItem('${observationId}')">X</button></td></tr>`
  // End Budget Item Model

  observations.insertAdjacentHTML('afterend', html);


  document.getElementById(`observationItem_${observationId}`).value = ""
  observationId++;


}

function removeObservationItem(id) {
  document.getElementById(`observationItem_${id}`).remove();

  const budgetFooter = document.getElementById('budgetFooter');
  if (budgetFooter.childElementCount == 4) {
    document.getElementsByClassName("removeObservationButton")[0].disabled = true
  }
}

// End observation functions

//Define the initial amount of itens the budget have and initial values
initialItemsQuatity = 0

for (let i = 0; i < initialItemsQuantity; i++) {
  adicionarItem()
}




function calcularTotalItem(id) {
  const budgetItemTotal = document.getElementById(`budgetItemTotal_${id}`)
  const budgetItemUnityValue = parseFloat(document.getElementById(`budgetItemUnityValue_${id}`).value)
  const budgetItemQuantity = parseFloat(document.getElementById(`budgetItemQuantity_${id}`).value)
  const result = budgetItemUnityValue * budgetItemQuantity;

  budgetItemTotal.value = result

  calcularSubTotal()
}

