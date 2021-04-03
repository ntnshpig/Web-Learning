var input = document.querySelector('.input_text');
var button= document.querySelector('.submit');
const api = {
    key: "d0af4cf45f9c42cdaf6e2b7887b1da20",
    base: "http://api.weatherbit.io/v2.0/forecast/daily?city="
}

button.addEventListener('click', function(name){
    fetch(api.base + input.value + '&key=' + api.key)
    .then(response => response.json())
    .then(data => {
        let days =  document.getElementsByClassName("day");
        for(let day of days) {
            day.setAttribute("style", "display: block;");
        }
        let date = document.querySelectorAll("p.date");
        let img = document.querySelectorAll("img.image");
        let temp = document.querySelectorAll("p.temperature")

        for(let i = 0; i < 5; i++){
            let dateValue = data["data"][i]["datetime"];
            date[i] = document.querySelector(".date")
            date[i].innerHTML = dateValue;

            let wthrValue = data["data"][i]["weather"]["description"];
            if(/cloud?s+/ig.test(wthrValue)) {
                img[i].src = "assets/images/clouds.png";
            } else if(/rain?s+/ig.test(wthrValue)){
                img[i].src = "assets/images/drop.png";
            } else if(/snow+/ig.test(wthrValue)) {
                img[i].src = "assets/images/snowflake.png";
            } else {
                img[i].src = "assets/images/sunny.png";
            }

            let tempValue = data['data'][i]["temp"];
            temp[i].innerHTML = tempValue + "°";
        }

        input.value ="";
    })
    
    .catch(err => alert("Wrong city name!"));
})