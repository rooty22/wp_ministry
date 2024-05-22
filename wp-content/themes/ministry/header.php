<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="Arzan Finance Group">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?= get_template_directory_uri() . '/assets/imgs/logo.png' ?>">

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;700&display=swap" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/style.css">

    <title>وزارة التعليم</title>

    <?php wp_head();?>

</head>
<body <?php body_class();?>>

<!-- Sidebar -->
<div class="d-flex w-100">
        <button class="collapse-btn">☰</button>
        <ul class="sidebar">
            <li class="logo_container">
                <img src="<?= get_template_directory_uri() ?>/assets/imgs/logo.png" alt="" />
            </li>
            <li>
                <p class="welcome">أهلا وسهلا يا: <?php if (is_user_logged_in()) {
                    echo wp_get_current_user()->display_name;
                }else{
                    echo "زائر";
                };?></p>

                <a class="btn btn-danger" href="<?php echo custom_logout_url(); ?>">Logout</a>
                <a class="btn btn-primary" href="https://ministry.local/wp-admin/index.php" target="_blank">Dashy</a>
            
            </li>
            <li>
                <hr />
            </li>
            <li>
                <div class="menu_item selected">
                    <span class="selected menu_order selected_order">1</span>
                    <a href="#" class="toggle_submenu">المهمة الأولى</a>
                </div>
                <ul class="sub_menu selected_sub">
                    <li class="selected_sub_menu"><a href="<?= site_url();?>">إدخال</a></li>
                    <li><a href="<?= site_url('/outbut_m1');?>">مخرجات</a></li>
                    <li><a href="<?= site_url('/show_m_one');?>">مشاهدة</a></li>
                </ul>
            </li>
            <li>
                <div class="menu_item">
                    <span class="menu_order">2</span>
                    <a href="#" class="toggle_submenu">المهمة الثانية</a>
                </div>
                <ul class="sub_menu" style="display: none;">
                    <li><a href="<?= site_url('/input-mass2');?>">إدخال</a></li>
                    <li><a href="../Mission2/Mission2_output.html">مخرجات</a></li>
                </ul>
            </li>
            <li>
                <span class="menu_order">3</span>
                <a href="#">المهمة الثالثة</a>
                <span class="soon">قريبًا</span>
            </li>
            <li>
                <span class="menu_order">4</span>
                <a href="#">المهمة الرابعة</a>
                <span class="soon">قريبًا</span>
            </li>
            <li>
                <div class="menu_item">
                    <span class="menu_order">5</span>
                    <a href="#" class="toggle_submenu">المهمة الخامسة</a>
                </div>
                <ul class="sub_menu" style="display: none;">
                    <li><a href="../Mission5/Mission5_input.html">إدخال</a></li>
                    <li><a href="../Mission5/Mission5_output.html">مخرجات</a></li>
                </ul>
            </li>
            <li>
                <div class="menu_item">
                    <span class="menu_order">6</span>
                    <a href="#" class="toggle_submenu">المهمة السادسة</a>
                </div>
                <ul class="sub_menu" style="display: none;">
                    <li><a href="../Mission6/Mission6_input.html">إدخال</a></li>
                    <li><a href="../Mission6/Mission6_output.html">مخرجات</a></li>
                </ul>
            </li>
            <li>
                <div class="menu_item">
                    <span class="menu_order">7</span>
                    <a href="#" class="toggle_submenu">المهمة السابعة</a>
                </div>
                <ul class="sub_menu" style="display: none;">
                    <li><a href="../Mission7/Mission7_input.html">إدخال</a></li>
                    <li><a href="../Mission7/Mission7_output.html">مخرجات</a></li>
                </ul>
            </li>
            <li>
                <div class="menu_item">
                    <span class="menu_order">8</span>
                    <a href="#" class="toggle_submenu">المهمة الثامنة</a>
                </div>
                <ul class="sub_menu" style="display: none;">
                    <li><a href="../Mission8/Mission8_input.html">إدخال</a></li>
                </ul>
            </li>
            <li>
                <div class="menu_item">
                    <span class="menu_order">9</span>
                    <a href="#" class="toggle_submenu">المهمة التاسعة</a>
                </div>
                <ul class="sub_menu" style="display: none;">
                    <li><a href="../Mission9/Mission9_input.html">إدخال</a></li>
                    <li><a href="../Mission9/Mission9_output.html">مخرجات</a></li>
                </ul>
            </li>
            <li>
                <div class="menu_item">
                    <span class="menu_order">10</span>
                    <a href="#" class="toggle_submenu">المهمة العاشرة</a>
                </div>
                <ul class="sub_menu" style="display: none;">
                    <li><a href="../Mission10/Mission10_input.html">إدخال</a></li>
                    <li><a href="../Mission10/Mission10_output.html">مخرجات</a></li>
                </ul>
            </li>
        </ul>
