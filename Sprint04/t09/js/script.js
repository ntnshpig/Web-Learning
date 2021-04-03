const clear = document.querySelector('.clear_strg');
const add = document.querySelector('.add_strg');
let output = document.querySelector('.output');
let elem = localStorage.length;

const day = () => {
  const date = new Date();
  let todate = date.getDate()<10?("0" + date.getDate()):date.getDate();
  let tomonth = date.getMonth()<10?("0" + date.getMonth()):date.getMonth();
  let tohours = date.getHours()<10?("0" + date.getHours()):date.getHours();
  let tominutes = date.getMinutes()<10?("0" + date.getMinutes()):date.getMinutes();
  let tosecond = date.getSeconds()<10?("0" + date.getSeconds()):date.getSeconds();
  let res_date = ` [${todate}.${tomonth}.${date.getFullYear()}, ${tohours}:${tominutes}:${tosecond}]`;
  return res_date;
}

const clear_storage = () => {
  let ask = confirm('Clear history?')
  if (ask === true) {
    localStorage.clear();
    output.innerHTML = 'Empty history';
  }
}

const add_to_storage = () => {
  let text_value = document.querySelector('.text_input').value;
  if (text_value === "") {
    alert("It's empty. Try again");
  }else {
    localStorage.setItem( elem.toString(), text_value+day() );
    if (output.innerHTML === 'Empty history') output.innerHTML = '';
    output.insertAdjacentHTML('beforeend', `<div>--> ${localStorage.getItem(elem.toString())}</div>`);
    elem++;
  }
}

if (localStorage.length === 0) {
    output.innerHTML = 'Empty history';
} else {
    for (let i = 0; i < localStorage.length; i++) {
        let key = localStorage.getItem(i);
        output.innerHTML += `<div>--> ${key}</div>`;
    }
}
