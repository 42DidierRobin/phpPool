/**
 * Created by rdidier on 4/15/16.
 */
var list;
var newButton;
var cookieContent;


window.onload = function () {
    list = document.querySelector("#ft_list");
    getCookieData();
    newButton = document.querySelector("#newButton");
    newButton.addEventListener('click', addElem);
}

window.onunload = function () {
    var childlist = list.children;
    for (i = 0; i < childlist.length; i++)
        cookie += "" + childlist[i].innerHTML + "_;;_";
    var expires = new Date();
    expires.setTime(today.getTime() + (424242424242));
    document.cookie = "list="+ cookie + ";expires=" + expires.toGMTString();
}

function addElem() {
    var input = prompt("Please input a new task on the list:");
    if (input) {
        input = "- " + input;
        var elem = document.createElement("div");
        elem.innerHTML = input;
        elem.className += "elem";
        elem.addEventListener("click", remove);
        list.insertBefore(elem, list.firstChild);
    }
}

function remove() {
    var obj = this.innerHTML;
    if (confirm("Voullez-vous vraiment supprimer " + obj + "?"))
        this.parentElement.removeChild(this);
    console.log(list);
}

function getCookieData()
{
    temp = document.cookie;
    if (!temp)
        return;
    temp = temp.split(';');
    for (i = 0; i < temp.length; i++)
    {
        temp2 = temp[i].split('=');
        elem = document.createElement("div");
        elem.innerHTML = temp2[1];
        elem.className += "elem";
        elem.addEventListener("click", remove);
        list.appendChild(elem);
    }
}

