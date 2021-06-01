url = (event) => {
    var ci = event.target.getAttribute("data-ci");
    window.location.href = "index.php?len=" + len_js;
}

document.getElementById("inicio").addEventListener("click", url);