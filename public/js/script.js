let user_name = localStorage.getItem('name')
let user_id = localStorage.getItem('user_id')
document.getElementById("user_name").innerHTML = user_name;

function showHint(name, img, new_price) {
    if (typeof name === 'string') {
        $.ajax({
            url: 'pages/insert_cart.php',
            type: 'POST',
            dataType: 'text',
            data: {
                name: name,
                new_price: new_price,
                user_id: user_id,
                img: img
            },
            success: function(result1) {
                document.getElementById("card-detail").innerHTML = "";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "pages/load_cart2.php");
                xmlhttp.send();
                setTimeout(function() {
                    console.log(xmlhttp);
                    document.getElementById("card-detail").innerHTML = xmlhttp.responseText;
                }, 2000);
            },
        });
    }
}


$(document).ready(showHint);