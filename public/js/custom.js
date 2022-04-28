
let deleteButtons = document.getElementsByClassName("delete-button");

for(let i = 0; i < deleteButtons.length; i++) {

    deleteButtons[i].addEventListener("click", function(e){

        if(!confirm("Are you sure you want to delete this record?")){e.preventDefault()}
        else if(!confirm("Are you really sure you want to delete this record?")){e.preventDefault()}
    });
}


let deleteForms = document.getElementsByClassName("delete-form");

console.log(deleteForms);

for(let i = 0; i < deleteForms.length; i++) {

    deleteForms[i].onsubmit = function(e){
        console.log("hitting funtion");
        if(!confirm("Are you sure you want to delete this record?")){e.preventDefault()}
        else if(!confirm("Are you really sure you want to delete this record?")){e.preventDefault()}
    };
}