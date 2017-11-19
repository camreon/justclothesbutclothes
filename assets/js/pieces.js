function highlight(value)
{
    inputText = document.getElementById("highlight");
    var innerHTML = inputText.innerHTML;

    // regex global case insensitive replace
    var regEx = new RegExp(value, "ig");
    innerHTML = innerHTML.replace(regEx, "<span class='highlight'>" + capitalize(value) + "</span>");
    inputText.innerHTML = innerHTML; 
}

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

document.addEventListener("DOMContentLoaded", function(event) { 
    var searchValue = getParameterByName('q');

    if (searchValue) {
        highlight(searchValue);

        if (searchValue === 'gay') {
            document.getElementById("highlight").classList.add('gay');
        }
    }
});
