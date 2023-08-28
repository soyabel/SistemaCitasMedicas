<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="../Home/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../../public/img/logo.png" alt="" srcset="">
                <!-- <i class="fa-sharp fa-solid fa-house-medical-flag fa-beat-fade fa-xs"></i> -->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2"><span class="text-uppercase">S</span>aluTech</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="../Home/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Inicio</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fa-solid fa-calendar-days"></i>
                <div data-i18n="Layouts">Citas</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../MntCitas/" class="menu-link">
                        <div data-i18n="Without menu">Mostrar</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon  fa-solid fa-user-doctor"></i>
                <div data-i18n="Layouts">Médicos</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../MntMedicos/" class="menu-link">
                        <div data-i18n="Without menu">Mostrar</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fa-solid fa-briefcase-medical"></i>
                <div data-i18n="Authentications">Especialedades Médicas</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../MntEspecialidades/" class="menu-link">
                        <div data-i18n="Basic">Mostrar</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="../MntPacientes/" class="menu-link">
                <i class="menu-icon fa-solid fa-user"></i>
                <div data-i18n="Basic">Pacientes</div>
            </a>
        </li>
        <!-- User interface -->

        <!-- Extended components -->


        <!-- Forms & Tables -->
    </ul>
</aside>