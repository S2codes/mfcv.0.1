
$(document).ready(() => {

   
    
    // Add attributs 
    var attrItem = 1;
    $('#addAttribute').click( function () {
        if (attrItem <= 2) {
                $('#attrList').append(`<div class="row mb-3" class="attrItem" id="attrItem${attrItem}">
            <div class="col-md-12 col-12 mb-2">
                <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_w[]" placeholder="Weight">
            </div>
            <div class="col-md-6 col-12 mb-2">
                <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_mrp[]" placeholder="MRP">
            </div>
            <div class="col-md-6 col-12">
                <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_sell[]" placeholder="Selling Price">
            </div>
            <small class="mt-2 text-danger" style="cursor: pointer;" ><span class="removeA" data-item="${attrItem}">Remove Attribute <i class='bx bx-trash'></i></span></small>
        </div>`);

        attrItem++;
        }
 

    })

    // remove attribut
    $('#attrList').on('click', '.removeA', function(){
        let attrId = $(this).attr('data-item')
        $('#attrItem'+attrId).remove();
        attrItem--;
    })


    // add flavors 
    var flvId = 1;
    $('#addFlavor').click(function () {
        
            $('#flavorList').append(`<div id="flvItem${flvId}">
        <input type="text" class="form-control mb-2" id="prdct_stock" name="prdct_flv[]" placeholder="Flavor">
        <small class="mt-2 text-danger" style="cursor: pointer;">
            <span class="removeFlv" data-flv="${flvId}">Remove Flavor <i class='bx bx-trash'></i>
            </span>
        </small>
      </div>`);
      flvId ++;
        
    })


    // remove flavors 
     $('#flavorList').on('click', '.removeFlv', function () {
         let flvId = $(this).attr('data-flv');
         $('#flvItem'+flvId).remove();
     })






    //    discount generate 
    $('#prdct_mrp').on('change', () => {
        generatePrice()
    })
    $('#prdct_sell').on('change', () => {
        generatePrice()
    })

    function generatePrice() {
        var mrp = parseInt($('#prdct_mrp').val());
        var sell = parseInt($('#prdct_sell').val());

        if (mrp > sell) {
            discount = (mrp - sell);
            discount_persentage = (discount / mrp) * 100;
            discount_persentage = Math.round(discount_persentage);
            $('#prdct_off').val(discount_persentage.toString() + '%')
        }
        else {
            $('#prdct_off').val('');
        }

    }

    // add product 
  
    $('#uploadProduct').on('submit', (e) => {
        e.preventDefault();
        var formData = new FormData(document.getElementById('uploadProduct'));
        
        $.ajax({
            
            url: './controller/manage_product.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                alert('suceess');
                console.log(data);
                // window.location= './products.php';
            }

        })


    })

    // update product 
    $('#prdct_update').click(function (e) {
        e.preventDefault();
        // let updateData = $('#uploadProduct').serialize();
        var updateData = new FormData(document.getElementById('uploadProduct'));
        // console.log(fromData);


        $.ajax({
            url: './controller/update_product.php',
            type: 'POST',
            data: updateData,
            contentType: false,
            processData: false,
            success: function (data) {
                alert('suceess');
                console.log(data);
                // window.location= './products.php';
            }

        })

    })

    // delete product 
    $('#prdct_remove').click(function (e) {
        e.preventDefault();
        // let updateData = $('#uploadProduct').serialize();
        var id = $('#prdct_id').val();
        $.ajax({
            url: './controller/delete_product.php',
            type: 'POST',
            data: {prdct_id : id},
            // contentType: false,
            // processData: false,
            success: function (data) {
                alert('suceess');
                // console.log(data);
                // window.location= './products.php';
            }

        })

    })






})
