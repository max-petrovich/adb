<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li {!! (Request::is('*client') ? 'class="active"' : '') !!}>
                <a href="#"><i class="fa fa-user fa-fw"></i> Клиенты<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('client.create') }}"><i class="fa fa-edit fa-fw"></i> Добавить клиента</a>
                    </li>
                    <li {!! (Request::is('*client') ? 'class="active"' : '') !!}>
                        <a href="{{ route('client.index') }}"><i class="fa fa-table fa-fw"></i> Список клиентов</a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is('*account') ? 'class="active"' : '') !!}>
                <a href="#"><i class="fa fa-money"></i> Счета<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li {!! (Request::is('*account') ? 'class="active"' : '') !!}>
                        <a href="{{ route('account.index') }}"><i class="fa fa-table fa-fw"></i> Список счетов</a>
                    </li>
                </ul>
            </li>
            <li {!! (Request::is('*deposit') ? 'class="active"' : '') !!}>
                <a href="#"><i class="fa fa-bank"></i> Вклады<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('deposit.create') }}"><i class="fa fa-edit fa-fw"></i> Добавить вклад</a>
                    </li>
                    <li {!! (Request::is('*deposit') ? 'class="active"' : '') !!}>
                        <a href="{{ route('deposit.index') }}"><i class="fa fa-table fa-fw"></i> Список вкладов</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->