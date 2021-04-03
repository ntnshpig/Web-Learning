function deleteExtraSpaces(str) {
    return str.replace(/\s+/g, ' ').trim();;
}

function removeDublicate(obj) {
    obj.words = deleteExtraSpaces(obj.words);
    let arrWithoutDuplicate = [];
    let oldArr = obj.words.split(" ");
    arrWithoutDuplicate.push(oldArr[0]);
    for(let i = 1; i < oldArr.length; i++) {
        let flag = true;
        for(let a = 0; a < arrWithoutDuplicate.length; a++){
            if(arrWithoutDuplicate[a] === oldArr[i]){
                flag = false;
            }
        }
        if (flag == true) {
            arrWithoutDuplicate.push(oldArr[i]);
        }
    }
    obj.words = "";
    for(let i = 0; i < arrWithoutDuplicate.length; i++) {
        obj.words = obj.words.concat(arrWithoutDuplicate[i], " ");
    }
    obj.words = obj.words.trim();
}

function addWords(obj, wrds) {
    let res = obj.words;
    wrds = deleteExtraSpaces(wrds);
    let oldArr = obj.words.split(" ");
    for(let i of wrds.split(' ')) {
        let index = oldArr.indexOf(i);
        if(index == -1) {
            res += i + " ";
        }
    }
    obj.words = deleteExtraSpaces(res);
    removeDublicate(obj);
}

function removeWords(obj, wrds) {
    wrds = deleteExtraSpaces(wrds);
    let delArr = wrds.split(" ");
    for(let i = 0; i < delArr.length; i++) {
        obj.words = obj.words.replace(delArr[i], '');
    }
    obj.words = deleteExtraSpaces(obj.words);
    removeDublicate(obj);
}

function changeWords(obj, oldWrds, newWdrs) {
    oldWrds = deleteExtraSpaces(oldWrds);
    newWdrs = deleteExtraSpaces(newWdrs);
    let oldArr = oldWrds.split(' ');
    for(let i = 0; i < oldArr.length; i++){
        obj.words = obj.words.replace(oldArr[i], newWdrs);
    }
    obj.words = deleteExtraSpaces(obj.words);
    removeDublicate(obj);
}
