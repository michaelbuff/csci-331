window.addEventListener("DOMContentLoaded", main);

function main(){
    ajaxSection =document.getElementById("ajaxDemo");


}

function getUserData(){
    xhr = new XMLHttpRequest
    path = 'https://randomuser.me/api'
    xhr.open('GET', path)
    xhr.send()
    xhr.addEventListener("load", () => {
        userData = JSON.parse(xhr.response);
        
    })
}