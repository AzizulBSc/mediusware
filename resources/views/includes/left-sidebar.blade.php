<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/avatar5.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            {{--<img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
        </div>
        <div class="info">
            <a href="#" class="d-block"></a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <!--Transactions start-->
                    <li class="nav-item">
                        <a href="{{ route('transactions.index') }}" class="nav-link {{ isActive('[/transactions]') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Transactions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transactions.deposit') }}" class="nav-link {{ isActive(['/deposit']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Deposite Transactions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('deposit.view') }}" class="nav-link {{ isActive(['/deposit/create']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Amount Deposit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transactions.withdrawal') }}"
                            class="nav-link {{ isActive(['/withdrawal']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Withdrawal Transactions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('withdrawal.view') }}"
                            class="nav-link {{ isActive(['/withdrawal/create']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Amount Withdraw</p>
                        </a>
                    </li>
            <!--Transactions end-->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
