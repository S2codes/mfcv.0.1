<script>
    $(document).ready(function() {


        $('.attrItem').click(function() {
            let weight = $(this).attr('data-w');
            let mrp = $(this).attr('data-m');
            let sell = $(this).attr('data-s');
            let strike = '';
            if (sell != 0) {
                strike = `<strike class="price-cut"> ${mrp} &#8377;</strike>`;
            } else {
                sell = mrp;
            }
            let price = sell;


            $('#prduct_attr_item').html(`${sell} &#8377; ${strike} <span class="invd_total_rating">(${weight})</span>`);

            $('#attrData').html(`<input type="hidden" name="cart_weight" value="${weight}">
                                    <input type="hidden" name="cart_price" value="${price}">`);
        })

        
        // quantity validation 
        $('.invd_qty_input').on('change', function() {
            let qty_val = $(this).val();
            if (qty_val <= 0) {
                $(this).val(1);
            }
            if (qty_val > 5) {
                $('#qalert').text('Max Quantity 5');
                $(this).val(5);
            } else {
                $('#qalert').text('');
            }

        })





        // cart submit 
        $('#cartBtn').click(function() {
            cartForm()
        })


        function cartForm() {
            $('#cartForm').submit(function(e) {
                e.preventDefault();
                let form = $('#cartForm').serialize();

                addtoCart(form, function callback(data) {
                    console.log(data);
                    if (data == 'success') {
                        // $('#alert').html(`<div class="alert alert-warning alert-dismissible fade show ps-5 pe-5 bg-success text-light" role="alert" style="font-size: 1.5rem;"><strong><i class='bx bxs-check-circle'></i></strong> Product added to Your cart<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                        // console.log('new function suceess');
                        window.location = './cart.php';
                    }
                    if (data == 'present') {
                        $('#alert').html(`<div class="alert alert-warning alert-dismissible fade show ps-5 pe-5 bg-danger text-light" role="alert" style="font-size: 1.5rem;"><strong><i class='bx bxs-error-circle'></i></strong> Product already in your cart<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                        console.log('new function present');
                    }


                });


            });

        }


        // $('#cartForm').on('submit', function (e) {
        //     e.preventDefault();
        //     let form = $(this).serialize();

        //     addtoCart(form, function callback(data){
        //         console.log(data);
        //         if (data == 'success') {
        //             $('#alert').html(`<div class="alert alert-warning alert-dismissible fade show ps-5 pe-5 bg-success text-light" role="alert" style="font-size: 1.5rem;"><strong><i class='bx bxs-check-circle'></i></strong> Product added to Your cart<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        //         }
        //         if (data == 'present') {
        //             $('#alert').html(`<div class="alert alert-warning alert-dismissible fade show ps-5 pe-5 bg-danger text-light" role="alert" style="font-size: 1.5rem;"><strong><i class='bx bxs-error-circle'></i></strong> Product already in your cart<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
        //         }


        //     });
        // })

        function addtoCart(Data, callback) {
            $.ajax({
                url: './controller/manage_cart.php',
                type: 'POST',
                data: Data,
                success: function(data) {
                    callback(data);
                }
            })
        }






        // fetchProduct("./admin/api/product.php", "17", function (data) {
        //     let arry = data = $.parseJSON(data)

        //     console.log(arry[0].name);
        //     $('#ProductTitle').html(arry[0].name)
        //     $('#prduct_brand').html(`By <a href="${arry[0].brand}" >${arry[0].brand}</a>`)
        //     $('#prduct_catg').html(`<a href="${arry[0].category}">${arry[0].category}</a>`)
        //     let attr = arry[0].attributes;
        //     attr = $.parseJSON(attr);
        //     console.log('attr type' ,typeof(attr));

        //     $.each(attr, function (key, val) {
        //         console.log('val: ', val);
        //         console.log(typeof(val));
        //         $.each(val, function (key, vald) {
        //             console.log('vald type' ,typeof(vald));
        //             let Aitem = vald;
        //             let item = $.parseJSON(Aitem)
        //             console.log(type(item));

        //         })
        //     })


        // })


        function fetchProduct(url, data, callback) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    sdata: data
                },
                success: function(data) {
                    // console.log(data);
                    callback(data);

                }
            })
        }






    })
</script>