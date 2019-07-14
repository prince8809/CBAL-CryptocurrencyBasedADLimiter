var maintoggle = document.getElementById("toggle--like");

var onofftext = document.getElementById("onoff");

if (JSON.stringify(localStorage.getItem('toggle')) == `"1"`) {
    maintoggle.checked = true;
    onofftext.innerText = "Mining on! No ads!";
} else if (JSON.stringify(localStorage.getItem('toggle')) == `"0"`) {
    maintoggle.checked = false;
    onofftext.innerText = "Ads are being displayed.";
}