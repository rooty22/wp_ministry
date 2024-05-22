<?php
/**
 * Template Name: Custom Login
 */

if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}
get_header('auth');
?>

<div class="auth-container">
    <div class="d-lg-flex">
        <div class="logo-section">
            <img src="<?= get_template_directory_uri() ?>/assets/imgs/logo (2).png" />
            <div>
                <p>
                    المملكة العربية السعودية <br />
                    وزارة التعليم <br />
                    الإدارة العامة للتعليم بمحافظة جدة <br />
                    الشؤون التعليمية <br />
                    إدارة اداء التعليم - قسم الإشراف <br />التربوي
                </p>
            </div>
        </div>

        <form class="auth-form" method="POST">
            <h2 class="text-center">مهام قسم الإشراف التربوي</h2>
            <div class="input-group mb-3">
                <input type="text" name="username" id="login-username" class="form-control" placeholder="اسم المستخدم">
            </div>
            <div class="input-group">
                <input type="password" name="password" id="login-password" class="form-control" placeholder="كلمة المرور">
            </div>
            <a href="./Forget_password.html" class="mb-3">نسيت كلمة المرور؟</a>
            <button type="button" id="submy" class="btn btn-success btn-block">تسجيل الدخول</button>

        </form>


    </div>
</div>

<?php
get_footer();
?>
