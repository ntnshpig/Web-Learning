let tableElement = [
    [ "Black Pantera",  66,  53],
    [ "Captain America",  79,  137],
    [ "Captain Marvel",  97,  26],
    [ "Hulk",  5,  49],
    [ "Iron Man",  88,  48],
    [ "Spider-Man",  78,  16],
    [ "Thanos",  99,  1000],
    [ "Thor",  95,  1000],
    [ "Yon-Rogg",  73,  52]
  ];

let headerElement = ['Name', 'Strength', 'Age'];

const createTable = (tableElement) => {
    //body reference 
    let body = document.getElementById("placeholder");
    body.innerText = "";

    // create elements <table>
    let tbl = document.createElement("table");
    tbl.setAttribute("id", "table");
    // append the <table> inside the <body>
    body.appendChild(tbl);

    // create <thead>
    let tablehead = document.createElement('thead');
    tablehead.classList.add('thead');
    // append the <thead> inside the <table>
    tbl.append(tablehead);

    //fill <thead>
    let tr = document.createElement('tr');
    tablehead.append(tr);
    for (let c = 0; c < headerElement.length; c++) {
        let th = document.createElement('th');
        th.insertAdjacentHTML(`beforeend`, `${headerElement[c]}`);
        th.addEventListener("click", event => { sort(c); })
        tr.append(th);
    }

    //create <tbody>
    var tblBody = document.createElement("tbody");
    tblBody.classList.add('tbody');
    // append the <tbody> inside the <table>
    tbl.appendChild(tblBody);

    // cells creation
    for (var j = 0; j < 9; j++) {
        // table row creation
        var row = document.createElement("tr");
        for (var i = 0; i < 3; i++) {
            var cell = document.createElement("td");
            var cellText = document.createTextNode(tableElement[j][i]);

            cell.appendChild(cellText);
            row.appendChild(cell);
        }
        tblBody.appendChild(row);
    } 
}

createTable(tableElement);
let count = false;

const sort = (index) => {
    let cpy;
    if(!count){
        document.getElementById("notification").innerHTML = "Sorting by " + headerElement[index] + ", order ASC";
        count = true;
        cpy = tableElement.sort(function(a,b) {
            return (a[index] < b[index]) ? -1 : 1;
        });
    } else {
        document.getElementById("notification").innerHTML = "Sorting by " + headerElement[index] + ", order DESC";
        count = false;
        cpy = tableElement.sort(function(a,b) {
            return (a[index] > b[index]) ? -1 : 1;
        });
    }
    let plc = document.getElementById("placeholder");
    while (plc.firstChild) {
        plc.removeChild(plc.firstChild);
    }
    createTable(cpy);
}