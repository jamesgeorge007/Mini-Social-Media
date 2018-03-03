window.onload = () => {
    document.getElementById('warning').style.display = "none";
}

check = function() {
    const newPassword = document.getElementById('new');
    const confirmPassword = document.getElementById('confirm');

    const warn = document.getElementById('warning');

    if (confirmPassword.value == '' || newPassword.value == '') {
        warn.style.display = "none";

    } else if (confirmPassword.value != newPassword.value) {
        warn.style.display = "inline-block";
    } else {
        warn.style.display = "none";
    }
}