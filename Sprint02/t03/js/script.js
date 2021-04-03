let  numLet = +prompt("Input a number  number from 1 to 10", '0');
if(numLet > 0 && numLet <= 10) {
    showIdiom(numLet);
}

function  showIdiom(numLet) {
    switch(numLet) {
        case 1:
            alert("Back to square 1");
            break;
        case 2:
            alert("Goody 2-shoes");
            break;
        case 3:
            alert("Two's company, three's a crowd");
            break;
        case 4:
            alert("Counting sheep");
            break;
        case 5:
            alert("Take five");
            break;
        case 6:
            alert("Two's company, three's a crowd");
            break;
        case 7:
            alert("Seventh heaven");
            break;
        case 8: 
            alert("Behind the eight-ball");
            break;
        case 9:
            alert("Counting sheep");
            break;
        case 10:
            alert("Cheaper by the dozen");
            break;
        default:
            alert("Invalid input");
            break;
    }
}