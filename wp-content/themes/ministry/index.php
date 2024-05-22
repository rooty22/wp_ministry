<?php
if (!is_user_logged_in()) {
    wp_redirect(home_url('/custom-login'));
    exit;
}
get_header();
?>

        <div class="w-100">
            <div class="page-header">
                <h5>متابعة مهام قسم الإشراف التربوي في العام 1445</h4>
            </div>
            <div class="content">
                <div class="allBtns">
                    <div class="btns">
                        <button class="base-btn" type="button" onclick="addNewRow()">
                            <img src="<?= get_template_directory_uri() ?>/assets/imgs/Add.svg" alt="add" width="20" height="20" />
                            إضافة</button>
                        <button class="secondary-btn" type="button" id="deleteButton" disabled>
                            <img src="<?= get_template_directory_uri() ?>/assets/imgs/remove.svg" alt="remove" width="20" height="20" />
                            حذف
                        </button>
                    </div>
                    <div>
                        <select class="select-content" name="custom_category" id="makatebFilter">
                            <option class="d-none">
                                المكاتب
                            </option>
                            <option disabled>المكاتب:</option>

                            <?php

                                $categories = get_terms( array(
                                    'parent' => 0,
                                    'taxonomy' => 'maktab',
                                    // 'exclude' => 9,
                                    'orderby' => 'id',
                                    'order' => 'DESC',
                                    'hide_empty' => false,
                                ) );

                                if (! empty( $categories ) && ! is_wp_error( $categories )) :
                                    foreach ($categories as $category) :
                                        $category_id = $category->term_id;
                                        $category_name = $category->name;
                            ?>
                            
                            <option value="<?= $category_id ?>"><?= $category_name;?></option>
                            <?php endforeach;?>
                            <?php else: 
                                echo "No Data!";
                            ?>

                            <?php endif;?>

                            <!-- <option>الحمدانية</option>
                            <option>السالمة</option>
                            <option>الفيحاء</option>
                            <option>الواحة</option>
                            <option>الصفا</option>
                            <option>الفضيلة</option>
                            <option>الجوهرة</option>
                            <option>خليص</option>
                            <option>رابغ</option> -->
                        </select>
                    </div>
                </div>
                <div class="table-content">
                    <p class="mission1-header">
                        إعداد الخطط السنوية للإشراف التربوي على مستوى مكاتب التعليم التابعة لإدارة التعليم ضمن الاختصاص
                        وبالتنسيق مع إدارتي الطفولة المبكرة وتنمية القدرات ، ومتابعة تنفيذها للسياسات واللوائح والضوابط
                        والخطط والبرامج
                        <span class="red-text">الخاصة بالإشراف التربوي</span>
                        بما يضمن توجيه الدعم الإشرافي للمدارس ذات الأداء التعليمي المنخفض
                    </p>
                    
                    <form method="post" id="mass1" enctype="multipart/form-data">

                        <div class="table-container">
                            <table style="overflow-x: auto;">
                                <tr class="table-header">
                                    <th rowspan="2">
                                        <input type="checkbox" id="select-all" />
                                    </th>
                                    <th rowspan="2">
                                        م
                                    </th>
                                    <th rowspan="2">
                                        اسم البرنامج / المشروع
                                    </th>
                                    <th colspan="2">
                                        تاريخ التنفيذ
                                    </th>
                                    <th rowspan="2">
                                        الفئة المستهدفة
                                    </th>
                                    <th rowspan="2">
                                        العدد
                                    </th>
                                    <th rowspan="2">
                                        مؤشر الاداء
                                    </th>
                                    <th class="vertical-text" rowspan="2">
                                        خطط الاساس
                                    </th>
                                    <th class="vertical-text" rowspan="2">
                                        المستهدف
                                    </th>
                                    <th class="vertical-text" rowspan="2">
                                        تحقق المؤشر
                                    </th>
                                    <th class="special_col" rowspan="2">
                                        حالة التنفيذ
                                    </th>
                                    <th class="wide-th" rowspan="2">
                                        الصعوبات (إن وجدت)
                                    </th>
                                    <th rowspan="2">
                                        المقترحات والحلول
                                    </th>
                                    <th rowspan="2">
                                        الشواهد** (رابط أو باركود)
                                    </th>
                                </tr>
                                <tr class="table-header" style="height: 60px;">
                                    <th>من</th>
                                    <th>إلى</th>
                                </tr>
    
                                <tr>
                                    <td>
                                        <!-- <input type="checkbox" class="row-checkbox" /> -->
                                    </td>
                                    <td class="gray-bg">
                                        1
                                    </td>
                                    <td>
                                        <textarea class="table-input" name="post_title" id="post_title" placeholder="نص تعريفي"></textarea>
                                    </td>
                                    <td>
                                        <input type="date" name="post_date_from" id="post_date_from" />
                                    </td>
                                    <td>
                                        <input type="date" name="post_date_to" id="post_date_to" />
                                    </td>
                                    <td>
                                        <textarea class="table-input" name="post_feqa" id="post_feqa" placeholder="نص تعريفي"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="post_num" id="post_num" class="table-number" />
                                    </td>
                                    <td>
                                        <input type="number" name="post_moasher" id="post_moasher" class="table-number" />
    
                                    </td>
                                    <td>
                                        <input type="number" name="post_khetat" id="post_khetat" class="table-number" />
                                    </td>
                                    <td>
                                        <input type="number" name="post_mostah" id="post_mostah" class="table-number" />
    
                                    </td>
                                    <td>
                                        <input type="number" name="post_tahaqaq" id="post_tahaqaq" class="table-number" />
    
                                    </td>
                                    <td>
                                        <div class="radio-container">
                                            <input type="radio" id="notStarted" name="custom_field_radio" value="لم يبدأ" />
                                            <label for="notStarted">لم يبدأ</label>
                                        </div>
                                        <div class="radio-container">
                                            <input type="radio" id="continue" name="custom_field_radio" value="مستمر" />
                                            <label for="continue">مستمر</label>
                                        </div>
                                        <div class="radio-container">
                                            <input type="radio" id="finished" name="custom_field_radio" value="انتهى" />
                                            <label for="finished">انتهي</label>
                                        </div>
                                        <div class="radio-container">
                                            <input type="radio" id="stopped" name="custom_field_radio" value="متوقف" />
                                            <label for="stopped">متوقف</label>
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="table-input" name="soubat" id="soubat" placeholder="نص تعريفي"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="table-input" name="any_updatee" id="any_updatee" placeholder="نص تعريفي"></textarea>
                                    </td>
                                    <td>
                                        <button type="button" class="base-btn" data-toggle="modal" data-target="#fileModal">رابط</button>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="text-left mt-5">
                            <button type="button" class="base-btn" id="nextButton">
                                إدخال
                                <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-left.svg" alt="next" />
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

<?php
get_footer();
?>