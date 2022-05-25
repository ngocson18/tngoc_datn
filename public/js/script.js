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
        $.ajax({
          url : 'pages/load_cart2.php',
          type : 'GET',
          dataType: 'text',
          data: {
            user_id: user_id,
          },
          success : function (result2) {
             console.log ("success", result2);
             console.log ("success", result1);
            //  $('#dropdown').html(result);
          },
        });
      },
      error : function (e) {
         console.log (e);
      }
  
    });
  }
}

$(document).ready(showHint);
