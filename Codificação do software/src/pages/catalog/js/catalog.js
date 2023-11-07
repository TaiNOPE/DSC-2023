"use strict"


let catalogContainer;
let catalog = [];


window.onload = function(){
    catalogContainer = document.querySelector("#book-catalog");

    catalog.push(createBookIcon("asdf", "123132", "0000"));
    catalog.push(createBookIcon("asdf", "123132", "0000"));
    catalog.push(createBookIcon("asdf", "123132", "0000"));
    catalog.push(createBookIcon("asdf", "123132", "0000"));
    catalog.push(createBookIcon("asdf", "123132", "0000"));

    catalog.forEach(item => {
        catalogContainer.appendChild(item);
    });
}


function createBookIcon(title, author, units){
    let div = document.createElement("div");
    let p1  = document.createElement("p");
    let p2  = document.createElement("p");
    let p3  = document.createElement("p");

    div.className   = "book-icon";
    p1.innerHTML    = title;
    p2.innerHTML    = author;
    p3.innerHTML    = units

    div.appendChild(p1);
    div.appendChild(p2);
    div.appendChild(p3);

    return div;
}