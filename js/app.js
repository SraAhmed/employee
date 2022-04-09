//Variable
const form = document.querySelector(".form");
const incomingList = document.querySelector(".incoming");
const display = document.querySelector(".display");
var allform = [];

//Event listener
// form.addEventListener("submit", newitem);

//Function
//لاضافة قيم الفورم للمصفوفة على شكل اوبجيكت
function AddToArray(array, elem) {
  array.push(elem);
  return array;
}
//لاخذ قيم الفورم واضافتها الى المصفوفة
//طباعة المصفوفة بالكونسل
function getvalue() {
  Elements = {
    fullName: document.querySelector("#full-name").value,
    englishName: document.querySelector("#english-name").value,
    numIdentity: document.querySelector("#num-identity").vlaue,
    numOperator: document.querySelector("#num-operator").value,
    rank: document.querySelector("#rank").value,
    administration: document.querySelector("#administration").value,
    numPhone: document.querySelector("#num-phone").value,
  };
  AddToArray(allform, Elements);
  //طباعة الاسم الكامل
  console.log("fullname [0] : " + allform[0].fullName);
  console.log(allform);
}
function newitem(event) {
  event.preventDefault();
  // const item=document.createElement('div');
  // item.classList.add("item");
  // item.innerHTML=document.querySelector('#full-name').value;
  // incomingList.appendChild(item);
  getvalue();
  RestInputValue();
  alert("done");
}
function RestInputValue() {
  const fullName = document.querySelector("#full-name");
  fullName.value = "";
  const englishName = document.querySelector("#english-name");
  englishName.value = "";
  const numIdentity = document.querySelector("#num-identity");
  numIdentity.value = "";
  const numOperator = document.querySelector("#num-operator");
  numOperator.value = "";
  const rank = document.querySelector("#rank");
  rank.value = "";
  const administration = document.querySelector("#administration");
  administration.value = "";
  const numPhone = document.querySelector("#num-phone");
  numPhone.value = "";
}
