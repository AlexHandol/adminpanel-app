elements = document.getElementsByTagName("td")
for (var i = elements.length; i--;) {
    if (elements[i].innerHTML === "Active" || elements[i].innerHTML === "თავისუფალი" || elements[i].innerHTML ===
        "მარაგშია" || elements[i].innerHTML === "დამონტაჟებული") {
        elements[i].style.color = "#28a745";
    }
    if (elements[i].innerHTML === "Passive") {
        elements[i].style.color = "#17a2b8";
    }
    if (elements[i].innerHTML === "Overdue" || elements[i].innerHTML === "დაკავებული" || elements[i].innerHTML ===
        "არ არის მარაგში") {
        elements[i].style.color = "#dc3545";
    }
    if (elements[i].innerHTML === "Compensation") {
        elements[i].style.color = "#ff8c00";
    }
    if (elements[i].innerHTML === "Free") {
        elements[i].style.color = "#6c757d";
    }
    if (elements[i].innerHTML === "Messaged" || elements[i].innerHTML === "Reserved") {
        elements[i].style.color = "#fcb92c";
    }
}