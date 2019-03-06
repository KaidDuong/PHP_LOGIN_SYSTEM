$(document)
.on("submit","form.js-register", function(e) {
    e.preventDefault();
    
    var $form= $(this);
    var _error=$(".js-error",$form);

    var dataObj = {
        email: $("input[type='email']",$form).val(),
        password: $("input[type='password']",$form).val()
    };
    if(dataObj.email.length <6){
        _error
        .text("Please enter a valid email address")
        .show();
        return false;
    }else if(dataObj.password.length<11){
_error
.text("Please enter a passphrase tha is at  least 11 characters long.")
.show();
return false;

    }

    //Assuming the code gets this far. we can start the ajax process
_error.hide();

 $.ajax({
        type: 'POST',
        url: '../ajax/register.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data) {
        //whatever data is
        console.log(data);
        if(data.redirect!==undefined){
            window.location=data.redirect;
         
        }else if(data.error !== undefined)
        {
            _error
            .text(data.error)
            .show();
        }
    })
    .fail(function ajaxFailed(e) {
        //this failed
       
    })
    .always(function ajaxAlwaysDoThis(data) {
        //Always do
        console.log("Always");
    })
    return false;

});


//js-login

$(document)
.on("submit","form.js-login", function(e) {
    e.preventDefault();
    
    var $form= $(this);
    var _error=$(".js-error",$form);

    var dataObj = {
        email: $("input[type='email']",$form).val(),
        password: $("input[type='password']",$form).val()
    };
    if(dataObj.email.length <6){
        _error
        .text("Please enter a valid email address")
        .show();
        return false;
    }else if(dataObj.password.length<11){
_error
.text("Please enter a passphrase tha is at  least 11 characters long.")
.show();
return false;

    }

    //Assuming the code gets this far. we can start the ajax process
_error.hide();

 $.ajax({
        type: 'POST',
        url: '../ajax/login.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data) {
        //whatever data is
        console.log(data);
        
        if(data.redirect!==undefined){
            
            window.location=data.redirect;
         
        }else if(data.error !== undefined)
        {
            _error
            .html(data.error)
            .show();
        }
    })
    .fail(function ajaxFailed(e) {
        //this failed
       
    })
    .always(function ajaxAlwaysDoThis(data) {
        //Always do
        console.log("Always");
    })
    return false;

});