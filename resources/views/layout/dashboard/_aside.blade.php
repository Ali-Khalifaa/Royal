<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>

        <li class="nav-item start">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">الرئيسية</span>
                <span class="arrow"></span>

            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('dashboard.setting.index') }}" class="nav-link ">
                        <span class="title">الأعدادات</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('dashboard.slider.index') }}" class="nav-link ">
                        <span class="title">سكشن السلايدر</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('dashboard.service.index') }}" class="nav-link ">
                        <span class="title">خدمات الشركة</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{ route('dashboard.aboutsetting.index') }}" class="nav-link ">
                        <span class="title">سكشن عن الأكاديمية</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{route('dashboard.chose.index')}}" class="nav-link ">
                        <span class="title">سكشن لماذا تختارنا</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{route('dashboard.choseSlider.index')}}" class="nav-link ">
                        <span class="title">سلايدر سكشن لماذا تختارنا</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{route('dashboard.video.index')}}" class="nav-link ">
                        <span class="title">سكشن الفيديو</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{route('dashboard.homespecialist.index')}}" class="nav-link ">
                        <span class="title">سكشن متخصصينا</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{route('dashboard.counter.index')}}" class="nav-link ">
                        <span class="title">سكشن العداد</span>
                    </a>
                </li>


                <li class="nav-item  ">
                    <a href="{{ route('dashboard.clientsay.index') }}" class="nav-link ">
                        <span class="title">اراء العملاء</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{ route('dashboard.footer.index') }}" class="nav-link ">
                        <span class="title">صور الانستجرام</span>
                    </a>
                </li>

            </ul>

        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-group"></i>
                <span class="title">من نحن</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">

                <li class="nav-item  ">
                    <a href="{{ route('dashboard.aboutsectionone.index') }}" class="nav-link ">
                        <span class="title"> السكشن الأول </span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('dashboard.aboutsectionthree.index') }}" class="nav-link ">
                        <span class="title">السكشن الثالث</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{route('dashboard.partenar.index')}}" class="nav-link ">
                        <span class="title">السكشن السادس </span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">خدماتنا</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('dashboard.servicesone.index') }}" class="nav-link ">
                        <span class="title">السكشن الأول</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('dashboard.sevicestwo.index') }}" class="nav-link ">
                        <span class="title">السكشن الثانى</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('dashboard.sevicesthree.index') }}" class="nav-link ">
                        <span class="title">السكشن الثالث</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="{{route('dashboard.doctor.index')}}" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">صفحة الدكاترة</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{route('dashboard.gallery.index')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">صفحة صورنا</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.emailSetting.index')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">اعدادات البريد المرسل</span>
            </a>
        </li>

        {{-- <li class="nav-item  ">
            <a href="{{route('dashboard.nationality.index')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">الجنسية</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.specialization.index')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">التخصصات</span>
            </a>
        </li> --}}

        <li class="nav-item  ">
            <a href="{{route('dashboard.question.index')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">بنك الأسئلة</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.index')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">التقديمات</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.getaddmissionStepOne')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">المقابلة الأولى</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.getaddmissionStepTwo')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">المقابلة الثانية</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.getaddmissionStepThree')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">تحديد موعد الأمتحان</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.getaddmissionWaitingExam')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">مواعيد امتحان المتقدمين</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.getaddmissionSuccessExam')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">الطلاب الناجحون</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.getaddmissionFailExam')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">الطلاب الراسبون</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.accepted')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">الطلاب المقبولون</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{route('dashboard.addmission.getaddmissionFail')}}" class="nav-link nav-toggle">
                <i class="fa fa-object-group"></i>
                <span class="title">الطلاب المرفوضون</span>
            </a>
        </li>





        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-group"></i>
                <span class="title">رسائل العملاء</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">

                <li class="nav-item">
                    <a href="{{ route('dashboard.contactComment') }}" class="nav-link ">
                        <span class="title">رسائل صفحة تواصل معنا </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.homeComment') }}" class="nav-link ">
                        <span class="title">رسائل الصفحة الرئيسية </span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item">

            <a href="{{ route('logout') }}" class="nav-link nav-toggle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل خروج</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
                {{-- <i class="icon-paper-plane"></i>
                <span class="title">المركز الاعلامي</span> --}}

        </li>


    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
