@include('layouts.header')

<section class="pt-5 pb-5"
    style="background: url(img/Group\ 52.png) #eee no-repeat; background-size: cover; background-position: center;">
    <!--Popup-->
    <!--Approave Modal -->
    <!--تعيين الشريك-->
    <div class="modal fade" id="appeoave-staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/assign-partner/{{ $loan->id }}" method="POST" style="display: contents">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <p class="notes mb-2 mt-2"> اختار الشريك</p>
                                <select name="partner_id" id="modal-niceSelect" class="modal-niceSelect">
                                    <option selected value="0">اختار الشريك</option>
                                    @foreach ($partners as $partener)
                                        <option value="{{ $partener->id }}">{{ $partener->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center">

                            <div class="col-4">
                                <button type="submit" class="save done">حفظ</button>
                            </div>
                            <div class="col-3">

                            </div>
                            <div class="col-4">
                                <button type="button" class="cancel close" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end popup-->

    <!-- تعيين اخصائي -->
    <div class="modal fade" id="specialist-staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <p class="notes mb-2 mt-2"> تعيين الاخصائي </p>
                            <select name="" id="modal-niceSelect" class="modal-niceSelect">
                                <option selected >تعيين الاخصائي</option>
                                @foreach ($partners as $partener)
                                <option value="{{ $partener->id }}">{{ $partener->name }}</option>
                            @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="modal-footer d-flex justify-content-center">

                        <div class="col-4">
                            <button type="button" class="save done">حفظ</button>
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
    </div>

    <!--end popup -->
    <!--Number of insurance Modal -->
    <div class="modal fade" id="Num-of-insurance-staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form id="" style="display: contents" method="post" action="/update-loans/{{ $loan->id }}">
                @csrf
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                <p class="notes mb-2 mt-2">الرقم التأميني</p>

                                <input type="text" class="insurance-num" name="number_of_insurance"
                                    placeholder=" الرقم التأميني ">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center">

                            <div class="col-4">
                                <button type="submit" class="save done">حفظ</button>
                            </div>
                            <div class="col-3">

                            </div>
                            <div class="col-4">
                                <button type="button" class="cancel close" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end Number of insurance popup-->

    <!-- Accept Loan Modal -->
    <div class="modal fade" id="Accept-Loan-staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <p class="Accept-title mb-4 mt-2">الموافقة على القرض </p>

                            <p class="Accept-desc"> برجاء مراجعة و تقييم الطلب جيداً. لا يمكن الرجوع عن هذه الخطوة
                            </p>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="modal-footer d-flex justify-content-center">

                        <div class="col-8">
                            <a type="button" href="/update-status/{{ $loan->id }}" class="done">الموافقة
                                على القرض</a>
                        </div>

                        <div class="col-3">
                            <button type="button" class="cancel" data-bs-dismiss="modal">إلغاء</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end Accept Loan Modalpopup-->

    <!-- Accept Loan With Reason Modal -->
    <div class="modal fade" id="Accept-Loan-with-reason-staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <p class="Accept-title mb-4 mt-2">الموافقة على القرض </p>

                            <p class="Accept-desc"> برجاء مراجعة و تقييم الطلب جيداً. لا يمكن الرجوع عن هذه الخطوة
                            </p>

                        </div>

                        <div class="col-12">
                            <p class="notes mb-1">أسباب الموافقه</p>

                            <input type="text" name="notes" class="notes-input" placeholder=" ">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="modal-footer d-flex justify-content-center">

                        <div class="col-8">
                            <a type="button" href="/update-status/{{ $loan->id }}" class="done">الموافقة
                                على القرض</a>
                        </div>

                        <div class="col-3">
                            <button type="button" class="cancel" data-bs-dismiss="modal">إلغاء</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end Accept Loan With Reason Modalpopup-->

    <!--ignore Loan Modal -->

    <div class="modal fade" id="ignore-Loan-staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form style="display: contents" method="POST" action="/update-status/{{ $loan->id }}">
                <div class="modal-content">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                <p class="Accept-title mb-4 mt-2"> رفض القرض </p>


                            </div>
                            <div class="col-12">
                                <p class="notes mb-1">أسباب الرفض</p>

                                <input type="text" name="notes" class="notes-input" placeholder=" ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center">

                            <div class="col-8">
                                <button type="submit" class="done ignore"> رفض القرض</button>
                            </div>

                            <div class="col-3">
                                <button type="button" class="cancel" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end ignore Loan popup-->

    <!--Resend Loan Modal -->

    <div class="modal fade" id="resend-Loan-staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form style="display: contents" action="/assign-accounter/{{$loan->id}}" method="POST" >
                <div class="modal-content">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                <p class="Accept-title mb-4 mt-2"> اعاده دراسه القرض  </p>


                            </div>
                            <div class="col-12">
                                <p class="notes mb-1">أسباب اعاده الدراسه</p>

                                <input type="text" name="notes" class="notes-input" placeholder=" ">
                            </div>
                            <div class="col-12 mb-4">
                                <p class="notes mb-2 mt-2">  تعيين مدير حساب</p>
                                <select name="assigned_id" id="modal-niceSelect" class="modal-niceSelect">
                                    <option selected value="">اختار مدير حساب</option>
                                    @foreach ($accounters as $acounter )
                                    <option  value="{{$acounter->id}}">{{$acounter->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center">

                            <div class="col-8">
                                <button type="submit" class="done">تأكيد</button>
                            </div>

                            <div class="col-3">
                                <button type="button" class="cancel" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end ignore Loan popup-->

    <!--mount-of-loan Modal -->
    <div class="modal fade" id="mount-of-loan-staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="" style="display: contents" method="post" action="/update-loans/{{ $loan->id }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                <p class="notes mb-2 mt-2">تعديل قيمة القرض </p>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-7">
                                        <input type="text" name="price" class="insurance-num w-100"
                                            placeholder=" تعديل قيمة القرض ">
                                    </div>

                                    <div class="col-5">
                                        <p class="notes mb-2 mt-2 fs-18">قيمة القرض المطلوب &nbsp; {{ $loan->price }}
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center">

                            <div class="col-4">
                                <button type="submit" class="save done">حفظ</button>
                            </div>
                            <div class="col-3">

                            </div>
                            <div class="col-4">
                                <button type="button" class="cancel close" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end mount-of-loan popup-->

    <!--mount-of-loan Modal -->
    <div class="modal fade" id="edit-lans-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="" style="display: contents" method="post" action="/update-loans/{{ $loan->id }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="notes mb-2 mt-2">تعديل قيمة القرض </p>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="price" class="insurance-num w-100"
                                            placeholder=" تعديل قيمة القرض ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="notes mb-2 mt-2">فترة السماح(عدد الاشهور) </p>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="number" name="exeption_period" class="insurance-num w-100"
                                            placeholder=" فترة السماح(عدد الاشهور) ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center">

                            <div class="col-4">
                                <button type="submit" class="save done">حفظ</button>
                            </div>
                            <div class="col-3">

                            </div>
                            <div class="col-4">
                                <button type="button" class="cancel close" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end mount-of-loan popup-->

    <!--الانتمان المركزي Modal -->
    <div class="modal fade" id="edit-lans-model2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="" style="display: contents" method="post" action="/update-loans/{{ $loan->id }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="notes mb-2 mt-2">تعديل قيمة القرض </p>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="price" class="insurance-num w-100"
                                            placeholder=" تعديل قيمة القرض ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12" id="abId0.9507471520654307"
                                        abineguid="5B3276784D6E4B7FA662FDF8C7C69023">
                                        <p class="notes mb-1">أسباب التعديل</p>

                                        <input type="text" class="notes-input" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="notes mb-2 mt-2">فترة السماح(عدد الاشهور) </p>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="number" name="" class="insurance-num w-100"
                                            placeholder=" فترة السماح(عدد الاشهور) ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center">

                            <div class="col-4">
                                <button type="submit" class="save done">حفظ</button>
                            </div>
                            <div class="col-3">

                            </div>
                            <div class="col-4">
                                <button type="button" class="cancel close" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end الانتمان المركزي popup-->

    <div class="container-fauld">

        <div class="row">

            <!--Right Side -->
            <x-side-nav />

            <!--End Right Side -->

            <!-- Left Side -->
            <div class=" col-12 col-sm-12 col-lg-9">
                <div class="tab-content" id="buttonsTabContent">

                    <!--All Applications #tab1-->
                    <div>
                        <div class="row mb-2">

                            <!-- First Container in details -->
                            <div class="col-sm-12 col-lg-11 first-container break">
                                <div class="row h-100 d-flex align-items-center">
                                    <!--Labels-->
                                    <div class="col-sm-12 col-lg-4 pt-3 pb-3">
                                        <!--رقم الطلب-->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> رقم الطلب </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->loan_uniqe_id }} </p>
                                            </div>
                                        </div>

                                        <!--تاريخ تقديم الطلب -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> تاريخ تقديم الطلب </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->created_at }} </p>
                                            </div>
                                        </div>

                                        <!--  مقدم الطلب -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> مقدم الطلب </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p>{{ $loan->name }} </p>
                                            </div>
                                        </div>

                                        <!--  الفرع  -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> الفرع </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->bank->name }}</p>
                                            </div>
                                        </div>

                                        <!--  الشريك  -->
                                        @if ($loan->partner)
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> الشريك </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{ $loan->partner->bank->name }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>


                                    <!--Select status & print Button-->
                                    <div class="d-none col-lg-3 d-lg-flex flex-column align-items-end">
                                        @if ($loan->status == 0)
                                            <div class="red">
                                                مرفوض

                                            </div>
                                        @elseif($loan->status < 6) <div class="orange">
                                                قيد الدراسه

                                            </div>
                                        @else
                                            <div class="green">
                                                تمت الموافقه

                                            </div>
                                        @endif
                                        <!--<div class="orange">
                                    <select name="" class="status" id="">
                                      <option selected>قيد الدراسه</option>
                                      <option value="1">تمت الموافقه</option>
                                      <option value="2">مرفوض</option>
                                      <option value="3">قيد التنفيذ</option>
                                      <option value="4">قيد التقديم</option>
                                    </select>
                                  </div>-->

                                        <button class="print" onclick="window.print();">
                                            طباعة
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18"
                                                viewBox="0 0 20 18">
                                                <g id="Icon_print_solid" transform="translate(-2 -3)">
                                                    <path id="Path_4044" data-name="Path 4044" d="M6,3V8H18V3Z"
                                                        fill="#b68b25" />
                                                    <path id="Path_4045" data-name="Path 4045"
                                                        d="M20,9a2,2,0,0,1,2,2v2a4,4,0,0,1-4,4v3a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V17a4,4,0,0,1-4-4V11A2,2,0,0,1,4,9ZM8,12h8v7H8Z"
                                                        fill="#b68b25" fill-rule="evenodd" />
                                                </g>
                                            </svg>
                                        </button>
                                        <!--تعيين شريك-->
                                        @if (auth()->user()->user_type == 0 && $loan->status == 2)
                                            <button class="approave" type="button" data-bs-toggle="modal"
                                                data-bs-target="#appeoave-staticBackdrop"> تعيين</button>
                                        @endif
                                        @if (auth()->user()->user_type == 1 && $loan->status == 3 && $canEdit)
                                        <button class="approave" type="button" data-bs-toggle="modal"
                                        data-bs-target="#specialist-staticBackdrop"> تعيين</button>
                                        @endif
                                        <!--تعيين اخصائي-->
                                    </div>

                                    <!--Divider-->
                                    <div class="d-none col-lg-1 d-lg-flex justify-content-center">
                                        <div class="divider">
                                            <hr>
                                        </div>
                                    </div>

                                    @if ($loan->status > 6)
                                    <div class="d-none col-lg-4 d-lg-block">

                                        <div class="green mt-3">
                                            تمت الموافقه
                                            (موافقه نهائيه)
                                        </div>
                                    </div>
                                    @endif


                                    @if ($loan->status < 6  && auth()->user()->user_type == 3)
                                    <div class="d-none col-lg-4 d-lg-block">
                                            <button class="accept-loan test mt-3" type="button" data-bs-toggle="modal"
                                                data-bs-target="#Accept-Loan-staticBackdrop">الموافقة على
                                                القرض</button>

                                            <button class="reject-loan mb-3" type="button" data-bs-toggle="modal"
                                                data-bs-target="#ignore-Loan-staticBackdrop">رفض القرض</button>

                                             <!-- Resend Button -->
                                             <button class="reject-loan Resend-loan mb-3" type="button" data-bs-toggle="modal"
                                             data-bs-target="#resend-Loan-staticBackdrop">اعاده دراسه القرض </button>
                                         <!-- End Resend Button -->
                                    </div>
                                    @elseif ($loan->status < 6 && $loan->status != 0 && auth()->user()->user_type != 4 && $canEdit  )
                                        <!-- Accept & Reject Buttons-->
                                        <div class="d-none col-lg-4 d-lg-block">
                                            @if (auth()->user()->user_type > 0)
                                                <button class="accept-loan mt-3" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#Accept-Loan-staticBackdrop">الموافقة على
                                                    القرض</button>
                                                 <!-- Accept Loan with Reason -->
                                                {{-- <button class="accept-loan" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Accept-Loan-with-reason-staticBackdrop">الموافقة على
                                                القرض</button> --}}
                                                 <!-- Accept Loan with Reason -->
                                            @endif

                                            @if ($loan->status != 0 && auth()->user()->user_type !=0)
                                                   <button class="reject-loan mb-3" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#ignore-Loan-staticBackdrop">رفض القرض</button>



                                                    <!--Green Accept Div -->

                                            @endif

                                        </div>
                                    @endif


                                </div>
                            </div>
                            <!-- End First Container in details -->

                            <!-- Second Container in details -->
                            <div class="col-12 col-lg-11 second-container mt-4 break">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-sm-6 Applicant-data">
                                        <h3 class="title mb-3"> بيانات مقدم الطلب</h3>
                                        <!-- الاسم الثلاثي  -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> الاسم الثلاثي </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->name }} </p>
                                            </div>
                                        </div>

                                        <!--  الرقم القومي -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> الرقم القومي </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->national_id }}</p>
                                            </div>
                                        </div>

                                        <!--  عنوان مقدم الطلب  -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> عنوان مقدم الطلب
                                                    <br>
                                                    <span style="font-size: 14px;">(طبقاً للرقم القومي) </span>
                                                </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->applicant_address }}</p>
                                            </div>
                                        </div>

                                        <!--   تليفون محمول  -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> تليفون محمول </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->phone_number }} </p>
                                            </div>
                                        </div>

                                        <!--   تليفون أرضي   -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> تليفون أرضي </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->land_line_number }} </p>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-sm-6 loan-data">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <h3 class="title mb-3"> بيانات القرض </h3>
                                            </div>
                                            <div class="col-3 data text-break">
                                                @if (auth()->user()->user_type == 0 && $loan->status !=0 && $loan->status <6)
                                                    <button class="edit" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#mount-of-loan-staticBackdrop"> تعديل
                                                    </button>
                                                @elseif (auth()->user()->user_type == 2 && $loan->status !=0 && $loan->status <6)
                                                    <button class="edit" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit-lans-model"> تعديل
                                                    </button>

                                                @elseif(auth()->user()->user_type == 3 && $loan->status !=0 && $loan->status <6)
                                                    <button class="edit" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit-lans-model2"> تعديل
                                                    </button>
                                                @endif



                                            </div>
                                        </div>


                                        <!-- نوع القرض -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> نوع القرض </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                @switch($loan->type)
                                                    @case(1)
                                                        <p>طاقة متجددة </p>
                                                    @break
                                                    @case(2)
                                                        <p>قرض صناعي </p>
                                                    @break
                                                    @case (3)
                                                        <p>قرض زراعي </p>
                                                    @break
                                                    @case (4)
                                                        <p>قرض منزلي </p>
                                                    @break
                                                    @case (5)
                                                        <p>قرض خدمات </p>
                                                    @break
                                                    @case (6)
                                                        <p>قرض تجاري </p>
                                                    @break

                                                @endswitch

                                            </div>
                                        </div>

                                        <!--قيمة القرض المطلوب -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> قيمة القرض المطلوب </p>
                                            </div>
                                            <div class="col-3 data text-break">
                                                <p> {{ $loan->price }}</p>
                                            </div>
                                            {{-- <div class="col-3 data text-break">
                                                <button class="edit" data-bs-toggle="modal"
                                                    data-bs-target="#mount-of-loan-staticBackdrop"> تعديل </button>
                                            </div> --}}
                                        </div>

                                        <!--  مدة السداد -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> مدة السداد </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->payment_period }} سنة</p>
                                            </div>
                                        </div>

                                        <!--   قيمة القسط -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> قيمة القسط </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->depit_value }} </p>
                                            </div>
                                        </div>

                                        <!--   نوع الضامن  -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> نوع الضامن </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                @switch($loan->guarantor)
                                                    @case('personal')
                                                        <p>شخصى </p>
                                                    @break
                                                    @case('salary')
                                                        <p>تحويل مرتب </p>
                                                    @break
                                                    @case ('organization')
                                                        <p>تحويل معاش </p>
                                                    @break

                                                @endswitch

                                            </div>
                                        </div>
                                        @if (false)
                                            <!--   بيانات الضامن   -->
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> بيانات الضامن </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> منى عبدالله حسين </p>
                                                    <p>٢٧٨٥٦٤١٢٠٨٣٣١٣</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Second Container in details -->

                            <!-- Third Container in details-->
                            <form style="display: contents" method="POST"
                                action="/additional-files/{{ $loan->id }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-11 mt-4 p-0 third-container">
                                    <nav class="p-0">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="order-details-tab" data-bs-toggle="tab"
                                                data-bs-target="#order-details" type="button" role="tab"
                                                aria-controls="order-details" aria-selected="true">تفاصيل الطلب</button>
                                            <button class="nav-link" id="attachments-tab" data-bs-toggle="tab"
                                                data-bs-target="#attachments" type="button" role="tab"
                                                aria-controls="attachments" aria-selected="false">المرفقات</button>
                                            <button class="nav-link" id="social-research-tab"
                                                data-bs-toggle="tab" data-bs-target="#social-research" type="button"
                                                role="tab" aria-controls="social-research" aria-selected="false"> بحث
                                                أجتماعى</button>
                                            <button class="nav-link" id="field-inquiry-tab" data-bs-toggle="tab"
                                                data-bs-target="#field-inquiry" type="button" role="tab"
                                                aria-controls="field-inquiry" aria-selected="false">استعلام
                                                ميداني</button>
                                            <button class="nav-link" id="Feasibility-study-tab"
                                                data-bs-toggle="tab" data-bs-target="#Feasibility-study" type="button"
                                                role="tab" aria-controls="Feasibility-study" aria-selected="false">
                                                دراسة الجدوى
                                            </button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- تفاصيل الطلب-->
                                        <div class="tab-pane fade show active" id="order-details" role="tabpanel"
                                            aria-labelledby="order-details-tab">
                                            <div class="row tab-data">
                                                <div class="col-5">
                                                    <h3 class="title mb-3"> البيانات الشخصية</h3>
                                                    <!-- تاريخ الميلاد   -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> تاريخ الميلاد </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{ $loan->date_of_birth }} </p>
                                                        </div>
                                                    </div>

                                                    <!--   الحالة الاجتماعية -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> الحالة الاجتماعية </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            @switch($loan->social_status)
                                                                @case(0)
                                                                    <p>متزوجة </p>
                                                                @break
                                                                @case(1)
                                                                    <p> مطلقة </p>
                                                                @break
                                                                @case (2)
                                                                    <p> ارملة </p>
                                                                @break
                                                                @case (3)
                                                                    <p> عزباء </p>
                                                                @break

                                                            @endswitch

                                                        </div>
                                                    </div>

                                                    <!--    عدد الأطفال  -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> عدد الأطفال </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{ $loan->number_of_children }}</p>
                                                        </div>
                                                    </div>

                                                    <!--    أبناء من ذوي الاحتياجات الخاصة  -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> أبناء من ذوي الاحتياجات الخاصة </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p>{{ $loan->have_special_case ? 'يوجد' : ' لا يوجد' }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    {{-- <!--    عنوان مقدم الطلب   -->
                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> عنوان مقدم الطلب
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
                                                    <div class="row mb-3">
                                                        <div class="col-4 labels">
                                                            <p> الرقم التأميني </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{ $loan->number_of_insurance }} </p>
                                                        </div>
                                                        @if (false)
                                                            <div class="col-2 data text-break">
                                                                <button class="edit" data-bs-toggle="modal"
                                                                    type="button"
                                                                    data-bs-target="#Num-of-insurance-staticBackdrop">
                                                                    تعديل
                                                                </button>
                                                            </div>
                                                        @endif

                                                    </div>

                                                </div>

                                                <div class="col-1 divider">
                                                    <hr class="h-100">
                                                </div>

                                                <div class="col-6">
                                                    <h3 class="title mb-3"> بيانات المشروع </h3>
                                                    <!--   الخبرات السابقة   -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> الخبرات السابقة </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{ $loan->have_experince ? 'يوجد' : 'لا يوجد' }}</p>
                                                        </div>
                                                    </div>

                                                    <!--   سنوات الخبرة -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> سنوات الخبرة </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{ $loan->number_of_experice_years }}</p>
                                                        </div>
                                                    </div>

                                                    <!--    مقر المشروع  -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> مقر المشروع </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{ $loan->address_project }}</p>
                                                        </div>
                                                    </div>

                                                    <!--    عنوان مقر المشروع  -->
                                                    {{-- <div class="row mb-3">
                                                    <div class="col-6 labels">
                                                        <p> عنوان مقر المشروع </p>
                                                    </div>
                                                    <div class="col-6 data text-break">
                                                        <p> لا يوجد </p>
                                                        <!--<p>المحافظة</p>
                                                <p>المدينة / المركز</p>-->
                                                    </div>
                                                </div> --}}

                                                    <!--    شركاء آخرون   -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> شركاء آخرون </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            @if (count($loan->userPartners) > 0)
                                                                @foreach ($loan->userPartners as $partener)
                                                                    <p>{{ $partener->name }} </p>
                                                                @endforeach
                                                            @else
                                                                <p> لا يوجد </p>
                                                            @endif

                                                        </div>
                                                    </div>

                                                    <!--      وصف المشروع    -->
                                                    <div class="row mb-3">
                                                        <div class="col-6 labels">
                                                            <p> وصف المشروع </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{ $loan->description }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--المرفقات-->
                                        <div class="tab-pane fade" id="attachments" role="tabpanel"
                                            aria-labelledby="attachments-tab">
                                            <div class="row d-flex justify-content-center pt-4 upload-files">
                                                <div class="col-11">
                                                    <div class="container-files">
                                                        <!--attachment #1-->
                                                        <div class="row mb-3 file-attach-row">
                                                            <div class="col-8">
                                                                <div class="file-input-container">
                                                                    <label class="for-sm-input-file">
                                                                        <svg id="Group_101" data-name="Group 101"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="38.316" height="45.979"
                                                                            viewBox="0 0 38.316 45.979">
                                                                            <path id="Path_301" data-name="Path 301"
                                                                                d="M101.653,857.25,92.4,848H71v38.316h30.653Z"
                                                                                transform="translate(-67.168 -844.168)"
                                                                                fill="#b68b25" />
                                                                            <path id="Path_302" data-name="Path 302"
                                                                                d="M96.821,847H73.832A3.833,3.833,0,0,0,70,850.832v38.316a3.833,3.833,0,0,0,3.832,3.831h30.653a3.833,3.833,0,0,0,3.832-3.831V858.5Zm7.663,42.148H73.832V850.832H92.99V858.5a3.833,3.833,0,0,0,3.832,3.831h7.663Z"
                                                                                transform="translate(-70 -847)"
                                                                                fill="#b68b25" />
                                                                        </svg>
                                                                    </label>
                                                                    <input type="file" name="national_id_front_file"
                                                                        value="{{ $loan->national_id_front_file }}"
                                                                        class="sm-input-file" id="sm-ip-1" />
                                                                    <a href="/file/{{ $loan->national_id_front_file }}"
                                                                        target="_blank" class="span-text">صورة
                                                                        صوره بطاقة
                                                                        الرقم القومي الأمامية</a>
                                                                    <hr class="attach-divider">
                                                                </div>
                                                            </div>
                                                            @if($loan->status !=0 && $loan->status <6)
                                                            <div
                                                                class="col-2 d-flex justify-content-end align-items-center">
                                                                <!--<input type="file" class="sm-input-file" id="edit-attach"/>-->
                                                                <label class="edit" for="sm-ip-1">تعديل
                                                                </label>
                                                            </div>
                                                            @endif

                                                            {{-- <div
                                                            class="col-2 d-flex justify-content-center align-items-center">
                                                            <button class="delete">حذف </button>
                                                        </div> --}}
                                                        </div>

                                                        <!--attachment #2-->
                                                        <div class="row mb-3">
                                                            <div class="col-8">
                                                                <div class="file-input-container">
                                                                    <label class="for-sm-input-file">
                                                                        <svg id="Group_101" data-name="Group 101"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="38.316" height="45.979"
                                                                            viewBox="0 0 38.316 45.979">
                                                                            <path id="Path_301" data-name="Path 301"
                                                                                d="M101.653,857.25,92.4,848H71v38.316h30.653Z"
                                                                                transform="translate(-67.168 -844.168)"
                                                                                fill="#b68b25" />
                                                                            <path id="Path_302" data-name="Path 302"
                                                                                d="M96.821,847H73.832A3.833,3.833,0,0,0,70,850.832v38.316a3.833,3.833,0,0,0,3.832,3.831h30.653a3.833,3.833,0,0,0,3.832-3.831V858.5Zm7.663,42.148H73.832V850.832H92.99V858.5a3.833,3.833,0,0,0,3.832,3.831h7.663Z"
                                                                                transform="translate(-70 -847)"
                                                                                fill="#b68b25" />
                                                                        </svg>
                                                                    </label>
                                                                    <input type="file" name="national_id_end_file"
                                                                        value="{{ $loan->national_id_end_file }}"
                                                                        class="sm-input-file" id="sm-ip-2" />
                                                                    <a href="/file/{{ $loan->national_id_end_file }}"
                                                                        target="_blank" class="span-text">صورة
                                                                        صوره بطاقة
                                                                        الرقم القومي الخلفية</a>
                                                                    <hr class="attach-divider">
                                                                </div>
                                                            </div>
                                                            @if($loan->status !=0 && $loan->status <6)

                                                            <div
                                                                class="col-2 d-flex justify-content-end align-items-center">
                                                                <!--<input type="file" class="sm-input-file" id="edit-attach"/>-->
                                                                <label class="edit" for="sm-ip-2">تعديل
                                                                </label>
                                                            </div>
                                                            @endif
                                                            {{-- <div
                                                            class="col-2 d-flex justify-content-center align-items-center">
                                                            <button class="delete">حذف </button>
                                                        </div> --}}
                                                        </div>

                                                        <!--attachment #3-->
                                                        <div class="row mb-3">
                                                            <div class="col-8">
                                                                <div class="file-input-container">
                                                                    <label class="for-sm-input-file">
                                                                        <svg id="Group_101" data-name="Group 101"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="38.316" height="45.979"
                                                                            viewBox="0 0 38.316 45.979">
                                                                            <path id="Path_301" data-name="Path 301"
                                                                                d="M101.653,857.25,92.4,848H71v38.316h30.653Z"
                                                                                transform="translate(-67.168 -844.168)"
                                                                                fill="#b68b25" />
                                                                            <path id="Path_302" data-name="Path 302"
                                                                                d="M96.821,847H73.832A3.833,3.833,0,0,0,70,850.832v38.316a3.833,3.833,0,0,0,3.832,3.831h30.653a3.833,3.833,0,0,0,3.832-3.831V858.5Zm7.663,42.148H73.832V850.832H92.99V858.5a3.833,3.833,0,0,0,3.832,3.831h7.663Z"
                                                                                transform="translate(-70 -847)"
                                                                                fill="#b68b25" />
                                                                        </svg>
                                                                    </label>
                                                                    <input type="file" name="home_service_file"
                                                                        value="{{ $loan->home_service_file }}"
                                                                        class="sm-input-file" id="sm-ip-3" />
                                                                    <a href="/file/{{ $loan->home_service_file }}"
                                                                        target="_blank" class="span-text">إيصال
                                                                        مرافق خاص بمحل الإقامة</a>
                                                                    <hr class="attach-divider">
                                                                </div>
                                                            </div>
                                                            @if($loan->status !=0 && $loan->status <6)

                                                            <div
                                                                class="col-2 d-flex justify-content-end align-items-center">
                                                                <!--<input type="file" class="sm-input-file" id="edit-attach"/>-->
                                                                <label class="edit" for="sm-ip-3">تعديل
                                                                </label>
                                                            </div>
                                                            @endif
                                                            {{-- <div
                                                            class="col-2 d-flex justify-content-center align-items-center">
                                                            <button class="delete">حذف </button>
                                                        </div> --}}
                                                        </div>


                                                        <!--attachment #4-->
                                                        <div class="row mb-3">
                                                            <div class="col-8">
                                                                <div class="file-input-container">
                                                                    <label class="for-sm-input-file">
                                                                        <svg id="Group_101" data-name="Group 101"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="38.316" height="45.979"
                                                                            viewBox="0 0 38.316 45.979">
                                                                            <path id="Path_301" data-name="Path 301"
                                                                                d="M101.653,857.25,92.4,848H71v38.316h30.653Z"
                                                                                transform="translate(-67.168 -844.168)"
                                                                                fill="#b68b25" />
                                                                            <path id="Path_302" data-name="Path 302"
                                                                                d="M96.821,847H73.832A3.833,3.833,0,0,0,70,850.832v38.316a3.833,3.833,0,0,0,3.832,3.831h30.653a3.833,3.833,0,0,0,3.832-3.831V858.5Zm7.663,42.148H73.832V850.832H92.99V858.5a3.833,3.833,0,0,0,3.832,3.831h7.663Z"
                                                                                transform="translate(-70 -847)"
                                                                                fill="#b68b25" />
                                                                        </svg>
                                                                    </label>
                                                                    <input type="file" value="{{ $loan->rent_file }}"
                                                                        name="rent_file" class="sm-input-file"
                                                                        id="sm-ip-4" />
                                                                    <a href="/file/{{ $loan->rent_file }}"
                                                                        target="_blank" class="span-text">عقد
                                                                        إيجار/تمليك مقر المشروع</a>
                                                                    <hr class="attach-divider">
                                                                </div>
                                                            </div>
                                                            @if($loan->status !=0 && $loan->status <6)

                                                            <div
                                                                class="col-2 d-flex justify-content-end align-items-center">
                                                                <!--<input type="file" class="sm-input-file" id="edit-attach"/>-->
                                                                <label class="edit" for="sm-ip-4">تعديل
                                                                </label>
                                                            </div>
                                                            @endif
                                                            {{-- <div
                                                            class="col-2 d-flex justify-content-center align-items-center">
                                                            <button class="delete">حذف </button>
                                                        </div> --}}
                                                        </div>


                                                        <!--attachment #5-->
                                                        <div class="row mb-3">
                                                            <div class="col-8">
                                                                <div class="file-input-container">
                                                                    <label class="for-sm-input-file">
                                                                        <svg id="Group_101" data-name="Group 101"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="38.316" height="45.979"
                                                                            viewBox="0 0 38.316 45.979">
                                                                            <path id="Path_301" data-name="Path 301"
                                                                                d="M101.653,857.25,92.4,848H71v38.316h30.653Z"
                                                                                transform="translate(-67.168 -844.168)"
                                                                                fill="#b68b25" />
                                                                            <path id="Path_302" data-name="Path 302"
                                                                                d="M96.821,847H73.832A3.833,3.833,0,0,0,70,850.832v38.316a3.833,3.833,0,0,0,3.832,3.831h30.653a3.833,3.833,0,0,0,3.832-3.831V858.5Zm7.663,42.148H73.832V850.832H92.99V858.5a3.833,3.833,0,0,0,3.832,3.831h7.663Z"
                                                                                transform="translate(-70 -847)"
                                                                                fill="#b68b25" />
                                                                        </svg>
                                                                    </label>
                                                                    <input type="file"
                                                                        value="/file/{{ $loan->price_file }}"
                                                                        name="price_file" class="sm-input-file"
                                                                        id="sm-ip-5" />
                                                                    <a href="/file/{{ $loan->price_file }}"
                                                                        target="_blank" class="span-text">عرض/عروض
                                                                        أسعار
                                                                        مستلزمات المشروع</a>
                                                                    <hr class="attach-divider">
                                                                </div>
                                                            </div>
                                                            @if($loan->status !=0 && $loan->status <6)

                                                            <div
                                                                class="col-2 d-flex justify-content-end align-items-center">
                                                                <!--<input type="file" class="sm-input-file" id="edit-attach"/>-->
                                                                <label class="edit" for="sm-ip-5">تعديل
                                                                </label>
                                                            </div>
                                                            @endif
                                                            {{-- <div
                                                            class="col-2 d-flex justify-content-center align-items-center">
                                                            <button class="delete">حذف </button>
                                                        </div> --}}
                                                        </div>

                                                        <!--attachment #6-->
                                                        <div class="row mb-3">
                                                            <div class="col-8">
                                                                <div class="file-input-container">
                                                                    <label class="for-sm-input-file">
                                                                        <svg id="Group_101" data-name="Group 101"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="38.316" height="45.979"
                                                                            viewBox="0 0 38.316 45.979">
                                                                            <path id="Path_301" data-name="Path 301"
                                                                                d="M101.653,857.25,92.4,848H71v38.316h30.653Z"
                                                                                transform="translate(-67.168 -844.168)"
                                                                                fill="#b68b25" />
                                                                            <path id="Path_302" data-name="Path 302"
                                                                                d="M96.821,847H73.832A3.833,3.833,0,0,0,70,850.832v38.316a3.833,3.833,0,0,0,3.832,3.831h30.653a3.833,3.833,0,0,0,3.832-3.831V858.5Zm7.663,42.148H73.832V850.832H92.99V858.5a3.833,3.833,0,0,0,3.832,3.831h7.663Z"
                                                                                transform="translate(-70 -847)"
                                                                                fill="#b68b25" />
                                                                        </svg>
                                                                    </label>
                                                                    <input type="file"
                                                                        value="{{ $loan->partner_file }}"
                                                                        name="partner_file" class="sm-input-file"
                                                                        id="sm-ip-6" />
                                                                    <a href="/file/{{ $loan->partner_file }}"
                                                                        target="_blank" class="span-text">
                                                                        مستند ضمان القرض (خطاب المؤسسه)
                                                                    </a>
                                                                    <hr class="attach-divider">
                                                                </div>
                                                            </div>
                                                            @if($loan->status !=0 && $loan->status <6)

                                                            <div
                                                                class="col-2 d-flex justify-content-end align-items-center">
                                                                <!--<input type="file" class="sm-input-file" id="edit-attach"/>-->
                                                                <label class="edit" for="sm-ip-6">تعديل
                                                                </label>
                                                            </div>
                                                            @endif

                                                            {{-- <div
                                                            class="col-2 d-flex justify-content-center align-items-center">
                                                            <button class="delete">حذف </button>
                                                        </div> --}}
                                                        </div>




                                                        @foreach ($loan->additionalFiles as $key => $file)
                                                            <div class="row mb-3">
                                                                <div class="col-8">
                                                                    <div class="file-input-container">
                                                                        <label class="for-sm-input-file">
                                                                            <svg id="Group_101" data-name="Group 101"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="38.316" height="45.979"
                                                                                viewBox="0 0 38.316 45.979">
                                                                                <path id="Path_301" data-name="Path 301"
                                                                                    d="M101.653,857.25,92.4,848H71v38.316h30.653Z"
                                                                                    transform="translate(-67.168 -844.168)"
                                                                                    fill="#b68b25" />
                                                                                <path id="Path_302" data-name="Path 302"
                                                                                    d="M96.821,847H73.832A3.833,3.833,0,0,0,70,850.832v38.316a3.833,3.833,0,0,0,3.832,3.831h30.653a3.833,3.833,0,0,0,3.832-3.831V858.5Zm7.663,42.148H73.832V850.832H92.99V858.5a3.833,3.833,0,0,0,3.832,3.831h7.663Z"
                                                                                    transform="translate(-70 -847)"
                                                                                    fill="#b68b25" />
                                                                            </svg>
                                                                        </label>
                                                                        <input type="file"
                                                                            value="{{ $file->file_name }}"
                                                                            name="additionalFiles[]"
                                                                            class="sm-input-file" id="sm-ip-6" />
                                                                        <a href="/file/{{ $file->file_name }}"
                                                                            target="_blank" class="span-text">
                                                                            مستند إضافى {{ $key + 1 }}
                                                                        </a>
                                                                        <hr class="attach-divider">
                                                                    </div>
                                                                </div>
                                                                @if($loan->status !=0 && $loan->status <6)

                                                                <div
                                                                    class="col-2 d-flex justify-content-end align-items-center">
                                                                    <!--<input type="file" class="sm-input-file" id="edit-attach"/>-->
                                                                    <label class="edit" for="sm-ip-6">تعديل
                                                                    </label>
                                                                </div>

                                                                <div
                                                                    class="col-2 d-flex justify-content-center align-items-center">
                                                                    <a href="/additional-files/delete/{{ $file->id }}"
                                                                        type="button" class="delete delete-link">حذف
                                                                    </a>
                                                                </div>
                                                                @endif
                                                            </div>

                                                        @endforeach



                                                    </div>
                                                    <!--divider-->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                    </div>

                                                    <!--Add attachment-->
                                                    <!--<label for="sm-ip-7">-->
                                                        @if($loan->status !=0 && $loan->status <6)

                                                    <div class="row mb-3">
                                                        <div class="d-flex align-items-center add-row">
                                                            <div class="plus"><span>+</span></div>
                                                            <p class="plus-text">إضافة</p>
                                                            <!--for="sm-ip-7"-->
                                                            <!--<input type="file" class="sm-input-file" id="sm-ip-7" />-->
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <!--</label>-->

                                                    <!-- Empty image when delete all attachments -->
                                                    <div class="row empty-container mt-5">
                                                        <svg fill="#b68b25" version="1.1" id="Capa_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            width="103.696px" height="103.696px"
                                                            viewBox="0 0 103.696 103.696"
                                                            style="enable-background:new 0 0 103.696 103.696;"
                                                            xml:space="preserve">
                                                            <g>
                                                                <path
                                                                    d="M74.836,70.501c0.658,1.521-0.042,3.287-1.562,3.944c-1.521,0.66-3.286-0.042-3.944-1.562
                                                        c-2.894-6.689-9.731-11.012-17.421-11.012c-7.868,0-14.747,4.318-17.523,11.004c-0.479,1.154-1.596,1.85-2.771,1.85
                                                        c-0.384,0-0.773-0.074-1.15-0.229c-1.53-0.636-2.255-2.392-1.62-3.921c3.71-8.932,12.764-14.703,23.064-14.703
                                                        C61.994,55.872,70.994,61.614,74.836,70.501z M31.06,35.17c0-3.423,2.777-6.201,6.201-6.201c3.423,0,6.2,2.777,6.2,6.201
                                                        c0,3.426-2.777,6.203-6.2,6.203C33.836,41.373,31.06,38.597,31.06,35.17z M59.176,35.17c0-3.423,2.78-6.201,6.203-6.201
                                                        c3.424,0,6.201,2.777,6.201,6.201c0,3.426-2.777,6.203-6.201,6.203C61.957,41.373,59.176,38.597,59.176,35.17z M85.467,103.696
                                                        H18.23C8.179,103.696,0,95.518,0,85.467V18.23C0,8.178,8.179,0,18.23,0h67.235c10.053,0,18.23,8.178,18.23,18.23v67.235
                                                        C103.697,95.518,95.518,103.696,85.467,103.696z M18.23,8.579c-5.321,0-9.651,4.33-9.651,9.651v67.235
                                                        c0,5.321,4.33,9.651,9.651,9.651h67.235c5.321,0,9.651-4.33,9.651-9.651V18.23c0-5.321-4.33-9.651-9.651-9.651H18.23z" />
                                                            </g>
                                                        </svg>
                                                        <h3 class="empty-text"> لا يوجد بيانات</h3>
                                                    </div>
                                                    <!--End Empty image when delete all attachments -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- بحث أجتماعى-->
                                        <div class="tab-pane fade" id="social-research" role="tabpanel"
                                            aria-labelledby="social-research-tab">
                                            @if($loan->socialReacerch)
                                            <div class="row tab-data">
                                                <div class="col-5">
                                                    @php
                                                        $husband = $loan->relative()->where('type' , 0)->first();
                                                        $sons = $loan->relative()->where('type' , 1)->get();
                                                    @endphp
                                                    @if($husband)
                                                    <h3 class="title mb-3"> بيانات عن الأسرة </h3>
                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> اسم الزوج </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$husband->name}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> الرقم القومى </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$husband->national_id}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> تاريخ الميلاد </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$husband->dateOfBirth}}</p>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> تليفون محمول </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$husband->dateOfBirth}}</p>
                                                        </div>
                                                    </div> --}}

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> الوظيفة </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p>{{$husband->job}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> الدخل </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$husband->income}}</p>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-3 hr">
                                                            <hr>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> عدد الابناء </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{count($sons)}} </p>
                                                        </div>
                                                    </div>
                                                    @foreach ($sons as $son)
                                                        <div class="row">
                                                            <div class="col-8 social-research-card">
                                                                <div class="row">
                                                                    <div class="col-6 labels">
                                                                        <p> اسم الابن </p>
                                                                    </div>
                                                                    <div class="col-6 data text-break">
                                                                        <p> {{$son->name}}   </p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-6 labels">
                                                                        <p> تاريخ الميلاد </p>
                                                                    </div>
                                                                    <div class="col-6 data text-break">
                                                                        <p> {{$son->dateOfBirth}} </p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-6 labels">
                                                                        <p> الحالة الاجتماعية </p>
                                                                    </div>
                                                                    <div class="col-6 data text-break">
                                                                        <p> {{$son->social_status}}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-6 labels">
                                                                        <p> المرحلة التعليمية </p>
                                                                    </div>
                                                                    <div class="col-6 data text-break">
                                                                        <p> {{$son->eduction_status}} </p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-6 labels">
                                                                        <p> الوظيفة </p>
                                                                    </div>
                                                                    <div class="col-6 data text-break">
                                                                        <p> {{$son->job}} </p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-6 labels">
                                                                        <p> الدخل </p>
                                                                    </div>
                                                                    <div class="col-6 data text-break">
                                                                        <p> {{$son->income}} </p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-6 labels">
                                                                        <p> مقيم بالمنزل </p>
                                                                    </div>
                                                                    <div class="col-6 data text-break">
                                                                        <p> {{$son->in_home ? "نعم" : "لا"}} </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforeach



                                                    {{-- <div class="row mt-2">
                                                        <div class="col-6 labels">
                                                            <p> مصادر اخرى للدخل </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> لا يوجد </p>
                                                        </div>
                                                    </div> --}}


                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> اجمالي الدخل </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> ٢٠٠٠ </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-1 divider">
                                                    <hr>
                                                </div>

                                                <div class="col-6">
                                                    <h3 class="title mb-3"> بيانات عن حالة المنزل </h3>
                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> ملكيه المنزل </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$loan->socialReacerch->is_owner ? "ملك" : "إيجار"}} </p>
                                                        </div>
                                                    </div>
                                                    @if(!$loan->socialReacerch->is_owner)
                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> قيمة الايجار </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$loan->socialReacerch->rent}}</p>
                                                        </div>
                                                    </div>
                                                    @endif

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> عدد الغرف </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$loan->socialReacerch->number_of_rooms}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> حمام مشترك </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$loan->socialReacerch->is_shared_bathroom ? "نعم" : "لا"}}  </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> حالة المنزل </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            @switch($loan->socialReacerch->houes_status)
                                                                @case(1)
                                                                <p> جيدة </p>
                                                                    @break
                                                                @case(2)
                                                                <p> متوسطة </p>
                                                                    @break

                                                                @default
                                                                    <p> سيئة </p>

                                                            @endswitch
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> أحتياجات المنزل </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p>{{$loan->socialReacerch->house_needs}} </p>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> حالة الأثاث </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            @switch($loan->socialReacerch->furniture_status)
                                                                @case(1)
                                                                <p> جيدة </p>
                                                                    @break
                                                                @case(2)
                                                                <p> متوسطة </p>
                                                                    @break

                                                                @default
                                                                    <p> سيئه </p>

                                                            @endswitch
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> تفصيلها </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p>{{$loan->socialReacerch->furniture_description}}  </p>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> ملاحظات على حالة الأسرة </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$loan->socialReacerch->notes ?? "لا يوجد"}} </p>
                                                        </div>
                                                    </div>
                                                    @if (count($loan->illnesses))
                                                    <h3 class="title mb-3 mt-5"> الملف الطبي </h3>

                                                    @endif

                                                    @foreach ($loan->illnesses as $illness)
                                                    <!--       اسم المريض    -->
                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> اسم المريض </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$illness->name}} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> نوع المرض </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$illness->type}}</p>
                                                        </div>
                                                    </div>

                                                    <!--          اسماء الادويه    -->
                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> اسماء الادويه </p>
                                                        </div>
                                                        <div class="col-6 data text-break">
                                                            <p> {{$illness->drugs}} </p>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                            {{--
                                                    <h3 class="title mb-3 mt-5"> خبرات الاسره في مجال المشروع </h3>


                                                    <div class="row">
                                                        <div class="col-6 labels">
                                                            <p> حيثيه علي ان التفسيرات المختلفه نتجت جزئيا بسبب الاختلاف
                                                                في التعبير ف النصوص الاصليه ف الاتفاقيه </p>
                                                        </div>

                                                    </div> --}}
                                                </div>
                                            </div>
                                            @else

                                            <!-- Empty image when delete all attachments -->
                                            <div class="row empty-container mt-5 h-50">
                                                <svg fill="#b68b25" version="1.1" id="Capa_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="103.696px" height="103.696px" viewBox="0 0 103.696 103.696"
                                                    style="enable-background:new 0 0 103.696 103.696;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M74.836,70.501c0.658,1.521-0.042,3.287-1.562,3.944c-1.521,0.66-3.286-0.042-3.944-1.562
                                                c-2.894-6.689-9.731-11.012-17.421-11.012c-7.868,0-14.747,4.318-17.523,11.004c-0.479,1.154-1.596,1.85-2.771,1.85
                                                c-0.384,0-0.773-0.074-1.15-0.229c-1.53-0.636-2.255-2.392-1.62-3.921c3.71-8.932,12.764-14.703,23.064-14.703
                                                C61.994,55.872,70.994,61.614,74.836,70.501z M31.06,35.17c0-3.423,2.777-6.201,6.201-6.201c3.423,0,6.2,2.777,6.2,6.201
                                                c0,3.426-2.777,6.203-6.2,6.203C33.836,41.373,31.06,38.597,31.06,35.17z M59.176,35.17c0-3.423,2.78-6.201,6.203-6.201
                                                c3.424,0,6.201,2.777,6.201,6.201c0,3.426-2.777,6.203-6.201,6.203C61.957,41.373,59.176,38.597,59.176,35.17z M85.467,103.696
                                                H18.23C8.179,103.696,0,95.518,0,85.467V18.23C0,8.178,8.179,0,18.23,0h67.235c10.053,0,18.23,8.178,18.23,18.23v67.235
                                                C103.697,95.518,95.518,103.696,85.467,103.696z M18.23,8.579c-5.321,0-9.651,4.33-9.651,9.651v67.235
                                                c0,5.321,4.33,9.651,9.651,9.651h67.235c5.321,0,9.651-4.33,9.651-9.651V18.23c0-5.321-4.33-9.651-9.651-9.651H18.23z" />
                                                    </g>
                                                </svg>
                                                <h3 class="empty-text text-center mt-5"> لا يوجد بيانات</h3>
                                            </div>
                                            @endif
                                            <!--End Empty image when delete all attachments -->
                                        </div>

                                        <!--استعلام ميداني-->
                                        <div class="tab-pane fade" id="field-inquiry" role="tabpanel"
                                            aria-labelledby="field-inquiry-tab">
                                            @if ($loan->fieldInquiry)
                                                <div class="row tab-data">
                                                    <div class="col-5">
                                                        <h3 class="title mb-3"> بيانات عن العميلة </h3>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> سمعة العميلة </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                @switch($loan->socialReacerch->furniture_status)
                                                                    @case(1)
                                                                    <p> جيدة </p>
                                                                        @break
                                                                    @case(2)
                                                                    <p> متوسطة </p>
                                                                        @break

                                                                    @default
                                                                        <p> سيئه </p>

                                                                @endswitch

                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> سداد القروض سابقة </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> منتظم</p>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-3 hr">
                                                                <hr>
                                                            </div>
                                                        </div>

                                                        <h3 class="title mb-3"> بيانات عن السكن </h3>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> وصف السكن </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{ $loan->fieldInquiry->home_description }}</p>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> ملكية السكن </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$loan->fieldInquiry->is_owner ? "ملك" : "إيجار"}}  </p>
                                                            </div>
                                                        </div>
                                                        @if(!$loan->fieldInquiry->is_owner)

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> قيمة الإيجار الشهري </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$loan->fieldInquiry->rent}} </p>
                                                            </div>
                                                        </div>
                                                        @endif

                                                    </div>

                                                    <div class="col-1 divider">
                                                        <hr>
                                                    </div>

                                                    <div class="col-6">
                                                        <h3 class="title mb-3"> بيانات عن المشروع </h3>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> وصف المشروع </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{ $loan->fieldInquiry->project_description }}
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> نوع المشروع </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{ $loan->fieldInquiry->project_type }}</p>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> تكلفة المشروع </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{ $loan->fieldInquiry->project_cost }}</p>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> العائد المتوقع </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{ $loan->fieldInquiry->project_revenue }} </p>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> مدة المشروع بالسنين </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{ $loan->fieldInquiry->project_period }} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else

                                                <!-- Empty image when delete all attachments -->
                                                <div class="row empty-container mt-5 h-50">
                                                    <svg fill="#b68b25" version="1.1" id="Capa_1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        width="103.696px" height="103.696px"
                                                        viewBox="0 0 103.696 103.696"
                                                        style="enable-background:new 0 0 103.696 103.696;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path
                                                                d="M74.836,70.501c0.658,1.521-0.042,3.287-1.562,3.944c-1.521,0.66-3.286-0.042-3.944-1.562
                                                c-2.894-6.689-9.731-11.012-17.421-11.012c-7.868,0-14.747,4.318-17.523,11.004c-0.479,1.154-1.596,1.85-2.771,1.85
                                                c-0.384,0-0.773-0.074-1.15-0.229c-1.53-0.636-2.255-2.392-1.62-3.921c3.71-8.932,12.764-14.703,23.064-14.703
                                                C61.994,55.872,70.994,61.614,74.836,70.501z M31.06,35.17c0-3.423,2.777-6.201,6.201-6.201c3.423,0,6.2,2.777,6.2,6.201
                                                c0,3.426-2.777,6.203-6.2,6.203C33.836,41.373,31.06,38.597,31.06,35.17z M59.176,35.17c0-3.423,2.78-6.201,6.203-6.201
                                                c3.424,0,6.201,2.777,6.201,6.201c0,3.426-2.777,6.203-6.201,6.203C61.957,41.373,59.176,38.597,59.176,35.17z M85.467,103.696
                                                H18.23C8.179,103.696,0,95.518,0,85.467V18.23C0,8.178,8.179,0,18.23,0h67.235c10.053,0,18.23,8.178,18.23,18.23v67.235
                                                C103.697,95.518,95.518,103.696,85.467,103.696z M18.23,8.579c-5.321,0-9.651,4.33-9.651,9.651v67.235
                                                c0,5.321,4.33,9.651,9.651,9.651h67.235c5.321,0,9.651-4.33,9.651-9.651V18.23c0-5.321-4.33-9.651-9.651-9.651H18.23z" />
                                                        </g>
                                                    </svg>
                                                    <h3 class="empty-text text-center mt-5"> لا يوجد بيانات</h3>
                                                </div>
                                            @endif
                                            <!--End Empty image when delete all attachments -->
                                        </div>

                                        <!--دراسة الجدوى-->
                                        <div class="tab-pane fade" id="Feasibility-study" role="tabpanel"
                                            aria-labelledby="Feasibility-study-tab">
                                            @if (count($costs))
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-11">
                                                        @if (isset($costs[0]))
                                                            <h3 class="title mb-3 mt-60"> التكاليف الاستثمارية </h3>
                                                            <table cellpadding="50" cellspacing="50"
                                                                class="table details-table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="first" colspan="2">البند
                                                                        </th>
                                                                        <th class="small-th">الكمية</th>
                                                                        <th class="small-th">سعر الوحدة</th>
                                                                        <th class="small-th">الاجمالي</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $total = 0;
                                                                    @endphp
                                                                    @foreach ($costs[0] as $cost)
                                                                        <tr>
                                                                            <td class="row-data text-center">
                                                                                {{ $loop->index + 1 }} </td>
                                                                            <td class="row-data">
                                                                                {{ $cost->name }}
                                                                            </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity }} </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->price }} جنية</td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity * $cost->price }}
                                                                                جنية
                                                                            </td>
                                                                            @php
                                                                                $total += $cost->quantity * $cost->price;
                                                                            @endphp
                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>

                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            class="text-start total-price total-text">
                                                                            الاجمالي</td>
                                                                        <td class="total-price">{{ $total }}
                                                                            جنية
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        @endif
                                                        @if (isset($costs[1]))
                                                            <h3 class="title mb-3 mt-60"> التكاليف الشهرية </h3>
                                                            <table cellpadding="50" cellspacing="50"
                                                                class="table details-table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="first" colspan="2">البند
                                                                        </th>
                                                                        <th class="small-th">الكمية</th>
                                                                        <th class="small-th">سعر الوحدة</th>
                                                                        <th class="small-th">الاجمالي</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $total = 0;
                                                                    @endphp
                                                                    @foreach ($costs[1] as $cost)
                                                                        <tr>
                                                                            <td class="row-data text-center">
                                                                                {{ $loop->index + 1 }} </td>
                                                                            <td class="row-data">
                                                                                {{ $cost->name }}
                                                                            </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity }} </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->price }} جنية</td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity * $cost->price }}
                                                                                جنية
                                                                            </td>
                                                                            @php
                                                                                $total += $cost->quantity * $cost->price;
                                                                            @endphp
                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>

                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            class="text-start total-price total-text">
                                                                            الاجمالي</td>
                                                                        <td class="total-price">{{ $total }}
                                                                            جنية
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        @endif
                                                        @if (isset($costs[2]))
                                                            <h3 class="title mb-3  mt-60"> الإيرادات المتوقعة الشهرية
                                                            </h3>
                                                            <table cellpadding="50" cellspacing="50"
                                                                class="table details-table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="first" colspan="2">البند
                                                                        </th>
                                                                        <th class="small-th">الكمية</th>
                                                                        <th class="small-th">سعر الوحدة</th>
                                                                        <th class="small-th">الاجمالي</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $total = 0;
                                                                    @endphp
                                                                    @foreach ($costs[2] as $cost)
                                                                        <tr>
                                                                            <td class="row-data text-center">
                                                                                {{ $loop->index + 1 }} </td>
                                                                            <td class="row-data">
                                                                                {{ $cost->name }}
                                                                            </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity }} </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->price }} جنية</td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity * $cost->price }}
                                                                                جنية
                                                                            </td>
                                                                            @php
                                                                                $total += $cost->quantity * $cost->price;
                                                                            @endphp
                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>

                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            class="text-start total-price total-text">
                                                                            الاجمالي</td>
                                                                        <td class="total-price">{{ $total }}
                                                                            جنية
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            @else
                                                <!-- Empty image when delete all attachments -->
                                                <div class="row empty-container mt-5 h-50">
                                                    <svg fill="#b68b25" version="1.1" id="Capa_1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        width="103.696px" height="103.696px"
                                                        viewBox="0 0 103.696 103.696"
                                                        style="enable-background:new 0 0 103.696 103.696;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path
                                                                d="M74.836,70.501c0.658,1.521-0.042,3.287-1.562,3.944c-1.521,0.66-3.286-0.042-3.944-1.562
                                                c-2.894-6.689-9.731-11.012-17.421-11.012c-7.868,0-14.747,4.318-17.523,11.004c-0.479,1.154-1.596,1.85-2.771,1.85
                                                c-0.384,0-0.773-0.074-1.15-0.229c-1.53-0.636-2.255-2.392-1.62-3.921c3.71-8.932,12.764-14.703,23.064-14.703
                                                C61.994,55.872,70.994,61.614,74.836,70.501z M31.06,35.17c0-3.423,2.777-6.201,6.201-6.201c3.423,0,6.2,2.777,6.2,6.201
                                                c0,3.426-2.777,6.203-6.2,6.203C33.836,41.373,31.06,38.597,31.06,35.17z M59.176,35.17c0-3.423,2.78-6.201,6.203-6.201
                                                c3.424,0,6.201,2.777,6.201,6.201c0,3.426-2.777,6.203-6.201,6.203C61.957,41.373,59.176,38.597,59.176,35.17z M85.467,103.696
                                                H18.23C8.179,103.696,0,95.518,0,85.467V18.23C0,8.178,8.179,0,18.23,0h67.235c10.053,0,18.23,8.178,18.23,18.23v67.235
                                                C103.697,95.518,95.518,103.696,85.467,103.696z M18.23,8.579c-5.321,0-9.651,4.33-9.651,9.651v67.235
                                                c0,5.321,4.33,9.651,9.651,9.651h67.235c5.321,0,9.651-4.33,9.651-9.651V18.23c0-5.321-4.33-9.651-9.651-9.651H18.23z" />
                                                        </g>
                                                    </svg>
                                                    <h3 class="empty-text text-center mt-5"> لا يوجد بيانات</h3>
                                                </div>
                                                <!--End Empty image when delete all attachments -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- End Third Container in details-->

                                <!--###################################### Tabs in Print ##################################################################-->


                            <p class="pageBreak" class="pageBreak" style="page-break-after: always;">&nbsp;
                            </p>
                            <p class="pageBreak" style="page-break-before: always;">&nbsp;</p>
                            <p class="pageBreak" class="pageBreak" style="page-break-after: always;">&nbsp;
                            </p>
                            <p class="pageBreak" style="page-break-before: always;">&nbsp;</p>
                            <p class="pageBreak" class="pageBreak" style="page-break-after: always;">&nbsp;
                            </p>
                            <p class="pageBreak" style="page-break-before: always;">&nbsp;</p>

                            <p class="pageBreak" class="pageBreak" style="page-break-after: always;">&nbsp;
                            </p>
                            <p class="pageBreak" style="page-break-before: always;">&nbsp;</p>
                            <p class="pageBreak" class="pageBreak" style="page-break-after: always;">&nbsp;
                            </p>
                            <p class="pageBreak" style="page-break-before: always;">&nbsp;</p>
                            <p class="pageBreak" class="pageBreak" style="page-break-after: always;">&nbsp;
                            </p>
                            <p class="pageBreak" style="page-break-before: always;">&nbsp;</p>
                            <!--تفاصيل الطلب-->
                            <div class="col-12 col-lg-11 mt-4 third-container third-in-print break">
                                <h1>تفاصيل الطلب</h1>
                                <!-- تفاصيل الطلب-->
                                <div class="row tab-data">
                                    <div class="col-5">
                                        <h3 class="title mb-3"> البيانات الشخصية</h3>
                                        <!-- تاريخ الميلاد   -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> تاريخ الميلاد </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->date_of_birth }} </p>
                                            </div>
                                        </div>

                                        <!--   الحالة الاجتماعية -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> الحالة الاجتماعية </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                @switch($loan->social_status)
                                                    @case(0)
                                                        <p>متزوجة </p>
                                                    @break
                                                    @case(1)
                                                        <p> مطلقة </p>
                                                    @break
                                                    @case (2)
                                                        <p> ارملة </p>
                                                    @break
                                                    @case (3)
                                                        <p> عزباء </p>
                                                    @break

                                                @endswitch

                                            </div>
                                        </div>

                                        <!--    عدد الأطفال  -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> عدد الأطفال </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->number_of_children }}</p>
                                            </div>
                                        </div>

                                        <!--    أبناء من ذوي الاحتياجات الخاصة  -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> أبناء من ذوي الاحتياجات الخاصة </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p>{{ $loan->have_special_case ? 'يوجد' : ' لا يوجد' }}
                                                </p>
                                            </div>
                                        </div>

                                        {{-- <!--    عنوان مقدم الطلب   -->
                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> عنوان مقدم الطلب
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
                                        <div class="row mb-3">
                                            <div class="col-4 labels">
                                                <p> الرقم التأميني </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->number_of_insurance }} </p>
                                            </div>
                                            @if (false)
                                                <div class="col-2 data text-break">
                                                    <button class="edit" data-bs-toggle="modal"
                                                        type="button"
                                                        data-bs-target="#Num-of-insurance-staticBackdrop">
                                                        تعديل
                                                    </button>
                                                </div>
                                            @endif

                                        </div>

                                    </div>

                                    <div class="col-1 divider">
                                        <hr class="h-100">
                                    </div>

                                    <div class="col-6">
                                        <h3 class="title mb-3"> بيانات المشروع </h3>
                                        <!--   الخبرات السابقة   -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> الخبرات السابقة </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->have_experince ? 'يوجد' : 'لا يوجد' }}</p>
                                            </div>
                                        </div>

                                        <!--   سنوات الخبرة -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> سنوات الخبرة </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->number_of_experice_years }}</p>
                                            </div>
                                        </div>

                                        <!--    مقر المشروع  -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> مقر المشروع </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->address_project }}</p>
                                            </div>
                                        </div>

                                        <!--    عنوان مقر المشروع  -->
                                        {{-- <div class="row mb-3">
                                        <div class="col-6 labels">
                                            <p> عنوان مقر المشروع </p>
                                        </div>
                                        <div class="col-6 data text-break">
                                            <p> لا يوجد </p>
                                            <!--<p>المحافظة</p>
                                    <p>المدينة / المركز</p>-->
                                        </div>
                                    </div> --}}

                                        <!--    شركاء آخرون   -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> شركاء آخرون </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                @if (count($loan->userPartners) > 0)
                                                    @foreach ($loan->userPartners as $partener)
                                                        <p>{{ $partener->name }} </p>
                                                    @endforeach
                                                @else
                                                    <p> لا يوجد </p>
                                                @endif

                                            </div>
                                        </div>

                                        <!--      وصف المشروع    -->
                                        <div class="row mb-3">
                                            <div class="col-6 labels">
                                                <p> وصف المشروع </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- بحث أجتماعى-->
                            @if($loan->socialReacerch)
                                <div class="col-12 col-lg-11 mt-4 third-container third-in-print break">
                                    <h1>بحث أجتماعى</h1>
                                    <div class="row tab-data">
                                        <div class="col-5">
                                            @php
                                                $husband = $loan->relative()->where('type' , 0)->first();
                                                $sons = $loan->relative()->where('type' , 1)->get();
                                            @endphp
                                            @if($husband)
                                            <h3 class="title mb-3"> بيانات عن الأسرة </h3>
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> اسم الزوج </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$husband->name}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> الرقم القومى </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$husband->national_id}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> تاريخ الميلاد </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$husband->dateOfBirth}}</p>
                                                </div>
                                            </div>

                                            {{-- <div class="row">
                                                <div class="col-6 labels">
                                                    <p> تليفون محمول </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$husband->dateOfBirth}}</p>
                                                </div>
                                            </div> --}}

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> الوظيفة </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p>{{$husband->job}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> الدخل </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$husband->income}}</p>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-3 hr">
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> عدد الابناء </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{count($sons)}} </p>
                                                </div>
                                            </div>
                                            @foreach ($sons as $son)
                                                <div class="row">
                                                    <div class="col-8 social-research-card">
                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> اسم الابن </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$son->name}}   </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> تاريخ الميلاد </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$son->dateOfBirth}} </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> الحالة الاجتماعية </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$son->social_status}}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> المرحلة التعليمية </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$son->eduction_status}} </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> الوظيفة </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$son->job}} </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> الدخل </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$son->income}} </p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6 labels">
                                                                <p> مقيم بالمنزل </p>
                                                            </div>
                                                            <div class="col-6 data text-break">
                                                                <p> {{$son->in_home ? "نعم" : "لا"}} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach



                                            {{-- <div class="row mt-2">
                                                <div class="col-6 labels">
                                                    <p> مصادر اخرى للدخل </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> لا يوجد </p>
                                                </div>
                                            </div> --}}


                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> اجمالي الدخل </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> ٢٠٠٠ </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-1 divider">
                                            <hr>
                                        </div>

                                        <div class="col-6">
                                            <h3 class="title mb-3"> بيانات عن حالة المنزل </h3>
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> ملكيه المنزل </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$loan->socialReacerch->is_owner ? "ملك" : "إيجار"}} </p>
                                                </div>
                                            </div>
                                            @if(!$loan->socialReacerch->is_owner)
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> قيمة الايجار </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$loan->socialReacerch->rent}}</p>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> عدد الغرف </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$loan->socialReacerch->number_of_rooms}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> حمام مشترك </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$loan->socialReacerch->is_shared_bathroom ? "نعم" : "لا"}}  </p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> حالة المنزل </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    @switch($loan->socialReacerch->houes_status)
                                                        @case(1)
                                                        <p> جيدة </p>
                                                            @break
                                                        @case(2)
                                                        <p> متوسطة </p>
                                                            @break

                                                        @default
                                                            <p> سيئة </p>

                                                    @endswitch
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> أحتياجات المنزل </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p>{{$loan->socialReacerch->house_needs}} </p>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> حالة الأثاث </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    @switch($loan->socialReacerch->furniture_status)
                                                        @case(1)
                                                        <p> جيدة </p>
                                                            @break
                                                        @case(2)
                                                        <p> متوسطة </p>
                                                            @break

                                                        @default
                                                            <p> سيئه </p>

                                                    @endswitch
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> تفصيلها </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p>{{$loan->socialReacerch->furniture_description}}  </p>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> ملاحظات على حالة الأسرة </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$loan->socialReacerch->notes ?? "لا يوجد"}} </p>
                                                </div>
                                            </div>

                                            <h3 class="title mb-3 mt-5"> الملف الطبي </h3>
                                            @foreach ($loan->illnesses as $illness)
                                            <!--       اسم المريض    -->
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> اسم المريض </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$illness->name}} </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> نوع المرض </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$illness->type}}</p>
                                                </div>
                                            </div>

                                            <!--          اسماء الادويه    -->
                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> اسماء الادويه </p>
                                                </div>
                                                <div class="col-6 data text-break">
                                                    <p> {{$illness->drugs}} </p>
                                                </div>
                                            </div>
                                        @endforeach

                                                    {{--
                                            <h3 class="title mb-3 mt-5"> خبرات الاسره في مجال المشروع </h3>


                                            <div class="row">
                                                <div class="col-6 labels">
                                                    <p> حيثيه علي ان التفسيرات المختلفه نتجت جزئيا بسبب الاختلاف
                                                        في التعبير ف النصوص الاصليه ف الاتفاقيه </p>
                                                </div>

                                            </div> --}}
                                        </div>
                                    </div>
                                    @else

                                </div>
                            @endif
                            <!--استعلام ميداني-->
                            @if ($loan->fieldInquiry)


                            <div class="col-12 col-lg-11 mt-4 third-container third-in-print break">

                                <h1>استعلام ميداني</h1>
                                <div class="row tab-data">
                                    <div class="col-5">
                                        <h3 class="title mb-3"> بيانات عن العميلة </h3>

                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> سمعة العميلة </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                @switch($loan->socialReacerch->furniture_status)
                                                    @case(1)
                                                    <p> جيدة </p>
                                                        @break
                                                    @case(2)
                                                    <p> متوسطة </p>
                                                        @break

                                                    @default
                                                        <p> سيئه </p>

                                                @endswitch

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> سداد القروض سابقة </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> منتظم</p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-3 hr">
                                                <hr>
                                            </div>
                                        </div>

                                        <h3 class="title mb-3"> بيانات عن السكن </h3>

                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> وصف السكن </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->fieldInquiry->home_description }}</p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> ملكية السكن </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{$loan->fieldInquiry->is_owner ? "ملك" : "إيجار"}}  </p>
                                            </div>
                                        </div>
                                        @if(!$loan->fieldInquiry->is_owner)

                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> قيمة الإيجار الشهري </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{$loan->fieldInquiry->rent}} </p>
                                            </div>
                                        </div>
                                        @endif

                                    </div>

                                    <div class="col-1 divider">
                                        <hr>
                                    </div>

                                    <div class="col-6">
                                        <h3 class="title mb-3"> بيانات عن المشروع </h3>

                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> وصف المشروع </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->fieldInquiry->project_description }}
                                                </p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> نوع المشروع </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->fieldInquiry->project_type }}</p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> تكلفة المشروع </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->fieldInquiry->project_cost }}</p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> العائد المتوقع </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->fieldInquiry->project_revenue }} </p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6 labels">
                                                <p> مدة المشروع بالسنين </p>
                                            </div>
                                            <div class="col-6 data text-break">
                                                <p> {{ $loan->fieldInquiry->project_period }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else

                            </div>
                            @endif
                            <!--دراسة الجدوى-->
                            @if (count($costs))
                            <div class="col-12 col-lg-11 mt-4 third-container third-in-print break">
                                <h1>دراسة الجدوى</h1>

                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-11">
                                                        @if (isset($costs[0]))
                                                            <h3 class="title mb-3 mt-60"> التكاليف الاستثمارية </h3>
                                                            <table cellpadding="50" cellspacing="50"
                                                                class="table details-table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="first" colspan="2">البند
                                                                        </th>
                                                                        <th class="small-th">الكمية</th>
                                                                        <th class="small-th">سعر الوحدة</th>
                                                                        <th class="small-th">الاجمالي</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $total = 0;
                                                                    @endphp
                                                                    @foreach ($costs[0] as $cost)
                                                                        <tr>
                                                                            <td class="row-data text-center">
                                                                                {{ $loop->index + 1 }} </td>
                                                                            <td class="row-data">
                                                                                {{ $cost->name }}
                                                                            </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity }} </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->price }} جنية</td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity * $cost->price }}
                                                                                جنية
                                                                            </td>
                                                                            @php
                                                                                $total += $cost->quantity * $cost->price;
                                                                            @endphp
                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>

                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            class="text-start total-price total-text">
                                                                            الاجمالي</td>
                                                                        <td class="total-price">{{ $total }}
                                                                            جنية
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        @endif
                                                        @if (isset($costs[1]))
                                                            <h3 class="title mb-3 mt-60"> التكاليف الشهرية </h3>
                                                            <table cellpadding="50" cellspacing="50"
                                                                class="table details-table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="first" colspan="2">البند
                                                                        </th>
                                                                        <th class="small-th">الكمية</th>
                                                                        <th class="small-th">سعر الوحدة</th>
                                                                        <th class="small-th">الاجمالي</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $total = 0;
                                                                    @endphp
                                                                    @foreach ($costs[1] as $cost)
                                                                        <tr>
                                                                            <td class="row-data text-center">
                                                                                {{ $loop->index + 1 }} </td>
                                                                            <td class="row-data">
                                                                                {{ $cost->name }}
                                                                            </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity }} </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->price }} جنية</td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity * $cost->price }}
                                                                                جنية
                                                                            </td>
                                                                            @php
                                                                                $total += $cost->quantity * $cost->price;
                                                                            @endphp
                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>

                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            class="text-start total-price total-text">
                                                                            الاجمالي</td>
                                                                        <td class="total-price">{{ $total }}
                                                                            جنية
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        @endif
                                                        @if (isset($costs[2]))
                                                            <h3 class="title mb-3  mt-60"> الإيرادات المتوقعة الشهرية
                                                            </h3>
                                                            <table cellpadding="50" cellspacing="50"
                                                                class="table details-table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="first" colspan="2">البند
                                                                        </th>
                                                                        <th class="small-th">الكمية</th>
                                                                        <th class="small-th">سعر الوحدة</th>
                                                                        <th class="small-th">الاجمالي</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $total = 0;
                                                                    @endphp
                                                                    @foreach ($costs[2] as $cost)
                                                                        <tr>
                                                                            <td class="row-data text-center">
                                                                                {{ $loop->index + 1 }} </td>
                                                                            <td class="row-data">
                                                                                {{ $cost->name }}
                                                                            </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity }} </td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->price }} جنية</td>
                                                                            <td class="text-center row-data">
                                                                                {{ $cost->quantity * $cost->price }}
                                                                                جنية
                                                                            </td>
                                                                            @php
                                                                                $total += $cost->quantity * $cost->price;
                                                                            @endphp
                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>

                                                                <tfoot>
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            class="text-start total-price total-text">
                                                                            الاجمالي</td>
                                                                        <td class="total-price">{{ $total }}
                                                                            جنية
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            @else
                               </div>
                            @endif

            <!--########################3############# End Tabs in Print ##############################################################-->
                                <!-- Accept Button click-->
                                @if ($loan->status >= 6)
                                    <div class="col-12 d-none d-lg-block col-lg-11 mt-4 accept-div acptssss">
                                        <div class="row">

                                            <div class="col-5 pt-3 pb-3 position-relative">
                                                <h3 class="title mb-3 text-center"> الموافقات </h3>
                                                <p><i class="fas fa-check"></i> موافقه مدير الحساب</p>
                                                <p><i class="fas fa-check"></i> موافقه الشريك</p>
                                                <p><i class="fas fa-check"></i> موافقه مسئول ائتمان الفرع</p>
                                                <p><i class="fas fa-check"></i> موافقه لجنه الائتمان الرئيسيه</p>
                                                <div class="green mx-auto position-absolute" style="bottom: 26px;">
                                                    موافقه نهائيه
                                                </div>
                                            </div>

                                            <!--Divider-->
                                            <div class="col-1 d-flex justify-content-center">
                                                <div class="divider">
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="col-5 pt-3 pb-3">
                                                <h3 class="title mb-3 text-center"> اجراءات اصدار القرض </h3>
                                                <button class="buttonload mb-2">
                                                    <i class="fas fa-check btn-text"></i>
                                                    طلب تحويل مبلغ القرض
                                                </button>

                                                <button class="buttonload mb-2">
                                                    <i class="fas fa-check btn-text"></i>
                                                    طلب اصدار كارت ميزه
                                                </button>

                                                <button class="buttonload mb-2">
                                                    <i class="fas fa-check btn-text"></i>
                                                    تم تحويل مبلغ القرض
                                                </button>

                                                <button class="buttonload mb-2">
                                                    <i class="fas fa-check btn-text"></i>
                                                    تم اصدار كارت ميزه
                                                </button>

                                                <button class="buttonload mb-2">
                                                    <i class="fas fa-check btn-text"></i>
                                                    طباعه مستندات التعاقد
                                                </button>

                                                <button class="buttonload mb-2">
                                                    <i class="fas fa-check btn-text"></i>
                                                    توقيع العميل / استلام القرض
                                                </button>
                                                <div class="green mt-3 mx-auto final-accept-loan">
                                                    تم تسليم القرض
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endif
                                <!--End Accept Button click-->
                                <!-- Fourth Row in details-->
                                <div class=" d-none d-lg-block col-lg-11 mt-5 under-btns">
                                    <div class="row">

                                        <div class="col-4 p-0">
                                            <button class="final-btn" disabled>الموافقة النهائية</button>
                                        </div>

                                        <div class="col-4 d-flex justify-content-center p-0">
                                            <button type="submit" class="save-btn">حفظ</button>
                                        </div>

                                        <div class="col-4 d-flex justify-content-end p-0">
                                            <button class="cancel-btn">إلغاء</button>
                                        </div>

                                    </div>
                                </div>

                                <!--End Fourth Row in details-->
                        </div>
                    </div>
                    <!-- End All Applications #tab1-->

                </div>
            </div>
            <!-- End Left Side -->

        </div>
    </div>
    </form>
</section>

@include('layouts.footer')
