document.getElementById('button').addEventListener('click', search_feed);

function search_feed(){
    var str = document.getElementById('field').value;
    send_server(str);

}

function send_server(str){
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                generate_content(this.responseText);
            }
        };
        xmlhttp.open("GET", "http://localhost/Rss/extraerBD.php?q=" + str, true);
        xmlhttp.send();
    
}

function generate_content(json){
    if(json != "{}"){
        var myArr = JSON.parse(json);
        var container = document.getElementById("txtHint");

        container.innerHTML = '';
        var array_length = myArr["noticias"].length;
    
        for (var i = 0; i < array_length; i++) {
            var noticia = myArr["noticias"][i];
            var card = create_card(noticia.titulo, noticia.descripcion, noticia.fecha, noticia.link)
            container.appendChild(card);
        }
    }else{
            showMessage();
        }
}   

function create_card(titulo, descripcion, fecha, enlace){
    var card_margin = createElement("div", "card-margin");   
    var card = createElement("div", "card blue-grey darken-1");
    var card_content = createElement("div", "card-content white-text");
    var card_title = createElement("span", "card-title");
    card_title.innerHTML = titulo;
    var description = createElement("div", "");
    description.innerHTML = descripcion; 
    var date = createElement("div", "");
    date.innerHTML = fecha; 
    var card_action = createElement("div", "card-action");
    var link = createElement("a", "");
    link.href = enlace;
    link.target = "_blank";
    link.innerHTML = "ir a la noticia";

    card_content.appendChild(card_title);
    card_content.appendChild(description);
    card_content.appendChild(date);
    card_action.appendChild(link)
    card.appendChild(card_content);
    card.appendChild(card_action);
    card_margin.appendChild(card);

    return card_margin;


}
function createElement(type, className){
    var element = document.createElement(type);
    element.className = className;  
    return element;
}
function showMessage(){
    var container = document.getElementById("txtHint");
    container.innerHTML =  "no se encontraron resultados";
}




