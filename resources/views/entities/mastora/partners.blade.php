@include('layouts.header')
<section class="pt-5 pb-5"
    style="background: url(/mastora/img/Group\ 52.png) #F7F7F7 no-repeat; background-size: cover; background-position: center;">
    <!--Popup-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <select name="" id="modal-niceSelect" class="modal-niceSelect">
                                <option selected value="">اختار الشريك</option>
                                @foreach ($partners as $partener )
                                    <option value="{{$partener->id}}">{{$partener->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <p class="notes mb-2">ملاحظات</p>

                            <input type="text"
                                placeholder=" اتلتال تالتا تاملات س لنمو تاكا مالنا الكخ لبي اكح؛ن يقغتعب أنسب بردلك زز ">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="modal-footer d-flex justify-content-center">

                        <div class="col-8">
                            <button type="button" class="done">تعيين</button>
                        </div>

                        <div class="col-3">
                            <button type="button" class="cancel" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end popup-->

    <!--Delete Alert -->

    <div id="CloseModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="fas fa-times"></i>
                    </div>
                    <h4 class="modal-title w-100">هل أنت متأكد؟</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-bs-hidden="true"
                        style="border: none; background: none;color:#DF2024;font-size: 25px;margin-right: 20px;">&times;</button>
                </div>
                <div class="modal-body">
                    <p>هل تريد حقًا حذف هذه السجلات؟ لا يمكن التراجع عن هذه العملية .</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger">حذف</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>

                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Alert-->
    
    <div class="container-fauld">

        <div class="row">
            <!--Right Side -->
            <x-side-nav />
            <!--End Right Side -->

            <!-- Left Side -->
            <div class="col-9">
                <div class="tab-content" id="buttonsTabContent">
                    <!--All Applications #tab1-->
                    <div class="tab-pane fade show active" id="All-applications" role="tabpanel"
                        aria-labelledby="All-applications-tab">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <!--<input class="search"  placeholder="بحث">
                                    <svg id="Research" xmlns="http://www.w3.org/2000/svg" width="26.503" height="26.602" viewBox="0 0 26.503 26.602">
                                    <path id="Vector" d="M25.3,19.712l-2.76-2.827a4.107,4.107,0,0,0-4.533-.76l-1.2-1.2a9.333,9.333,0,1,0-1.88,1.88l1.187,1.187a4,4,0,0,0,.707,4.613l2.827,2.827a4.021,4.021,0,1,0,5.653-5.72ZM13.992,14.059a6.667,6.667,0,1,1,1.45-2.165,6.667,6.667,0,0,1-1.45,2.165Zm9.427,9.427a1.333,1.333,0,0,1-1.893,0L18.7,20.659a1.339,1.339,0,1,1,1.893-1.893l2.827,2.827a1.333,1.333,0,0,1,0,1.893Z" transform="translate(0 0)" fill="#df2024"/>
                                    </svg>-->

                                    <form style="display: contents" action="/partners-search" method="POST" >
                                <div class="input-group mb-3 search">
                                    <button class="btn btn-outline-secondary btn-icon" type="button"
                                        id="button-addon2"><svg id="Research" xmlns="http://www.w3.org/2000/svg"
                                            width="26.503" height="26.602" viewBox="0 0 26.503 26.602">
                                            <path id="Vector"
                                                d="M25.3,19.712l-2.76-2.827a4.107,4.107,0,0,0-4.533-.76l-1.2-1.2a9.333,9.333,0,1,0-1.88,1.88l1.187,1.187a4,4,0,0,0,.707,4.613l2.827,2.827a4.021,4.021,0,1,0,5.653-5.72ZM13.992,14.059a6.667,6.667,0,1,1,1.45-2.165,6.667,6.667,0,0,1-1.45,2.165Zm9.427,9.427a1.333,1.333,0,0,1-1.893,0L18.7,20.659a1.339,1.339,0,1,1,1.893-1.893l2.827,2.827a1.333,1.333,0,0,1,0,1.893Z"
                                                transform="translate(0 0)" fill="#df2024" />
                                        </svg></button>
                                    <input type="text" class="form-control " placeholder="بحث"
                                        aria-label="Recipient's username" name="name" aria-describedby="button-addon2">

                                </div>
                                    
                            </div>

                            <div class="col-sm-4 d-flex justify-content-center">
                                <button class="search-btn">بحث</button>
                            </div>
                            @csrf
                        </form>
                            <div class="col-sm-4 d-flex justify-content-end">
                                <div class="num-order">
                                    <button class="approave border-0 w-100 h-100 bg-transparent" data-bs-toggle="modal" data-bs-target="#addPartnerModel"> اضافة شريك</button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table custom-table" id="AllApplications">

                                <thead>

                                    <tr>
                                        <th scope="col"> اسم الشريك</th>
                                        <th scope="col">الفرع التابع له</th>
                                        <th scope="col" class="dots"></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($partners as $user)


                                        <tr>
                                            <td class="clickable pt-39 order-num fw-bold">
                                                {{ $user->name }}
                                            </td>
                                            <td class="clickable pt-39 fw-bold text-wrap">
                                                {{ $user->bank->name }}
                                            </td>
                                            
                                            
                                            <td class="pt-39">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="29.442" height="7.043"
                                                            viewBox="0 0 29.442 7.043">
                                                            <path id="Vector"
                                                                d="M14.722,0A3.522,3.522,0,1,0,17.21,1.031,3.522,3.522,0,0,0,14.722,0ZM3.522,0A3.522,3.522,0,1,0,6.01,1.031,3.522,3.522,0,0,0,3.522,0Zm22.4,0A3.522,3.522,0,1,0,28.41,1.031,3.522,3.522,0,0,0,25.922,0Z"
                                                                fill="#454545"></path>
                                                        </svg>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        
                                                        <li>
                                                            <button class="approave border-0 w-100 h-100 bg-transparent modify-button"  data-bs-toggle="modal" data-attr-id="{{$user->id}}" data-bs-target="#editPartnerModel">
                                                                تعديل</button>
                                                        </li>
                                                        @if (false)
                                                            <li><a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> تعديل</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#CloseModal" class="trigger-btn"
                                                                    data-bs-toggle="modal"> <i class="fas fa-trash"></i> حذف</a></li>
                                                        @endif
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>

                            </table>

                        {{-- <div class="pagination d-flex justify-content-center mt-3">
                            <a href="#" class="pagination-num active">1</a>
                            <a href="#" class="pagination-num">2</a>
                            <a href="#" class="pagination-num">3</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- End All Applications #tab1-->
        </div>
    </div>
    <!-- End Left Side -->

    </div>
    {{-- </div> --}}


    <!--تعيين الشريك-->
    <div class="modal fade" id="addPartnerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <form style="display: contents" method="POST" action="/partners" >
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-12 field-name"> الاسم الثلاثي</label>
                                    <div class="col-md-8 col-12">
                                        <input type="text" name="name" class="form-control input-name" id="staticEmail" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'الاسم الثلاثي'" placeholder="الاسم الثلاثي">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-12 field-name"> البريد الإلكترونى </label>
                                    <div class="col-md-8 col-12">
                                        <input type="email" name="email" class="form-control input-name" id="staticEmail" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'البريد الإلكترونى '" placeholder="البريد الإلكترونى ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <p class="notes mb-2 mt-2"> الفرع التابع له</p>
                                <select name="bank_branch_id" id="modal-niceSelect" class="modal-niceSelect">
                                    <option selected value="0">الفرع التابع له</option>
                                    @foreach ($branches as $branch )
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <p class="notes mb-2 mt-2"> الحالة</p>
                                <select name="active" id="modal-niceSelect" class="modal-niceSelect">
                                    <option selected >الحالة</option>
                                    <option value="1">نشط</option>
                                    <option value="0">غير نشط</option>
                                </select>
                            </div>

                        </div>
                </div>
                <div class="row">
                    <div class="modal-footer d-flex justify-content-center">

                        <div class="col-4">
                            <button type="submit" class="save done">اضافة شريك</button>
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-4">
                            <button type="button" class="cancel close" data-bs-dismiss="modal">إلغاء</button>
                        </div>
                    </div>
                    @csrf
                </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end popup-->

    <!--تعديل الشريك-->
    <div class="modal fade" id="editPartnerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form style="display: contents" method="POST" id="partnersEdit">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-12 field-name"> الاسم الثلاثي</label>
                                    <div class="col-md-8 col-12">
                                        <input type="text" name="name" class="form-control input-name" id="nameEdit" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'الاسم الثلاثي'" placeholder="الاسم الثلاثي">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-12 field-name"> البريد الإلكترونى
                                    </label>
                                    <div class="col-md-8 col-12">
                                        <input type="email" name="email" class="form-control input-name" id="typeEdit" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'البريد الإلكترونى'" placeholder="البريد الإلكترونى">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                @method('put')
                                <p class="notes mb-2 mt-2"> الفرع التابع له</p>
                                <select  name="" id="modal-niceSelect" class="modal-niceSelect">
                                    <option  value="1">الفرع التابع له</option>
                                    @foreach ($branches as $branch )
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <p class="notes mb-2 mt-2"> الحالة</p>
                                <select name="active" class="acticeEdit" id="modal-niceSelect" class="modal-niceSelect">
                                    <option  >الحالة</option>
                                    <option value="1">نشط</option>
                                    <option value="0">غير نشط</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center">

                            <div class="col-4">
                                <button type="submit" class="save done">حفط</button>
                            </div>
                            <div class="col-3">

                            </div>
                            <div class="col-4">
                                <button type="button" class="cancel close" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end popup-->
</section>
@include('layouts.footer')
