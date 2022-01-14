var invocation = new XMLHttpRequest();
var url = 'http://192.168.64.2/';
const text1 = document.querySelector('.text1');
const text2 = document.querySelector('.text2');
const text3 = document.querySelector('.text3');
const text4 = document.querySelector('.text4');


// function callOtherDomain() {
//   if(invocation) {
//     invocation.open('GET', url, true);
//     invocation.onreadystatechange = handler;
//     invocation.send();
//   }
// }

fetch(url)
    .then( async function (res) {
        data = res.json()
        console.log(await data)
         return  data
        } )
    .then
    (
        data =>  {
            text1.textContent += data[1].id
            text2.textContent += data[1].name
            text3.textContent += data[1].pseudo
            text4.textContent += data[1].age
        }
    )