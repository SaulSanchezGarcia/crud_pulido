function viewLogin(){
    setTimeout("location.href='../view/login.php'", 40);
}

function backAdm(){
    setTimeout("location.href='../view/admView.php'", 40);
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

//EMPLOYEE
function insertEmployee(){
    let name = $("#name").val();
    let last_name = $("#last_name").val();
    let user_name = $("#user_name").val();
    let password = $("#password").val();

    let userName_validation = /^[A-z 0-9]+$/i;

    if(name == "" || last_name == "" || user_name == "" || password == ""){
        alert("Please fill all fields");
    }else{
        if(userName_validation.test(name) && userName_validation.test(last_name) && userName_validation.test(user_name) && userName_validation.test(password)){
            $.ajax({
                url: "../controller/controller.php?accion=insertEmployee",
                type: "post",
                data: {name:name,last_name:last_name,user_name:user_name,password:password},
                dataType: "JSON",
                success: function(res){
                    if(res.insert){
                        alert(res.mensaje);
                        $("#name").val("");
                        $("#last_name").val("");
                        $("#user_name").val("");
                        $("#password").val("");

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
            alert("The name and last name can only have letters");
        }
    }
}

function removeEmployee(idE){
    $.ajax({
        url: "../controller/controller.php?accion=deleteEmployee",
        type: "post",
        data: {idE:idE},
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

function modalDataEmp(dataEmp){
    let dE = dataEmp.split('||');
    console.log(dE);
    $("#idEModal").val(dE[0]);
    $("#nameModal").val(dE[1]);
    $("#last_nameModal").val(dE[2]);
    $("#user_nameModal").val(dE[3]);
    $("#passwordModal").val(dE[4]);

}

function updateEmployee(){
    let idEModal = $("#idEModal").val();
    let nameModal = $("#nameModal").val();
    let last_nameModal = $("#last_nameModal").val();
    let user_nameModal = $("#user_nameModal").val();
    let passwordModal = $("#passwordModal").val();

    let userName_validation = /^[A-z 0-9]+$/i;


    if(nameModal == "" || last_nameModal == "" || user_nameModal == "" || passwordModal == ""){
        alert("Please fill all fields");
    }else{
        if(userName_validation.test(nameModal) && userName_validation.test(last_nameModal) && userName_validation.test(user_nameModal) && userName_validation.test(passwordModal)){

            $.ajax({
                url: "../controller/controller.php?accion=updateEmployee",
                type: "post",
                data: {idEModal:idEModal, nameModal:nameModal, last_nameModal:last_nameModal, user_nameModal:user_nameModal, passwordModal:passwordModal},
                dataType: "JSON",
                success: function(res){
                    if(res.update){
                        alert(res.mensaje);
                        $("#nameModal").val("");
                        $("#last_nameModal").val("");
                        $("#user_nameModal").val("");
                        $("#passwordModal").val("");

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
            alert("The name and last name can only have letters");
        }
    }
}

//PRODUCTS
function insertProduct(){
    let model = $("#model").val();
    let brand = $("#brand").val();
    let player = $("#player").val();
    let price = $("#price").val();

    let validation = /^[A-z 0-9]+$/i;

    if(model == "" || brand == "" || player == "" || price == ""){
        alert("Please fill all fields");
    }else{
        if(validation.test(model) && validation.test(brand) && validation.test(player) && validation.test(price)){
            $.ajax({
                url: "../controller/controller.php?accion=insertProduct",
                type: "post",
                data: {model:model, brand:brand, player:player, price:price},
                dataType: "JSON",
                success: function(res){
                    if(res.insert){
                        alert(res.mensaje);
                        $("#model").val("");
                        $("#brand").val("");
                        $("#player").val("");
                        $("#price").val("");

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
            alert("Something is wrong or something is missing...");
        }
    }
}

function removeProduct(idP){
    // alert("Hola");
    $.ajax({
        url: "../controller/controller.php?accion=deleteProduct",
        type: "post",
        data: {idP:idP},
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

function modalDataProd(dataProd){
    let dP = dataProd.split('||');
    console.log(dP);
    $("#idPModal").val(dP[0]);
    $("#modelModal").val(dP[1]);
    $("#brandModal").val(dP[2]);
    $("#playerModal").val(dP[3]);
    $("#priceModal").val(dP[4]);

}

function updateProduct(){
    let idPModal = $("#idPModal").val();
    let modelModal = $("#modelModal").val();
    let brandModal = $("#brandModal").val();
    let playerModal = $("#playerModal").val();
    let priceModal = $("#priceModal").val();

    let userName_validation = /^[A-z 0-9]+$/i;


    if(modelModal == "" || brandModal == "" || playerModal == "" || priceModal == ""){
        alert("Please fill all fields");
    }else{
        if(userName_validation.test(modelModal) && userName_validation.test(brandModal) && userName_validation.test(playerModal) && userName_validation.test(priceModal)){

            $.ajax({
                url: "../controller/controller.php?accion=updateProduct",
                type: "post",
                data: {idPModal:idPModal, modelModal:modelModal, brandModal:brandModal, playerModal:playerModal, priceModal:priceModal},
                dataType: "JSON",
                success: function(res){
                    if(res.update){
                        alert(res.mensaje);
                        $("#modelModal").val("");
                        $("#brandModal").val("");
                        $("#playerModal").val("");
                        $("#priceModal").val("");

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
            alert("The name and last name can only have letters");
        }
    }
}

let addCard = document.querySelector(".addCard");

addCard.addEventListener("click", addToCard);

function addToCard(evt){
    // alert("hola a todos")
    let boton = evt.target;
    let itemContainer = boton.closest(".itemContainer");
    let items = itemContainer.querySelector(".items");
    let itemImg = itemContainer.querySelector(".itemImg").textContent;
    let itemModel = itemContainer.querySelector(".itemModel").textContent;
    let itemBrand = itemContainer.querySelector(".itemBrand").textContent;
    let itemPlayer = itemContainer.querySelector(".itemPlayer").textContent;
    let itemPrice = itemContainer.querySelector(".itemPrice").textContent;
    // console.log(itemImg, itemModel, itemBrand, itemPlayer, itemPrice);

    console.log(itemImg, itemModel, itemBrand, itemPlayer, itemPrice);
    addItemToCard(itemImg, itemModel, itemBrand, itemPlayer, itemPrice);
}

function addItemToCard(itemImg, itemModel, itemBrand, itemPlayer, itemPrice){
    console.log(itemModel);
    let tablebody = document.querySelector(".tablebody");
    let containerRow = document.createElement("div");
    let addToCartHtml = `<tr><td><img src="${itemImg}"></td>
                        <td>${itemModel}</td>
                        <td>${itemBrand}</td>
                        <td>${itemPlayer}</td>
                        <td>${itemPrice}</td>
                        <td><button type="button" class="btn btn-danger">X</button></td></tr>`;

    containerRow.innerHTML = addToCartHtml;
    tablebody.append(containerRow);
}