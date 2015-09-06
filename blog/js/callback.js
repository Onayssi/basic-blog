/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function tpl_login(url){
    $('#btnlogsb').prop('disabled', true);
    $.post( "callback/login.php", $( "#tploginform" ).serialize(), function( data ) {
      var response = jQuery.parseJSON(data);
      if(response.error==='true' || response.logged==='failure'){
          $(".tpl_alerterror").addClass("alert alert-danger").html("Invalid Email / Password! Please try again.");
          $('#btnlogsb').removeAttr('disabled');
          $("#inputEmail").val(''); 
          $("#inputPassword").val('');
          return false;
      }else{
         $(".tpl_alerterror").removeClass("alert-danger").addClass("alert alert-success").html('Successfully logged. Redirect...');
         window.setTimeout('tpl_redirect_home("'+url+'")',900);
         // not necessary
         return true;
      }
});
return false;
}

function tpl_register(url){
    var password = $("#inputPassword").val();
    var confirmpassword = $("#inputRePassword").val();
    if(password.length<6){
    $(".tpl_alerterror").addClass("alert alert-danger").html("The Password length should be at leat 6 characters! Please provide another one.");       
    }else if(password!==confirmpassword){
     $(".tpl_alerterror").addClass("alert alert-danger").html("The Password is not confirmed! Please try again.");   
 }else if(containsWhiteSpace(password)){
     $(".tpl_alerterror").addClass("alert alert-danger").html("The Password should not contain a white space! Please adjust it.");   
    }else{
    $('#btnregistersb').prop('disabled', true);
    $.post( "callback/register.php", $( "#tpregisterform" ).serialize(), function( data ) {
      var response = jQuery.parseJSON(data);
      if(response.error==='true' || response.logged==='failure'){
          $(".tpl_alerterror").addClass("alert alert-danger").html("Email address already exist! Please, provide another one.");
          $('#btnregistersb').removeAttr('disabled');
          $("#inputEmail").val(''); 
          $("#inputPassword").val('');
          $("#inputRePassword").val('');
          return false;
      }else{
         $(".tpl_alerterror").removeClass("alert-danger").addClass("alert alert-success").html('Successfully registered. Redirect...');
         window.setTimeout('tpl_redirect_home("'+url+'")',900);
         // not necessary
         return true;
      }
});
    }
return false;    
}

function tpl_addPost(url){
    var textarea_bodypost = escapeHtml($('.summernote').code());
    if(textarea_bodypost==="" || textarea_bodypost==="<p><br></p>"){
        alert("Please, Provide a Post Body");
    }else{
    $('#btnpostcrupdt').prop('disabled', true);
    try{
    $.post( "callback/submit-post.php", {posttitle: $("#posttitle").val(), postbody: textarea_bodypost, actiontype: $("#currpid").val()}, function( data ) {
      var response = jQuery.parseJSON(data);
      if(response.error==='true' || response.posted==='failure' || response.posted==='denied'){
          if(response.posted==='denied'){
            $(".tpl_alerterror").addClass("alert alert-danger").html("Error Occured! You are not the owner of this post. Please, edit your own posts only.");              
          }else{
            $(".tpl_alerterror").addClass("alert alert-danger").html("Error Occured! Post already exist with the same title. Please, try again.");              
          }        
          $('#btnpostcrupdt').removeAttr('disabled');
          return false;
      }else{
         $(".tpl_alerterror").removeClass("alert-danger").addClass("alert alert-success").html('The operation has been done Successfully. Redirecting...');
         $('#btnpostcrupdt').removeAttr('disabled');
         window.setTimeout('tpl_redirect_home("'+url+'")',600);
         return true;
      }
}); 
    }catch(e){alert(e.message)}
    }
return false;
}

function tpl_cancelDeletePost(record){
    $('button.intbtnpco').prop('disabled', true);
    $(".loader-wait").show();
    $.get("callback/delete-post.php?id="+record, function( data ) {
      var response = jQuery.parseJSON(data);
      if(response.error==='true'){ 
          $('button.intbtnpco').removeAttr('disabled'); 
          $(".loader-wait").hide();
          return false;
      }else{
         $(".loader-wait").hide();        
         $('#popupModalDEL').modal('toggle');
         window.setTimeout('tpl_reload_page()',600);
         // not necessary
         return true;
      }
});    
return false;
}

function tpl_redirect_home(url){
    window.location.href = url;
}

function tpl_reload_page(){
    window.location.reload();
}

function containsWhiteSpace(s) {
  return /\s/g.test(s);
}

var entityMap = {
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    '"': '&quot;',
    "'": '&#39;',
    "/": '&#x2F;'
  };

  function escapeHtml(string) {
    return String(string).replace(/[&<>"'\/]/g, function (s) {
      return entityMap[s];
    });
  }