<aside class="sidebar sidebar-left">
    <nav>
        <h5 class="sidebar-header">Navigation</h5>
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="{{ url('/') }}" title="Dashboard">
                    <i class="fa fa-fw fa-tachometer"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('keys.index') }}" title="API Keys">
                    <i class="fa fa-fw fa-key"></i> API Keys
                </a>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Documentation">
                    <i class="fa fa-fw fa-book"></i> Documentation
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="#" title="Buttons">
                            Blank Page
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Sliders &amp; Progress">
                            Another Blank Page
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>