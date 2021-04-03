function* genNum() {
    let sum = 1;
    while (true) {
        if (sum > 10000) sum = 1;
        let num = prompt(`Previous result: ${sum}. Enter a new number`, 0);
        num = Number(num);
        if(isNaN(num) == true) {
            console.error("Invalid number");
            return false;
        }
        yield sum += num;
    }
};

let gen = genNum();

while(gen.next().done == false) {
    gen.next();
}
