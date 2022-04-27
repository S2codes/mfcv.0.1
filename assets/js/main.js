// product details img change 

$(document).ready(function () {
    $('#search1').click(function () {
        let val = $('#searchInput').val()
        if (val != '') {
            window.location = `search.php?search=${val}`;
        }
    })

    $('#resSearchBtn').click(function () {
        let valu = $('#resSearchInput').val()
        if (valu != '') {
            window.location = `search.php?search=${valu}`;
        }
    })


    console.log('hello query');
    // show password toggler
    $('.eye').click(function () {
        let id = $(this).attr('data-id');
        // console.log(id);
        if ($(this).hasClass('bx-show')) {
            $(this).addClass('bx-hide');
            $(this).removeClass('bx-show');
            $('#p' + id).attr('type', 'text');
        } else {
            $(this).addClass('bx-show');
            $(this).removeClass('bx-hide');
            $('#p' + id).attr('type', 'password');
        }

    })

    // sign up  validation
    $('#signupForm').on('submit', function () {
        if (signUpValidation()) {
            return true;
        }else{
            return false
        }
    })

    function signUpValidation() {
        console.log('sign up validation');
        let r_val = true;
        $('#su_alert').text('')
        if (($('#su_name').val().length) < 3) {
            r_val = false;
            $('#su_alert').text('Please fill the all filed Correctly')
        }
        if ((($('#su_phone').val().length) == 0) || ($('#su_phone').val().length) > 13) {
            r_val = false;
            $('#su_alert').text('Please fill the all filed Correctly')
        }

        let phone = $('#su_phone').val();
        var alphabet = /[a-zA-Z]/g;
        if (alphabet.test(phone)) {
            r_val = false;
            $('#su_alert').text('Please fill the all filed Correctly')
        }

        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test($('#su_email').val())) {
            $('#su_alert').text('Please fill the all filed Correctly')
            r_val = false;
        }

        if (($('#su_pass').val().length) < 6) {
            r_val = false;
            $('#su_alert').text('Password Must Be At Least 6 Characters')
        }

        if (($('#su_pass').val()) != ($('#su_cpass').val())) {
            $('#su_alert').text('Password are Not Matched')
            r_val = false;
        }

        return r_val;
    }




})

