//GET TABLE DATA
function loadGoogleTable() {
    fetch('/wp-json/wpc/v1/tabledata').then(response => {

        return response.json();

    }).then(jsonResponse => {

        console.log({ jsonResponse });

    });
}

//RENDER TABLE DATA

$(window).on('load', function () {

    loadGoogleTable();

    var szoveg = "iszom";
    $("#google_tablazat").html(szoveg);
    alert('hello');
    console.log("ready");
});