<script>

    $(document).ready(function(){
        $('.cartRemove').click(function () {
            let id = $(this).attr('data-id');
            deleteCartItem(id, function callback(data) {
                if (data == 'true') {
                    $('#cartitem'+id).remove();
                }
            })


        })


        function deleteCartItem(data, callback) {
            $.ajax({
                url: './controller/delete_cart.php',
                type: 'POST',
                data: {crtid : data},
                success: function (data) {
                    callback(data);
                }
            })
        }



    })

</script>