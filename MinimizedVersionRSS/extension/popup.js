document.getElementById("button").addEventListener("click",search_feed);function search_feed(){var a=document.getElementById("field").value;send_server(a)}function send_server(b){var a=new XMLHttpRequest();a.onreadystatechange=function(){if(this.readyState==4&&this.status==200){generate_content(this.responseText)}};a.open("GET","http://localhost/Rss/extraerBD.php?q="+b,true);a.send()}function generate_content(g){if(g!="{}"){var d=JSON.parse(g);var c=document.getElementById("txtHint");c.innerHTML="";var b=d.noticias.length;for(var f=0;f<b;f++){var a=d.noticias[f];var e=create_card(a.titulo,a.descripcion,a.fecha,a.link);c.appendChild(e)}}else{showMessage()}}function create_card(a,f,l,h){var d=createElement("div","card-margin");var e=createElement("div","card blue-grey darken-1");var j=createElement("div","card-content white-text");var g=createElement("span","card-title");g.innerHTML=a;var k=createElement("div","");k.innerHTML=f;var c=createElement("div","");c.innerHTML=l;var b=createElement("div","card-action");var i=createElement("a","");i.href=h;i.target="_blank";i.innerHTML="ir a la noticia";j.appendChild(g);j.appendChild(k);j.appendChild(c);b.appendChild(i);e.appendChild(j);e.appendChild(b);d.appendChild(e);return d}function createElement(c,b){var a=document.createElement(c);a.className=b;return a}function showMessage(){var a=document.getElementById("txtHint");a.innerHTML="no se encontraron resultados"};




