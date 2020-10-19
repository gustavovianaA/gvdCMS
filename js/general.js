   $(function(){
   //contact form  
      $('#form_msg_client_send').click(function(){
      let name = $("#form_msg_client #contact-name").val();
      let phone = $("#form_msg_client #contact-phone").val();
      let msg = $("#form_msg_client #contact-msg").val();
      let mail = $("#form_msg_client #contact-mail").val();
      if(name.trim() != '' && phone.trim() != '' && msg.trim() != '' && mail.trim() != ''){
        $("#form_msg_client_feedback").html("Mensagem Enviada! Obrigado.");
        $.ajax({
            type: 'POST',
            //url: 'phpmailer/sendmail.php',  
            url: 'admin/saveClient.php',              
            data: {name:name,phone:phone,mail:mail,msg:msg,fromSite:true},
        })
      }   
      else{
         $("#form_msg_client_feedback").html("Preencha todos os campos.");
      }
      });
    });