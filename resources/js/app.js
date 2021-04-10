require('./bootstrap');

$(document).ready(function () {
    let lang = $(".lang-change");
    let registerModal = $(".register-modal");
    let loginModal = $(".login-modal");
    let blackBg = $(".black-bg");
    let mainForm = $(".main-form");

    function errorAjax(result){
        let errors = result["responseJSON"]["errors"];
        let keys = Object.keys(errors);
        let firstError = errors[keys[0]][0];
        swal({
            title: "Ошибка",
            text: firstError,
            icon: "error",
        });
    }

    function successAjax(res){
        swal({
            title: res.title,
            text: res.text,
            icon: res.icon,
        }).then(() => {
            if( res.icon !== "error" ) window.location.replace("");
        });
    }

    function formattingFormData(_this) {
        let formData = new FormData(_this[0]);
        let error = [];
        let supportedFormatsImg = ["image/png", "image/jpg", "image/jpeg"];

        formData.forEach((item, i) => {
            if( typeof item === "object" ){
                if( supportedFormatsImg.includes(item.type)  ){
                    formData.set(i.toString(), item.name);
                } else {
                    error.push("Неверный формат файла");
                }
            }
        })

        if( error.length > 0 ){
            swal({
                title: "Ошибка",
                text: error[0],
                icon: "error",
            });
            return false;
        } else return formData;
    }

    function sendAjax(_this, errorFoo, successFoo){
        let formData = formattingFormData(_this);
        if( formData === false ) return;

        $.ajax({
            type: _this.attr('method'),
            url: _this.attr('action'),
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                _this.find(".main-btn").prop("disabled", true);
            },
            statusCode: {
                422: errorFoo,
                200: successFoo
            },
            complete: function() {
                _this.find(".main-btn").prop("disabled", false);
            }
        });
    }

    function toggleAuthModal(){
        registerModal.toggleClass("active");
        loginModal.toggleClass('active');
    }

    lang.on("click", function () {
        $(this).toggleClass("active");
    })

    $(".auth").on("click", function () {
        loginModal.addClass("active");
        blackBg.addClass("active");
    });

    blackBg.on("click", function () {
        $(this).removeClass("active");
        loginModal.removeClass("active");
        registerModal.removeClass("active");
    })

    $("input, textarea").on("focus", function () {
        $(this).parent().toggleClass("active");
    })

    $("input, textarea").on("blur", function () {
        $(this).parent().toggleClass("active");
    })

    mainForm.on("submit", function (event) {
        event.preventDefault();
        sendAjax($(this), errorAjax, successAjax);
    })

    registerModal.find("p").on("click", toggleAuthModal)
    loginModal.find("p").on("click", toggleAuthModal)

    $(".admin-controller__btn").on("click", function () {
        $(".admin-controller__panel").toggleClass("active");
    })

    $(".header__submenu").hover(function () {
        $(this).toggleClass("active");
    })
});
