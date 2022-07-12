<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('adminn/Home') ?>">
        <div class="sidebar-brand-icon">
            <img src="">
        </div>
        <div class="sidebar-brand-text mx-2">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('adminn/Home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <?php
        $menus = $this->menu->getMenu();

        foreach ($menus as $menu) :
            $submenu = $this->menu->getSubmenu($menu->id);
    ?>

    <li class="nav-item">
        <?php if($submenu) : ?>
            <a class="nav-link collapsed" href="<?= base_url() ?>" data-toggle="collapse" data-target="#collapse<?= $menu->id ?>" aria-expanded="true" aria-controls="collapse">
                <i class="<?= $menu->icon ?>"></i>
                <span><?= $menu->title ?></span>
            </a>

            <div id="collapse<?= $menu->id ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= $menu->title ?></h6>
                    <?php foreach($submenu as $sm) : ?>
                        <a class="collapse-item" href="<?= base_url() . $sm->sub_url ?>"><?= $sm->sub_title ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        <?php else : ?>
            <a class="nav-link" href="<?= base_url() . $menu->url ?>">
                <i class="<?= $menu->icon ?>"></i>
                <span><?= $menu->title ?></span>
            </a>
        <?php endif; ?>
    </li> 

    <?php endforeach ?>

</ul>