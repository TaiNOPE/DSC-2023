"use strict"


let input_bookTitle;
let input_bookAuthor;
let input_bookQuantity;
let input_visibility;


window.onload = function(){
    let btn_submit      = document.querySelector("button#submit");
    let input_submit    = document.querySelector("input[type='submit']");
    input_bookTitle     = document.querySelector("input[name='book_title']");
    input_bookAuthor    = document.querySelector("input[name='book_author']");
    input_bookQuantity  = document.querySelector("input[name='book_quantity']");
    input_visibility    = document.querySelector("input[name='book_visibility']");

    btn_submit.addEventListener("click", ()=>{ 
        if(!isUserDumb()){
            input_submit.click();
        }
    });
}


function isUserDumb(){
    let bookTitle       = input_bookTitle.value;
    let bookAuthor      = input_bookAuthor.value;
    let bookQuantity    = input_bookQuantity.value;
    let visibility      = input_visibility.checked;

    console.log("hold on lemme check somethin'");

    //book title
    if(bookTitle == ""){        alert("Título do livro não pode estar em branco");          return(true);}
    if(bookTitle.length > 300){ alert("Título do livro não pode exceder 300 caracteres");   return(true);}

    //book author
    if(bookAuthor == ""){        alert("Nome do autor não pode estar em branco");          return(true);}
    if(bookAuthor.length > 300){ alert("Nome do autor não pode exceder 300 caracteres");   return(true);}

    //book quantity
    if(bookQuantity <= 0){  alert("Quantidade inválida"); return(true);}
    // put a cap to block mfs who trynna nuke the fucking server

    // visibility
    if(typeof(visibility) != "boolean"){ alert("???"); return(true);}

    console.log("passed the vibe check");
    return(false);
}