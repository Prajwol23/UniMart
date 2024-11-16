$(document).ready(function() {
    // For incrementing the product quantity when clicked +
    $(document).on('click','.increment-btn',function (e) {

        e.preventDefault();
        
        // Find the closest `.product-data` container and the input field within it
        var qtyInput = $(this).closest('.product-data').find('.input-qty');
        var currentQty = parseInt(qtyInput.val(), 10);
        currentQty = isNaN(currentQty) ? 0 : currentQty;

        if (currentQty < 10) {
            qtyInput.val(currentQty + 1);
        }
    });

    // For decrementing the product quantity when clicked -
    $(document).on('click','.decrement-btn',function (e) {

        e.preventDefault();
        
        // Find the closest `.product-data` container and the input field within it
        var qtyInput = $(this).closest('.product-data').find('.input-qty');
        var currentQty = parseInt(qtyInput.val(), 10);
        currentQty = isNaN(currentQty) ? 0 : currentQty;

        if (currentQty > 1) {
            qtyInput.val(currentQty - 1);
        }
    });


    //jqury to insert into carts table when user clicks add to cart
    $(document).on('click','.addToCartBtn',function (e) {
      e.preventDefault();
      var qty = $(this).closest('.product-data').find('.input-qty').val();
      var prod_id = $(this).val();

      $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data: {
            "prod_id" : prod_id,
            "prod_qty" : qty,
            "scope" : "add"
        },
        success: function (response) {
            console.log(response)
            if(response == 201)
            {
                alertify.success('Product added to cart.');
            }

            else if(response == "existing")
                {
                alertify.success('Product already added in cart.'); 
                }

            else if(response == 401)
                {
                alertify.success('Login to continue.'); 
                }
            
                else if(response == 500)
                    {
                    alertify.success('Something went wrong.'); 
                    }
            
        }
      });
    });

    //jquery to update quantity in database when clicked + - from cart
    $(document).on('click','.updateQty',function (e) {
        var qty = $(this).closest('.product-data').find('.input-qty').val();

        var prod_id = $(this).closest('.product-data').find('.prodId').val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id" : prod_id,
                "prod_qty" : qty,
                "scope" : "update"
            },
            success: function (response) {
                // alert(response);
                
            }
        });
    });

    //jquery to delete product from cart
    $(document).on('click','.deleteItem', function (e) {
        var cart_id = $(this).val();
        // alert(cart_id);

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id" : cart_id,
                "scope" : "delete"
            },
            success: function (response) {
                if(response == 200)
                    {
                        alertify.success('Item deleted successfully.');
                        $('#mycart').load(location.href + " #mycart");
                    }

                else
                {
                    alertify.success(response);
                }
            }
        });
    });

});

