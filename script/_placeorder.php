<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    $(document).ready(function() {

        $('#orderQty').on('change', function() {
            let qty_val = $(this).val();
            if (qty_val <= 0) {
                $(this).val(1);
            }
            if (qty_val > 5) {
                $('#qtyAlert').text('Max Quantity 5');
                $(this).val(5);
            } else {
                $('#qtyAlert').text('');
            }
            priceIncr()
        })

        function priceIncr() {
            let val = $('#orderQty').val();
            let price = $('#p_Price').val();
            let totalPrice = (price * val);
            $('#product_Qty').text(val);
            $('#product_Tprice').text(totalPrice);
            $('#t_price').val(totalPrice);
            $('#quantity').val(val);
        }

        // palceOrder
        // $('#continue').click(function(e){
        //     e.preventDefault();

        //     let data = $('#palceOrder').serialize();
        //     console.log('order call');
        //     placeOrder(data, function callback(status) {
        //         console.log('status : ', status);
        //         if (status =='success') {
        //             window.location = './orders.php';
        //         }
        //     })

        // })

        $('#paynow').click(function() {
            // console.log('paynow ..');
            $('.paynowBtn').css('display', 'block')
            $('.payondeliveryBtn').css('display', 'none')
            $("#payTypeVal").val('paynow')
        })

        $('#payondelivery').click(function() {
            // console.log('payondelivery ..');
            $('.paynowBtn').css('display', 'none')
            $('.payondeliveryBtn').css('display', 'block')
            $("#payTypeVal").val('payondelivery')
        })

        // $('#rzp-button1').click(function () {
        //     console.log('razorpy payment');
        //     $('#palceOrder').submit();
        // })




        // form submit 

        $('#palceOrder').on('submit', function(e) {
            e.preventDefault();

            let data = $('#palceOrder').serialize();
            // console.log('submit');
            let payType = $("#payTypeVal").val();
            // console.log(payType);




            placeOrder(data, function callback(status) {
                // console.log(status);
                if (status == 'success') {
                
                    if (payType == 'paynow') {
                        let name = $('#in_n').val();
                        let phone = $('#in_p').val();
                        let amount = $('#t_price').val();
                        let description = $('#quantity').val()+' X '+$('#p_title').val();
                        

                        razorPayCheckOut(name,  phone, amount, description);
                    } else {
                        // console.log('Cash on Delivery');
                        $('#palceOrder').reset();
                        window.location = './orders.php';
                    }

                }
            })



        })


        // ajax 

        function placeOrder(Data, callback) {
            
            $.ajax({
                url: './controller/place_order.php',
                type: 'POST',
                data: Data,
                success: function(data) {
                    callback(data);
                    // console.log(data);
                }



            })
        }


        function razorPayCheckOut(name, phone, amount, description) {

            var options = {
                "key": "rzp_test_w97Hbq6C4EXMDm",
                "amount": amount * 100,
                "currency": "INR",
                "name": "Muscle & Fitness Care",
                "description": description,
                "image": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnTicgjQiy-_VP9RLm46WumjNobIeSV52iGw&usqp=CAU",

                // "order_id": "order_9A33XWu170gUtm",
                //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function(response) {;
                    let pid = response.razorpay_payment_id;

                    paymentSucess(pid);
                },
                "prefill": {
                    "name": name,
                    "email": '',
                    "contact": phone
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            // rzp1.on('payment.failed', function(response) {
            // alert(response.error.code);
            // alert(response.error.description);
            // alert(response.error.source);
            // alert(response.error.step);
            // alert(response.error.reason);
            // alert(response.error.metadata.order_id);
            // alert(response.error.metadata.payment_id);
            // });
            // document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            // e.preventDefault();
            // }



        }

        // razorpay_payment_id: 'pay_JMKMxRdPQ7c4gr'
        function paymentSucess(payment_id) {
            let orderId = $('#orderid').val()
            console.log('Payment Sucess');
            $.ajax({
                url: './controller/payscript.php',
                type: 'post',
                data: {oId: orderId, paymentId:payment_id},
                success: function (data) {
                    console.log(data);
                    if (data == 'success') {
                        $('#palceOrder').reset();
                        $('#sucessModal').modal('show'); 
                    }else{
                        alert('Something Went Wrong');
                    }
                }

            })
        }





    })
</script>