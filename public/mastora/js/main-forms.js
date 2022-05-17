const pages = Array.from(document.querySelectorAll(".page"));
//const sidebar = Array.from(document.querySelectorAll(".sidebar-content"));
const nextBtn = document.querySelectorAll(".next-button");
const prevBtn = document.querySelectorAll(".prev-button");
const bullets = document.querySelectorAll(".step .bullet");
var step_counter = 1;

let currentBullet = 0;
let index = 0;

//** Initialize Tooltip **/
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

/** Switch English Numbers To arabic numbers **/
function toArabicNumber(strNum) {
    var en = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    var an = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
    var cache = strNum;
    for (var i = 0; i < 10; i++) {
        var regex_ar = new RegExp(en[i], 'g');
        cache = cache.toString().replace(regex_ar, an[i]);
    }
    return cache;
}

/************ Validation Function *************/
function validadeText(id, message) {
    //$('.error').text(`<span class="star"> * </span> error text`);
    if ($("#loan-error-" + id)) {
        $("#loan-error-" + id).text('');
        $("#loan-error-" + id).append( '<span class="star">*</span> ' + message)
    }
}

function removeError(req) {
    var reqArray = req.split("&");
    reqArray.forEach(element => {
        elementS = element.split('=')
        if (!elementS[0].includes("_token") && !elementS[0].includes("%") && $("#loan-error-" + elementS[0]).length!==0) {
            $("#loan-error-" + elementS[0]).text('');
        }
    });

}

/************ Validation Function *************/
function setContent(id, message) {
    //$('.error').text(`<span class="star"> * </span> error text`);
    if ($("#loan-data-" + id)) {
        $("#loan-data-" + id).text('');
        $("#loan-data-" + id).append(' ' + message)
    }
}

/**  Switch Arabic numbers to english numbers  **/
function toEnglishNumber(strNum) {
    var en = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    var an = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
    var cache = strNum;
    for (var i = 0; i < 10; i++) {
        var regex_ar = new RegExp(an[i], 'g');
        cache = cache.toString().replace(regex_ar, en[i]);
    }
    return cache;
}

/* Click Previous button */
prevBtn.forEach(button => {
    button.addEventListener("click", function() {
        changePage('prev');
    });
});
/* Click Next button */
// nextBtn.forEach(button => {
//     button.addEventListener("click" , function(){
//         changePage('next');
//     });
// });

var id = 0;
$(document).on('submit', '#mainForm', function(event) {
    $form = $(this);
    $('.manage-disabeld').prop('disabled', true);
    event.preventDefault();
    const currentPage = document.querySelector(".page.active");
    index = pages.indexOf(currentPage);
    form_data = $("#mainForm").serialize()
    form_data = form_data + "&index=" + index
    console.log(form_data)
    $.ajax({
        url: id === 0 ? "/loans" : "/loans/" + id,
        method: id === 0 ? 'post' : 'PUT',
        data: form_data,
        processData: false,
        success: function(response) {
            $('.manage-disabeld').prop('disabled', false);
            console.log(id)
            console.log(response, response.data.id);
            id = response.data.id;
            for (const [key, value] of Object.entries(response.data)) {
                setContent(key, value);
                console.log(`${key}: ${value}`);
            }
            if (index < 5) {
                changePage("next");
            }
        },
        error: function(error) {
            $('.manage-disabeld').prop('disabled', false);
            if(index == 1){
                Swal.fire({

                    icon: 'error',
                    title: 'برجاء التاكد من الباينات  ',
                    showConfirmButton: false,
                    timer: 1400})
            }
            removeError(form_data)
            for (const [key, value] of Object.entries(error.responseJSON.errors)) {
                validadeText(key, value[0])
                console.log(`${key}: ${value}`);
            }
        }
    });
});

$(document).on('submit', '#fileForm', function(event) {
    $form = $(this);
    event.preventDefault();
    const currentPage = document.querySelector(".page.active");
    formData = new FormData(this)
    index = pages.indexOf(currentPage);
    formData.append('index', index);
    $.ajax({
        url:  "/loans-form/" + id,
        method:  'post' ,
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(id)
            console.log(response, response.data.id);
            id = response.data.id;
            //fillLoanData(response);
            $('.info-page').css('display', 'block');
            $('.upload-form').css('display', 'none');
            $('.sidebar-info').css('display', 'block');
            $('.sidebar-upload-file').css('display', 'none');
            $('.sidebar-phone .sidebar-upload-file').removeClass('current');
            $('.sidebar-phone .sidebar-info').addClass('current');
            // $('.sidebar-phone .sidebar-upload-file').css('display', 'none');
            $('.sidebar-phone').slideUp();
            $(window).scrollTop(0);
        },
        error: function(error) {
            console.log("err " , error.responseJSON);
            for (const [key, value] of Object.entries(error.responseJSON)) {
                validadeText(key, value[0])
            }
            $(window).scrollTop(0);
    }
    });
});

/* Change Pages, bullets , Sidebar */
function changePage(button) {
    const currentPage = document.querySelector(".page.active");
    const currentSidebar = document.querySelector(".sidebar-content.active");
    // const currentSidebarPhone = document.querySelector(".sidebar-phone.active");
    index = pages.indexOf(currentPage);
    pages[index].classList.remove("active");
    // sidebar[index].classList.remove("active");
    if (button == "next") {
        index++;
        bullets[currentBullet + 1].classList.add("active");
        currentBullet += 1;
        if (index == 2) {
            $('.sidebar-phone-2').css('display', 'block');
        } else {
            $('.sidebar-phone-2').css('display', 'none');
        }
        $('.progress-line-mobile .counter-step-mobile').text(toArabicNumber(++step_counter));
        // $(sidebarPhone[index]).children('.current').slideUP();
        $('.sidebar-phone').slideUp();
        $(window).scrollTop(0);

    } else if (button == "prev") {
        index--;
        bullets[currentBullet].classList.remove("active");
        currentBullet--;
        if (index == 2) {
            $('.sidebar-phone-2').attr('style', 'display: block');
        } else {
            $('.sidebar-phone-2').css('display', 'none');
        }
        $('.progress-line-mobile .counter-step-mobile').text(toArabicNumber(--step_counter));
        $('.sidebar-phone').slideUp();
        $(window).scrollTop(0);
    }
    pages[index].classList.add("active");
    // sidebar[index].classList.add("active");
}

$(document).ready(function() {
    $('select').niceSelect();
    $('.slidUP').slideUp();
    $('input#price').val('4000');

    /** Page-2 When Click Yes Button **/
    $('button.yes').click(function() {
        $('.page-2 .page-form').css('display', 'none');
        $('.page-2 .secondPage').css('display', 'block');
        $('.page-2 .hidden-buttons-inFirst').css('display', 'flex');
        $('.page-2 .hidden-buttons-inFirst .btns').css('display', 'flex');
        $('.sidebar-phone').slideUp();
        $(window).scrollTop(0);
    });



    /** Page-2 Click No when adding new person */
    $('button.no').click(function() {
        $('.progress-line-mobile .counter-step-mobile').text(toArabicNumber(++step_counter));
        const currentPage = document.querySelector(".page.active");
        index = pages.indexOf(currentPage);
        pages[index].classList.remove("active");
        //sidebar[index].classList.remove("active");
        pages[index + 1].classList.add("active");
        // sidebar[3].classList.add("active");
        bullets[currentBullet + 1].classList.add("active");
        index++;
        if (index == 2) {
            $('.sidebar-phone-2').attr('style', 'display: block');
        }
        currentBullet += 1;
        $('.sidebar-phone').slideUp();
        $(window).scrollTop(0);
    });
    /* Page-2 Render new rows */
    $(".addDiv").click(function() {
        $(".secondPage .inputs-row").append(`<div class="form-group newRow row mt-3">
                            <div class="d-none d-sm-flex col-sm-1 text-center align-self-center">
                            <div class="count">
                            </div>
                            </div>
                            <div class="col-md-5 col-5">
                            <input type="text" class="form-control input-name"
                            id="staticEmail" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'الاسم الثلاثي'" name="user_partner_name[]" placeholder=" الاسم الثلاثي">
                            </div>
                            <div class="col-md-5 col-5">
                            <input type="number" class="form-control input-name"
                            id="staticEmail" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'الرقم القومي'" name="user_partner_nationlid[]" placeholder="الرقم القومي">
                            </div>
                            <div class="col-md-1 col-1 text-center align-self-center">
                            <span class="btn-delete">
                                <i class="fas fa-times fa-delete"></i>
                            </span>
                            </div>
                        </div>`);
        addCounter();

    });



    /** Page-2 Add counter to rows */
    function addCounter() {
        var input_list = Array.from(document.querySelectorAll(".inputs-row .count"));
        $('.count').empty();
        for (var count = 0; count < input_list.length; count++) {
            $(input_list[count]).append(`<span>${toArabicNumber(count + 1)}</span>`);
        }
    }
    /* Page-2 Delete row Desktop */
    $(".secondPage .inputs-row").on('click', '.btn-delete', function() {
        $(".secondPage .inputs-row").on('click', '.btn-delete', function() {
            Swal.fire({
                title: 'هل تريد ازالة هذا المستخدم؟',
                text: "",
                icon: '',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '',
                cancelButtonText: 'الغاء',
                confirmButtonText: 'ازالة'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('.form-group').remove();
                    $('.count').empty();
                    addCounter();
                }
            });
        });
    });

    /* Page-3 Filter based on year */


    /** Page-3 Rnage Input **/
    var agRangeSlider = function() {
        var agDisplayWidth = $(window).width(),
            agSlider = $('.js-ag-range-slider'),
            agRange = $('.js-ag-range-slider_range'),
            agValue = $('.js-ag-range-slider_value'),
            agFill = $('.js-ag-range-slider_fill');

        let count_percentage = 3.5;
        let price_val = 4000;
        $('.page-3 input[type="radio"]').change(function() {
            var choiceId = $(this).attr('id');
            if (choiceId == 'one-year') {
                $('.part-2 span.debt-price').text(toArabicNumber("12"));
                count_percentage = 3.5;
                countFromInput(price_val);

            } else if (choiceId == 'two-year') {
                $('.part-2 span.debt-price').text(toArabicNumber("24"));
                count_percentage = 7;
                countFromInput(price_val);
            }
        });

        // function count(percentage = 2){
        //     price = parseInt(agRange.val());
        //     $('input#price').val(toArabicNumber(price * 100));
        //     $('.part-1 span.debt-price').text(toArabicNumber(price * 100) + ' جنية');
        //     var calculatePayment = ((price * 100) * (1 + (( percentage /
        //         100)))) /
        //         (toEnglishNumber($('.sidebar-2 .part-2 span.debt-price').text()));
        //     $('.debt-1 span.debt-price').text(toArabicNumber(Math.round(calculatePayment)) +
        //     ' جنية');
        // }
        function countFromInput(price_val) {
            $('.part-1 span.debt-price').text(toArabicNumber(Math.round(price_val - (price_val * 0.08))) + ' جنية');
            var calculatePayment = ((parseInt(price_val)) * (1 + ((count_percentage /

                    100)))) /
                (toEnglishNumber($('.sidebar-2 .part-2 span.debt-price').text()));
            $('.debt-1 span.debt-price').text(toArabicNumber(Math.round(calculatePayment)) +
                ' جنية');
        }
        $('input#price').on('change', function(e) {
            var reg_enNumbers = '^[0-9]*$',
                reg_arNumbers = /[\u0660-\u0669]/;
            price_val = $(this).val();
            if (price_val.match(reg_arNumbers) && parseInt(toEnglishNumber(price_val)) <= 30000 &&
                parseInt(toEnglishNumber(price_val)) >= 4000) {
                price_val = toEnglishNumber(price_val);
                countFromInput(price_val);
            } else if (price_val.match(reg_enNumbers) && parseInt(price_val) <= 30000 &&
                parseInt(price_val) >= 4000) {
                countFromInput(price_val);
            } else if (parseInt(toEnglishNumber(price_val)) > 30000) {
                price_val = '30000';
                countFromInput(price_val);
            } else {
                price_val = '4000';
                countFromInput(price_val);
            }
        });
        agSlider.each(function() {
            agRange.on('input', function() {
                price = parseInt(agRange.val());
                calculateValue = this.value * 100;
                $('input#price').val(toArabicNumber(calculateValue));
                $('.part-1 span.debt-price').text(toArabicNumber(calculateValue) + ' جنية');
                count();
                agFill.width(((((this.value - 40) / 260) * 100)) + '%');

                if (this.value <= 100) {
                    agFill.addClass('js-ag-range-slider_fill');
                }
                // agValue.text(Math.round(this.value * 100) + '%');
            });
        });
    };

    agRangeSlider();

    /*** page-4 */
    $('input[type="radio"][name="social_status"]').change(function() {
        let choiceValue = $(this).val();
        if (choiceValue == '3') {
            console.log("3");
            $('.children').css('display', 'none');
            $('.kids').css('display', 'none');
        } else {
            $('.children').css('display', 'flex');
            $('input[name=number_of_children').val('0');
           // $('.kids').css('display', 'flex');
           $('.kids').css('display', 'none');
        }
    });
    /* Page-5 Add Another Address */
    $('.page-4 input[type="radio"]').change(function() {
        let choiceId = $(this).attr('id');
        if (choiceId == 'another-address-btn') {
            $('.page-4 .another-address-content').css('display', 'block');
        } else if (choiceId == '') {
            $('.page-4 .another-address-content').css('display', 'none');
        }
    });

    function fillLoanData(loanData) {
        for (const [key, value] of Object.entries(loanData.data)) {
            setContent(key, value);
        }

    }
    /** page-4 Switch To Next Form */
    $('.switch-part-2').click(function() {
        form_data = $("#mainForm").serialize()
        form_data = form_data + "&index=" + 33
        console.log(form_data)
        $.ajax({
            url: id === 0 ? "/loans" : "/loans/" + id,
            method: id === 0 ? 'post' : 'PUT',
            data: form_data,
            processData: false,
            success: function(response) {
                id = response.data.id;
                loan = response;
                console.log(typeof loan)
                //fillLoanData(response);
                $('.page-4 .form-1').css('display', 'none');
                $('.page-4 .form-2').css('display', 'block');
                $(window).scrollTop(0);
            },
            error: function(error) {
                removeError(form_data)
                for (const [key, value] of Object.entries(error.responseJSON.errors)) {
                    validadeText(key, value[0])
                }
                $(window).scrollTop(0);

            }
        });
    });

    /** page-4 Switch To Prev Form */
    $('.prev-form-1').click(function() {
        $('.page-4 .form-2').css('display', 'none');
        $('.page-4 .form-1').css('display', 'block');
        $(window).scrollTop(0);
    });

    /** Page-4 Enter Year Experience */
    $('.page-4 input[type="radio"][name="have_experince"]').change(function() {
        let choiceId = $(this).attr('id');
        if (choiceId == 'radio-experience') {
            $('.page-4 .input-year').css('display', 'block');
        } else {
            $('.page-4 .input-year').css('display', 'none');
        }
    });

    $('.personal-form').css('display', 'flex');
    /** Forms based on radio btn **/
    $('.page-5 input[type="radio"][name="guarantor"]').change(function() {
        let choiceClass = $(this).attr('class');
        if (choiceClass == 'form-check-input personal-radio') {
            $('.personal-form').css('display', 'flex');
            $('.pension-form').css('display', 'none');
            $('.salary-form').css('display', 'none');
        } else if (choiceClass == 'form-check-input salary-radio') {
            $('.personal-form').css('display', 'none');
            $('.pension-form').css('display', 'none');
            $('.salary-form').css('display', 'flex');
        } else if (choiceClass == 'form-check-input pension-radio') {
            $('.personal-form').css('display', 'none');
            $('.salary-form').css('display', 'none');
            $('.pension-form').css('display', 'flex');
        }

    });

    /** Switch To Upload Form **/
    /** Switch To Upload Form **/
    $('.switch-to-uploadForm').on('click', function() {
        $('.info-page').css('display', 'none');
        $('.upload-form').css('display', 'block');
        $('.sidebar-info').css('display', 'none');
        $('.sidebar-upload-file').css('display', 'block');
        $('.sidebar-phone .sidebar-info').removeClass('current');
        $('.sidebar-phone .sidebar-upload-file').addClass('current');
        $('.sidebar-phone').slideUp();
        $(window).scrollTop(0);
    });

    /** Switch To info Form **/
    $('.switch-to-info').on('click', function() {

    });

    /** page-5 Upload File **/
    var filesclass = Array.from(document.querySelectorAll('.input-file'));
    var upload_btns = Array.from(document.querySelectorAll('.upload-btn'));
    $('.input-file').change(function(e) {
        let file = e.target.files;
        let filename = file[0].name;
        let fileIndex = filesclass.indexOf(this);
        var showFile =
            `<img src="mastora/img/Attach.svg" style="margin-left: 10px" alt="Attach"><span>${filename} </span>`;
        if (upload_btns[fileIndex]) { upload_btns[fileIndex].innerHTML = showFile; }
        $(this).parent().parent().append(`<div class="col-2 col-md-1 text-center align-self-center pb-2" style="z-index: 2">
        <span class="btn-delete">
            <i class="fas fa-times fa-delete"></i>
        </span>
        </div>`);
        if (upload_btns[fileIndex]) {
            $(upload_btns[fileIndex]).css('background', '#b68b25');
        }
    });

    /** page-5 remove file **/

    $('.upload-form').on('click', '.btn-delete', function() {
        let fileIndex = filesclass.indexOf(this);
        let filediv = $(this).parent().parent().children('.choose-file');
        let currentInput = $(filediv).children('.input-file');
        let currentUpload = $(filediv).children('.upload-btn');
        $(currentInput).val('');
        $(currentUpload).text('اختيار الملفات');
        $(this).parent().remove();
        $(currentUpload).css('background', '#b68b25');
    });

    /********************** Page-7  **********************/
    $('.page-6 .order').on('click', function() {
        $(this).css({
            "color": "#fff",
            "background-color": "#b68b25",
            "border": "transparent"
        });
        setTimeout(() => {
            $('.parent-container').css('display', 'none');
            $('.img').css('display', 'none');
            $('.final-page').css('display', 'block');
            $('.final-page').css('display', 'block');
        }, 300);
        $('.copyright-reserved').css('margin-top', '0px');

        // $(this).css('background' , '#b68b25' , 'color' , '#fff');
    });
    $('.final-page .back-to-main').on('click', function() {
        location.reload();
    });
    /******** Mobile Functions ********/
    /** Show Current Sidebar */

    $('.fa-info').on('click', function() {
        if (index == 5) {
            $(sidebarPhone[index]).slideToggle();
            $(sidebarPhone[index]).children('.current').slideDown();
        } else {
            $(sidebarPhone[index]).slideToggle();
            $(sidebarPhone[index]).children('.current').slideDown();
        }
    });

    /** Count Pages in Mobile **/
    $('.progress-line-mobile .counter-step-mobile').text(toArabicNumber(step_counter));

});

$(document).on('change','#selectCountryBank',function(event){
    $.ajax({
      url: '/bankBranches/'+this.value,
              type: 'get',
              dataType: 'JSON',
              success: function(response){
                $('.change-bank .list').empty();
                  console.log(document.getElementById('selectBank'));
                $('#selectBank')
                  .find('option')
                  .remove()
                  .end();
                  response['banks'].forEach(element => {
                    $('#selectBank').append('<option value=' + element.id+ '>'+ element.name +'</option>');
                    $('.change-bank .list').append(`<li class=option data-value=${element.id} > ${element.name}</li>`);

                  });
                  //$('#selectBank').val(response['banks'][0].id)

              },
              error : function (error) {
                console.log(error)
              }
          }
    )
  });

  $(document).on('change','#applicant_country',function(event){
    $.ajax({
      url: '/getCities/'+this.value,
              type: 'get',
              dataType: 'JSON',
              success: function(response){
                $('.select-applicant-country .list').empty();
                  console.log(document.getElementById('applicant_city'));
                $('#applicant_city')
                  .find('option')
                  .remove()
                  .end();

                  response['cities'].forEach(element => {
                    console.log(element)

                    $('#applicant_city').append('<option value=' + element.id+ '>'+ element.name +'</option>');
                    $('.select-applicant-country .list').append(`<li class=option data-value=${element.id} > ${element.name}</li>`);
                  });

              },
              error : function (error) {
                console.log(error)
              }
          }
    )
  });

  $(document).on('change','#real_address_country',function(event){
    $.ajax({
      url: '/getCities/'+this.value,
              type: 'get',
              dataType: 'JSON',
              success: function(response){
                $('.select-another-address-country .list').empty();
                  console.log(document.getElementById('real_address_city'));
                $('#real_address_city')
                  .find('option')
                  .remove()
                  .end();

                  response['cities'].forEach(element => {
                    console.log(element)

                    $('#real_address_city').append('<option value=' + element.id+ '>'+ element.name +'</option>');
                    $('.select-another-address-country .list').append(`<li class=option data-value=${element.id} > ${element.name}</li>`);
                  });

              },
              error : function (error) {
                console.log(error)
              }
          }
    )
  });

  $(document).on('change','#address_project_country',function(event){
    $.ajax({
      url: '/getCities/'+this.value,
              type: 'get',
              dataType: 'JSON',
              success: function(response){
                $('.select-another-address-city .list').empty();
                  console.log(document.getElementById('address_project_city'));
                $('#address_project_city')
                  .find('option')
                  .remove()
                  .end();

                  response['cities'].forEach(element => {
                    console.log(element)

                    $('#address_project_city').append('<option value=' + element.id+ '>'+ element.name +'</option>');
                    $('.select-another-address-city .list').append(`<li class=option data-value=${element.id} > ${element.name}</li>`);
                  });

              },
              error : function (error) {
                console.log(error)
              }
          }
    )
  });


        // Countries
        // var country_arr = new Array("المحافظة","القاهرة","الجيزة","القليوبية","الاسكندرية","البحيرة","مطروح","دمياط","الدقهلية","كفرالشيخ","الغربية","المنوفية","الشرقية","بورسعيد","الإسماعيلية","السويس","شمال سيناء","جنوب سيناء","بني سويف","الفيوم","المنيا","أسيوط","الوادي الجديد","البحر الأحمر","سوهاج","قنا","الأقصر","أسوان");

        // $.each(country_arr, function (i, item) {
        //     $('#applicant_city, #applicant_city_address').append($('<option>', {
        //         value: i,
        //         text : item,
        //     }, '</option>' ));
        // });

        // // States
        // var s_a = new Array();
        // s_a[1]="مصر الجديدة|النزهة|مدينة نصر|عين شمس|السلام|المرج|منشأة ناصر | المطرية|الجمالية|الدرب الأحمر|قصر النيل|الزمالك|عابدين|الأزبكية|بولاق|شبرا|الزاوية الحمراء|حدائق القبة|روض الفرج|الشرابية|الزيتون|مصر القديمة|الخليفة|المقطم|البساتين|دار السلام|السيدة زينب";
        // s_a[2]="الجيزة|السادس من أكتوبر|الشيخ زايد|الحوامدية|البدرشين|الصف|أطفيح|العياط|الباويطي|منشأة القناطر|أوسيم|كرداسة|أبو النمرس";
        // s_a[3]="بنها|قليوب|شبرا الخيمة|القناطر الخيرية|الخانكة|كفر شكر|طوخ|قها|العبور|الخصوص|شبين القناطر";
        // s_a[4]="الاسكندرية|برج العرب|برج العرب الجديدة";
        // s_a[5]="دمنهور|كفر الدوار|رشيد|إدكو|أبو المطامير|أبو حمص| الدلنجات|المحمودية|الرحمانية|ايتاي البارود|حوش عيسى| شبراخيت|كوم حمادة |بدر|وادي النطرون|النوبارية الجديدة";
        // s_a[6]="مرسى مطروح|الحمام|العلمين|الضبعة|النجيلة|سيدي براني|السلوم|سيوة";
        // s_a[7]="دمياط|دمياط الجديدة|رأس البر|فارسكور|كفر سعد|الزرقا|السرو|الروضة|كفر البطيخ|عزبة البرج|ميت أبو غالب";
        // s_a[8]="المنصورة|طلخا|ميت غمر|دكرنس|أجا|منية النصر|السنبلاوين|الكردي|بني عبيد|المنزلة|تمي الأمديد|الجمالية|شربين|المطرية|بلقاس|ميت سلسيل|جمصة|محلة دمنة|نبروه";
        // s_a[9]="كفر الشيخ|دسوق|فوه|مطوبس|بلطيم|مصيف بلطيم|الحامول|بيلا|الرياض|سيدي سالم|قلين|سيدي غازي|برج البرلس|مسير";
        // s_a[10]="طنطا|المحلة الكبرى|كفر الزيات|زفتى|السنطة|قطور|بسيون|سمنود";
        // s_a[11]="شبين الكوم|مدينة السادات|منوف|سرس الليان|أشمون|الباجور|فويسنا|بركة السبع|تلا|الشهداء";
        // s_a[12]="الزقازيق|العاشر من رمضان|منيا القمح|بلبيس|مشتول السوق|القنايات|أبو حماد|قرين|ههيا|أبو كبير|فاقوس|الصالحية الجديدة|الإبراهيمية|ديرب نجم|كفر صقر|أولاد صقر|الحسينية|صان الحجر القبلية|منشأة أبو عمر";
        // s_a[13]="بورسعيد|بورفؤاد";
        // s_a[14]="الاسماعيلية|فايد|القنطرة شرق|القنطرة غرب|التل الكبير|أبو صوير المحطة|القصاصين الجديدة";
        // s_a[15]="السويس";
        // s_a[16]="العريش|الشيخ زويد|رفح|بئر العبد|الحسنة|نخل";
        // s_a[17]="طور|شرم الشيخ|دهب|نويبع|طابا|سانت كاترين|أبو رديس|ابو زنيمة|راس سدر";
        // s_a[18]="بني سويف|بني سويف الجديدةِ|الواسطى|ناصر|اهناسيا|ببا|سمسطا|الفشن";
        // s_a[19]="الفيوم|الفيوم الجديدة|طامية|سنورس|إطسا|إبشواي|يوسف الصديق";
        // s_a[20]="المنيا|المنيا الجديدة|العدوة|مغاغة|بني مزار|مطاي|سمالوط|المدينة الفكرية|ملوي|دير مواس";
        // s_a[21]="أسيوط|أسيوط الجديدة|ديروط|منفلوط|القوصيه|أبانوب|أبو تيج|الغنايم|ساحل سليم|البداري|صدفا";
        // s_a[22]="الخارجة|باريس|موط|الفرافرة|البلاط";
        // s_a[23]="الغردقة|راس غالب|سفاجة|القصير|مرسى علم|شلاتين|حلايب";
        // s_a[24]="سوهاج|سوهاج الجديدة|أخميم|أخميم الجديدة|البلينا|المراغة|المنشأة|دار السلام|جرجا|جهينة الغربية|ساقلته|طما|طهطا";
        // s_a[25]="قنا|قنا الجديدة|أبو تشت|نجع حمادي|دشنا|الوقف|قفط|نقادة|قوص|فرشوط";
        // s_a[26]="الأقصر|الأقصر الجديدة|طيبة الجديدة|الزينية|البياضية|القرنة|أرمنت|الطود|إسنا";
        // s_a[27]="أسوان|أسوان الجديدة|دراو|كوم امبو|نصر النوبة|كلابشة|إدفو|الرديسية|البصيلية|السباعية|أبو سمبل السياحية";


        // setTimeout(() => {
        //     $('.state-grpup .current').text('المدينة');
        // }, 300);
        // $('#applicant_city, #country, #applicant_city_address').change(function(){
        //     $('.state-grpup .list').empty();
        //     var c = $(this).val();
        //     var state_arr = s_a[c].split("|");
        //     // console.log(state_arr);
        //     $('#applicant_area').empty();
        //     if(c==0){
        //         $('#applicant_area').append($('<option>', {
        //             value: '0',
        //             text: 'Select State',
        //         }, '</option>'));
        //         // $('.state-grpup .current').text('المدينة');
        //     }else {
        //         $.each(state_arr, function (i, item_state) {
        //             $('#applicant_area').append($('<option>', {
        //                 value: item_state,
        //                 text: item_state,
        //             }, '</option>'));
        //             $('.state-grpup .list').append(`<li class=option data-value=${item_state} > ${item_state}</li>`);
        //         });
        //         $('.state-grpup .current').text('');
        //         $('.state-grpup .current').append(state_arr[0])
        //     }

        // });


        // $('#country').change(function(){
        //     var c = $(this).val();
        //     var state_arr = s_a[c].split("|");
        //     console.log(state_arr);

        //         $.each(state_arr, function (i, item_state) {
        //             // $('#state').append($('<option>', {
        //             //     value: item_state,
        //             //     text: item_state,
        //             // }, '</option>'));
        //             $('#state').append(
        //                 '<option>' + state_arr + '</option>'
        //             )
        //         });
        // });


