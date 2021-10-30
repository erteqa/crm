@if(Auth::user()->hasAnyRole(['Admin']))
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Configure')}} <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="{{route('Company.Index')}}">{{__('lang.Company')}}</a>
        </li>
        <li>
            <a href="{{route('Mail.Index')}}">{{__('lang.Mail')}}</a>
        </li>


    </ul>
</li>
@endif
@if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Invoice_Add',
'Invoice_Update',
'Invoice_Delete',
'Invoice_ForceDelete',
'Invoice_View', ]) )
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.MangInvoices')}} <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        @if(Auth::user()->hasAnyRole(['Admin']) ||
        Auth::user()->hasAnyPermission(['Invoice_Add',
        ]) )
        <li>
            <a href="{{route('Add.Invoice')}}">{{__('lang.Add_Invoice')}}</a>
        </li>
        @endif
            @if(Auth::user()->hasAnyRole(['Admin']) ||
    Auth::user()->hasAnyPermission([
    'Invoice_Update',
    'Invoice_Delete',
    'Invoice_ForceDelete',
    'Invoice_View', ]) )
        <li>
            <a href="{{route('Index.Invoice',['type'=>'UN'])}}">{{__('lang.Index_Invoice')}}</a>
        </li>
@endif
    </ul>
</li>
@endif
   {{-- Configure--}}
@if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Payment_Add','Payment_Delete','Payment_ForceDelete','Payment_View']) )

    <li>
        <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Payments')}} <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            @if(Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission(['Payment_Add']) )
            <li>
                <a href="{{route('Payment.Add')}}">{{__('lang.Add_Payments')}}</a>
            </li>
@endif
                @if(Auth::user()->hasAnyRole(['Admin']) ||
    Auth::user()->hasAnyPermission(['Payment_Delete','Payment_ForceDelete','Payment_View']) )
            <li>
                <a href="{{route('Payment.Index',['type'=>'UN'])}}">{{__('lang.Payments_Mangment')}}</a>
            </li>
                    @endif
        </ul>
    </li>

@endif
@if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Expense_Add','Expense_Delete','Expense_ForceDelete','Expense_View']) )

    <li>
        <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Expenses')}} <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            @if(Auth::user()->hasAnyRole(['Admin']) ||
            Auth::user()->hasAnyPermission(['Expense_Add']) )
                <li>
                    <a href="{{route('Expense.Add')}}">{{__('lang.Add_Expenses')}}</a>
                </li>
            @endif
            @if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Expense_Delete','Expense_ForceDelete','Expense_View']) )
                <li>
                    <a href="{{route('Expense.Index',['type'=>'UN'])}}">{{__('lang.Expenses_Mangment')}}</a>
                </li>
            @endif
        </ul>
    </li>

@endif
@if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['ImportExport']) )
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.ImportExport')}} <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a href="{{route('ImportExport')}}">{{__('lang.CustomerExport')}}</a>
        </li>


    </ul>
</li>
@endif

    <li>
        <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Summery')}} <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

            <li>
                <a href="{{route('Summery.Create')}}">{{__('lang.Customer_Summery')}}</a>
            </li>


        </ul>
    </li>
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Articles')}} <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a href="{{route('Article.Add')}}">{{__('lang.Article.Add')}}</a>
        </li>
        <li>
            <a href="{{route('Article.Index',['type'=>'UN'])}}">{{__('lang.Article_Index')}}</a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="{{route('Category.Index')}}">{{__('lang.Category.Index')}}</a>
        </li>


    </ul>
</li>
@if(!Auth::user()->hasAnyRole(['Admin']))
@if(Auth::user()->Department->id==3 or Auth::user()->Department->id==6)
<li>
    <a href="#"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Convert_degree')}} <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a href="{{route('Convert')}}">{{__('lang.Convert_degree')}}</a>
        </li>


    </ul>
</li>
    @endif
    @endif
@if(Auth::user()->hasAnyRole(['Admin']) ||
Auth::user()->hasAnyPermission(['Courses']) )
    <li>
        <a href="{{route('Course.Index')}}"><i class="fa fa-wrench fa-fw"></i> {{__('lang.Courses')}} <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

            <li>
                <a href="{{route('Course.Index')}}">{{__('lang.Course_Index')}}</a>
            </li>
            <li>
                <a href="{{route('Course.Add')}}">{{__('lang.Course_Add')}}</a>
            </li>


        </ul>
    </li>
@endif