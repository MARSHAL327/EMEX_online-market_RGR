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

    $(".filter__item__title").on("click", function () {
        $(this).parent().toggleClass("active");
        console.log($(this).next());
        $(this).next().slideToggle();
    })

    registerModal.find("p").on("click", toggleAuthModal)
    loginModal.find("p").on("click", toggleAuthModal)

    $(".admin-controller__btn").on("click", function () {
        $(".admin-controller__panel").toggleClass("active");
    })

    $(".header__submenu").hover(function () {
        $(this).toggleClass("active");
    })

    jQuery.fn.lightTabs = function(options){

        var createTabs = function(){
            tabs = this;
            i = 0;

            showPage = function(i){
                $(tabs).children("div").children("div").hide();
                $(tabs).children("div").children("div").eq(i).show();
                $(tabs).children("ul").children("li").removeClass("active");
                $(tabs).children("ul").children("li").eq(i).addClass("active");
            }

            showPage(0);

            $(tabs).children("ul").children("li").each(function(index, element){
                $(element).attr("data-page", i);
                i++;
            });

            $(tabs).children("ul").children("li").click(function(){
                showPage(parseInt($(this).attr("data-page")));
            });
        };
        return this.each(createTabs);
    };

    $(".product__count-btn__add").on("click", function () {
        let input = $(this).prev();
        input.val(+(input.val()) + 1);
    })

    $(".product__count-btn__remove").on("click", function () {
        let input = $(this).next();
        if( input.val() > 1 )
            input.val(+(input.val()) - 1);
    })

    let filterData;

    function fillSessionStorage() {
        if( sessionStorage.getItem("filterData") == null ){
            return true;
        } else {
            filterData = JSON.parse(sessionStorage.getItem("filterData"))
            filterData.text.forEach(item => {
                $(`input[value='${item.value}']`).attr("checked", "checked")
            })
            filterAjax(filterData)
            return false;
        }
    }

    function createFilterData(){
        if( fillSessionStorage() ){
            filterData = {
                "_token": $("input[name='_token']").val(),
                "text": [],
                "number": []
            }

            $(".filter .filter__title_text").each(function () {
                let propName = $(this).children(".filter__item__title_name").text().trim()
                let newObj = {}

                newObj[propName] = []

                filterData.text.push(newObj)
            })

            return filterData
        }
    }

    createFilterData()


    function filterAjax(filterData){
        let url = new URL(window.location)

        $.ajax({
            type: "POST",
            data: filterData,
            dataType: "html",
            beforeSend: function() {
                $(".product-card__loader").addClass("active")
            },
            success: function(data){
                // $(".test").append(data);

                window.history.pushState('', '', url.origin + url.pathname)
                data = new DOMParser().parseFromString(data, "text/html")
                let html = $(data.querySelector(".product-card-wrapper"))
                $(".product-card-wrapper").replaceWith(html)
            },
            complete: function() {
                $(".product-card__loader").removeClass("active")
            }
        });
    }


    $(".filter .filter__input_text").on("change", function (e) {
        filterData = createFilterData()

        $(".filter .filter__input_text").each(function () {

            let propName = $(this).attr("name")
            let isChecked = $(this).prop("checked")
            let value = $(this).val()


            filterData.text.forEach(function (textInput) {
                for (let textInputName in textInput){
                    if( textInputName === propName && isChecked ){
                        let textInputValue = {
                            value: value,
                            status: isChecked
                        }

                        return textInput[textInputName].push(textInputValue)
                    }
                }
            })
        })


        // sessionStorage.setItem("filterData", JSON.stringify(filterData));
        filterAjax(filterData);
    })

    $(".filter .filter__item_number input").on("keyup", function (e) {
        let arrKeys = ["Backspace", "Enter"]

        if( (isNaN(+e.key) || isNaN(e.key)) && !arrKeys.includes(e.key) ) return
        filterData.number = []

        $(".filter .filter__item_number").each(function () {
            let first_el = $(this).find(".filter__input").eq(0)
            let second_el = $(this).find(".filter__input").eq(1)

            filterData.number.push({
                name: $(this).find(".filter__input_number").attr("name"),
                min:  +first_el.val(),
                max:  +second_el.val(),
            })
        })

        filterData.number = filterData.number.filter((item) => {
            let input = $(`.filter__input_number[name='${item.name}']`)
            let maxValue = +input.attr("max")

            if( item.max === 0 )
                item.max = maxValue

            if( item.min !== 0 || item.max !== maxValue ) return item
        })

        // sessionStorage.setItem("filterData", JSON.stringify(filterData));
        filterAjax(filterData);
    })

    $(document).on("click", ".product-card-wrapper .pagination li", function (e) {
        if( $(this).hasClass("active") ) return
        e.preventDefault()
        let url = $(this).children().attr("href")

        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            data: filterData,
            beforeSend: function() {
                $(".product-card__loader").addClass("active");
            },
            success: function(data){
                data = new DOMParser().parseFromString(data, "text/html")
                let html = $(data.querySelector(".product-card-wrapper"))
                $(".product-card-wrapper").replaceWith(html)
                window.history.pushState('', '', url);
            },
            error: function(data){
              swal({
                  "icon": "error",
                  "title": "Ошибка",
                  "text": "Ошибка при загрузке"
              })
                $(".test").append(data);
            },
            complete: function() {
                $(".product-card__loader").removeClass("active");
            }
        });
    })
});
