function getNavbarLinks() {
    var sidebar = document.getElementById('sidebar');
    var unorderedList = sidebar.getElementsByTagName('ul')[0]; //only one <ul> in sidebar
    var listItems = unorderedList.getElementsByTagName('li');

    var links = [];
    for (var i = 0; i < listItems.length; i++) {
        var currentLink = listItems[i].getElementsByTagName('a')[0]; //only one <a> in a <li>
        links.push(currentLink);
    }

    return links;
}

function highlightMe(id) {
    var links = getNavbarLinks();

    for (var i = 0; i < links; i++) {
        links[i].removeAttribute('style')
    }

    id.setAttribute('style', 'font-weight: bold;')
}