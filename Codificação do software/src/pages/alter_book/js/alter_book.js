"use strict"


let txt_search;
let btn_cancelSearch;
let btn_selectBook;
let selectorContainer;
let div_bookList;

let input_id;
let input_title;
let input_author;
let input_year;
let input_volume;
let input_edition;
let input_series;
let input_collection;
let input_collectionNumber;
let input_isbn;
let input_visibility;


window.onload = function(){
    txt_search = document.querySelector("input#search");
    btn_cancelSearch = document.querySelector("button#cancel");
    btn_selectBook = document.querySelector("button#select");
    div_bookList = document.querySelector("div#book-list");
    selectorContainer = document.querySelector("div#book-selector-container");

    input_id                = document.querySelector("input[name='id']");
    input_title             = document.querySelector("input[name='title']");
    input_author            = document.querySelector("input[name='author']");
    input_year              = document.querySelector("input[name='year']");
    input_volume            = document.querySelector("input[name='volume']");
    input_edition           = document.querySelector("input[name='edition']");
    input_series            = document.querySelector("input[name='series']");
    input_collection        = document.querySelector("input[name='collection']");
    input_collectionNumber  = document.querySelector("input[name='collection_number']");
    input_isbn              = document.querySelector("input[name='isbn']");
    input_visibility        = document.querySelector("input[name='visibility']");

    let request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let json = this.responseText;
            json = JSON.parse(json);
            div_bookList.innerHTML = "";
            if(json.length >0) json.forEach(item => {
                let book = JSON.parse(item);
                let btn = document.createElement("button");
                btn.innerHTML = `<b>${book.title}</b> por <b>${book.author}</b>`;
                btn.addEventListener("click", ()=>{
                    selectBook(book);
                    setVisibility("hidden");
                });
                div_bookList.appendChild(btn);
            });
        }
    }

    txt_search.addEventListener("keyup", (e)=>{
        let txt = e.target.value;
        request.open("GET", `php/request_book.php?title=${txt}`);
        request.send();
    });

    btn_cancelSearch.addEventListener("click", ()=>{
        setVisibility("hidden");
    });

    btn_selectBook.addEventListener("click", ()=>{
        setVisibility("visible");
    });
}


function setVisibility(visibility){
    selectorContainer.className = visibility;
    console.log(selectorContainer.className);
}


function selectBook(book){
    console.log(book);
    input_id.value                  = book.id;
    input_title.value               = (book.title)              != ""  ? book.title : "";
    input_author.value              = (book.author)             != "0" ? book.author : "";
    input_year.value                = (book.year)               != "0" ? book.year : "";
    input_volume.value              = (book.volume)             != "0" ? book.volume : "";
    input_edition.value             = (book.edition)            != "0" ? book.edition : "";
    input_series.value              = (book.series)             != ""  ? book.series : "";
    input_collection.value          = (book.collection)         != ""  ? book.collection : "";
    input_collectionNumber.value    = (book.collection_number)  != "0" ? book.collection_number : "";
    input_isbn.value                = (book.isbn)               != "0" ? book.isbn : "";
    input_visibility.visibility     = book.visibility ? "visible" : "hidden";

}