$(document).ready(() => {
    // console.log('hello shop');


    //  category filter 
    $('.catgId').click(function(){
        console.log('catgclieked');
        var val = $(this).attr("data-val");
        console.log(val);
    })
   
    //  brand filter 
    $('.brandId').click(function(){
        console.log('Brand clieked');
        var val = $(this).attr("data-val");
        console.log(val);
    })
   
  
  


    // fetch categories
    // fetchHttpData('./admin/api/products.php', {apiKey: 123}, function (data) {
    //   $.each(data, function(key, val){

    //     let attr = val.attributes;
    //     let b = JSON.parse(attr);
    //     let mrp = b[0][1];
    //     let sell = b[0][2];
    //     console.log('Mrp ',b[0][1]);
    //     console.log('sell',b[0][2]);


    //         $('#loadProducts').append(
    //         `<div class="col-md-4 col-6 aboutImg p-1 mb-3">
    //         <div class="productCard ">
    //           <a href="product-details.php?querry=${val.id}">
    //             <img src="admin/${val.featureImg}" alt="" class="productImg">
    //           </a>
    //           <div class="productDetails">
    //             <a href="product-details.php?category=${val.category}">
    //               <small class="productBrand">${val.category}</small>
    //             </a>
    //             <a href="product-details.php?querry=${val.id}">
    //               <p class="productName">${val.name}</p>
    //             </a>
    //             <p class="productPrice ">${sell} ₹ <strike class="price-cut">${mrp} ₹</strike></p>


    //             <div class="d-flex justify-content-between align-items-center mt-3">
    //             <div>
    //               <a href = "product-details.php?querry=${val.id}" class="btn btn-sm btn-primary cartBtn m-0" title="Add to Cart"><i
    //                   class='bx bx-cart-add'></i></a>
    //             </div>
    //             <div>
    //               <a href= "product-details.php?querry=${val.id}" class="btn btn-sm btn-primary cartBtn m-0" title="Buy Now">Buy Now</a>
    //               </div>
    //             </div>
    //           </div>
    //         </div>
    //       </div>`)
             
    //     })
    //   });


      
     


    
      function fetchHttpData(url, data, callback) {
        // console.log('frtching product');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            contentType : "JSON",

            success: function (data) {
                data = $.parseJSON(data)
                callback(data);
                
            }


        })
    }




   


})