<?php
/**
 * Template Name: Edit M_One
 */

get_header();

$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
$post = $post_id ? get_post($post_id) : null;
$radio_value = $post ? get_post_meta($post_id, 'halet_tanfez', true) : '';

// الحصول على الفئة الحالية للمنشور
$current_category = wp_get_post_terms($post_id, 'maktab');
?>

    <div class="w-100">
        <div id="form-response"></div>
            <div class="page-header">
                <h5>متابعة مهام قسم الإشراف التربوي في العام 1445</h4>
            </div>
            <div class="content">
                <div class="allBtns">
                    <div>
                        <select class="select-content" name="custom_category" id="editPoFilter">
                            <option class="d-none">
                                <?php
                                foreach ($current_category as $category) :
                                    $category_name = $category->name;
                                ?>
                                    <?= $category_name?>
                                <?php endforeach;?>
                            </option>
                            <option>
                                <ul>
                                    <li>قسم الإشراف التربوي</li>
                                </ul>
                            </option>
                            <option disabled>المكاتب:</option>

                            <?php

                                $categories = get_terms( array(
                                    'parent' => 0,
                                    'taxonomy' => 'maktab',
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
                    
                    <form id="editCustomPostForm">
                    <input type="hidden" name="post_id" value="<?php echo esc_attr($post_id); ?>">
                        <div class="table-container">
                            <table style="overflow-x: auto;">
                                <tr class="table-header">
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
                                </tr>
                                <tr class="table-header" style="height: 60px;">
                                    <th>من</th>
                                    <th>إلى</th>
                                </tr>

                                <?php 
                                        // if (!isset($_GET['post_id'])) {
                                        //     return 'No post ID provided.';
                                        // }
                                    
                                        // $post_id = intval($_GET['post_id']);
                                        // $post = get_post($post_id);
                                        // if (!$post || $post->post_type !== 'makateb') {
                                        //     return 'Invalid post ID.';
                                        // }
                                    
                                        // $categories = get_terms(array('taxonomy' => 'category', 'hide_empty' => false));
                                        // $post_categories = wp_get_post_terms($post_id, 'category');
                                        // $selected_category = !empty($post_categories) ? $post_categories[0]->term_id : '';
                                    
                                ?>

                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <textarea class="table-input" name="post_title" id="post_title" placeholder="نص تعريفي">
                                            <?php the_title();?>
                                        </textarea>
                                    </td>
                                    <td>
                                        <input type="date" name="post_date_from" id="post_date_from" value="<?php the_field('date_from');?>" />
                                    </td>
                                    <td>
                                        <input type="date" name="post_date_to" id="post_date_to" value="<?php the_field('date_to');?>" />
                                    </td>
                                    <td>
                                        <textarea class="table-input" name="post_feqa" id="post_feqa" placeholder="نص تعريفي">
                                            <?php the_field('feqa_mostah');?>
                                        </textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="post_num" id="post_num" class="table-number" value="<?php the_field('adad');?>" />
                                    </td>
                                    <td>
                                        <input type="number" name="post_moasher" id="post_moasher" class="table-number" value="<?php the_field('moashr_adaa');?>" />

                                    </td>
                                    <td>
                                        <input type="number" name="post_khetat" id="post_khetat" class="table-number" value="<?php the_field('ketat_asas');?>" />
                                    </td>
                                    <td>
                                        <input type="number" name="post_mostah" id="post_mostah" class="table-number" value="<?php the_field('mostahdaf');?>" readonly />

                                    </td>
                                    <td>
                                        <input type="number" name="post_tahaqaq" id="post_tahaqaq" class="table-number" value="<?php the_field('tahaqaq_moash');?>" />

                                    </td>
                                    <td>
                                        <div class="radio-container">
                                            <?php //the_field('halet_tanfez');?>
                                           
                                        </div>
                                        <div class="radio-container">
                                            <input type="radio" id="notStarted" name="custom_field_radio" value="لم يبدأ" <?php checked($radio_value, 'لم يبدأ'); ?> />
                                            <label for="notStarted">لم يبدأ</label>
                                        </div>
                                        <div class="radio-container">
                                            <input type="radio" id="continue" name="custom_field_radio" value="مستمر" <?php checked($radio_value, 'مستمر'); ?> />
                                            <label for="continue">مستمر</label>
                                        </div>
                                        <div class="radio-container">
                                            <input type="radio" id="finished" name="custom_field_radio" value="انتهى" <?php checked($radio_value, 'انتهي'); ?> />
                                            <label for="finished">انتهي</label>
                                        </div>
                                        <div class="radio-container">
                                            <input type="radio" id="stopped" name="custom_field_radio" value="متوقف" <?php checked($radio_value, 'متوقف'); ?> />
                                            <label for="stopped">متوقف</label>
                                        </div>
                                    </td>
                                    <td>
                                        <textarea class="table-input" name="soubat" id="soubat" placeholder="نص تعريفي">
                                            <?php the_field('soubat');?>
                                        </textarea>
                                    </td>
                                    <td>
                                        <textarea class="table-input" name="any_updatee" id="any_updatee" placeholder="نص تعريفي">
                                            <?php the_field('any_updatee');?>
                                        </textarea>
                                    </td>

                                </tr>

                            </table>
                        </div>
                        <div class="text-left mt-5">
                            <button type="submit" class="base-btn" id="editPoso">
                                حفظ
                                <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-left.svg" alt="next" />
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

<?php get_footer();?>