<?php
/**
 * Template Name: Outbut M_One
 */

get_header();
?>

        <div class="w-100">
            <div class="page-header">
                <h5>متابعة مهام قسم الإشراف التربوي في العام 1445</h4>
            </div>
            <div class="table-content mx-3" style="padding-bottom: 15%;">
                <div class="d-flex justify-content-center">
                    <form>
                        <select class="select-content border border-gray" id="outoChan">
                            <option value="all">المكتب</option>

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
                            
                        </select>
                        <button type="button" class="base-btn mr-5 search-btn" id="outo">
                            بحث
                        </button>
                    </form>
                    <div id="res"></div>
                </div>
                <hr />
                <div class="text-right">
                    <?php
                        $args = array('post_type' => 'makateb', 'posts_per_page' => -1);
                        $custom_posts = new WP_Query($args);
                        $post_count = $custom_posts->found_posts;
                    ?>
                    <p class="text-bold m-0 mission1_title">المهمة الأولى</p>
                    <p class="m-0 mission1_subtitle">عدد البرامج الكلية : <?= $post_count;?></p>
                </div>
                <div class="table-container">
                    <table class="w-100">
                        <tr class="table-header h-auto">
                            <th>حالة البرامج</th>
                            <th>العدد</th>
                            <th>النسبة</th>
                        </tr>
                        <tr>
                            <td>لم تبدأ</td>
                            <td id="noStart"></td>
                            <td id="nostartP"></td>
                        </tr>
                        <tr>
                            <td>المستمرة</td>
                            <td id="onGoing"></td>
                            <td id="ongoingP"></td>
                        </tr>
                        <tr>
                            <td>المنتهية</td>
                            <td id="ended"></td>
                            <td id="endedP"></td>
                        </tr>
                        <tr>
                            <td>المتوقفة</td>
                            <td id="stopped"></td>
                            <td id="stoppedP"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php get_footer();?>