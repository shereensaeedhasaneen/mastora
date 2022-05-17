


    /*$('.file-input-container').each(function(index ,element) {
      var hr_width=$(window).innerWidth()/5.5 - ($(this).find('.span-text').width()
      + $(this).find('.for-sm-input-file').width()+50)
      $(this).find('.attach-divider').css('width', hr_width+'px');
      //console.log($(element).width() )
    });*/

    $(".row").on("change", ".sm-input-file", function() {
        console.log('input value'+$(this).val())
        $(this).find('.edit').text(' ');
        console.log( $(this).attr('id'));
        var selected_input_id=$(this).attr('id')
        $(`#${selected_input_id}`).closest('.row').find('.edit').text('تعديل');
        $(`#${selected_input_id}`).closest('.row').find('.edit').removeClass('blue');
       console.log ($(`#${selected_input_id}`).closest('.row').find('.edit').text())
      //  $(this).closest('.container-files').find('.edit').text('jsusu')
    });

    let counter=1;
   $(".row").on("click", ".add-row", function() {
       console.log($('.sm-input-file').length)
   // var name = $(this).target.files[0].name;

    //$('.span-text').text(name);
    /*$(this).closest('.file-input-container').find('.span-text').text(name);
    $(this).closest('.file-input-container').find('.span-text').attr('href','img/'+name);
    console.log($('.container-files').find('.row').length)
    console.log($('.container-files .row:last-child'))*/
   // console.log($('.container-files .row:last-child').find('.span-text').text())


if($('.sm-input-file').length==6){

}
   //////////row /////////////////
   else{
    var upload_counter = $('.container-files .row:last-child').find('.span-text').text().replace(/[^0-9]/gi, '');
   // console.log('hhhh' +upload_counter/2)
     $('.container-files .row:last-child').find('.span-text').text('مستند اضافي '+ upload_counter );
     $('.container-files .row:last-child').find('.span-text').attr('href','#');


     $('.container-files .row:last-child').removeClass('d-none');



  //  var numItems = $('.sm-input-file').length;
    // $('.container-files .row:last-child').find('input').val(name) ;
    // console.log($('.container-files .row:last-child').find('input').val(name))
   }



    /*console.log($(this).closest('.file-input-container').width() - ($(this).closest('.file-input-container').find('.span-text').width()
    + $(this).closest('.file-input-container').find('.for-sm-input-file').width()) +'px'
    )*/
    /*var hr_width=$(this).closest('.file-input-container').width() - ($(this).closest('.file-input-container').find('.span-text').width()
    + $(this).closest('.file-input-container').find('.for-sm-input-file').width()+50)
    $(this).closest('.file-input-container').find('.attach-divider').css('width', hr_width+'px');*/
  });

$('.add-row').on('click' , function(){
    var numItems = $('.sm-input-file').length;



    $('.container-files').append(`<div class="row mb-3 d-none">
                                <div class="col-8">
                                <div class="file-input-container">
                                    <label class="for-sm-input-file" for="sm-ip-${numItems+1}">
                                        <svg id="Group_101" data-name="Group 101" xmlns="http://www.w3.org/2000/svg" width="38.316" height="45.979" viewBox="0 0 38.316 45.979">
                                        <path id="Path_301" data-name="Path 301" d="M101.653,857.25,92.4,848H71v38.316h30.653Z" transform="translate(-67.168 -844.168)" fill="#B68B25"/>
                                        <path id="Path_302" data-name="Path 302" d="M96.821,847H73.832A3.833,3.833,0,0,0,70,850.832v38.316a3.833,3.833,0,0,0,3.832,3.831h30.653a3.833,3.833,0,0,0,3.832-3.831V858.5Zm7.663,42.148H73.832V850.832H92.99V858.5a3.833,3.833,0,0,0,3.832,3.831h7.663Z" transform="translate(-70 -847)" fill="#B68B25"/>
                                        </svg>
                                    </label>
                                    <input type="file" name="additionalFiles[]" class="sm-input-file" id="sm-ip-${numItems+1}"/>
                                    <a href="#" target="_blank" class="span-text">${counter}</a>
                                    <hr class="attach-divider">
                                    </div>
                                </div>
                                <div class="col-2 d-flex justify-content-end align-items-center">
                                <!--<input type="file" class="sm-input-file" id="edit-attach"/>-->
                                <label class="edit blue" for="sm-ip-${numItems+1}">اضافه </label>
                                </div>
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                <button class="delete">حذف </button>
                                </div>
                            </div>`);

                            // $('.file-input-container').each(function(index ,element) {
                            //   var hr_width=$(window).innerWidth()/3 - ($(this).find('.span-text').width()
                            //   + $(this).find('.for-sm-input-file').width()+50)
                            //   $(this).find('.attach-divider').css('width', hr_width+'px');
                            //   //console.log($(element).width() )
                            // });


                           // $("#sm-ip-6").click();
                           counter++;
                           console.log('value ' +  $(`#sm-ip-${numItems+1}`).val())


  // to hide empty div
    var numItems = $('.sm-input-file').length;
    if(numItems>=1){
        $('.empty-container').css('display' , 'none');
    }
})


  $('.row').on('click',".delete",function(){
    /*Swal.fire({
      title: 'هل انت متأكد من حذف هذا الملف',
      //showDenyButton: true,
      icon:'error',
      showCancelButton: true,
      cancelButtonText:'الغاء',
      confirmButtonText: 'حذف',
    }).then((result) => {
      if (result.isConfirmed) {
        $(this).closest('.row').remove();

        // to diplay empty div
        var numItems = $('.sm-input-file').length;
        if(numItems==0){
            $('.empty-container').css('display' , 'block');
        }
        //Swal.fire('تم الحذف بنجاح', '', 'success')
        Swal.fire({
              //position: 'top-end',
            icon: 'success',
            title: 'تم الحذف بنجاح',
            showConfirmButton: false,
            timer: 1400})
      }
    })*/
  })


  /////////////////////////


   // buttonload.addEventListener("click", function() {
     $('.buttonload').on('click',function(){
      //buttonload.classList.add('spinning');
        $(this).addClass('spinning')
      setTimeout(
              ()=>{
              $(this).removeClass('spinning');
              //$(this).text($(this).find('.btn-text').css('display' , 'block'));
              $(this).find('.btn-text').css('display' , 'inline-block')
              $(this).css('background' , '#289a43')
              //buttonload.disabled = true;
              $(this).prop('disabled',true);
              if($(".buttonload").length==$(".buttonload:disabled").length){
                $('.final-accept-loan').css('display' , 'block')
              }
            }, 1500);

  });


$(document).on('load',function(){
    $('button[type="submit"]').prop('disabled' ,true);
    $('.preloader').addClass('show')

})
$(document).ready(function(){
    $('button[type="submit"]').prop('disabled' ,false)
    $('.preloader').removeClass('show')
    $('.preloader').addClass('hide')
});


/////// depend select ////////
$('#selectCountryBank').change(function(){//#selectCountryBank

  $('.nice-select.select-option.change-bank .current').text('فرع البنك')

});

$('#applicant_country').change(function(){
    $('.nice-select.select-area.select-option.state-grpup.select-applicant-country .current').text('المدينه/المركز')
});

$('#real_address_country').change(function(){
    $('.nice-select.select-area.select-option.state-grpup.select-another-address-country .current').text('المدينه/المركز')
})

$('#address_project_country').change(function(){
    $('.nice-select.select-area.select-option.state-grpup.select-another-address-city .current').text('المدينه/المركز')

})


//////////// set guarantor /////////////
function reset_guarantor(val){
    console.log(val)
    if(val=='personal'){
        $('input[name=guarantor_salary_1]').val('')
        $('textarea[name=guarantor_salary_2]').val('')
        $('input[name=guarantor_organization_1]').val('')
    }

    else if(val=='salary'){
        $('input[name=guarantor_personal_1]').val('')
        $('input[name=guarantor_personal_2]').val('')
        $('input[name=guarantor_organization_1]').val('')
    }

    else if(val=='organization'){
        $('input[name=guarantor_personal_1]').val('')
        $('input[name=guarantor_personal_2]').val('')
        $('input[name=guarantor_salary_1]').val('')
        $('textarea[name=guarantor_salary_2]').val('')
    }
}

//////////// children  special case //////////////

// $('.special-case').css('display' , 'none');

// $('input[name=number_of_children').on('keydowm',function(){
//     console.log($(this).val())
// })

$('input[name=number_of_children').keyup((e) => {
    if(e.currentTarget.value>0){
        console.log('>0')
        $('.kids').css('display', 'flex');
    }
    else{
        $('.kids').css('display', 'none');
    }
});
