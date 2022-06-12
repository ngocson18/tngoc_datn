let user_name = localStorage.getItem('name')
let user_id = localStorage.getItem('user_id')
if(user_id === null) {
  user_id = 00;
}

let listPrice = $(".priceOneProd")
let a = 0;
for(let i = 0; i < [...listPrice].length; i ++) {
  console.log(listPrice[i].innerHTML);
  a += parseInt(listPrice[i].innerHTML);
}
$(".total-price2").html(a);
document.getElementById("user_name").innerHTML = user_name;

function showHint(prod_id, name, img, new_price) {
  if(typeof name === 'string') {
    $.ajax({
      url : 'pages/insert_cart.php',
      type : 'POST',
      dataType: 'text',
      data: { 
        name: name, 
        prod_id: prod_id,
        new_price: new_price, 
        user_id: user_id,
        img: img,
      },
      success : function (result1) {
        console.log(result1);
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

function showHint2(prod_id, name, img, new_price) {
  let quantity = $('#num-order').val();
  console.log(quantity);
  if(typeof name === 'string') {
    $.ajax({
      url : 'pages/insert_cart_for_detail_page.php',
      type : 'POST',
      dataType: 'text',
      data: { 
        name: name, 
        prod_id: prod_id,
        new_price: new_price,
        quantity: quantity,
        user_id: user_id,
        img: img,
      },
      success : function (result1) {
        console.log(result1);
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
function goToCheckout() {
  
}
function checkLogin() {
  let user_exist = localStorage.getItem('user_id');
  if(user_exist == 0) {
    document.getElementById('isLogin').innerHTML = "Login";
  } else {
    document.getElementById('isLogin').innerHTML = "Logout";
  }
}

function removeItem(id) {
  let element = document.getElementById(`tr${id}`);
  element.remove();

  $.ajax({
    url : 'pages/deleteItem.php',
    type : 'POST',
    dataType: 'text',
    data: { 
      prod_id: id,
      user_id: user_id,
    },
    success : function (result1) {

    },
  });
}

$(document).ready(showHint);
$(document).ready(changePrice);
$(document).ready(checkLogin);
$(document).ready(removeItem);
