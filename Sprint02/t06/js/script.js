let names = prompt("Your name", '');
let correct;

function checkName(names) {
    if (names.length == 0) return false;

    let col = 0;
    for(let i = 0; i < names.length; i++) {
        if(names[i] == " ") {
            col++;
            continue;
        }
        if(isNaN(names[i]) != true) {
            return false;
        }
    }
    if(col != 1) {
        return false;
    }
    return true;
}

correct = checkName(names);

if(correct == true) {
    names = names.replace(names[0], names[0].toUpperCase());
    let index = names.indexOf(' ')+1;
    names = names.slice(0, index) + names[index].toUpperCase() + names.slice(index+1)
    alert(names);
} else {
    alert("Wrong input");
}

