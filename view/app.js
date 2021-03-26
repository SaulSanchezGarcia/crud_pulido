
function viewLogin(){
    setTimeout("location.href='../view/login.php'", 40);
}

function login(){
    let user_name = $("#user_name").val();
    let password = $("#password").val();

    let userName_validation = /^[A-z 0-9]+$/i;

    if(user_name == "" || password == ""){
        alert("Please fill all fields");
    }else{
        if(userName_validation.test(user_name) && userName_validation.test(password)){

            $.ajax({
                url: "../controller/controller.php?accion=login",
                type: "post",
                data: {user_name:user_name,password:password},
                dataType: "JSON",
                success: function(res){
                    if(res.insert){
                        alert(res.mensaje);
                        $("#user_name").val("");
                        $("#password").val("");
                        setTimeout("location.href='../view/admView.php'", 40);

                    }else if(res.insert){
                        alert(res.mensaje);
                        $("#user_name").val("");
                        $("#password").val("");
                    }else{
                        alert(res.mensaje);
                        $("#user_name").val("");
                        $("#password").val("");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }else{
            alert("Please check if your user_name and password only have letters and numbers");
            $("#user_name").val("");
            $("#password").val("");
        }
    }
}

function insertCustomer(){
    let name = $("#name").val();
    let last_name = $("#last_name").val();
    let email = $("#email").val();
    let zip = $("#zip").val();
    let phone = $("#phone").val();

    let name_Validation = /[A-z]/i;
    let email_Validation = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    let zip_Validation = /^((\d{3})|(\d{4}))$/;
    let phone_Validation = /^((\d{10})|(\d{13}))$/;

    if(name == "" || last_name == "" || email == "" || zip == "" || phone == ""){
        alert("Please fill all fields");
    }else{
        if(name_Validation.test(name) && name_Validation.test(last_name)){
            if(email_Validation.test(email)){
                if(zip_Validation.test(zip)){
                    if(phone_Validation.test(phone)){

                        $.ajax({
                            url: "../controller/controller.php?accion=insert",
                            type: "post",
                            data: {name:name,last_name:last_name,email:email,zip:zip,phone:phone},
                            dataType: "JSON",
                            success: function(res){
                                if(res.insert){
                                    alert(res.mensaje);
                                    $("#name").val("");
                                    $("#last_name").val("");
                                    $("#email").val("");
                                    $("#zip").val("");
                                    $("#phone").val("");

                                    $("#tbody").load(" #tbody");
                                        
                                    
                                    // $("#tbodyCustomer").load("./view/insertC.php");
                                    // $("#tbodyCustomer").load(" #tbodyCustomer");
                                }else{
                                    alert(res.mensaje);
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                console.log(jqXHR, textStatus, errorThrown);
                            }
                        });

                    }else{
                        alert("Please check if your phone is correct");
                    }
                }else{
                    alert("Please check if your zip is correct");
                }
            }else{
                alert("Please check if your email is correct");
            }
        }else{
            alert("The name and last name can only have letters");
        }
    }
}

function remove(idC){
    $.ajax({
        url: "../controller/controller.php?accion=delete",
        type: "post",
        data: {idC:idC},
        dataType: "JSON",
        success: function(res){
            if(res.delete){
                alert(res.mensaje);
                $("#tbody").load(" #tbody");
            }else{
                alert(res.mensaje);
            }
         
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR, textStatus, errorThrown);
        }
    });
}

function modalData(data){
    let d = data.split('||');
    console.log(d[1]);
    $("#idCModal").val(d[0]);
    $("#nameModal").val(d[1]);
    $("#last_nameModal").val(d[2]);
    $("#emailModal").val(d[3]);
    $("#zipModal").val(d[4]);
    $("#phoneModal").val(d[5]);

}

function updateCustomer(){
    let idCModal = $("#idCModal").val();
    let nameModal = $("#nameModal").val();
    let last_nameModal = $("#last_nameModal").val();
    let emailModal = $("#emailModal").val();
    let zipModal = $("#zipModal").val();
    let phoneModal = $("#phoneModal").val();

    let name_Validation = /[A-z]/i;
    let email_Validation = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    let zip_Validation = /^((\d{3})|(\d{4}))$/;
    let phone_Validation = /^((\d{10})|(\d{13}))$/;

    if(nameModal == "" || last_nameModal == "" || emailModal == "" || zipModal == "" || phoneModal == ""){
        alert("Please fill all fields");
    }else{
        if(name_Validation.test(nameModal) && name_Validation.test(last_nameModal)){
            if(email_Validation.test(emailModal)){
                if(zip_Validation.test(zipModal)){
                    if(phone_Validation.test(phoneModal)){

                        $.ajax({
                            url: "../controller/controller.php?accion=update",
                            type: "post",
                            data: {idCModal:idCModal, nameModal:nameModal,last_nameModal:last_nameModal,emailModal:emailModal,zipModal:zipModal,phoneModal:phoneModal},
                            dataType: "JSON",
                            success: function(res){
                                if(res.update){
                                    alert(res.mensaje);
                                    $("#nameModal").val("");
                                    $("#last_nameModal").val("");
                                    $("#emailModal").val("");
                                    $("#zipModal").val("");
                                    $("#phoneModal").val("");

                                    $("#tbody").load(" #tbody");
                                        
                                }else{
                                    alert(res.mensaje);
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                console.log(jqXHR, textStatus, errorThrown);
                            }
                        });

                    }else{
                        alert("Please check if your phone is correct");
                    }
                }else{
                    alert("Please check if your zip is correct");
                }
            }else{
                alert("Please check if your email is correct");
            }
        }else{
            alert("The name and last name can only have letters");
        }
    }
}
