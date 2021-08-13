const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault(); // prevent form from submitting
}

continueBtn.onclick = () => {
    // Ajax
    let xhr = new XMLHttpRequest(); // Create an XML object

    xhr.open("POST", "backend/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    if (data === "success") {
                        location.href = "./users.php";
                    } else {
                        errorText.textContent = data;
                        errorText.style.display = "block";
                    }
                }
            }
        }
    }

    // Send the form data through ajax to php
    let formData = new FormData(form); // creating new formData object
    xhr.send(formData); //sending the form data to php


}