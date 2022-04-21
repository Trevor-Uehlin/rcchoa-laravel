
let deleteButtons = document.getElementsByClassName("delete-button");

for(let i = 0; i < deleteButtons.length; i++) {

    deleteButtons[i].addEventListener("click", function(e){

        if(!confirm("Are you sure you want to delete this record?")){e.preventDefault()}
        else if(!confirm("Are you really sure you want to delete this record?")){e.preventDefault()}
    });
}