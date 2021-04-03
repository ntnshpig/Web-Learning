function Calculator() {
    this.result = 0;
    this.init = (num) => {this.result = num; return this;};
    this.add = (num) => {this.result += num; return this;};
    this.sub = (num) => {this.result -= num; return this;};
    this.mul = (num) =>  {this.result *= num; return this;};
    this.div = (num) => {this.result /= num; return this;};
    this.alert =  () => { setTimeout(() => alert(this.result), 5000); return this;};
};

// const calc = new Calculator();
// console.log(
//     calc
//     .init(2) // 2
//     .add(2)  // 4
//     .mul(3)  // 12
//     .div(4)  // 3
//     .sub(2).result  // 1
// );
// calc.alert()    // 1