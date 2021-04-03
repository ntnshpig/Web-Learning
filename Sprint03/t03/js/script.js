class Human {
    constructor(firstName, lastName, gender, age, calories) {
        this.firsName = firstName;
        this.lastName = lastName;
        this.gender = gender;
        this.age = age;
        this.calories = calories;
        this._isAciton = false;
        setInterval(() => this.hungry(), 60000);
        setTimeout(() => {
            if(!this._isAciton && this.calories < 500){
                document.querySelector('.some_info').innerHTML = "I'm hungry";
            }
        }, 5000);
    }
    sleepFor(seconds) {
        if(!this._isAciton) {
            this._isAciton = true;
            document.querySelector('.some_info').innerHTML = "I'm sleeping";
            console.log("I'm sleeping");
            setTimeout (() => {
                document.querySelector('.some_info').innerHTML = "I'm awake now";
                console.log("I'm awake now")
                this._isAciton = false;
            }, seconds*1000);
        }
    }
    feed() {
        if(!this._isAciton) {
            this._isAciton = true;
            if(this.calories < 500) {
                document.querySelector('.some_info').innerHTML = "Nom nom nom";
                console.log("Nom nom nom");
                setTimeout(() => {
                    this.calories += 200;
                    if(this.calories < 500){
                        document.querySelector('.some_info').innerHTML = "I'm still hungry";
                        console.log("I'm still hungry");
                    } else {
                        document.querySelector('.some_info').innerHTML = "Waiting...";
                    }
                    document.querySelector('.calories').innerHTML = "calories - " + this.calories;
                    this._isAciton = false;
                }, 10000);
            } else {
                document.querySelector('.some_info').innerHTML = "I'm not hungry";
                console.log("I'm not hungry");
                this._isAciton = false;
            }
        }
    }
    hungry() {
        this.calories -= 200;
        document.querySelector('.calories').innerHTML = "calories - " + this.calories;
    }
}

class Superhero extends Human {
    constructor(firsName, lastName, gender, age, calories) {
        super(firsName, lastName, gender, age, calories);
        document.querySelector(".image_human").classList.add("not_dsp");
        document.querySelector(".image_superhero").classList.remove("not_dsp");
        document.querySelector(".fly").classList.remove("not_dsp");
        document.querySelector(".fight").classList.remove("not_dsp");
        document.querySelector(".human_superhero").classList.add("not_dsp");
        document.querySelector(".superhero_name").classList.remove("not_dsp");
    }
    fly() {
        if(!this._isAciton) {
            this._isAciton = true;
            document.querySelector('.some_info').innerHTML = "I'm flying!";
            console.log("I'm flying!");
            setTimeout (() => {
                this._isAciton = false;
                document.querySelector('.some_info').innerHTML = "Waiting...";
            }, 10000)
        }
    }
    fightWithEvil() {
        if(!this._isAciton) {
            this._isAciton = true;
            document.querySelector('.some_info').innerHTML = "Khhhh-chh... Bang-g-g-g... Evil is defeated";
            console.log("Khhhh-chh... Bang-g-g-g... Evil is defeated");
            setTimeout(() => {
                this._isAciton = false;
                document.querySelector('.some_info').innerHTML = "Waiting...";
            }, 2500)
        }
    }
}

let human = new Human("Baran", "Mem", "male", 20, 200);
let superhero = null;
document.querySelector(".sleep").addEventListener("click", event => {
    if(superhero == null) {
        if(!human._isAciton) 
            human.sleepFor(prompt("Sleep for?", ""));
    } else {
        if(!superhero._isAciton) 
            superhero.sleepFor(prompt("Sleep for?", ""));
    }
})

document.querySelector(".feed").addEventListener("click", event => {
    if(superhero == null) {
        human.feed();
    } else {
        superhero.feed();
    }
})

document.querySelector(".human_superhero").addEventListener("click", event => {
    if(human.calories >= 500 && !this._isAciton) {
        superhero = new Superhero(human.firsName, human.lastName, human.gender, human.age, human.calories);
    }
})

document.querySelector(".fly").addEventListener("click", event => {
    superhero.fly();
})

document.querySelector(".fight").addEventListener("click", event => {
    superhero.fightWithEvil();
})