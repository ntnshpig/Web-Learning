function concat(str1, str2) {
    askForSecondString.count = 0;
    function askForSecondString() {
        askForSecondString.count++;
        str2 = prompt("Input string", '');
        return str1 + " " + str2;
    };
    if(typeof(str1) == "string" && typeof(str2) == "string") {
        return str1 + " " + str2;
    } else if(str2 === undefined) {
        return askForSecondString;
    }
}
