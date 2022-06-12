$(document).ready(function () {
    var height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);
    $('#content').css('min-height', height);

//  CHECK ALL
    $('input[name="checkAll"]').click(function () {
        var status = $(this).prop('checked');
        $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", status);
    });

// EVENT SIDEBAR MENU
    $('#sidebar-menu .nav-item .nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
    var sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function () {
        if (!$(this).parent('li').hasClass('active')) {
            $('.sub-menu').slideUp();
            $(this).parent('li').find('.sub-menu').slideDown();
            $('#sidebar-menu > .nav-item').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        } else {
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            return false;
        }
    });

    
});

// here

function changeStatus(value, order_id) {
    $.ajax({
        url : 'page/update_order_status.php',
        type : 'POST',
        dataType: 'text',
        data: { 
          value: value,
          order_id: order_id
        },
        success : function (result1) {
            if(result1 == "success") {
                alert("Cập nhật trạng thái đơn thành công");
            }
        }
      });

}

function validateUSPhoneNumber(phoneNumber) {
    var regExp = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
    var phone = phoneNumber.match(regExp);
    if (phone) {
      return true;
    }
    return false;
}

function validatePhone(value) {
    console.log(value);
    if(value.length > 0 && value.length <= 10 && validateUSPhoneNumber(value)) {
        document.getElementById("btn-submit").removeAttribute("disabled");
        document.getElementById("validatePhone").style.display = 'none';
    } else {
        document.getElementById("btn-submit").setAttribute("disabled", true);
        document.getElementById("validatePhone").style.display = 'block';
    }
}

function convertDate() {
    let newDate = new Date();
    let year = new Date(newDate).getFullYear();
    let month = new Date(newDate).getMonth() + 1 < 10 ? "0" + (new Date(newDate).getMonth() + 1).toString() : (new Date(newDate).getMonth() + 1).toString();
    let date = new Date(newDate).getDate() < 10 ? '0' +  (new Date(newDate).getDate()).toString() :  new Date(newDate).getDate();
    let re = year + '-' + month + '-' + date;
    $('#choose').val(re);
}

function changeDay(value) {
    console.log(value.length);
    if(value.length > 2) {
        $.ajax({
            url : 'page/thong_ke_ngay.php',
            type : 'POST',
            dataType: 'text',
            data: { 
              date: value
            },
            success : function (result1) {
                $("#result-area").html(result1);
            }
        });
    }
}
// $('#choose').val(convertDate(new Date()));
$(document).ready(changeStatus);
$(document).ready(convertDate);
$(document).ready(changeDay);
$(document).ready(validatePhone);
$(document).ready(validateUSPhoneNumber);
