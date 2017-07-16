<?php
/*------------------------------------*\
	注册自定义post type
\*------------------------------------*/

//banner
add_action('init', 'banner_post_type');
function banner_post_type()
{
    register_post_type('banner', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('轮换条目'),
                'singular_name' => __('全部轮换条目'),
                'add_new' => __('添加轮换条目'),
                'add_new_item' => __('添加轮换条目'),
                'edit' => __('编辑轮换条目'),
                'edit_item' => __('编辑轮换条目'),
                'new_item' => __('新轮换条目'),
                'all_items' => __('所有轮换条目'),
                'view' => __('查看轮换条目'),
                'view_item' => __('查看轮换条目'),
                'search_items' => __('搜索轮换条目'),
                'not_found' => __('当前无轮换条目'),
                'not_found_in_trash' => __('回收站轮换条目'),
            ),

            'public' => true,
            'hierarchical' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'thumbnail'
            ),
            'can_export' => true,
        )
    );
}

//头条
add_action('init', 'news_post_type');
function news_post_type()
{
    register_post_type('news', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('头条'),
                'singular_name' => __('全部头条'),
                'add_new' => __('添加头条'),
                'add_new_item' => __('添加头条'),
                'edit' => __('编辑头条'),
                'edit_item' => __('编辑头条'),
                'new_item' => __('新头条'),
                'all_items' => __('所有头条'),
                'view' => __('查看头条'),
                'view_item' => __('查看头条'),
                'search_items' => __('搜索头条'),
                'not_found' => __('当前无头条'),
                'not_found_in_trash' => __('回收站无头条'),
            ),

            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
            ),
            'can_export' => true, // Allows export in Tools > Export
        )
    );
}

//楼盘
add_action('init', 'building_post_type');
function building_post_type()
{
    register_post_type('building',
        array(
            //menu
            'labels' => array(
                'name' => __('楼盘'),
                'singular_name' => __('全部楼盘'),
                'add_new' => __('添加楼盘'),
                'add_new_item' => __('添加楼盘'),
                'edit' => __('编辑楼盘'),
                'edit_item' => __('编辑楼盘'),
                'new_item' => __('新楼盘'),
                'all_items' => __('所有楼盘'),
                'view' => __('查看楼盘'),
                'view_item' => __('查看楼盘'),
                'search_items' => __('搜索楼盘'),
                'not_found' => __('当前无楼盘'),
                'not_found_in_trash' => __('回收站无楼盘'),
                'featured_image' => __('列表封面'),
                'set_featured_image' => __('设为封面'),
                'remove_featured_image' => __('删除图片'),
                'use_featured_image' == __('使用图片')
            ),
            'public' => true,
            'menu_post' => 5,
            'hierarchical' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'thumbnail'
            ),
            'can_export' => true,
        )
    );
}

//活动
add_action('init', 'activity_post_type');
function activity_post_type()
{
    register_post_type('activity', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('活动'),
                'singular_name' => __('全部活动'),
                'add_new' => __('添加活动'),
                'add_new_item' => __('添加活动'),
                'edit' => __('编辑活动'),
                'edit_item' => __('编辑活动'),
                'new_item' => __('新活动'),
                'all_items' => __('所有活动'),
                'view' => __('查看活动'),
                'view_item' => __('查看活动'),
                'search_items' => __('搜索活动'),
                'not_found' => __('当前无活动'),
                'not_found_in_trash' => __('回收站无活动'),
                'featured_image' => __('列表封面'),
                'set_featured_image' => __('设为封面'),
                'remove_featured_image' => __('删除图片'),
                'use_featured_image' == __('使用图片')
            ),

            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'thumbnail'
            ),
            'can_export' => true, // Allows export in Tools > Export
        )
    );
}


//添加字段
add_action('add_meta_boxes', 'activity_box');
function activity_box()
{
    add_meta_box(
        'recommend_id',
        '推荐id',
        'recommend_id_meta_box',
        'activity',
        'side'
    );

    add_meta_box(
        'total',
        '人数上限',
        'total_meta_box',
        'activity',
        'normal'
    );

    add_meta_box(
        'detail_link',
        '详情链接',
        'detail_link_meta_box',
        'activity',
        'normal'
    );
}

function total_meta_box($post)
{
    wp_nonce_field('total_meta_box', 'total_meta_box_nonce');
    $value = get_post_meta($post->ID, '_total', true);
    ?>
  <label for="total"></label>
  <input style="width: 100%;" type="number" id="total" name="total"
         value="<?php echo esc_attr($value); ?>"
         placeholder="">
    <?php
}

add_action('add_meta_boxes', 'building_box');
function building_box()
{
    add_meta_box(
        'recommend_id',
        '推荐id',
        'recommend_id_meta_box',
        'building',
        'side'
    );

    //添加字段--location
    add_meta_box(
        'location',
        '位置',
        'location_meta_box',
        'building',
        'normal'
    );

    //添加字段--metro
    add_meta_box(
        'metro',
        '地铁',
        'metro_meta_box',
        'building',
        'normal'
    );
    //添加字段--type
    add_meta_box(
        'building_type',
        '楼盘类型',
        'building_type_meta_box',
        'building',
        'normal'
    );
    //添加字段--house_area
    add_meta_box(
        'house_area',
        '面积区间',
        'house_area_meta_box',
        'building',
        'normal'
    );

    //添加字段--unit_price
    add_meta_box(
        'unit_price',
        '单价',
        'unit_price_meta_box',
        'building',
        'side'
    );
    //添加字段--number
    add_meta_box(
        'contact_num',
        '联系电话',
        'contact_num_meta_box',
        'building',
        'side'
    );
    //添加字段--house_type
    add_meta_box(
        'house_type',
        '户型',
        'house_type_meta_box',
        'building',
        'normal'
    );
    //添加字段--opening_date
    add_meta_box(
        'opening_date',
        '开盘时间',
        'opening_date_meta_box',
        'building',
        'normal'
    );

    add_meta_box(
        'detail_link',
        '详情链接',
        'detail_link_meta_box',
        'building',
        'normal'
    );
}

function location_meta_box($post)
{
    wp_nonce_field('location_meta_box', 'location_meta_box_nonce');
    $value = get_post_meta($post->ID, '_location', true);
    ?>

  <label for="location"></label>
  <select class="select-con" title="location" name="location" id="location" style="width: 100%">
    <option value="all">不限</option>
    <option value="锦江" <?php if (esc_attr($value) == "锦江") echo "selected=\"selected\""; ?>>锦江</option>
    <option value="青羊" <?php if (esc_attr($value) == "青羊") echo "selected=\"selected\""; ?>>青羊</option>
    <option value="金牛" <?php if (esc_attr($value) == "金牛") echo "selected=\"selected\""; ?>>金牛</option>
    <option value="武侯" <?php if (esc_attr($value) == "武侯") echo "selected=\"selected\""; ?>>武侯</option>
    <option value="成华" <?php if (esc_attr($value) == "成华") echo "selected=\"selected\""; ?>>成华</option>
    <option value="高新区" <?php if (esc_attr($value) == "高新区") echo "selected=\"selected\""; ?>>高新区</option>
    <option value="高新西区" <?php if (esc_attr($value) == "高新西区") echo "selected=\"selected\""; ?>>高新西区</option>
    <option value="温江" <?php if (esc_attr($value) == "温江") echo "selected=\"selected\""; ?>>温江</option>
    <option value="双流" <?php if (esc_attr($value) == "双流") echo "selected=\"selected\""; ?>>双流</option>
    <option value="龙泉驿" <?php if (esc_attr($value) == "龙泉驿") echo "selected=\"selected\""; ?>>龙泉驿</option>
    <option value="新都" <?php if (esc_attr($value) == "新都") echo "selected=\"selected\""; ?>>新都</option>
    <option value="郫县" <?php if (esc_attr($value) == "郫县") echo "selected=\"selected\""; ?>>郫县</option>
    <option value="都江堰" <?php if (esc_attr($value) == "都江堰") echo "selected=\"selected\""; ?>>都江堰</option>
    <option value="青白江" <?php if (esc_attr($value) == "青白江") echo "selected=\"selected\""; ?>>青白江</option>
    <option value="彭州" <?php if (esc_attr($value) == "彭州") echo "selected=\"selected\""; ?>>彭州</option>
    <option value="浦江" <?php if (esc_attr($value) == "浦江") echo "selected=\"selected\""; ?>>浦江</option>
    <option value="大邑" <?php if (esc_attr($value) == "大邑") echo "selected=\"selected\""; ?>>大邑</option>
    <option value="新津" <?php if (esc_attr($value) == "新津") echo "selected=\"selected\""; ?>>新津</option>
    <option value="崇州" <?php if (esc_attr($value) == "崇州") echo "selected=\"selected\""; ?>>崇州</option>
    <option value="邛崃" <?php if (esc_attr($value) == "邛崃") echo "selected=\"selected\""; ?>>邛崃</option>
    <option value="金堂" <?php if (esc_attr($value) == "金堂") echo "selected=\"selected\""; ?>>金堂</option>
  </select>
    <?php
}

function metro_meta_box($post)
{
    wp_nonce_field('metro_meta_box', 'metro_meta_box_nonce');
    $value = get_post_meta($post->ID, '_metro', true);
    ?>

  <label for="metro"></label>
  <select class="select-con" title="location" name="metro" id="metro" style="width: 100%">
    <option value="all">不限</option>
    <option value="1号线" <?php if (esc_attr($value) == "1号线") echo "selected=\"selected\""; ?>>1号线</option>
    <option value="2号线" <?php if (esc_attr($value) == "2号线") echo "selected=\"selected\""; ?>>2号线</option>
    <option value="3号线" <?php if (esc_attr($value) == "3号线") echo "selected=\"selected\""; ?>>3号线</option>
    <option value="4号线" <?php if (esc_attr($value) == "4号线") echo "selected=\"selected\""; ?>>4号线</option>
    <option value="5号线" <?php if (esc_attr($value) == "5号线") echo "selected=\"selected\""; ?>>5号线</option>
    <option value="7号线" <?php if (esc_attr($value) == "7号线") echo "selected=\"selected\""; ?>>7号线</option>
    <option value="成灌快速铁路" <?php if (esc_attr($value) == "成灌快速铁路") echo "selected=\"selected\""; ?>>成灌快速铁路</option>
  </select>
    <?php
}

function building_type_meta_box($post)
{
    wp_nonce_field('building_type_meta_box', 'building_type_meta_box_nonce');
    $value = get_post_meta($post->ID, '_building_type', true);
    ?>

  <label for="building_type"></label>
  <select class="select-con" title="building_type" name="building_type" id="building_type" style="width: 100%">
    <option value="all">不限</option>
    <option value="普通住宅" <?php if (esc_attr($value) == "普通住宅") echo "selected=\"selected\""; ?>>普通住宅</option>
    <option value="花园洋房" <?php if (esc_attr($value) == "花园洋房") echo "selected=\"selected\""; ?>>花园洋房</option>
    <option value="别墅" <?php if (esc_attr($value) == "别墅") echo "selected=\"selected\""; ?>>别墅</option>
    <option value="商铺" <?php if (esc_attr($value) == "商铺") echo "selected=\"selected\""; ?>>商铺</option>
    <option value="写字楼" <?php if (esc_attr($value) == "写字楼") echo "selected=\"selected\""; ?>>写字楼</option>
    <option value="公寓" <?php if (esc_attr($value) == "公寓") echo "selected=\"selected\""; ?>>公寓</option>
  </select>
    <?php
}

function house_area_meta_box($post)
{
    wp_nonce_field('house_area_meta_box', 'house_area_meta_box_nonce');
    $value = get_post_meta($post->ID, '_house_area', true);
    ?>

  <label for="house_area"></label>
  <select class="select-con" title="house_area" name="house_area" id="house_area" style="width: 100%">
    <option value="all">不限</option>
    <option value="普通住宅" <?php if (esc_attr($value) == "普通住宅") echo "selected=\"selected\""; ?>>普通住宅</option>
    <option value="花园洋房" <?php if (esc_attr($value) == "花园洋房") echo "selected=\"selected\""; ?>>花园洋房</option>
    <option value="别墅" <?php if (esc_attr($value) == "别墅") echo "selected=\"selected\""; ?>>别墅</option>
    <option value="商铺" <?php if (esc_attr($value) == "商铺") echo "selected=\"selected\""; ?>>商铺</option>
    <option value="写字楼" <?php if (esc_attr($value) == "写字楼") echo "selected=\"selected\""; ?>>写字楼</option>
    <option value="公寓" <?php if (esc_attr($value) == "公寓") echo "selected=\"selected\""; ?>>公寓</option>
  </select>
    <?php
}

function unit_price_meta_box($post)
{
    wp_nonce_field('unit_price_meta_box', 'unit_price_meta_box_nonce');
    $value = get_post_meta($post->ID, '_unit_price', true);
    ?>

  <label for="unit_price"></label>
  <input style="width: 90%;" type="number" id="unit_price" name="unit_price"
         value="<?php echo esc_attr($value); ?>"
         placeholder="">
  <div style="position: absolute; right: 20px;bottom: 50%;">元</div>
    <?php
}

function contact_num_meta_box($post)
{
    wp_nonce_field('contact_num_meta_box', 'contact_num_meta_box_nonce');
    $value = get_post_meta($post->ID, '_contact_num', true);
    ?>
  <label for="contact_num"></label>
  <input style="width: 100%;" type="number" id="contact_num" name="contact_num"
         value="<?php echo esc_attr($value); ?>"
         placeholder="">
    <?php
}

add_action('add_meta_boxes', 'banner_box');
function banner_box()
{
    add_meta_box(
        'detail_link',
        '详情链接',
        'detail_link_meta_box',
        'banner',
        'normal'
    );
    //添加字段--recommend--id-common
    add_meta_box(
        'recommend_id',
        '推荐id',
        'recommend_id_meta_box',
        'banner',
        'side'
    );
}

add_action('add_meta_boxes', 'news_box');
function news_box()
{
    add_meta_box(
        'detail_link',
        '详情链接',
        'detail_link_meta_box',
        'news',
        'normal'
    );
}

//--edit样式--
function detail_link_meta_box($post)
{
    // 创建临时隐藏表单，为了安全
    wp_nonce_field('detail_link_meta_box', 'detail_link_meta_box_nonce');
    // 获取之前存储的值
    $value = get_post_meta($post->ID, '_detail_link', true);
    ?>

  <label for="detail_link"></label>
  <input style="width: 100%" type="text" id="detail_link" name="detail_link"
         value="<?php echo esc_attr($value); ?>"
         placeholder="">

    <?php
}

function recommend_id_meta_box($post)
{
    wp_nonce_field('recommend_id_meta_box', 'recommend_id_meta_box_nonce');
    $value = get_post_meta($post->ID, '_recommend_id', true);
    ?>

  <label for="recommend_id"></label>
  <input style="width: 100%" type="text" id="recommend_id" name="recommend_id"
         value="<?php echo esc_attr($value); ?>"
         placeholder="">
    <?php
}

//function house_type_meta_box($post)
//{
//    wp_nonce_field('house_type_meta_box', 'house_type_meta_box_nonce');
//    $value = get_post_meta($post->ID, '_house_type', true);
//
//    echo ' <label for="house_type"></label>';
////    if (isset($value) && $value == 'true')
////        $checked = 'checked = "checked"';
////    else
////        $checked = '';
////    echo '<input type="checkbox" name="house_type" value="一居" ' . $checked . ' />';
//}


//--验证保存内容--
add_action('save_post', 'save_common_meta_box');
function save_commom_meta_box($post_id)
{
    // 安全检查
    // 判断该用户是否有权限
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
    if (!isset($_POST['detail_link_meta_box_nonce'])) {
        return;
    }
    // 判断隐藏表单的值与之前是否相同
    if (!wp_verify_nonce($_POST['detail_link_meta_box_nonce'], 'detail_link_meta_box')) {
        return;
    }
    // 判断 Meta Box 是否为空
    if (!isset($_POST['detail_link'])) {
        return;
    }
    $detail_link = sanitize_text_field($_POST['detail_link']);
    update_post_meta($post_id, '_detail_link', $detail_link);
}

add_action('save_post', 'save_recommend_id_meta_box');
function save_recommend_id_meta_box($post_id)
{
    //recommend_id
    if (!isset($_POST['recommend_id_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['recommend_id_meta_box_nonce'], 'recommend_id_meta_box')) {
        return;
    }
    if (!isset($_POST['recommend_id'])) {
        return;
    }
    $recommend_id = sanitize_text_field($_POST['recommend_id']);
    update_post_meta($post_id, '_recommend_id', $recommend_id);
}

add_action('save_post', 'save_building_meta_box');
function save_building_meta_box($post_id)
{
    //location
    if (!isset($_POST['location_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['location_meta_box_nonce'], 'location_meta_box')) {
        return;
    }
    if (!isset($_POST['location'])) {
        return;
    }
    $location = sanitize_text_field($_POST['location']);
    update_post_meta($post_id, '_location', $location);

    //contact_num
    if (!isset($_POST['contact_num_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['contact_num_meta_box_nonce'], 'contact_num_meta_box')) {
        return;
    }
    if (!isset($_POST['contact_num'])) {
        return;
    }
    $contact_num = sanitize_text_field($_POST['contact_num']);
    update_post_meta($post_id, '_contact_num', $contact_num);

    //metro
    if (!isset($_POST['metro_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['metro_meta_box_nonce'], 'metro_meta_box')) {
        return;
    }
    if (!isset($_POST['metro'])) {
        return;
    }
    $metro = sanitize_text_field($_POST['metro']);
    update_post_meta($post_id, '_metro', $metro);

    //building_type
    if (!isset($_POST['building_type_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['building_type_meta_box_nonce'], 'building_type_meta_box')) {
        return;
    }
    if (!isset($_POST['building_type'])) {
        return;
    }
    $building_type = sanitize_text_field($_POST['building_type']);
    update_post_meta($post_id, '_building_type', $building_type);
    //house_type
    if (!isset($_POST['house_type_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['house_type_meta_box_nonce'], 'house_type_meta_box')) {
        return;
    }
    if (!isset($_POST['house_type'])) {
        return;
    }
    $house_type = sanitize_text_field($_POST['house_type']);
    update_post_meta($post_id, '_house_type', $house_type);
    //unit_price
    if (!isset($_POST['unit_price_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['unit_price_meta_box_nonce'], 'unit_price_meta_box')) {
        return;
    }
    if (!isset($_POST['unit_price'])) {
        return;
    }
    $unit_price = sanitize_text_field($_POST['unit_price']);
    update_post_meta($post_id, '_unit_price', $unit_price);
}

add_action('save_post', 'save_activity_meta_box');
function save_activity_meta_box($post_id)
{
    //total
    if (!isset($_POST['total_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['total_meta_box_nonce'], 'total_meta_box')) {
        return;
    }
    if (!isset($_POST['total'])) {
        return;
    }
    $total = sanitize_text_field($_POST['total']);
    update_post_meta($post_id, '_total', $total);
}

//--banner列表添加--
add_filter("manage_banner_posts_columns", "banner_columns");
add_action('manage_banner_posts_custom_column', 'custom_banner_column', 10, 2);
function banner_columns($columns)
{
    $columns['recommend_id'] = __('推荐Id');
    $columns['detail_link'] = __('详情链接');
    return $columns;
}

function custom_banner_column($column, $post_id)
{
    switch ($column) {
        case 'detail_link' :
            echo get_post_meta($post_id, '_detail_link', true);
            break;
        case 'recommend_id':
            echo get_post_meta($post_id, '_recommend_id', true);
            break;
    }
}

//--building列表添加--
add_filter("manage_building_posts_columns", "set_custom_edit_building_columns");
add_action('manage_building_posts_custom_column', 'custom_building_column', 10, 2);
function set_custom_edit_building_columns($columns)
{
    $columns['recommend_id'] = __('推荐Id');
    $columns['location'] = __('区域');
    $columns['metro'] = __('地铁');
    $columns['building_type'] = __('类型');
    $columns['unit_price'] = __('价格');
    $columns['house_area'] = __('面积区间');
    $columns['house_type'] = __('户型');
    $columns['opening_date'] = __('开盘时间');
    $columns['detail_link'] = __('详情链接');
    $columns['contact_num'] = __('电话');
    return $columns;
}

function custom_building_column($column, $post_id)
{
    switch ($column) {
        case 'recommend_id':
            echo get_post_meta($post_id, '_recommend_id', true);
            break;
        case 'location':
            echo get_post_meta($post_id, '_location', true);
            break;
        case 'metro':
            echo get_post_meta($post_id, '_metro', true);
            break;
        case 'building_type':
            echo get_post_meta($post_id, '_type', true);
            break;
        case 'unit_price' :
            echo get_post_meta($post_id, '_unit_price', true);
            break;
        case 'house_type':
            echo get_post_meta($post_id, '_house_type', true);
            break;
        case 'house_area':
            echo get_post_meta($post_id, '_house_area', true);
            break;
        case 'opening_date':
            echo get_post_meta($post_id, '_openning_date', true);
            break;
        case 'detail_link' :
            echo get_post_meta($post_id, '_detail_link', true);
            break;
        case 'contact_num' :
            echo get_post_meta($post_id, '_contact_num', true);
            break;

    }
}

//--news列表添加--
add_filter("manage_news_posts_columns", "news_columns");
add_action('manage_news_posts_custom_column', 'custom_news_column', 5, 5);
function news_columns($columns)
{
    $columns['detail_link'] = __('详情链接');
    return $columns;
}

function custom_news_column($column, $post_id)
{
    switch ($column) {
        case 'detail_link' :
            echo get_post_meta($post_id, '_detail_link', true);
            break;
    }
}

//--activities列表添加--
add_filter("manage_activity_posts_columns", "set_custom_edit_activity_columns");
add_action('manage_activity_posts_custom_column', 'custom_activity_column', 10, 2);
function set_custom_edit_activity_columns($columns)
{
    $columns['recommend_id'] = __('推荐Id');
    $columns['form_link'] = __('表单链接');
    $columns['total'] = __('人数上限');
    $columns['have_join'] = __('已参加人数');
    $columns['detail_link'] = __('详情链接');
    return $columns;
}

function custom_activity_column($column, $post_id)
{
    switch ($column) {
        case 'recommend_id':
            echo get_post_meta($post_id, '_recommend_id', true);
            break;
        case 'total_join':
            echo get_post_meta($post_id, '_total_join', true);
            break;
        case 'detail_link' :
            echo get_post_meta($post_id, '_detail_link', true);
            break;
        case 'form_link' :
            echo get_permalink();;
            break;
    }
}

//recommend_id 排序
add_filter('manage_edit-banner_sortable_columns', 'banner_sortable_columns');
function banner_sortable_columns($columns)
{
    $columns['recommend_id'] = '推荐Id';
    return $columns;
}

add_filter('manage_edit-building_sortable_columns', 'building_sortable_columns');
function building_sortable_columns($columns)
{
    $columns['recommend_id'] = '推荐Id';
    return $columns;
}

add_filter('manage_edit-activity_sortable_columns', 'activity_sortable_columns');
function activity_sortable_columns($columns)
{
    $columns['recommend_id'] = '推荐Id';
    return $columns;
}

/* 只要当管理员在'edit.php'的时候，才处理 */

//building list
add_action('load-edit.php', 'my_edit_building_load');
function my_edit_building_load()
{
    add_filter('request', 'my_sort_building');
}

function my_sort_building($vars)
{
    if (isset($vars['post_type']) && 'building' == $vars['post_type']) {
        if (isset($vars['orderby']) && 'recommend_id' == $vars['orderby']) {
            $vars = array_merge(
                $vars,
                array(
                    'meta_key' => '_recommend_id',
                    'orderby' => 'meta_value_num',
                    'order' => 'asc',
                )
            );
        }
    }
    return $vars;
}

//activity
add_action('load-edit.php', 'my_edit_activity_load');
function my_edit_activity_load()
{
    add_filter('request', 'my_sort_activity');
}

function my_sort_activity($vars)
{
    if (isset($vars['post_type']) && 'activity' == $vars['post_type']) {
        if (isset($vars['orderby']) && 'recommend_id' == $vars['orderby']) {
            $vars = array_merge(
                $vars,
                array(
                    'meta_key' => '_recommend_id',
                    'orderby' => 'meta_value_num',
                    'order' => 'asc',
                )
            );
        }
    }
    return $vars;
}

//banner
add_action('load-edit.php', 'my_edit_banner_load');
function my_edit_banner_load()
{
    add_filter('request', 'my_sort_banner');
}

function my_sort_banner($vars)
{
    if (isset($vars['post_type']) && 'banner' == $vars['post_type']) {
        if (isset($vars['orderby']) && 'recommend_id' == $vars['orderby']) {
            $vars = array_merge(
                $vars,
                array(
                    'meta_key' => '_recommend_id',
                    'orderby' => 'meta_value_num',
                    'order' => 'asc',
                )
            );
        }
    }
    return $vars;
}

//删除原始菜单
function remove_menus()
{
    global $menu;
    $restricted = array(__('Dashboard'), __('Appearance'), __('Posts'), __('Comments'), __('Themes'), __('Tools'));
    end($menu);
    while (prev($menu)) {
        $value = explode(' ', $menu[key($menu)][0]);
        if (strpos($value[0], '<') === FALSE) {
            if (in_array($value[0] != NULL ? $value[0] : "", $restricted)) {
                unset($menu[key($menu)]);
            }
        } else {
            $value2 = explode('<', $value[0]);
            if (in_array($value2[0] != NULL ? $value2[0] : "", $restricted)) {
                unset($menu[key($menu)]);
            }
        }
    }
}

if (is_admin()) {
    // 删除左侧菜单
    add_action('admin_menu', 'remove_menus');
}

//自定义菜单顺序
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');
function custom_menu_order($menu_ord)
{
    if (!$menu_ord) return true;
    return array(
        'edit.php?post_type=banner',
        'edit.php?post_type=news',
        'edit.php?post_type=building',
        'edit.php?post_type=activity',
        'upload.php',
        'edit.php?post_type=page', // “页面”菜单
        'plugins.php', //“插件”菜单
    );
}

//分页代码
function par_pagenavi($range = 1)
{
    if (is_singular())
        return;

    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;
    if ($max_page == 1) return; // 只有一页不用
    if (empty($paged)) $paged = 1;

    global $paged, $wp_query;
    if (!$max_page) {
        $max_page = $wp_query->max_num_pages;
    }

    if ($max_page > 1) {
        if (!$paged) {
            $paged = 1;
        }
        next_posts_link('加载更多');
    }
}

?>

