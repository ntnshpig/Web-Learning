let li_list = document.getElementsByTagName("li");

for(let el of li_list) {
    if(!el.hasAttribute("class") || (el.getAttribute("class") !== "good" && el.getAttribute("class") !== "evil")){
        el.setAttribute("class",  "unknown");
    }
    if(!el.hasAttribute("data-element")) {
        el.setAttribute("data-element",  "none");
    }
}

for(let el of li_list) {
    let elem_list = el.getAttribute('data-element').split(" ");
    el.appendChild(document.createElement("br")); 
    for(let i of elem_list) {
        let div = document.createElement("div");
        if(i === "none"){
            div.classList.add("elem");
                let line = document.createElement("div");
                line.classList.add("line");
                div.appendChild(line);
            el.appendChild(div);
        } else {
            div.classList.add("elem");
            div.classList.add(i);
            el.appendChild(div); 
        }
    }
}