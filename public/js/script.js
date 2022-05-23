let user_name = localStorage.getItem('name')
let user_id = localStorage.getItem('user_id')
document.getElementById("user_name").innerHTML = user_name;

function showHint(name, new_price) {
  if(typeof name === 'string') {
    $.ajax({
      url : 'pages/insert_cart.php',
      type : 'POST',
      data: { 
        name: name, 
        new_price: new_price, 
        user_id: user_id
      },
      success : function (result) {
        $.ajax({
          url : 'pages/load_cart.php',
          type : 'GET',
          success : function (result) {
             console.log ("success", result);
          },
          error : function (e) {
             console.log (e);
          }
      
        });
      },
      error : function (e) {
         console.log (e);
      }
  
    });
  }
}

$(document).ready(showHint);
