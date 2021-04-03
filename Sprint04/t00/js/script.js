let hero = document.getElementById("hero");
let bg = document.getElementById("lab");

const transformation = () => {
    if(hero.textContent === "Bruce Banner"){
        hero.textContent = "Hulk";
        hero.style.fontSize = "130px";
        hero.style.letterSpacing = "2px"
        bg.style.backgroundColor = "#70964b";
    }  else {
        hero.textContent = "Bruce Banner";
        hero.style.fontSize = "60px";
        hero.style.letterSpacing = "6px"
        bg.style.backgroundColor = "#ffb300";
    }
}