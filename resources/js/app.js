require('./bootstrap');

function errorAjax(result) {
    let errors = result["responseJSON"]["errors"];
    let keys = Object.keys(errors);
    let firstError = errors[keys[0]][0];
    swal({
        title: "Ошибка",
        text: firstError,
        icon: "error",
    });
}

function successAjax(res) {
    swal({
        title: res.title,
        text: res.text,
        icon: res.icon,
    }).then(() => {
        // if (res.icon !== "error") window.location.replace("");
    });
}

function formattingFormData(_this) {
    let formData = new FormData(_this[0]);
    let error = [];
    let supportedFormatsImg = ["image/png", "image/jpg", "image/jpeg"];

    formData.forEach((item, i) => {
        if (typeof item === "object") {
            if (supportedFormatsImg.includes(item.type)) {
                formData.set(i.toString(), item.name);
            } else {
                error.push("Неверный формат файла");
            }
        }
    })

    if (error.length > 0) {
        swal({
            title: "Ошибка",
            text: error[0],
            icon: "error",
        });
        return false;
    } else return formData;
}

function completeAjax(data) {
    console.log(data)
}

function sendAjax(_this, errorFoo, successFoo, completeFoo = "") {
    let formData = formattingFormData(_this);
    if (formData === false) return;

    $.ajax({
        type: _this.attr('method'),
        url: _this.attr('action'),
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            _this.find(".main-btn").prop("disabled", true);
        },
        statusCode: {
            422: errorFoo,
            200: successFoo
        },
        complete: function (data) {
            if( completeFoo !== "" ) completeFoo(data)
            _this.find(".main-btn").prop("disabled", false);
        }
    });
}

function toggleAuthModal() {
    registerModal.toggleClass("active");
    loginModal.toggleClass('active');
}

function fillSessionStorage() {
    if (sessionStorage.getItem("filterData") == null) {
        return true;
    } else {
        filterData = JSON.parse(sessionStorage.getItem("filterData"))

        if( filterData.filterPage === window.location.pathname ){
            filterData.inputs.forEach(propID => {
                for (let propName in propID){
                    if( propID.hasOwnProperty(propName) ){
                        propID[propName].forEach(propValue => {
                            if( propValue.value !== undefined ){
                                $(`input[value='${propValue.value}']`).attr("checked", "checked")
                            } else {
                                let input = $(`input[name='${propName}']`)
                                let min = input.eq(0)
                                let max = input.eq(1)

                                if( +min.attr("min") !== propValue.min ) min.val(propValue.min)
                                if( +max.attr("max") !== propValue.max ) max.val(propValue.max)
                            }
                        })
                    }
                }
            })

            filterAjax(filterData)
            return false;
        } else {
            sessionStorage.removeItem("filterData")
            return true;
        }


    }
}

function createFilterData() {
    filterData = {
        "_token": $("input[name='_token']").val(),
        "filterPage": window.location.pathname,
        "inputs": []
    }

    $(".filter .filter__item__title_name").each(function () {
        let propName = $(this).text().trim()
        let newObj = {}

        newObj[propName] = []

        filterData.inputs.push(newObj)
    })

    return filterData
}

function filterAjax(filterData) {
    let url = new URL(window.location)

    $.ajax({
        type: "POST",
        data: filterData,
        dataType: "html",
        beforeSend: function () {
            $(".product-card__loader").addClass("active")
        },
        success: function (data) {
            window.history.pushState('', '', url.origin + url.pathname)
            data = new DOMParser().parseFromString(data, "text/html")
            let html = $(data.querySelector(".product-card-wrapper"))
            $(".product-card-wrapper").replaceWith(html)
        },
        complete: function () {
            $(".product-card__loader").removeClass("active")
        }
    });
}

function fillTextFilterData() {
    $(".filter .filter__input").each(function () {
        let propName = $(this).attr("name")
        let isChecked = $(this).prop("checked")
        let value = $(this).val()

        filterData.inputs.forEach(function (textInput) {
            for (let textInputName in textInput) {
                if (textInputName === propName && isChecked) {
                    let textInputValue = {
                        value: value,
                        status: isChecked
                    }
                    return textInput[textInputName].push(textInputValue)
                }
            }
        })
    })
}

function fillNumberFilterData(){
    $(".filter .filter__item_number").each(function () {
        let minEl = $(this).find(".filter__input").eq(0).val()
        let maxEl = $(this).find(".filter__input").eq(1).val()
        let thisPropName = $(this).data("prop-name")
        let thisPropID = $(this).data("prop-id")

        if (minEl !== "" || maxEl !== "") {
            if( maxEl === "" ) maxEl = $(this).find(".filter__input").attr("max")
            if( minEl === "" ) minEl = 0

            filterData.inputs[thisPropID][thisPropName].push({
                min: +minEl,
                max: +maxEl,
            })
        }
    })
}

$(document).ready(function () {
    let lang = $(".lang-change");
    let registerModal = $(".register-modal");
    let loginModal = $(".login-modal");
    let blackBg = $(".black-bg");
    let mainForm = $(".main-form");

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

    jQuery.fn.lightTabs = function (options) {

        var createTabs = function () {
            tabs = this;
            i = 0;

            showPage = function (i) {
                $(tabs).children("div").children("div").hide();
                $(tabs).children("div").children("div").eq(i).show();
                $(tabs).children("ul").children("li").removeClass("active");
                $(tabs).children("ul").children("li").eq(i).addClass("active");
            }

            showPage(0);

            $(tabs).children("ul").children("li").each(function (index, element) {
                $(element).attr("data-page", i);
                i++;
            });

            $(tabs).children("ul").children("li").click(function () {
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
        if (input.val() > 1)
            input.val(+(input.val()) - 1);
    })

    let filterData;


    if (fillSessionStorage()) {
        createFilterData()
    }


    $(".filter .filter__input_text").on("change", function () {
        filterData = createFilterData()
        fillTextFilterData()
        fillNumberFilterData()

        sessionStorage.setItem("filterData", JSON.stringify(filterData));
        filterAjax(filterData);
    })

    $(".filter .filter__item_number input").on("keyup", function (e) {
        let arrKeys = ["Backspace", "Enter"]

        if ((isNaN(+e.key) || isNaN(e.key)) && !arrKeys.includes(e.key)) return
        filterData = createFilterData()
        fillTextFilterData()
        fillNumberFilterData()

        sessionStorage.setItem("filterData", JSON.stringify(filterData));
        filterAjax(filterData);
    })

    $("")

    $(document).on("click", ".product-card-wrapper .pagination li", function (e) {
        if ($(this).hasClass("active")) return
        e.preventDefault()
        let url = $(this).children().attr("href")

        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            data: filterData,
            beforeSend: function () {
                $(".product-card__loader").addClass("active");
            },
            success: function (res) {
                res = new DOMParser().parseFromString(res, "text/html")
                let html = $(res.querySelector(".product-card-wrapper"))
                $(".product-card-wrapper").replaceWith(html)
                window.history.pushState('', '', url);
            },
            error: function (res) {
                swal({
                    "icon": "error",
                    "title": "Ошибка",
                    "text": "Ошибка при загрузке"
                })
                $(".test").append(res);
            },
            complete: function () {
                $(".product-card__loader").removeClass("active");
            }
        });
    })

    $(".product-form").on("submit", function (e) {
        e.preventDefault();
        sendAjax($(this), errorAjax, successAjax, completeAjax);
    })
});
