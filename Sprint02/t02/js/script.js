function getName() {
    let animal_name = prompt("What animal is the superhero most similar to?\nUsage: maximum 20 letters, one word, no digits", '');
    if (/[A-Z]{1,20}$/ig.test(animal_name) != true || animal_name.indexOf(' ') != -1) {
        alert("Invalid animal input");
        return null;
    }
    return animal_name;
}
function getGender(){
    let hero_gender = prompt("Is the superhero male or female? Leave blank if unknown or other.\nUsage: male/female or blank if unknown", '');
    if (/^male$/ig.test(hero_gender) == false && /female$/ig.test(hero_gender) == false && /^$/g.test(hero_gender) == false) {
        alert("Invalid gender input");
        return null;
    }
    return hero_gender;
}
function getAge() {
    let age = prompt("How old is the superhero?\nUsage: length <= 5, only digits, cannot start with 0", '');
    if(!/^[1-9][0-9]{0,4}$/g.test(age)) {
        alert("Invalid age input");
        return null;
    }
    return age;
}
function createName(animal_name, gender, age) {
    if(!animal_name || !age){
        return null;
    }
    let description;
    
    if (gender === `male` && +age < 18) {
        description = "boy";
    }
    if (gender === `male` && +age >= 18) {
        description = "man";
    }
    if (gender === `female` && +age < 18) {
        description = "girl";
    }
    if (gender === `female` && +age >= 18) {
        description = "woman";
    }
    if (gender.length == 0 && +age < 18) {
        description = "kid";
    }
    if (gender.length == 0 && +age >= 18) {
        description = "hero";
    }
    return `The supurhero name is: ${animal_name}-${description}!`;
}

let animal_name = getName();
let gender = getGender();
let age = getAge();
let new_name = createName(animal_name, gender, age);
alert(new_name);