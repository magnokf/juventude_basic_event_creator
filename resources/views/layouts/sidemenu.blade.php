<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard - Home

                </p>
            </a>
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Inscrições Confirmadas</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="../../index2.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Inscrições Não Confirmadas</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            </ul>--}}
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Inscrições
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">{{$total_enrollments}}</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('event_one.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon text-success"></i>
                        <p>Confirmadas
                            <span class="badge badge-success right">{{$total_confirmed_enrollments}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>Não Confirmadas
                            <span class="badge badge-danger right">{{$total_not_confirmed_enrollments}}</span>
                        </p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Gráficos
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="../charts/chartjs.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>ChartJS</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="../charts/flot.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Flot</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="../charts/inline.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Inline</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="../charts/uplot.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>uPlot</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </li>
        <li class="nav-header"></li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p>Sair</p>
            </a>
        </li>

    </ul>
</nav>
