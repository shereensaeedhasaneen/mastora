<div class="d-none d-lg-flex col-lg-3 side-bar-dashboard">
    <div class="sidebar">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li data-href="/loans" class="nav-item" role="presentation">
          <button data-hret="/loans" class="nav-link {{ request()->route()->uri  == "loans" && ! isset($_GET['approvalStatus']) ? "active" : null}}"  id="All-applications-tab" data-bs-toggle="tab" data-bs-target="#All-applications" type="button" role="tab" aria-controls="All-applications" aria-selected="true">طلبات القروض</button>
        </li>
        <li class="nav-item" role="presentation">
          <button data-href="/loans-form" class="nav-link {{ request()->route()->uri  == "loans-form" ? "active" : null}}" id="New-application-tab" data-bs-toggle="tab" data-bs-target="#New-application" type="button" role="tab" aria-controls="New-application" aria-selected="false">بدء طلب جديد </button>
        </li>
        <div class="seprator mb-1">
        </div>
        <li class="nav-item" role="presentation">
            <button data-href="/loans?approvalStatus=APPROVED" class="nav-link {{ request()->route()->uri  == "loans" &&  isset($_GET['approvalStatus']) && $_GET['approvalStatus'] =='APPROVED' ? "active" : null}}" id="accepted-application-tab" data-bs-toggle="tab" data-bs-target="#accepted-application" type="button" role="tab" aria-controls="accepted-application" aria-selected="false"> طلبات تم البت فيها</button>
          </li>

          <li class="nav-item" role="presentation">
            <button data-href="/loans?approvalStatus=REJECTED" class="nav-link {{ request()->route()->uri  == "loans" &&  isset($_GET['approvalStatus']) && $_GET['approvalStatus'] =='REJECTED' ? "active" : null}}" id="rejected-application-tab" data-bs-toggle="tab" data-bs-target="#rejected-application" type="button" role="tab" aria-controls="rejected-application" aria-selected="false"> طلبات مرفوضة</button>
          </li>

          @if(count(auth()->user()->assignedLoan) > 0)
            <li class="nav-item" role="presentation">
              <button data-href="/loans?approvalStatus=ASSIGNED" class="nav-link {{ request()->route()->uri  == "loans" &&  isset($_GET['approvalStatus']) && $_GET['approvalStatus'] =='ASSIGNED' ? "active" : null}}" id="rejected-application-tab" data-bs-toggle="tab" data-bs-target="#rejected-application" type="button" role="tab" aria-controls="rejected-application" aria-selected="false"> طلبات معينة</button>
            </li>
          @endif

      </ul>

        <!--<a href="#" class="gray-color">طلبات القروض </a>
        <a href="#" class="red-color"> بدء طلب جديد </a>
        <a href="#" class="red-color"> استكمال طلب </a>-->

        <div class="seprator">
        </div>
        @if(auth()->user()->user_type != 1)

        <a href="{{ url('/partners') }}" class="transparent-bg">الشركاء</a>
        @endif

    </div>

  </div>
