@include('layouts.header')
<section class="pt-5 pb-5"
    style="background: url(/mastora/img/Group\ 52.png) #F7F7F7 no-repeat; background-size: cover; background-position: center;">
    <!--Popup-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

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
                            <form action="/loans" method="get" style="display: contents">
                            <div class="col-sm-4">
                                <!--<input class="search"  placeholder="بحث">
                                    <svg id="Research" xmlns="http://www.w3.org/2000/svg" width="26.503" height="26.602" viewBox="0 0 26.503 26.602">
                                    <path id="Vector" d="M25.3,19.712l-2.76-2.827a4.107,4.107,0,0,0-4.533-.76l-1.2-1.2a9.333,9.333,0,1,0-1.88,1.88l1.187,1.187a4,4,0,0,0,.707,4.613l2.827,2.827a4.021,4.021,0,1,0,5.653-5.72ZM13.992,14.059a6.667,6.667,0,1,1,1.45-2.165,6.667,6.667,0,0,1-1.45,2.165Zm9.427,9.427a1.333,1.333,0,0,1-1.893,0L18.7,20.659a1.339,1.339,0,1,1,1.893-1.893l2.827,2.827a1.333,1.333,0,0,1,0,1.893Z" transform="translate(0 0)" fill="#df2024"/>
                                    </svg>-->

                                <div class="input-group mb-3 search">
                                    <button class="btn btn-outline-secondary btn-icon" type="button"
                                        id="button-addon2"><svg id="Research" xmlns="http://www.w3.org/2000/svg"
                                            width="26.503" height="26.602" viewBox="0 0 26.503 26.602">
                                            <path id="Vector"
                                                d="M25.3,19.712l-2.76-2.827a4.107,4.107,0,0,0-4.533-.76l-1.2-1.2a9.333,9.333,0,1,0-1.88,1.88l1.187,1.187a4,4,0,0,0,.707,4.613l2.827,2.827a4.021,4.021,0,1,0,5.653-5.72ZM13.992,14.059a6.667,6.667,0,1,1,1.45-2.165,6.667,6.667,0,0,1-1.45,2.165Zm9.427,9.427a1.333,1.333,0,0,1-1.893,0L18.7,20.659a1.339,1.339,0,1,1,1.893-1.893l2.827,2.827a1.333,1.333,0,0,1,0,1.893Z"
                                                transform="translate(0 0)" fill="#df2024" />
                                        </svg></button>
                                    <input type="number" class="form-control " name="loan_uniqe_id" placeholder="بحث"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">

                                </div>
                            </div>

                            <div class="col-sm-4 d-flex justify-content-center">
                                <button type="submit" class="search-btn">بحث</button>
                            </div>
                        </form>
                            <div class="col-sm-4 d-flex justify-content-end">
                                <div class="num-order">
                                    <span>{{ count($loans) }}</span> طلب جديد
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table custom-table" id="AllApplications">

                                <thead>

                                    <tr>
                                        <!--<th scope="col">
                                                    <label class="control control--checkbox px-1">
                                                    <input type="checkbox" class="js-check-all" />
                                                    <div class="control__indicator"><span></span></div>
                                                    </label>
                                                </th>-->
                                        <th scope="col">
                                            رقم الطلب</th>
                                        <th scope="col">تاريخ التقديم</th>
                                        <th scope="col">مقدم الطلب</th>
                                        <th scope="col"> الفرع</th>
                                        <th scope="col">الشريك</th>
                                        <th scope="col">قيمة القرض</th>
                                        <th scope="col"> نوع القرض</th>
                                        <th scope="col">حالة الطلب</th>
                                        @if(!isset($_GET['approvalStatus']) || (isset($_GET['approvalStatus']) &&  $_GET['approvalStatus']!= "ASSIGNED")  )
                                            <th scope="col" class="dots"></th>
                                        @endif
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($loans as $loan)


                                    <tr>
                                        <td class="clickable pt-39 order-num fw-bold">
                                            {{ $loan->loan_uniqe_id }}
                                        </td>
                                        <td class="clickable pt-39">{{ $loan->created_at }}</td>
                                        <td class="clickable pt-39 fw-bold text-wrap">
                                            {{ $loan->name }}
                                        </td>
                                        <td class="clickable pt-39">
                                            {{ $loan->bank->name }}
                                        </td>
                                        @if($loan->partner)
                                        <td class="clickable pt-39">
                                            {{ $loan->partner->bank->name }}
                                        </td>
                                        @else
                                        <td class="clickable pt-39">لا يوجد </td>
                                        @endif
                                        <td class="clickable pt-39">{{ $loan->price }} جنيه</td>
                                        @switch($loan->type)
                                        @case(1)
                                        <td class="clickable pt-39 approve"> متجددة</td>

                                        @break
                                        @case( 2)
                                        <td class="clickable pt-39 approve"> صناعي</td>

                                        @break
                                        @case (3)
                                        <td class="clickable pt-39 approve"> زراعي</td>

                                        @break
                                        @case (4)
                                        <td class="clickable pt-39 approve"> منزلي</td>

                                        @break
                                        @case (5)
                                        <td class="clickable pt-39 approve"> خدمات</td>

                                        @break
                                        @case (6)
                                        <td class="clickable pt-39 approve"> تجاري</td>
                                        @break

                                    @endswitch

                                        <td>
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
                                    <li><a class="dropdown-item" href="{{ route('loans.show', $loan->id) }}"> <i
                                                class="fas fa-eye"></i> عرض</a></li>
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
</section>
@include('layouts.footer')
