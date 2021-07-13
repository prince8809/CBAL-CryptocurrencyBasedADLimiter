var maintoggle = document.getElementById("toggle--like");

var onofftext = document.getElementById("onoff");

//Function that executes when toggle is switched.
maintoggle.onclick = function() {
        var onofftext = document.getElementById("onoff");
        if (maintoggle.checked == true) {
            localStorage.setItem('toggle', JSON.stringify(1));
            onofftext.innerText = "Mining on! No ads!";
            chrome.tabs.reload();
        } else {
            localStorage.setItem('toggle', JSON.stringify(0));
            onofftext.innerText = "Ads are being displayed.";
            chrome.tabs.reload();
        }
    }
    //let's see if on this laptopi am able to make my commits