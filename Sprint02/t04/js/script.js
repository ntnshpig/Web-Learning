const begin = +prompt("Input the begin of the range", "1");
const end = +prompt("Input the end of the range", "100");

const checkDivision = (beginRange = 1, endRange = 100) => {
    let even = false;
    let multipleThree = false;
    let multipleTen = false;
    if (endRange < beginRange) {
        alert("Range is not correct");
        return;
    }
    
    for( beginRange; beginRange <= endRange; beginRange++) {
        if (beginRange % 2 == 0) {
            even = true;
        } else {
            even = false;
        }

        if (beginRange % 3 == 0) {
            multipleThree = true;
        } else {
            multipleThree = false;
        }

        if (beginRange % 10 == 0) {
            multipleTen = true;
        } else {
            multipleTen = false;
        }

        if (even == true && multipleThree == true && multipleTen == true) {
            console.log(`${beginRange} is even, a multiple of 3, a multiple of 10`);
        } else if (even == true && multipleThree == true) {
            console.log(`${beginRange} is even, a multiple of 3`);
        } else if (even == true && multipleTen == true) {
            console.log(`${beginRange} is even, a multiple of 10`);
        } else if (multipleThree == true && multipleTen == true) {
            console.log(`${beginRange} a multiple of 3, a multiple of 10`);
        } else if (even == true && multipleThree == false && multipleTen == false) {
            console.log(`${beginRange} is even`);
        } else if (multipleThree == true) {
            console.log(`${beginRange} is a multiple of 3`);
        } else {
            console.log(`${beginRange} -`);
        }
    };
};

checkDivision(begin, end);