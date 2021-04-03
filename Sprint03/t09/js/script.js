const validator = {
    get: (obj, prop) => {
        console.log(`Trying to access the property '${prop}'...`);
         if (obj.hasOwnProperty(prop)) {
            return obj[prop];
        }
        return false;
    },

    set: (obj, prop, value) => {
        if (prop === 'age') {
            if (typeof value !== 'number') {
                throw new TypeError("The age is not an integer");
            } else if (value < 0 || value > 200) {
                throw new RangeError("The age is invalid");
            }
            console.log(`Setting value '${value}' to '${prop}'`);
            obj[prop] = value;
        } else if(prop === 'gender'){
            console.log(`Setting value '${value}' to '${prop}'`);
            obj[prop] = value;
        }
        return true;
    }
}

/*let person = new Proxy({}, validator);

person.age = 100;// Setting value'100' to 'age'
console.log(person.age);// Trying to access the property'age'...// 100
person.gender = "male";// Setting value'male' to 'gender'

//Choose one of this errors because 'throw' stop the program 
person.age = 'young';// Uncaught TypeError: The age is not an integer
person.age = 300;// Uncaught RangeError: The age is invalid*/