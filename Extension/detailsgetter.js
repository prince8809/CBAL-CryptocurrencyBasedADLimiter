var hashrate = document.getElementById("hashrate");
var totalhashes = document.getElementById("totalhashes");
var cpuusage = document.getElementById("cpuusage");
setInterval(function() {
    //chrome.storage.sync.get("rate", function(obj) { onofftext.innerText = obj.rate; });
    hashrate.innerText = localStorage.getItem('hashrate');

    //chrome.storage.sync.get("totalhashes", function(obj) { totalhashes.innerText = obj.totalhashes; });
    totalhashes.innerText = localStorage.getItem('totalhashes');

    //CPU usage display
    //cpuusage.innerText = localStorage.getItem('cpuusage');

}, 1000);