<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Blog Personal Panel</span>
            <!--end::Brand Text-->
        </a>
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
            <li class="nav-item">
                <a href="{{ route('personal.main.index') }}" class="nav-link">
                    <i class="nav-icon bi-house-fill"></i>
                    <p>Главная</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.liked.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-suit-heart-fill"></i>
                    <p>Понравившиеся</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-chat-fill"></i>
                    <p>Комментарии</p>
                </a>
            </li>
        </ul>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
