const edit_btn = document.getElementById('editBtn');

const cancel_btn = document.getElementById('cancelBtn');

const update_btn = document.getElementById('updateBtn');


window.onload = () => {

    update_btn.style.display = "none";
    cancel_btn.style.display = "none";

}

edit_btn.addEventListener('click', () => {

    document.getElementById('firstName').disabled = false;
    document.getElementById('lastName').disabled = false;

    edit_btn.style.display = "none";
    cancel_btn.style.display = "inline";
    update_btn.style.display = "inline";



});

cancel_btn.addEventListener('click', () => {

    document.getElementById('firstName').disabled = true;
    document.getElementById('lastName').disabled = true;

    edit_btn.style.display = "inline";
    cancel_btn.style.display = "none";
    update_btn.style.display = "none";
});

/* update_btn.addEventListener('click', () => {

}); */