window.onload = function(){
    showRecentFeeds();
}


document.getElementById('field').addEventListener('keyup', search_feed);

function ShowUrl(){
    chrome.tabs.getSelected(null, function(tab) {
    myfunction(tab.url);
});
}

function cargarHTML(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("returnfromphp").innerHTML = xhttp.responseText;
        }
        xhttp.open("GET", "http://localhost/Rss/index2.php", true);
        xhttp.send();
    }
}



function search_feed(){
    var str = document.getElementById('field').value;
    send_server(str);
}

function showRecentFeeds() {
    send_server("");
}

function send_server(str){
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "http://localhost/Rss/index3.php?q=" + str, true);
        xmlhttp.send();
    
}