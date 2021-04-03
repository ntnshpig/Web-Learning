let output = document.querySelector(".output");
let text_area = document.querySelector(".text_area");
let word_input = document.querySelector(".word_input");

let phone_count = document.querySelector("span.phone");
let count_count = document.querySelector("span.count");
let replace_count = document.querySelector("span.replace");

let tmp_phone_count = 0;
let tmp_count_count = 0;
let tmp_replace_count = 0;

let check_word = (str) => {
    if(str.split(" ").length != 1 || str === '' || str.length === 0){
        output.value = "Word input is empty or more tneh 1 word. Try again";
        return false;
    } else {
        return true;
    }
}
let check_text = (str) => {
    if(str.length == 0) {
        output.value = "Text iInput is empty. Try again";
        return false;
    } else {
        return true;
    }
}


let phone_num = () => {
    let word = word_input.value.trim();

    if (word.match(/^\d{10}$/g) && check_word(word)) {
        output.value = `${word.slice(0,3)}-${word.slice(3,6)}-${word.slice(6,10)}`;
    } else {
        output.value = 'Invalid phone number.';
    }
    phone_count.innerHTML = ++tmp_phone_count;
    document.cookie = `phone=${tmp_phone_count}`;
}
let word_count = () => {
    let word = word_input.value.trim();
    let text = text_area.value.trim();

    if (check_word(word) && check_text(text)) {
        output.value = 'Word count: ' + (text.match(new RegExp(`${word}`, 'g')) || []).length;
    }
    count_count.innerHTML = ++tmp_count_count;
    document.cookie = `count=${tmp_count_count}`;
}
let word_replace = () => {
    let word = word_input.value.trim();
    let text = text_area.value.trim();

    if (check_word(word) && check_text(text)) {
        output.value = text.replace(/\S+/g, word);
    }
    replace_count.innerHTML = ++tmp_replace_count;
    document.cookie = `replace=${tmp_replace_count}`;
}


let setCookies = () => {
    tmp_phone_count = 0, tmp_count_count = 0, tmp_replace_count = 0;
    document.cookie = `phone=0`, document.cookie = `count=0`, document.cookie = `replace=0`;
    word_input.value = '', text_area.value = '', output.value = '';
    updateCounters();
}
let getCookies = () => {
    return document.cookie.split(';').reduce((res, c) => {
        const [key, val] = c.trim().split('=').map(decodeURIComponent);
        try {
            return Object.assign(res, { [key]: JSON.parse(val) });
        } catch (e) {
            return Object.assign(res, { [key]: val });
        }
    }, {});
}
let updateCounters = () => {
    phone_count.innerText = tmp_phone_count;
    count_count.innerText = tmp_count_count;
    replace_count.innerText = tmp_replace_count;
}


let cookies = getCookies()
if (cookies.phone === undefined)
    setCookies();
else {
    tmp_phone_count = cookies.phone;
    tmp_count_count = cookies.count;
    tmp_replace_count = cookies.replace;
    updateCounters();
}
setInterval(setCookies, 60000);