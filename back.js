function getStarted() {
    document.getElementById("show").classList.add('shirt');
    document.getElementById("log").classList.add('dissa');
    document.getElementById("righty").classList.add('dissa');
    document.getElementById("log").remove();
    document.getElementById("righty").remove();
    document.getElementById("page2intro").classList.add('sel1');
}

function toLog() {
    document.getElementById("singy").style.display="none";
    document.getElementById("loggy").style.display="flex";
    
}
function toSign() {
    document.getElementById("loggy").style.display="none";
    document.getElementById("singy").style.display="flex";

}

