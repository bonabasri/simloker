$(document).ready(function(){
  $("#logout").click(function(){
    swal({
        title: "Log Out", 
        text: "Goodbye, Admin. Are you sure to logout from aplication?", 
        type: "warning", 
        showCancelButton: true, 
        confirmButtonColor: "#DD6B55", 
        confirmButtonText: "Log Out", 
        closeOnConfirm: true 
      },
      function(){
          $.ajax({
                type: "POST",
                url: "logout.php",
                success: function(result) {
                  location.reload();
                },
                async:false
              });
      });
  });
});