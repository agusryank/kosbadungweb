<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('adminkos/index') ?>">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Badung Kos</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <br>

    <!--query menu-->
    <?php
    $role_id = $this->session->userdata('Role_id');
    $querymenu = "SELECT `admin_menu`. `id`, `menu`
                    FROM `admin_menu` JOIN `admin_access_menu`
                    ON `admin_menu`.`id` = `admin_access_menu`.`menu_id`
                    WHERE `admin_access_menu`.`role_id` = $role_id
                    order BY `admin_access_menu`.`menu_id` ASC
                    
                ";
    $menu = $this->db->query($querymenu)->result_array();

    ?>

    <!--Looping menu-->

    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!--Siapkan Sub-Menu Sesuai Menu-->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                    FROM `admin_sub_menu` JOIN `admin_menu`
                    ON `admin_sub_menu`.`menu_id` = `admin_menu`.`id`
                    WHERE `admin_sub_menu`.`menu_id` = $menuId
                    
                ";
        $subMenu = $this->db->query($querySubMenu)->result_array();

        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($tittle == $sm['tittle']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class=" nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['tittle'] ?> </span></a>
                </li>
            <?php endforeach; ?>

            <hr class="sidebar-divider d-none d-md-block ">

        <?php endforeach; ?>


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->