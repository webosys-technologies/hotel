<!-- Left side column. contains the logo and sidebar -->
<?php
$items = array(
    array(
        'name' => 'Dashboard',
        'link' => base_url('admin/dashboard'),
        'icon-class' => 'fa-dashboard text-red',
        'active_on' => 'Dashboard'
        ),

    array(
        'name' => 'Hotel Owners',
        'link' => base_url('admin/Owners'),
        'icon-class' => 'fa-users text-blue',
        'active_on' => 'Owners',
        ),
    array(
        'name' => 'Users',
        'link' => base_url('admin/clients'),
        'icon-class' => 'fa-users text-yellow',
        'active_on' => 'clients',
        ),
    array(
        'name' => 'Hotel',
        'link' => base_url('admin/hotel'),
        'icon-class' => 'fa-bank text-aqua',
        'active_on' => 'hotel',
        ),
     array(
        'name' => 'Manage Room',
        'link' => base_url('admin/Rooms'),
        'icon-class' => 'fa-hand-pointer-o text-yellow',
        'active_on' => 'Rooms',
        ),

     // array(
     //    'name' => 'Manage Room1',
     //    'link' => base_url('admin/Rooms/manage_room1'),
     //    'icon-class' => 'fa-fa plush text-yellow',
     //    'active_on' => 'RoomDetails',
     //    ),
        array(
        'name' => 'Manage Room Status',
        'link' => base_url('admin/Room_status'),
        'icon-class' => 'fa-fa file text-red',
        'active_on' => 'RoomDetails',
        ),
    array(
        'name' => 'Bookings',
        'link' => base_url('admin/Bookings'),
        'icon-class' => 'fa-first-order text-orange',
        'active_on' => 'Bookings',
        ),
    array(
        'name' => 'Orders',
        'link' => base_url('admin/orders'),
        'icon-class' => 'fa-first-order text-green',
        'active_on' => 'orders',
        ),

    array(
        'name' => 'Payments',
        'link' => base_url('admin/Payment'),
        'icon-class' => 'fa fa-money text-red',
        'active_on' => 'Payment',
        ),
    // array(
    //     'name' => 'Notification',
    //     'link' => base_url('admin/dashboard'),
    //     'icon-class' => 'fa-bell',
    //     'active_on' => 'notification',
    //     ),
    // array(
    //     'name' => 'Settings',
    //     'link' => '',
    //     'icon-class' => 'fa-cog',
    //     'active_on' => 'profile',
    //     'subitems' => array(
    //         array(
    //             'name' => 'Password',
    //             'link' => base_url('admin/dashboard'),
    //             'icon-class' => 'fa-circle-o',
    //             'active_on' => 'index'
    //             ),
    //         array(
    //             'name' => 'Commissions',
    //             'link' => '#',
    //             'class' => 'Commissions',
    //             'icon-class' => 'fa-hand-scissors-o',
    //             'active_on' => 'Commissions',
    //             ),
    //         ),
    //     )
    );
    ?>
    <aside class="main-sidebar"> 
        <section class="sidebar">    
            <ul class="sidebar-menu">
                <?php foreach ($items as $key => $item) : ?>
                    <li class="<?php echo (isset($item['subitems']) ? 'treeview' : '') . ' ' . (($controller == $item['active_on']) ? 'active' : ''); ?>">
                        <a href="<?php echo(isset($item['subitems']) ? '#' : $item['link']); ?>">
                            <i class="fa <?= $item['icon-class']; ?>"></i> <span><?= $item['name']; ?></span>
                            <?php if (isset($item['subitems'])) : ?>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            <?php endif; ?>
                        </a>
                        <?php if (isset($item['subitems'])) : ?>
                            <ul class="treeview-menu">
                                <?php foreach ($item['subitems'] as $key => $subitems) : ?>
                                    <li class="<?php echo(($method == $subitems['active_on']) ? 'active' : ''); ?>">
                                        <a href="<?= $subitems['link']; ?>" class="<?php echo (isset($subitems['class'])) ? $subitems['class'] : ''; ?>"><i class="fa <?= $subitems['icon-class']; ?>"></i>
                                            <span><?= $subitems['name']; ?></span>
                                            <?php if (isset($subitems['right-side-value'])) : ?>
                                                <span class="pull-right-container">
                                                    <?php foreach ($subitems['right-side-value'] as $key => $side_right_item) : ?>
                                                        <small class="label pull-right <?= $side_right_item['class']; ?>" title="<?= $side_right_item['title']; ?>"> <?= $side_right_item['value']; ?> </small>
                                                    <?php endforeach; ?>
                                                </span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </aside>

