$(function(){
    $("#header").load("../Users/header");  
  });

//REGISTRATION AJAX CALL 
$('form.register').on('submit',function(){
    var formData = {
        'name':$('input[name=username]').val(),
        'email' : $('input[name=email]').val(),
        'password' : $('input[name=password]').val()
    };
    $.ajax({
        type: 'POST',
        url:  $form.attr('action'),
        data:formData,
        dataType:'json'
    });
    event.preventDefault();
});

//LOGIN AJAX CALL
$('form.login').on('submit',function(){
    var formData = {
        'email' : $('input[name=email]').val(),
        'password' : $('input[name=password]').val()
    };
    $.ajax({
        type: 'POST',
        url:  $form.attr('action'),
        data:formData,
        dataType:'json'    
    });
    
    event.preventDefault();
});

//DETAILS SUBMIT AJAX CALL
$('form.getdetail').on('submit',function(){
    var formData = {
        'fname' : $('input[name=fname]').val(),
        'lname' : $('input[name=lname]').val(),
        'email' : $('input[name=email]').val(),
        'cname' : $('input[name=cname]').val(),
        'designation' : $('input[name=designation]').val(),
        'salary' : $('input[name=salary]').val(),
        'phno' : $('input[name=phno]').val(),
    };
    $.ajax({
        type: 'POST',
        url:  $form.attr('action'),
        data:formData,
        dataType:'json'    
    });    
    
    event.preventDefault();
});

//DISPLAY
$("#display").on('click',function(){
    var XHR = new XMLHttpRequest();
    XHR.onreadystatechange = ()=>{
    if(XHR.readyState == 4 && XHR.status == 200){
        var response = JSON.parse(XHR.responseText);
                document.getElementById("firstname").textContent=response[response.length-1].firstname;
                document.getElementById("lastname").textContent=response[response.length-1].lastname;
                document.getElementById("email").textContent=response[response.length-1].email;
                document.getElementById("companyname").textContent=response[response.length-1].companyname;
                document.getElementById("designation").textContent=response[response.length-1].designation;
                document.getElementById("salary").textContent=response[response.length-1].salary;
                document.getElementById("phno").textContent=response[response.length-1].phno;
    }
}
XHR.open("GET","../app/views/userdetails.json");
XHR.send();
});

