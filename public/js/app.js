// Delete User Button Action
$(document).on('click', '.delete-user-btn', function(event) {
  event.preventDefault();
  var self = $(this);
  swal({
      title: "Are you sure",
      text: "You will not be able to recover this resource",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it",
      closeOnConfirm: true,
      closeOnCancel: false
    },
    function(isConfirm){
        if(isConfirm){
            swal("Deleted","User deleted", "success");
            setTimeout(function() {
                self.parents(".delete_form_user").submit();
            }, 1000);
        }
        else{
            swal("Cancelled","Your user is safe", "error");
        }
    });
});
// Delete User Product Action
$(document).on('click', '.delete-product-btn', function(event) {
  event.preventDefault();
  var self = $(this);
  swal({
      title: "Are you sure",
      text: "You will not be able to recover this resource",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it",
      closeOnConfirm: true,
      closeOnCancel: false
    },
    function(isConfirm){
        if(isConfirm){
            swal("Deleted","Product deleted", "success");
            setTimeout(function() {
                self.parents(".delete_form_product").submit();
            }, 1000);
        }
        else{
            swal("Cancelled","Your product is safe", "error");
        }
    });
});
// Delete User Category Action
$(document).on('click', '.delete-category-btn', function(event) {
  event.preventDefault();
  var self = $(this);
  swal({
      title: "Are you sure",
      text: "You will not be able to recover this resource",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it",
      closeOnConfirm: true,
      closeOnCancel: false
    },
    function(isConfirm){
        if(isConfirm){
            swal("Deleted","Category deleted", "success");
            setTimeout(function() {
                self.parents(".delete_form_category").submit();
            }, 1000);
        }
        else{
            swal("Cancelled","Your category is safe", "error");
        }
    });
});
//  Selectize JS
$('.js-selectize-multiple').selectize({
    allowEmptyOption: true,
    sortField: 'text',
});
