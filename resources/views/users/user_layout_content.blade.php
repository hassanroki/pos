<div class="row clearfix mt-5">
    <div class="col-md-2">
        <div class="nav flex-column nav-pills">

            <a class="nav-link @if ($tab_menu === 'user_info') active @endif "
                href="{{ route('users.show', $users->id) }}">User Info</a>

            <a class="nav-link @if ($tab_menu === 'sales') active @endif "
                href="{{ route('user.sales', $users->id) }}">Sales</a>

            <a class="nav-link @if ($tab_menu === 'purchases') active @endif "
                href="{{ route('user.purchases', $users->id) }}">Purchases</a>

            <a class="nav-link  @if ($tab_menu === 'payments') active @endif "
                href="{{ route('user.payments', $users->id) }}">Payments</a>

            <a class="nav-link  @if ($tab_menu === 'receipts') active @endif "
                href="{{ route('user.receipts', $users->id) }}">Receipts</a>
        </div>
    </div>

    <div class="col-md-10">

        @yield('users_content');

    </div>

</div>


