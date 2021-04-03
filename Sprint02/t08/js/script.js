const checkBrackets = (str) => {
    if (typeof(str) !== "string") return -1;
    if(!/[)(]/g.test(str)) return -1;

    let leftBracket = 0;
    let rightBracket = 0;
    for(let i = 0; i <= str.length; i++){
        if(str[i] === '(') {
            leftBracket++;
        }
        if(str[i] === ')' && leftBracket>0) {
            leftBracket--;
        } else if(str[i] === ')') {
            rightBracket++;
        }
    }
    return leftBracket+rightBracket;
}
