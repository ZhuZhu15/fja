$(document).ready(function(){


    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });


    $(".but").on("click", function() {
      var color = $(this).attr("data-id");
      $(this).closest('tr').children(".col-color").css("background", color);
    });


    $(".but").on("click", function() {
      var new_color = $(this).attr("data-id");
      var update_order = $(this).closest('tr').children(".order_number").text();
      $.post(
        "controllers/cartcontroller.php",
        {
          "update_order" : update_order,
          "new_color" : new_color,
        },
        function() {
          console.log('yspeh');
        }
        );
    });


    $(".but_name").on("click", function() {
      var perfomer = $(this).attr("data-id");
      $(this).closest('tr').children(".col-color").text(perfomer);
      var update_order2 = $(this).closest('tr').children(".order_number").text();
      $.post(
        "controllers/cartcontroller.php",
        {
          "perfomer" : perfomer,
          "update_order2" : update_order2,
        },
        function() {
          console.log('yspeh');
        }
        );
    });

  });