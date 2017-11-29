function highlight(value)
{
    inputText = document.getElementById("highlight");
    var innerHTML = inputText.innerHTML;

    // global case insensitive regex replace
    var escapedValue = value.replace(/[.?*+^$[\]\\(){}|-]/g, "\\$&");
    var regEx = new RegExp(escapedValue, "ig");
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

        // hidden key/legend highlighting
        if (searchValue === 'key') {
            document.getElementById("highlight").classList.add('key');
            document.getElementById("legend").classList.add('show');
        }
    }
});
