
                <!-- Show -->
                <div class="table-content">

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
                                <th rowspan="2">
                                    الأجراءات
                                </th>
                            </tr>
                            <tr class="table-header" style="height: 60px;">
                                <th>من</th>
                                <th>إلى</th>
                            </tr>

                            <?php 
                                    $the_query = new WP_Query(array(
                                        'post_type' => 'makateb', 
                                        'posts_per_page' => -1,
                                        'orderby' => 'date',
                                        'order' => 'ASC',
                                    ));
                                    $n = 1;
                                    if ($the_query->have_posts()) :
                                        while ($the_query->have_posts()) :
                                            $the_query->the_post();
                                
                            ?>

                            <tr>
                                <td class="gray-bg">
                                    <?= $n;?>
                                </td>
                                <td>
                                    <textarea class="table-input" name="post_title" id="post_title" placeholder="نص تعريفي" readonly>
                                        <?php the_title();?>
                                    </textarea>
                                </td>
                                <td>
                                    <input type="date" name="post_date_from" id="post_date_from" value="<?= the_field('date_from');?>" readonly />
                                </td>
                                <td>
                                    <input type="date" name="post_date_to" id="post_date_to" value="<?= the_field('date_to');?>" readonly />
                                </td>
                                <td>
                                    <textarea class="table-input" name="post_feqa" id="post_feqa" placeholder="نص تعريفي" readonly>
                                        <?= the_field('feqa_mostah');?>
                                    </textarea>
                                </td>
                                <td>
                                    <input type="number" name="post_num" id="post_num" class="table-number" value="<?= the_field('adad');?>" readonly />
                                </td>
                                <td>
                                    <input type="number" name="post_moasher" id="post_moasher" class="table-number" value="<?= the_field('moashr_adaa');?>" readonly />

                                </td>
                                <td>
                                    <input type="number" name="post_khetat" id="post_khetat" class="table-number" value="<?= the_field('ketat_asas');?>" readonly />
                                </td>
                                <td>
                                    <input type="number" name="post_mostah" id="post_mostah" class="table-number" value="<?= the_field('mostahdaf');?>" readonly />

                                </td>
                                <td>
                                    <input type="number" name="post_tahaqaq" id="post_tahaqaq" class="table-number" value="<?= the_field('tahaqaq_moash');?>" readonly />

                                </td>
                                <td>
                                    <div class="radio-container">
                                        <?= the_field('halet_tanfez');?>
                                        <!-- <input type="radio" id="notStarted" name="custom_field_radio" value="لم يبدأ" />
                                        <label for="notStarted">لم يبدأ</label> -->
                                    </div>
                                </td>
                                <td>
                                    <textarea class="table-input" name="soubat" id="soubat" placeholder="نص تعريفي">
                                        <?= the_field('soubat');?>
                                    </textarea>
                                </td>
                                <td>
                                    <textarea class="table-input" name="any_updatee" id="any_updatee" placeholder="نص تعريفي">
                                        <?= the_field('any_updatee');?>
                                    </textarea>
                                </td>
                                <td>
                                    <button class="btn btn-primary edit">Edit</button>
                                    <button class="btn btn-danger delete">Delete</button>
                                    <button class="btn btn-success save" style="display: none;">Save</button>
                                </td>
                            </tr>
                            <?php 
                                $n++;
                                endwhile;
                                else :
                                    echo 'No posts found';
                                endif;
                                wp_reset_postdata();
                            ?>

                        </table>
                    </div>

                </div>