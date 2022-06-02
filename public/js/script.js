let user_name = localStorage.getItem('name')
let user_id = localStorage.getItem('user_id')
document.getElementById("user_name").innerHTML = user_name;

function showHint(name, img, new_price) {
  if(typeof name === 'string') {
    $.ajax({
      url : 'pages/insert_cart.php',
      type : 'POST',
      dataType: 'text',
      data: { 
        name: name, 
        new_price: new_price, 
        user_id: user_id,
        img: img
      },
      success : function (result1) {
        // document.getElementById("card-detail").innerHTML = "";
        var param = `user_id=${user_id}`;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", `pages/load_cart2.php?user_id=${user_id}`);
        xmlhttp.send(param); 
        setTimeout(function() {
          console.log(xmlhttp);
          let total = 0;
          document.getElementById("card-detail").innerHTML = xmlhttp.responseText;
          var a = document.getElementsByClassName("price-cart");
          console.log(a);
          [...a].forEach(element => {
            total += parseInt(element.innerHTML);
            $('#total-price').text(total);
          });
        }, 2000); 
      },
    });
  }
}

function changePrice(quantity, id) {
  let count = 0;
  $(`#total${id}`).html(parseInt(quantity) * parseInt($(`#price${id}`).html()));
  let a = $('.priceTotal');
  [...a].forEach(elm => {
    count += parseInt(elm.innerText)
  })
  $('#allPrice').html(count);

}


$(document).ready(showHint);
$(document).ready(changePrice);
