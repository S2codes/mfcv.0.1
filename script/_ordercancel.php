<script>
    $(document).ready(function(){
        $('#cancelOrder').click(function () {
            cancelOrder();
        })


        function cancelOrder() {
            let orderId = $('#oid').val();
            $.ajax({
                url:'controller/cancel_order.php',
                type: 'POST',
                data: {id: orderId},
                success: function (data) {
                    console.log(data);
                    location.reload();
                }

            })
        }


    })
</script>