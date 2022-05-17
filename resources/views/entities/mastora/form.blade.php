@include('layouts.header')
<section class="p-0 ">
    <div class="preloader">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</section>
  <section class="pt-5 pb-5 " style="background: url(/mastora/img/Group\ 52.png) #F7F7F7 no-repeat; background-size: cover; background-position: center;">

        <div class="container-fauld">

            <div class="row">
              <!--Right Side -->

              <x-side-nav />
              <!--End Right Side -->

              <!-- Left Side -->
                <div class="col-9">


                    <!--New Application #tab2-->
                         <div class="main">

                          <div class="final-page" style=" display: none;background-color: #B68B25; height: 80vh;">


                            <div class="page-content d-flex flex-column justify-content-center align-items-center">
                              <i class="fas fa-check-circle" style="font-size: 62px; color: #fff;"></i>
                              <p class="p-1">تم استلام طلبك بنجاح</p>
                              <p class="p-2">جاري مراجعة و تقييم الطلب</p>
                              <!--<button class="back-to-main">العودة للصفحة الرئيسية</button>-->
                            </div>
                          </div>
                          <div class="img"></div>

                          <div class="container parent-container">
                            <div class="section-content">
                              <div class="row">

                                <div class="col-md-10 content p-0">
                                  <!-- Start Steper-Web -->
                                  <div class="progress-line mt-0">
                                    <div class="step">
                                      <div class="bullet active">
                                        <span>١</span>
                                      </div>
                                    </div>
                                    <div class="step">
                                      <div class="bullet">
                                        <span>٢</span>
                                      </div>
                                    </div>
                                    <div class="step">
                                      <div class="bullet">
                                        <span>٣</span>
                                      </div>
                                    </div>
                                    <div class="step">
                                      <div class="bullet">
                                        <span>٤</span>
                                      </div>
                                    </div>
                                    <div class="step">
                                      <div class="bullet">
                                        <span>٥</span>
                                      </div>
                                    </div>
                                    <div class="step">
                                      <div class="bullet">
                                        <span>٦</span>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- End Steper-Web -->
                                  <!-- Start Steper-Mobile -->
                                  <div class="row justify-space-around">
                                    <div class="col-5">
                                      <div class="progress-line-mobile">
                                        <div class="step">
                                          <div class="bullet">
                                            <span><i class="fas fa-info"></i></span>
                                          </div>
                                        </div>
                                        <div class="step">
                                          <div class="bullet active">
                                            <span class="counter-step-mobile"></span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-6 d-flex d-sm-none justify-content-end mb-2">
                                      <img src="img/Group 92.svg" alt="" width="55%">
                                    </div>
                                  </div>


                                  <!-- End Steper-Mobile -->
                                  <!-- Start Sidebar Mobile -->
                                  <div class="col-12 sidebar-phone sidebar-phone-1">
                                    <div class="sidebar-header">
                                      طلب الحصول على قرض
                                      بنك ناصر الاجتماعي
                                    </div>
                                    <div class="text-pg-1">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                                       ... بروشور او فلاير على سبيل المثال
                                       ... او نماذج مواقع انترنت ...</div>
                                  </div>

                                  <div class="col-12 sidebar-phone sidebar-phone-1">
                                    <div class="sidebar-header">
                                      إضافة أشخاص آخرين الى طلب القرض
                                    </div>
                                    <div class="text-pg-1">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                                       ... بروشور او فلاير على سبيل المثال
                                       ... او نماذج مواقع انترنت ...</div>
                                  </div>

                                  <div class="col-12 sidebar-phone sidebar-phone-1">
                                    <div class="sidebar-header">
                                      حساب قيمة القرض
                                    </div>
                                    <div class="debt-1 d-flex justify-content-around">
                                      <span class="debt-text">قيمة القسط</span>
                                      <span class="debt-price">١٠٠٠ جنية</span>
                                    </div>
                                  </div>
                                  <div class="col-12 sidebar-phone-2">
                                    <div class="sidebar-header">
                                       حساب قيمة القرض
                                    </div>
                                    <div class="debt-1">
                                      <span class="debt-text">قيمة القسط</span>
                                      <span class="debt-price">٣٤٥ جنية</span>
                                    </div>
                                    <div class="debt-2">
                                      <div class="part-1">
                                        <span class="debt-text">قيمة القرض</span>
                                        <span class="debt-price">٣٦٤٠ جنية</span>
                                      </div>
                                      <!-- <div class="part-2">
                                        <span class="debt-text">سعر الفائدة</span>
                                        <span class="debt-price">2%</span>
                                      </div> -->
                                      <div class="part-2">
                                        <span class="debt-text">عدد الاقساط</span>
                                        <span class="debt-price">١٢</span>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-12 sidebar-phone sidebar-phone-1">
                                    <div class="sidebar-header">
                                      سداد رسوم الطلب
                                    </div>
                                    <div class="text-pg-1">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                                       ... بروشور او فلاير على سبيل المثال
                                       ... او نماذج مواقع انترنت ...</div>
                                  </div>
                                  <div class="col-12 sidebar-phone sidebar-phone-1">
                                    <div class="sidebar-header">
                                      استكمال بيانات الطلب
                                    </div>
                                    <div class="text-pg-1">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                                      ... بروشور او فلاير على سبيل المثال
                                      ... او نماذج مواقع انترنت ...</div>
                                  </div>

                                  <div class="col-12 sidebar-phone sidebar-phone-1">
                                    <div class="slidUP sidebar-guarantor current">
                                      <div class="sidebar-header">
                                        اختيار طريقة ضمان القرض
                                      </div>
                                      <div class="text-pg-1">
                                        لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                                         ... بروشور او فلاير على سبيل المثال
                                         ... او نماذج مواقع انترنت ...
                                      </div>
                                    </div>
                                    <div class="slidUP sidebar-upload-file">
                                      <div class="sidebar-header">
                                        إدراج المستندات الخاصة بالقرض
                                      </div>
                                      <div class="text-pg-1">
                                        لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                                         ... بروشور او فلاير على سبيل المثال
                                         ... او نماذج مواقع انترنت ...
                                      </div>
                                  </div>
                                    <!-- <div class="sidebar-header">
                                      استكمال بيانات الطلب
                                    </div>
                                    <div class="text-pg-1">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                                       ... بروشور او فلاير على سبيل المثال
                                       ... او نماذج مواقع انترنت ...
                                    </div> -->
                                  </div>
                                  <div class="col-12 sidebar-phone sidebar-phone-1">
                                    <div class="sidebar-header">
                                      مراجعة بيانات الطلب
                                    </div>
                                    <div class="text-pg-1">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                                       ... بروشور او فلاير على سبيل المثال
                                       ... او نماذج مواقع انترنت ...</div>
                                  </div>
                                  <!-- End Sidebar Mobile -->

                                  <form id="mainForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="translation_language" value="ar" />
                                    <!-- Start Fisrt-Page -->
                                    <div class="page page-1 active">
                                      <div class="page-form">
                                        <div class="form-group row">
                                            {{-- <input id="success" type="button" value="Error!"/> --}}
                                          <label for="" class="col-md-4 col-12 field-name"> الاسم الثلاثي</label>
                                          <div class="col-md-8 col-12">
                                            <input type="text" name="name" class="form-control input-name"
                                            id="staticEmail">
                                          </div>
                                        </div>
                                        <!-- ايرور الاسم الثلاثي -->
                                        <div class="row mt-1">
                                            <label for="" class="col-md-4 col-12"> </label>
                                            <div class="col-md-8 col-12">
                                              <p id="loan-error-name" class="error"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-5">
                                          <label for="" class="col-md-4 col-12 field-id">الرقم القومي</label>
                                          <div class="col-md-8 col-12">
                                            <input type="number" name="national_id" class="form-control input-id" id="inputPassword"
                                             min="0">
                                          </div>
                                        </div>
                                        <!-- ايرور الرقم القومي -->
                                        <div class="row mt-1">
                                            <label for="" class="col-md-4 col-12"> </label>
                                            <div class="col-md-8 col-12">
                                              <p id="loan-error-national_id" class="error"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-5">
                                          <div class="col-md-5 col-12">
                                            <select id="selectCountryBank" name="country_id" class="select-place wide">
                                              <option value="" disabled selected>المحافظة</option>
                                              @foreach ($countries as $country )
                                                <option value="{{$country->id}}" >{{$country->name}}</option>
                                              @endforeach
                                            </select>
                                            <p id="loan-error-country_id" class="error"></p>
                                          </div>
                                          <div class="col-md-7 col-12" >
                                            <select id="selectBank" name="bank_branch_id" class="select-option change-bank wide">
                                              <option disabled selected>فرع البنك </option>
                                            @foreach ($branches as $branch )
                                              <option value="{{$branch->id}}" >{{$branch->name}}</option>
                                            @endforeach
                                          </select>
                                          <p id="loan-error-bank_branch_id" class="error"></p>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row mt-4">
                                        <div class="col-md-4 offset-md-5 offset-lg-7 btns">
                                          <button class="next-button m-auto manage-disabeld" type="submit">
                                            <span class="text-button ">متابعة</span>
                                            <span class="icon-button">
                                                <i class="fa fa-chevron-circle-left"></i>
                                            </span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Fisrt-Page -->
                                    <!-- Start Second-Page -->
                                    <div class="page page-2">
                                      <div class="page-form active">
                                          <p class="question-txt">هل ترغب في إضافة شركاء آخرين الى طلب القرض؟</p>
                                        <div class="row mt-5">
                                            <div class="col-md-6 col-6 text-center">
                                              <button class="yes" type="button">نعم</button>
                                            </div>
                                            <div class="col-md-6 col-6 text-center">
                                              <button class="no" type="button">لا</button>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="page-form secondPage" id="page2">
                                        <div class="form-group row">
                                          <label for="" class="d-none d-sm-flex col-md-5 col-6 field-name justify-content-center">
                                            الاسم الثلاثي
                                          </label>

                                          <label for="" class="d-none d-sm-flex col-md-5 col-6 field-name justify-content-center">
                                            الرقم القومي
                                          </label>
                                        </div>
                                        <div class="inputs-row d-none d-sm-block">
                                            <div class="form-group newRow row mt-3">
                                              <div class="d-none d-sm-flex flex-column col-sm-1 text-center align-self-center">
                                                <div class="count">
                                                  <span>١</span>
                                                </div>
                                                <!--<p class="visually-hidden">kk</p>-->
                                              </div>
                                              <div class="col-md-5">
                                                <input type="text" class="form-control input-name"
                                                id="staticEmail" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'الاسم الثلاثي'" name="user_partner_name[]" placeholder="الاسم الثلاثي">
                                                <!--<p class="error mt-2">dkdkkf</p>-->
                                              </div>
                                              <div class="col-md-5">
                                                <input type="number" class="form-control input-name"
                                                id="staticEmail" onfocus="this.placeholder = ''" min="0"
                                                onblur="this.placeholder = 'الرقم القومي'" name="user_partner_nationlid[]" placeholder="الرقم القومي">
                                                <!--<p class="error mt-2">dkdkkf</p>-->
                                              </div>
                                              <div class="col-md-1 col-1 text-center align-self-center delete-button">
                                                <span class="btn-delete">
                                                  <i class="fas fa-times fa-delete"></i>
                                                </span>
                                                <!--<p class="error mt-2">kk</p>-->
                                              </div>
                                            </div>
                                        </div>
                                        <div class="inputs-row-mobile d-sm-none">
                                          <div class="form-group newRow row mt-3">
                                            <div class="col-12 text-center d-flex justify-content-end delete-button">
                                              <span class="btn-delete">
                                                <i class="fas fa-times fa-delete"></i>
                                              </span>
                                            </div>
                                            <div class="col-md-5">
                                              <input type="text" class="form-control input-name"
                                              id="staticEmail" onfocus="this.placeholder = ''"
                                              onblur="this.placeholder = 'الاسم الثلاثي'" placeholder="الاسم الثلاثي">
                                            </div>
                                            <div class="col-md-5 col-12">
                                              <input type="number" class="form-control input-name"
                                              id="staticEmail" onfocus="this.placeholder = ''" min="0"
                                              onblur="this.placeholder = 'الرقم القومي'" placeholder="الرقم القومي">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row mt-3">
                                          <div class="col-md-5">
                                            <hr class="line">
                                          </div>
                                        </div>
                                        <div class="row mt-3 addDiv">
                                          <div class="col-md-4">
                                              <div class="add-icon">
                                                <span class="align-self-center" style="margin-top: 3px">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                            </div>
                                            <span class="add-text">اضافة</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row mt-4 hidden-buttons-inFirst"
                                      style="justify-content: space-around;display: none;">
                                        <div class="col-md-4 col-6 btns">
                                          <button class="prev-button" type="button">
                                            <span class="icon-button">
                                              <i class="fas fa-chevron-circle-right"></i>
                                            </span>
                                            <span class="text-button">رجوع</span>
                                          </button>
                                        </div>
                                        <div class="col-md-4 col-6 btns">
                                          <button class="next-button" type="submit">
                                            <span class="text-button">متابعة</span>
                                            <span class="icon-button">
                                              <i class="fa fa-chevron-circle-left"></i>
                                            </span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- End second-Page -->
                                    <!-- Start Third-Page -->
                                    <div class="page page-3">
                                      <div class="page-form">
                                        <div class="row">
                                            <div class="col-8">
                                              <div class="form-group row">
                                                <label for="" class="col-md-4 col-12 field-name"> نوع القرض</label>
                                                <div class="col-md-7 col-12">
                                                  <select id="select" name="type" class="select-option wide">
                                                    <option value="1">طاقة متجددة</option>
                                                    <option value="2">قرض صناعي</option>
                                                    <option value="3">قرض زراعي</option>
                                                    <option value="4">قرض منزلي</option>
                                                    <option value="5">قرض خدمات</option>
                                                    <option value="6">قرض تجاري</option>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group row mt-5">
                                                <label for="" class="col-md-4 col-12 field-name">مبلغ القرض </label>
                                                <!--<div class="col-md-6 col-12 align-self-center">
                                                  <div class="js-ag-range-slider">
                                                    <div class="js-ag-range-slider_fill"></div>
                                                    <div class="js-ag-range-slider_bg"></div>
                                                    <input class="js-ag-range-slider_range" type="range"
                                                    value="1" min="0" step="10" max="100">
                                                  </div>
                                                </div>-->
                                                <div class="col-md-7 mt-3 col-12">
                                                  <input type="number" class="form-control text-center input-name"
                                                  id="price" onfocus="this.placeholder = ''"
                                                  onblur="this.placeholder = '٤٠٠٠'" name="price" placeholder="٤٠٠٠">
                                                </div>
                                              </div>
                                              <!-- ايرور قيمه القرض -->
                                              <div class="row">
                                                <label for="" class="col-md-4 col-12">  </label>
                                                <div class="col-md-7 mt-1 col-12">
                                                  <p id="loan-error-price" class="error"></p>
                                                </div>
                                              </div>
                                              <div class="form-group row mt-5">
                                                <label for="" class="col-md-3 col-12 field-name"> مدة السداد </label>
                                                <div class="col-md-2 mt-2 col-6">
                                                  <div class="form-check">
                                                    <input class="form-check-input" checked value="1" type="radio" name="payment_period" id="one-year">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                      سنة
                                                    </label>
                                                  </div>
                                                  </div>
                                                  <div class="col-md-2 mt-2 col-6">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" value="2" name="payment_period" id="two-year">
                                                      <label class="form-check-label" for="flexRadioDefault1">
                                                        سنتين
                                                      </label>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="col-4">
                                              <div class="sidebar-content sidebar-2">
                                                <div class="sidebar-header">
                                                  حساب قيمة القرض
                                                  <!-- <p class="test"></p>  -->
                                                </div>
                                                <div class="debt-1">
                                                  <span class="debt-text text-start">قيمة القسط</span>
                                                  <span class="debt-price text-end">٣٤٥ جنية</span>
                                                </div>
                                                <div class="debt-2">
                                                  <div class="part-1 text-center">
                                                    <div class="loan">
                                                      <span class="debt-text text-start">قيمة القرض</span>
                                                      <!--<i class="fas fa-question-circle" style="font-size: 20px"
                                                      data-bs-toggle="tooltip" data-bs-placement="left" title="يتم خصم 9% رسوم ادارية"></i>-->
                                                    </div>
                                                    <span class="debt-price text-end">٣٦٤٠ جنية</span>
                                                  </div>
                                                  <!-- <div class="part-2">
                                                    <span class="debt-text">سعر الفائدة</span>
                                                    <span class="debt-price">2%</span>
                                                  </div> -->
                                                  <div class="part-2">
                                                    <span class="debt-text">عدد الاقساط</span>
                                                    <span class="debt-price">١٢</span>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                      </div>
                                      <div class="row mt-5" style="justify-content: space-around;">
                                        <div class="col-md-4 col-6 btns">
                                          <button class="prev-button" type="button">
                                            <span class="icon-button">
                                              <i class="fas fa-chevron-circle-right"></i>
                                            </span>
                                            <span class="text-button">رجوع</span>
                                          </button>
                                        </div>
                                        <div class="col-md-4 col-6 btns">
                                          <button class="next-button" type="submit">
                                            <span class="text-button">متابعة</span>
                                            <span class="icon-button">
                                              <i class="fa fa-chevron-circle-left"></i>
                                            </span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End Third-Page -->
                                    <!-- Start Fourth-Page -->
                                  {{-- <div class="page page-4">
                                    <div class="page-form">
                                      <h2 class="form-header">الدفع النقدي</h2>
                                      <div class="form-group mt-4 row payment">
                                        <label for="" class="col-md-4 col-12 field-name">ادخل رقم ايصال الدفع</label>
                                        <div class="col-md-8 col-12">
                                          <input type="number" class="form-control input-name" placeholder="٢٧٨٥٦٤١٢٠٨٣٣١٣"
                                          id="staticEmail" onfocus="this.placeholder = ''"
                                          onblur="this.placeholder = '٢٧٨٥٦٤١٢٠٨٣٣١٣'" placeholder="" min="0"
                                          max="9999" pattern=".{0,15}">
                                        </div>
                                      </div>
                                      <!-- <div class="row mt-4">
                                        <div class="span-with-border">
                                          <span style="color: #b68b25;font-weight: bold;">او</span>
                                        </div>
                                      </div>
                                      <div class="form-group row" style="margin-top: 2rem; margin-bottom: 2rem;">
                                        <label for="" class="col-md-8 col-12 field-name">الدفع عن طريق خالص</label>
                                        <div class="col-md-4 col-12">
                                          <img src="img/Image 1.png" style="cursor: pointer;margin-top: 20px;" width="150" height="150">
                                        </div>
                                      </div> -->
                                    </div>
                                    <div class="row mt-5" style="justify-content: space-around;">
                                      <div class="col-md-4 col-6 btns">
                                        <button class="prev-button" type="button">
                                          <span class="icon-button">
                                            <i class="fas fa-chevron-circle-right"></i>
                                          </span>
                                          <span class="text-button">رجوع</span>
                                        </button>
                                      </div>
                                      <div class="col-md-4 col-6 btns">
                                        <button class="next-button" type="button">
                                          <span class="text-button">متابعة</span>
                                          <span class="icon-button">
                                            <i class="fas fa-chevron-circle-left"></i>
                                          </span>
                                        </button>
                                      </div>
                                    </div>
                                  </div> --}}
                                  <!-- End Fourth-Page -->

                                  <!-- Start Fifth-Page -->
                                  <div class="page page-4 ">
                                    <div class="form-1">
                                      <div class="page-form ">
                                        <div class="form-group row">
                                          <label for="" class="col-md-4 col-12 field-name">تليفون محمول</label>
                                          <div class="col-md-8 col-12">
                                            <input type="number" class="form-control input-name"
                                            id="staticEmail" name="phone_number" min="0"
                                            >

                                          </div>
                                        </div>
                                        <!-- ايرور  رقم التليفون -->
                                        <div class="row">
                                            <label for="" class="col-md-4 col-12">  </label>
                                            <div class="col-md-8 mt-1 col-12">
                                              <p class="error" id="loan-error-phone_number">
                                                 </p>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                          <label for="" class="col-md-4 col-12 field-name">تليفون أرضي</label>
                                          <div class="col-md-8 col-12">
                                            <input type="number" name="land_line_number" class="form-control input-name"
                                            id="staticEmail"  min="0"
                                            >
                                          </div>
                                        </div>
                                        <!-- ايرور  التليفون الارضي-->
                                        <div class="row">
                                            <label for="" class="col-md-4 col-12">  </label>
                                            <div class="col-md-8 mt-1 col-12">
                                              <p class="error" id="loan-error-land_line_number">

                                                  </p>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-5">
                                          <label for="" class="col-md-4 col-12 field-name">تاريخ الميلاد</label>
                                          <div class="col-md-8 col-12">
                                            <input class="form-control fs-20 input-name" name="date_of_birth" type="date" id="birthday"
                                            name="birthday" value="2000-01-01" min="1980-01-01" max="2021-01-01"><!--2000-01-01-->
                                          </div>
                                        </div>
                                        <!-- ايرور  تاريخ الميلاد  -->
                                        <div class="row">
                                            <label for="" class="col-md-4 col-12">  </label>
                                            <div class="col-md-8 mt-1 col-12">
                                              <p class="error" id="loan-error-date_of_birth">
                                                  </p>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-5">
                                          <label for="" class="col-md-4 col-12 field-name">الرقم التاميني</label>
                                          <div class="col-md-8 col-12">
                                            <input type="number" name="number_of_insurance" class="form-control input-name"
                                            id="staticEmail" min="0"
                                            >
                                          </div>
                                        </div>
                                        <!-- ايرور  رقم التأمين -->
                                        <div class="row">
                                            <label for="" class="col-md-4 col-12">  </label>
                                            <div class="col-md-8 mt-1 col-12">
                                              <p class="error" id="loan-error-number_of_insurance">

                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-5">
                                          <label for="" class="col-md-4 col-12 field-name">الحالة الاجتماعية</label>
                                          <div class="col-md-2 col-6 mt-3">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" value="0" name="social_status">
                                              <label class="form-check-label" for="flexRadioDefault1">
                                                متزوجة
                                              </label>
                                            </div>
                                            </div>
                                            <div class="col-md-2 col-6 mt-3">
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="social_status">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  مطلقة
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-2 col-6 mt-3">
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" value="2" name="social_status">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  ارملة
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-2 col-6 mt-3">
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" value="3" checked name="social_status">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  عزباء
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group children row mt-5">
                                          <label for="" class="col-md-4 col-12 field-name">عدد الاطفال</label>
                                          <div class="col-md-8 col-12">
                                            <input type="number" class="form-control input-name"
                                            id="staticEmail" name="number_of_children" onfocus="this.placeholder = ''" value="0"
                                            onblur="this.placeholder = ''" placeholder="">
                                          </div>
                                        </div>
                                        <!-- ايرور  عدد الاطفال -->
                                        <div class="row">
                                            <label for="" class="col-md-4 col-12">  </label>
                                            <div class="col-md-8 mt-1 col-12">
                                              <p class="error" id="loan-error-number_of_children">
                                                  </p>
                                            </div>
                                        </div>
                                        <div class="form-group kids row mt-5 special-case">
                                          <label for="" class="col-md-8 col-12 field-name">
                                            هل لديك اطفال من ذوي الاحتياجات الخاصة
                                          </label>
                                          <div class="col-md-2 col-6 mt-3">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" value="1" name="have_special_case">
                                              <label class="form-check-label" for="flexRadioDefault1">
                                                نعم
                                              </label>
                                            </div>
                                            </div>
                                            <div class="col-md-2 col-6 mt-3">
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" value="0" checked name="have_special_case">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  لا
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                          <label class="col-md-4 col-12 field-name">عنوان مقدم الطلب<span>
                                            <small>
                                              (طبقا للرقم القومي)
                                            </small>
                                          </span></label>
                                          <div class="col-md-8 col-12">
                                            <input type="text" class="form-control input-name"
                                            name="applicant_address"
                                            id="staticEmail" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'رقم المبني/رقم الشقه/اسم الشارع/قريه/نجع'" placeholder="رقم المبني/رقم الشقه/اسم الشارع/قريه/نجع">
                                          </div>
                                        </div>
                                        <!-- ايرور   عنوان مقدم الطلب -->
                                        <div class="row">
                                            <label for="" class="col-md-4 col-12">  </label>
                                            <div class="col-md-8 mt-1 col-12">
                                              <p class="error" id="loan-error-applicant_address">
                                                  </p>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                          <div class="col-md-4"></div>
                                          <div class="col-md-4 col-12">
                                            <select id="applicant_country" name="applicant_country" class="select-option wide">
                                              <option value="" selected disabled>المحافظة</option>
                                              @foreach ($countries as $country )
                                              <option value="{{$country->id}}" >{{$country->name}}</option>
                                            @endforeach

                                            </select>
                                            <p class="error" id="loan-error-applicant_country">
                                            </p>
                                          </div>
                                          <div class="col-md-4 col-12 state-grpup">
                                            <select id="applicant_city" name="applicant_city" class="select-area select-option state-grpup wide select-applicant-country">
                                              <option value="" selected disabled>المدينة/ المركز</option>
                                              {{-- <option value="1" >الجيزة</option> --}}
                                            </select> <p class="error" id="loan-error-applicant_city">
                                            </p>
                                          </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-md-4 col-12 field-name">عنوان مقدم الطلب<span>
                                              <small>
                                                (العنوان الفعلي)
                                              </small>
                                            </span></label>
                                          </label>
                                          <div class="col-md-4 mt-3">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" checked value="address" name="address"
                                              id="">
                                              <label class="form-check-label" for="flexRadioDefault1">
                                                نفس العنوان
                                              </label>
                                            </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" value="newAddress"
                                                name="address" id="another-address-btn">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  عنوان اخر
                                                </label>
                                              </div>
                                            </div>

                                        </div>
                                        <div class="another-address-content">
                                          <div class="form-group row">
                                            <label class="col-md-4 col-12 field-name"></label>
                                            <div class="col-md-8 col-12">
                                              <input type="text" class="form-control input-name"
                                              id="staticEmail" name="real_address" onfocus="this.placeholder = ''"
                                              onblur="this.placeholder = 'رقم المبني/رقم الشقه/اسم الشارع/قريه/نجع'"
                                              placeholder="رقم المبني/رقم الشقه/اسم الشارع/قريه/نجع">
                                            </div>
                                          </div>
                                          <div class="form-group row mt-3">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4 col-12">
                                              <select id="real_address_country" name="real_country" class="select-option wide ">
                                                <option value="">المحافظة</option>
                                                @foreach ($countries as $country )
                                                <option value="{{$country->id}}" >{{$country->name}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                            <div class="col-md-4 col-12">
                                              <select id="real_address_city" name="real_city" class="select-area select-option state-grpup wide select-another-address-country">
                                                <option value="">المدينة/ المركز</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row mt-5" style="justify-content: space-around;">
                                        <div class="col-md-4 col-6 btns">
                                          <button class="prev-button" type="button">
                                            <span class="icon-button">
                                              <i class="fas fa-chevron-circle-right"></i>
                                            </span>
                                            <span class="text-button">رجوع</span>
                                          </button>
                                        </div>
                                        <div class="col-md-4 col-6 btns">
                                          <button class="switch-part-2" type="button">
                                            <span class="text-button">متابعة</span>
                                            <span class="icon-button">
                                              <i class="fa fa-chevron-circle-left"></i>
                                            </span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-2">
                                      <div class="page-form">
                                        <div class="form-group row">
                                          <label for="" class="col-md-4 col-12 field-name">وصف المشروع</label>
                                          <div class="col-md-8 col-12">
                                            <textarea class="form-control project-description" name="description" cols="" rows="8"></textarea>
                                          </div>
                                        </div>
                                        <div class="row">
                                            <label for="" class="col-md-4 col-12">  </label>
                                            <div class="col-md-8 mt-1 col-12">
                                              <p class="error" id="loan-error-description">

                                              </p>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5" style="min-height: 3.75rem">
                                          <label for="" class="col-md-4 col-12 field-name">
                                            هل لديكة سابق خبرة
                                          </label>
                                          <div class="col-md-2 col-6 mt-3">
                                            <div class="form-check">
                                              <input class="form-check-input" checked value="0" type="radio" name="have_experince"
                                              id="">
                                              <label class="form-check-label" for="flexRadioDefault1">
                                                لا
                                              </label>
                                            </div>
                                            </div>
                                            <div class="col-md-2 col-6 mt-3">
                                              <div class="form-check">
                                                <input class="form-check-input" value="1" type="radio" name="have_experince"
                                                id="radio-experience">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  نعم
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-4 input-year" style="display: none;">
                                                <input class="form-control input-name" type="number" name="number_of_experice_years"
                                                onfocus="this.placeholder = ''" min="0"
                                                onblur="this.placeholder = 'عدد السنوات'"
                                                placeholder="عدد السنوات">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                          <label for="" class="col-md-4 col-12 field-name">
                                            مقر المشروع
                                          </label>
                                          <div class="col-md-2 col-6 mt-3">
                                            <div class="form-check">
                                              <input class="form-check-input" value="1" type="radio" name="is_owner_project">
                                              <label class="form-check-label" for="flexRadioDefault1">
                                                تمليك
                                              </label>
                                            </div>
                                            </div>
                                            <div class="col-md-2 col-6 mt-3">
                                              <div class="form-check">
                                                <input class="form-check-input" checked value="0" type="radio" name="is_owner_project">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  ايجار
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                          <label class="col-md-4 col-12 field-name">عنوان مقر المشروع</label>
                                          <div class="col-md-8 col-12">
                                            <input type="text" name="address_project" class="form-control input-name"
                                            id="staticEmail" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'عنوان مقر المشروع'"
                                            placeholder="عنوان مقر المشروع">
                                          </div>
                                        </div>
                                        <div class="row">
                                            <label for="" class="col-md-4 col-12">  </label>
                                            <div class="col-md-8 mt-1 col-12">
                                              <p class="error" id="loan-error-address_project"></p>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                          <div class="col-md-4"></div>
                                          <div class="col-md-4 col-12">
                                            <select id="address_project_country" name="address_project_country" class="select-option wide">
                                              <option value="" disabled selected>المحافظة</option>
                                              @foreach ($countries as $country )
                                              <option value="{{$country->id}}" >{{$country->name}}</option>
                                            @endforeach
                                            </select>
                                            <p class="error" id="loan-error-address_project_country">
                                            </p>
                                          </div>
                                          <div class="col-md-4 col-12">
                                            <select id="address_project_city" name="address_project_city" class="select-area select-option state-grpup wide select-another-address-city">
                                              <option value="" selected disabled>المدينة/ المركز</option>

                                            </select>
                                            <p class="error" id="loan-error-address_project_city">
                                            </p>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row mt-5" style="justify-content: space-around;">
                                        <div class="col-md-4 col-6 btns">
                                          <button class="prev-form-1" type="button">
                                            <span class="icon-button">
                                              <i class="fas fa-chevron-circle-right"></i>
                                            </span>
                                            <span class="text-button">رجوع</span>
                                          </button>
                                        </div>
                                        <div class="col-md-4 col-6 btns">
                                          <button class="next-button" type="submit">
                                            <span class="text-button">متابعة</span>
                                            <span class="icon-button">
                                              <i class="fa fa-chevron-circle-left"></i>
                                            </span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- End Fifth-Page -->
                                  <!-- Start Sixth-Page -->
                                  <div class="page page-5">
                                    <div class="guarantor-form">
                                      <div class="page-form">
                                        <div class="form-group row">
                                          <label class="col-md-4 col-12 field-name">نوع الضامن</label>
                                        </div>
                                        <div class="form-group row mt-4">
                                          <div class="col-md-4 col-12">
                                            <div class="form-check">
                                              <input class="form-check-input personal-radio" checked value="personal" type="radio"
                                              name="guarantor" onclick="reset_guarantor('personal')" >
                                              <label class="form-check-label" for="flexRadioDefault1">
                                                شخصي
                                              </label>
                                            </div>
                                          </div>
                                          <div class="col-md-4 col-12">
                                            <div class="form-check">
                                              <input class="form-check-input salary-radio" type="radio" value="salary" name="guarantor"
                                              onclick="reset_guarantor('salary')">
                                              <label class="form-check-label" for="flexRadioDefault1">
                                                تحويل مرتب
                                              </label>
                                            </div>
                                          </div>
                                          <div class="col-lg-4 col-12">
                                            <div class="form-check">
                                                <input class="form-check-input pension-radio" value="organization"
                                                    type="radio" name="guarantor"
                                                    onclick="reset_guarantor('organization')">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                   تحويل معاش
                                                </label>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row mt-4">
                                          <div class="col-12">
                                            <hr class="page-5-line">
                                          </div>
                                        </div>
                                        <div class="form-group dynamic-form row">
                                          <div class="personal-form row">
                                            <label class="col-md-6 d-none d-sm-block field-name">
                                              الاسم الثلاثي
                                            </label>
                                            <label class="col-md-6 d-none d-sm-block field-name">
                                              الرقم القومي
                                            </label>
                                            <div class="col-md-6 mt-3 col-12">
                                                <input type="text" class="form-control input-name"
                                                id="staticEmail" onfocus="this.placeholder = ''" name="guarantor_personal_1"
                                                onblur="this.placeholder = 'الاسم الثلاثي'" placeholder="الاسم الثلاثي">
                                                <p class="error" id="loan-error-guarantor_personal_1"></p>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <input type="number" class="form-control input-name"
                                                id="staticEmail" onfocus="this.placeholder = ''" min="0" name="guarantor_personal_2"
                                                onblur="this.placeholder = 'الرقم القومي'" placeholder="الرقم القومي">
                                                <p class="error" id="loan-error-guarantor_personal_2"></p>
                                            </div>
                                          </div>

                                          <div class="salary-form row">
                                            <label class="col-lg-6 d-none d-lg-block field-name">
                                                قيمة المرتب الشهري
                                            </label>
                                            <label class="col-lg-6 d-none d-lg-block field-name">
                                                جهة العمل
                                            </label>
                                            <div class="col-lg-6 mt-3 col-12">
                                                <input type="number" class="form-control fs-20 input-name"
                                                    id="" onfocus="this.placeholder = ''" name="guarantor_salary_1"
                                                    onblur="this.placeholder = 'الراتب الشهري'"
                                                    placeholder="الراتب الشهري">
                                                    <p class="error" id="loan-error-guarantor_salary_1"></p>

                                            </div>
                                            <div class="col-lg-6 mt-3 col-12">
                                                <textarea class="form-control work-place fs-20" name="guarantor_salary_2" rows="3" onfocus="this.placeholder = ''" onblur="this.placeholder = 'جهة العمل'" placeholder="جهة العمل"></textarea>
                                                <p class="error" id="loan-error-guarantor_salary_2"></p>

                                            </div>
                                        </div>

                                          <div class="pension-form row">
                                                <label class="col-lg-6 d-none d-lg-block field-name">
                                                   قيمة المعاش
                                                </label>
                                                <div class="col-lg-6 mt-3 col-12">
                                                    <input type="number" class="form-control fs-20 input-name"
                                                        id="staticEmail" onfocus="this.placeholder = ''" name="guarantor_organization_1"
                                                        onblur="this.placeholder = 'قيمة المعاش'" min="0"
                                                        placeholder="قيمة المعاش">
                                                        <p class="error" id='loan-error-guarantor_organization_1'></p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="row mt-5" style="justify-content: space-around;">
                                        <div class="col-md-4 col-6 btns">
                                          <button class="prev-button" type="button">
                                            <span class="icon-button">
                                              <i class="fas fa-chevron-circle-right"></i>
                                            </span>
                                            <span class="text-button">رجوع</span>
                                          </button>
                                        </div>
                                        <div class="col-md-4 col-6 btns">
                                          <button class="next-button" type="submit">
                                            <span class="text-button">متابعة</span>
                                            <span class="icon-button">
                                              <i class="fa fa-chevron-circle-left"></i>
                                            </span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                  </form>
                                  <!-- End Sixth-Page -->
                                  <!-- Start Seventh-Page -->
                                  <div class="page page-6 ">
                                  <form id="fileForm" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="upload-form">
                                      <div class="page-form">
                                        <div class="form-group row">
                                          <div class="col-md-8 col-12">
                                            <i class="fas fa-file me-2 fa-2x"></i>
                                            <label for="" class="field-name">
                                              صورة بطاقة الرقم القومي الاماميه
                                            </label>
                                          </div>
                                          <div class="col-md-3 choose-file col-10">
                                            <input type="file" name="national_id_front_file" id="file-1" accept="image/*" class="input-file d-none">
                                            <label for="file-1" class="upload-btn text-truncate">
                                              اختار الملفات
                                            </label>
                                            <p class="error" id="loan-error-national_id_front_file"></p>
                                          </div>
                                        </div>

                                        <div class="form-group row mt-5">
                                            <div class="col-md-8 col-12">
                                              <i class="fas fa-file me-2 fa-2x"></i>
                                              <label for="" class="field-name">
                                                صورة بطاقة الرقم القومي الخلفيه
                                              </label>
                                            </div>
                                            <div class="col-md-3 choose-file col-10">
                                              <input type="file" name="national_id_end_file" id="file-2" accept="image/*" class="input-file d-none">
                                              <label for="file-2" class="upload-btn text-truncate">
                                                اختار الملفات
                                              </label>
                                              <p class="error" id="loan-error-national_id_end_file"></p>
                                            </div>
                                          </div>

                                        <div class="form-group row mt-5">
                                          <div class="col-md-8 col-12">
                                            <i class="fas fa-file me-2 fa-2x"></i>
                                            <label for="" class="field-name">
                                              إيصال مرافق خاص بمحل الإقامة
                                            </label>
                                          </div>
                                          <div class="col-md-3 choose-file col-10">
                                            <input type="file" id="file-3" name="home_service_file" accept="image/*" class="input-file d-none">
                                            <label for="file-3" class="upload-btn text-truncate">اختار الملفات</label>
                                            <p class="error" id="loan-error-home_service_file"></p>

                                          </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                          <div class="col-md-8 col-12">
                                            <i class="fas fa-file me-2 fa-2x"></i>
                                            <label for="" class="field-name">
                                              عقد إيجار/تمليك مقر المشروع
                                            </label>
                                          </div>
                                          <div class="col-md-3 choose-file col-10">
                                            <input type="file" name="rent_file" id="file-4" accept="image/*" class="input-file d-none">
                                            <label for="file-4" class="upload-btn text-truncate">اختار الملفات</label>
                                            <p class="error" id="loan-error-rent_file"></p>
                                          </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                          <div class="col-md-8 col-12">
                                            <i class="fas fa-file me-2 fa-2x"></i>
                                            <label for="" class="field-name">
                                              عرض/عروض اسعار مستلزمات المشروع
                                            </label>
                                          </div>
                                          <div class="col-md-3 choose-file col-10">
                                            <input type="file" name="price_file" id="file-5" accept="image/*" class="input-file d-none">
                                            <label for="file-5" class="upload-btn text-truncate">اختار الملفات</label>
                                            <p class="error" id="loan-error-price_file"></p>
                                          </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                          <div class="col-md-8 col-12">
                                            <i class="fas fa-file me-2 fa-2x"></i>
                                            <label for="" class="field-name">
                                              مستند ضمان القرض (خطاب المؤسسة)
                                            </label>
                                          </div>
                                          <div class="col-md-3 choose-file col-10">
                                            <input type="file" name="partner_file" id="file-6" accept="image/*" class="input-file d-none">
                                            <label for="file-6" class="upload-btn text-truncate">اختار الملفات</label>
                                            <p class="error" id="loan-error-partner_file"></p>

                                          </div>
                                        </div>
                                      </div>
                                      <div class="row mt-5" style="justify-content: space-around;">
                                        <div class="col-md-4 col-6 btns">
                                          <button class="prev-button" type="button">
                                            <span class="icon-button">
                                              <i class="fas fa-chevron-circle-right"></i>
                                            </span>
                                            <span class="text-button">رجوع</span>
                                          </button>
                                        </div>
                                        <div class="col-md-4 col-6 btns">
                                          <button class="switch-to-info" type="submit">
                                            <span class="text-button">متابعة</span>
                                            <span class="icon-button">
                                                <i class="fa fa-chevron-circle-left"></i>
                                            </span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </form>

                                    <div class="info-page">

                                      <div class="col-12 col-lg-12 second-container">
                                        <div class="row d-flex justify-content-between">
                                          <div class="col-sm-6 Applicant-data">
                                            <h3 class="title mb-3"> بيانات مقدم الطلب</h3>
                                            <!-- الاسم الثلاثي  -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p> الاسم الثلاثي  </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-name" ></p>
                                              </div>
                                            </div>

                                            <!--  الرقم القومي -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p>    الرقم القومي </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-national_id"> </p>
                                              </div>
                                            </div>

                                            <!--  عنوان مقدم الطلب  -->
                                            {{-- <div class="row">
                                              <div class="col-6 labels">
                                                <p>   عنوان مقدم الطلب
                                                  <br>
                                                  <span style="font-size: 14px;">(طبقاً للرقم القومي) </span>
                                                </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p>  منى عبدالله حسين</p>
                                                <p>المحافظة</p>
                                                <p>المدينة / المركز</p>
                                              </div>
                                            </div> --}}

                                            <!--   تليفون محمول  -->
                                            <div class="row">
                                                <div class="col-6 labels">
                                                  <p>     تليفون محمول </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p id="loan-data-phone_number">  </p>
                                                </div>
                                            </div>

                                            <!--   تليفون أرضي   -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p>    تليفون أرضي   </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-land_line_number">  </p>
                                              </div>
                                            </div>


                                          </div>

                                          <div class="col-sm-6 loan-data">
                                            <h3 class="title mb-3"> بيانات القرض  </h3>

                                            <!-- نوع القرض -->
                                            <div class="row">
                                                <div class="col-6 labels">
                                                  <p> نوع القرض </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p id="loan-data-type"> تجاري</p>
                                                </div>
                                            </div>

                                            <!--قيمة القرض المطلوب -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p>  قيمة القرض المطلوب </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-price"> ١٢٣٠</p>
                                              </div>
                                            </div>

                                            <!--  مدة السداد -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p>   مدة السداد </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-payment_period"> ١ سنة</p>
                                              </div>
                                            </div>

                                            <!--   قيمة القسط -->
                                            <div class="row">
                                                <div class="col-6 labels">
                                                  <p>    قيمة القسط </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p id="loan-data-depit_value"> ١٢٣٠ </p>
                                                </div>
                                            </div>

                                            <!--   نوع الضامن  -->
                                            {{-- <div class="row">
                                              <div class="col-6 labels">
                                                <p>    نوع الضامن  </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p> شخصي </p>
                                              </div>
                                            </div> --}}

                                            <!--   بيانات الضامن   -->
                                            {{-- <div class="row">
                                              <div class="col-6 labels">
                                                <p>    بيانات الضامن   </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p> منى عبدالله حسين </p>
                                                <p>٢٧٨٥٦٤١٢٠٨٣٣١٣</p>
                                              </div>
                                            </div> --}}

                                          </div>
                                        </div>
                                      </div>

                                      <div class="row tab-data">
                                        <div class="col-5">
                                          <h3 class="title mb-3">   البيانات الشخصية</h3>
                                            <!-- تاريخ الميلاد   -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p> تاريخ الميلاد   </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-date_of_birth">   ٢٣-٠٣-١٩٦٧</p>
                                              </div>
                                            </div>

                                            <!--   الحالة الاجتماعية -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p>    الحالة الاجتماعية  </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-social_status"> متزوجة</p>
                                              </div>
                                            </div>

                                              <!--    عدد الأطفال  -->
                                              <div class="row">
                                                <div class="col-6 labels">
                                                  <p>   عدد الأطفال   </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p id="loan-data-number_of_children">    ٣</p>
                                                </div>
                                              </div>

                                              <!--    أبناء من ذوي الاحتياجات الخاصة  -->
                                              <div class="row">
                                                  <div class="col-6 labels">
                                                    <p>      أبناء من ذوي الاحتياجات الخاصة </p>
                                                  </div>
                                                  <div class="col-6 data text-break">
                                                    <p id="loan-data-have_special_case">  </p>
                                                  </div>
                                              </div>

                                              <!--    عنوان مقدم الطلب   -->
                                              {{-- <div class="row">
                                                <div class="col-6 labels">
                                                  <p>     عنوان مقدم الطلب
                                                    <br>
                                                    <span style="font-size: 14px;">(العنوان الفعلي)</span>
                                                  </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p> منى عبدالله حسين </p>
                                                  <p>المحافظة</p>
                                                  <p>المدينة / المركز</p>
                                                </div>
                                              </div> --}}

                                              <!--      الرقم التأميني    -->
                                              <div class="row">
                                                <div class="col-6 labels">
                                                  <p>      الرقم التأميني </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p id="loan-data-number_of_insurance"> ٨٧٦٢٣٤٣٢٤٧٧  </p>
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-1 divider">
                                          <hr>
                                        </div>

                                        <div class="col-6">
                                          <h3 class="title mb-3"> بيانات المشروع </h3>
                                            <!--   الخبرات السابقة   -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p>   الخبرات السابقة   </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-have_experince"> </p>
                                              </div>
                                            </div>

                                            <!--   سنوات الخبرة -->
                                            <div class="row">
                                              <div class="col-6 labels">
                                                <p>    سنوات الخبرة  </p>
                                              </div>
                                              <div class="col-6 data text-break">
                                                <p id="loan-data-number_of_experice_years"> ٠</p>
                                              </div>
                                            </div>

                                              <!--    مقر المشروع  -->
                                              {{-- <div class="row">
                                                <div class="col-6 labels">
                                                  <p>   مقر المشروع   </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p>    إيجار</p>
                                                </div>
                                              </div> --}}

                                              <!--    عنوان مقر المشروع  -->
                                              <div class="row">
                                                  <div class="col-6 labels">
                                                    <p>      عنوان مقر المشروع </p>
                                                  </div>
                                                  <div class="col-6 data text-break">
                                                    <p id="loan-data-address_project"> تثق نايس ددت </p>
                                                    {{-- <p>المحافظة</p>
                                                    <p>المدينة / المركز</p> --}}
                                                  </div>
                                              </div>

                                              <!--    شركاء آخرون   -->
                                              {{-- <div class="row">
                                                <div class="col-6 labels">
                                                  <p>     شركاء آخرون   </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p> لا يوجد </p>
                                                </div>
                                              </div> --}}

                                              <!--      وصف المشروع    -->
                                              <div class="row">
                                                <div class="col-6 labels">
                                                  <p>      وصف المشروع </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                  <p id="loan-data-description"> ورشة تفصيل ملابس
                                                    نسايت تينطم ني دزذشتست تنشي نن ثث ممي خصضحث طنش .حي لشي
                                                      </p>
                                                </div>
                                              </div>
                                        </div>
                                      </div>
                                      {{-- <div class="row mt-3">
                                        <div class="col-md-8 col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="privacy">
                                                <label class="form-check-label" for="privacy">
                                                  الموافقة علي  <a href="">الشروط والاحكام</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}

                                      <div class="row mt-5" style="justify-content: space-around;">
                                        <div class="col-md-4 col-6 btns">
                                          <button class="switch-to-uploadForm" type="button">
                                            <span class="icon-button">
                                              <i class="fas fa-chevron-circle-right"></i>
                                            </span>
                                            <span class="text-button">رجوع</span>
                                          </button>
                                        </div>
                                        <div class="col-md-4 col-6 btns">
                                          <button class="order" type="button">
                                            <span class="text-button">تقديم الطلب</span>
                                            <span class="icon-button">
                                              <i class="fas fa-chevron-circle-left"></i>
                                            </span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                  <!-- End Seventh-Page -->

                                </div>
                              </div>
                              </div>
                            </div>
                         </div>
                      </div>
                    <!-- End New Application #tab2-->
                </div>
              <!-- End Left Side -->

            </div>
        </div>
    </section>
@include('layouts.footer')

{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        // Countries
        var country_arr = new Array("المحافظة","القاهرة","الجيزة","القليوبية","الاسكندرية","البحيرة","مطروح","دمياط","الدقهلية","كفرالشيخ","الغربية","المنوفية","الشرقية","بورسعيد","الإسماعيلية","السويس","شمال سيناء","جنوب سيناء","بني سويف","الفيوم","المنيا","أسيوط","الوادي الجديد","البحر الأحمر","سوهاج","قنا","الأقصر","أسوان");

        $.each(country_arr, function (i, item) {
            $('#applicant_city, #applicant_city_address').append($('<option>', {
                value: i,
                text : item,
            }, '</option>' ));
        });

        // States
        var s_a = new Array();
        s_a[1]="مصر الجديدة|النزهة|مدينة نصر|عين شمس|السلام|المرج|منشأة ناصر | المطرية|الجمالية|الدرب الأحمر|قصر النيل|الزمالك|عابدين|الأزبكية|بولاق|شبرا|الزاوية الحمراء|حدائق القبة|روض الفرج|الشرابية|الزيتون|مصر القديمة|الخليفة|المقطم|البساتين|دار السلام|السيدة زينب";
        s_a[2]="الجيزة|السادس من أكتوبر|الشيخ زايد|الحوامدية|البدرشين|الصف|أطفيح|العياط|الباويطي|منشأة القناطر|أوسيم|كرداسة|أبو النمرس";
        s_a[3]="بنها|قليوب|شبرا الخيمة|القناطر الخيرية|الخانكة|كفر شكر|طوخ|قها|العبور|الخصوص|شبين القناطر";
        s_a[4]="الاسكندرية|برج العرب|برج العرب الجديدة";
        s_a[5]="دمنهور|كفر الدوار|رشيد|إدكو|أبو المطامير|أبو حمص| الدلنجات|المحمودية|الرحمانية|ايتاي البارود|حوش عيسى| شبراخيت|كوم حمادة |بدر|وادي النطرون|النوبارية الجديدة";
        s_a[6]="مرسى مطروح|الحمام|العلمين|الضبعة|النجيلة|سيدي براني|السلوم|سيوة";
        s_a[7]="دمياط|دمياط الجديدة|رأس البر|فارسكور|كفر سعد|الزرقا|السرو|الروضة|كفر البطيخ|عزبة البرج|ميت أبو غالب";
        s_a[8]="المنصورة|طلخا|ميت غمر|دكرنس|أجا|منية النصر|السنبلاوين|الكردي|بني عبيد|المنزلة|تمي الأمديد|الجمالية|شربين|المطرية|بلقاس|ميت سلسيل|جمصة|محلة دمنة|نبروه";
        s_a[9]="كفر الشيخ|دسوق|فوه|مطوبس|بلطيم|مصيف بلطيم|الحامول|بيلا|الرياض|سيدي سالم|قلين|سيدي غازي|برج البرلس|مسير";
        s_a[10]="طنطا|المحلة الكبرى|كفر الزيات|زفتى|السنطة|قطور|بسيون|سمنود";
        s_a[11]="شبين الكوم|مدينة السادات|منوف|سرس الليان|أشمون|الباجور|فويسنا|بركة السبع|تلا|الشهداء";
        s_a[12]="الزقازيق|العاشر من رمضان|منيا القمح|بلبيس|مشتول السوق|القنايات|أبو حماد|قرين|ههيا|أبو كبير|فاقوس|الصالحية الجديدة|الإبراهيمية|ديرب نجم|كفر صقر|أولاد صقر|الحسينية|صان الحجر القبلية|منشأة أبو عمر";
        s_a[13]="بورسعيد|بورفؤاد";
        s_a[14]="الاسماعيلية|فايد|القنطرة شرق|القنطرة غرب|التل الكبير|أبو صوير المحطة|القصاصين الجديدة";
        s_a[15]="السويس";
        s_a[16]="العريش|الشيخ زويد|رفح|بئر العبد|الحسنة|نخل";
        s_a[17]="طور|شرم الشيخ|دهب|نويبع|طابا|سانت كاترين|أبو رديس|ابو زنيمة|راس سدر";
        s_a[18]="بني سويف|بني سويف الجديدةِ|الواسطى|ناصر|اهناسيا|ببا|سمسطا|الفشن";
        s_a[19]="الفيوم|الفيوم الجديدة|طامية|سنورس|إطسا|إبشواي|يوسف الصديق";
        s_a[20]="المنيا|المنيا الجديدة|العدوة|مغاغة|بني مزار|مطاي|سمالوط|المدينة الفكرية|ملوي|دير مواس";
        s_a[21]="أسيوط|أسيوط الجديدة|ديروط|منفلوط|القوصيه|أبانوب|أبو تيج|الغنايم|ساحل سليم|البداري|صدفا";
        s_a[22]="الخارجة|باريس|موط|الفرافرة|البلاط";
        s_a[23]="الغردقة|راس غالب|سفاجة|القصير|مرسى علم|شلاتين|حلايب";
        s_a[24]="سوهاج|سوهاج الجديدة|أخميم|أخميم الجديدة|البلينا|المراغة|المنشأة|دار السلام|جرجا|جهينة الغربية|ساقلته|طما|طهطا";
        s_a[25]="قنا|قنا الجديدة|أبو تشت|نجع حمادي|دشنا|الوقف|قفط|نقادة|قوص|فرشوط";
        s_a[26]="الأقصر|الأقصر الجديدة|طيبة الجديدة|الزينية|البياضية|القرنة|أرمنت|الطود|إسنا";
        s_a[27]="أسوان|أسوان الجديدة|دراو|كوم امبو|نصر النوبة|كلابشة|إدفو|الرديسية|البصيلية|السباعية|أبو سمبل السياحية";


        setTimeout(() => {
            $('.state-grpup .current').text('المدينة');
        }, 300);
        $('#applicant_city, #country').change(function(){
            $('.state-grpup .list').empty();
            var c = $(this).val();
            var state_arr = s_a[c].split("|");
            // console.log(state_arr);
            $('#applicant_area').empty();
            if(c==0){
                $('#applicant_area').append($('<option>', {
                    value: '0',
                    text: 'Select State',
                }, '</option>'));
                // $('.state-grpup .current').text('المدينة');
            }else {
                $.each(state_arr, function (i, item_state) {
                    $('#applicant_area').append($('<option>', {
                        value: item_state,
                        text: item_state,
                    }, '</option>'));
                    $('.state-grpup .list').append(`<li class=option data-value=${item_state} > ${item_state}</li>`);
                });
                $('.state-grpup .current').text('');
                $('.state-grpup .current').append(state_arr[0])
            }

        });


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


    });
</script> --}}
