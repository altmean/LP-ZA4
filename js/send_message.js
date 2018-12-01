$(function() {
  $("#loader").hide();
  // from = send_msg_form а то цеплялся скрипт
  $("#send_msg_form").submit(function(e) { 

        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();

        var data = 'name=' + name + '&email=' + email + '&message=' + message;
    
        if(data) {
            $.ajax({
                type: "POST",
                url: "./send.php",
                data: data,
                beforeSend: function(html) {
          $("#loader").show();
          $("#submit").hide();
               },
               success: function(html){
          $("#loader").hide();   
          $("form").find('input[type=text], textarea').val(''); // очистка формы после отправки       
          $("form").find('input[type=email], textarea').val(''); // очистка формы после отправки       
          window.location = 'http://procybersec.info/#win1';
          $("#result").html(html);
          $("#submit").show(); // Показать кнопку

              }
            });
        }
        
        return false;
    });
});