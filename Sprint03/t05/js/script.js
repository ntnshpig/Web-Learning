/*  guestList  */
console.log("guestList");
let guestList = new WeakSet();

let john = { name: "John" };
let pete = { name: "Pete" };
let mary = { name: "Mary" };
let ken = { name: "Ken" };
let jim = { name: "Jim" };

guestList.add(john);
guestList.add(pete);
guestList.add(mary);
guestList.add(ken);
guestList.add(ken);

console.log(guestList.has(john));
console.log(guestList.has(ken));

guestList.delete(ken);

console.log(guestList.has(ken));
console.log(guestList.has(jim));

/*  menu  */
console.log("menu")
let menu = new Map();

let dish1 = "Pizza";
let dish2 = "Spagetti";
let dish3 = "Rice";
let dish4 = "Chicken";
let dish5 = "No dish"

menu.set(dish1, 15);
menu.set(dish2, 20);
menu.set(dish3, 5);
menu.set(dish4, 15);

console.log(menu.get(dish1));
menu.delete(dish1);

for (let dish of menu) {
    console.log(dish);
}

console.log(menu.size);

console.log(menu.has(dish2));
console.log(menu.has(dish5));

menu.clear();
console.log(menu.values());

/*  bankVault  */
console.log("bankVault");
let bankVault = new WeakMap();

let deposit1 = { credintials: ["academic diplomas", "academic degrees", "keys"] };
let deposit2 = { credintials: ["academic diplomas", "academic degrees", "keys"] };

bankVault.set(deposit1, "diplom1 1 1");
bankVault.set(deposit2, "diplom2 2 2");

console.log(bankVault.get(deposit2));
console.log(bankVault.get(deposit1));

console.log(bankVault.has(deposit2));
console.log(bankVault.delete(deposit2));
console.log(bankVault.has(deposit2));

/*  coinCollection */
console.log("coinCollection");
let coinCollection = new Set();

coinCollection.add("French coin");
coinCollection.add("Ukraine coin");
coinCollection.add("Russian coin");
coinCollection.add("American coin");
coinCollection.add("Italian coin");

console.log(coinCollection.size);

console.log(coinCollection.has("Ukraine coin"));

console.log(coinCollection.values());
for(let coin of coinCollection) {
    console.log(coin);
}
