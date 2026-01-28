<?php
/**
 * Infinity Design テーマ functions.php
 */

// =====================================================
// 実績スライダー カスタムフィールド
// =====================================================

/**
 * カスタムメタボックスを追加
 */
function infinity_add_works_slider_metabox() {
    add_meta_box(
        'works_slider_metabox',
        '実績スライダー設定',
        'infinity_works_slider_metabox_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'infinity_add_works_slider_metabox');

/**
 * フロントページかどうかを判定
 */
function infinity_is_front_page_template($post_id) {
    $template = get_post_meta($post_id, '_wp_page_template', true);
    return $template === 'front-page.php' || get_option('page_on_front') == $post_id;
}

/**
 * メタボックスのコールバック
 */
function infinity_works_slider_metabox_callback($post) {
    // フロントページ以外では表示しない案内
    if (!infinity_is_front_page_template($post->ID)) {
        echo '<p style="color: #666;">このメタボックスはフロントページテンプレートでのみ使用されます。</p>';
        return;
    }

    wp_nonce_field('infinity_works_slider_nonce', 'infinity_works_slider_nonce_field');

    // 保存された画像IDを取得
    $slider01_images = get_post_meta($post->ID, '_works_slider01_images', true);
    $slider02_images = get_post_meta($post->ID, '_works_slider02_images', true);

    if (!is_array($slider01_images)) $slider01_images = array();
    if (!is_array($slider02_images)) $slider02_images = array();
    ?>

    <style>
        .infinity-slider-section {
            margin-bottom: 30px !important;
            padding: 20px !important;
            background: #f9f9f9 !important;
            border: 1px solid #ddd !important;
            border-radius: 8px !important;
        }
        .infinity-slider-section h3 {
            margin: 0 0 15px 0 !important;
            padding: 0 0 10px 0 !important;
            border-bottom: 2px solid #0073aa !important;
            color: #23282d !important;
            font-size: 16px !important;
        }
        .infinity-slider-section h3 span {
            font-size: 12px !important;
            color: #666 !important;
            font-weight: normal !important;
            margin-left: 10px !important;
        }
        .infinity-image-list {
            display: grid !important;
            grid-template-columns: repeat(auto-fill, 280px) !important;
            gap: 20px !important;
            min-height: 200px !important;
            padding: 20px !important;
            background: #fff !important;
            border: 2px dashed #ccc !important;
            border-radius: 6px !important;
            margin-bottom: 15px !important;
        }
        .infinity-image-list.is-dragging {
            border-color: #0073aa !important;
            background: #f0f7fc !important;
        }
        .infinity-image-item {
            position: relative !important;
            display: block !important;
            width: 280px !important;
            height: 180px !important;
            margin: 0 !important;
            padding: 0 !important;
            background: #f0f0f0 !important;
            border: 1px solid #ddd !important;
            border-radius: 6px !important;
            overflow: hidden !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
            cursor: grab !important;
        }
        .infinity-image-item:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.2) !important;
        }
        .infinity-image-item:hover .infinity-image-remove {
            opacity: 1 !important;
        }
        .infinity-image-item.is-dragging {
            opacity: 0.5 !important;
        }
        .infinity-image-item img {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            display: block !important;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            border-radius: 0 !important;
        }
        .infinity-image-remove {
            position: absolute !important;
            top: 6px !important;
            right: 6px !important;
            display: block !important;
            width: 24px !important;
            height: 24px !important;
            margin: 0 !important;
            padding: 0 !important;
            background: rgba(200, 30, 30, 0.9) !important;
            color: #fff !important;
            border: none !important;
            border-radius: 50% !important;
            font-size: 18px !important;
            line-height: 22px !important;
            text-align: center !important;
            cursor: pointer !important;
            opacity: 0 !important;
            transition: opacity 0.2s !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.4) !important;
        }
        .infinity-image-remove:hover {
            background: rgba(150, 0, 0, 1) !important;
        }
        .infinity-add-image {
            display: inline-block !important;
            padding: 10px 20px !important;
            background: #0073aa !important;
            color: #fff !important;
            border: none !important;
            border-radius: 6px !important;
            cursor: pointer !important;
            font-size: 14px !important;
        }
        .infinity-add-image:hover {
            background: #005177 !important;
        }
        .infinity-empty-message {
            grid-column: 1 / -1 !important;
            text-align: center !important;
            color: #999 !important;
            padding: 40px !important;
            font-size: 14px !important;
        }
        .infinity-slider-info {
            margin-top: 10px !important;
            padding: 10px !important;
            background: #fff3cd !important;
            border-left: 4px solid #ffc107;
            font-size: 13px;
            color: #856404;
        }
    </style>

    <!-- スライダー01: CVR/CPA/ROAS改善実績 -->
    <div class="infinity-slider-section">
        <h3>
            スライダー01: 広告数値からの改善実績
            <span>（CVR・CPA・ROAS向上）</span>
        </h3>
        <div class="infinity-image-list" id="slider01-list" data-slider="slider01">
            <?php if (empty($slider01_images)) : ?>
                <div class="infinity-empty-message">画像がありません。「画像を追加」ボタンで追加してください。</div>
            <?php else : ?>
                <?php foreach ($slider01_images as $image_id) : ?>
                    <?php $image_url = wp_get_attachment_image_url($image_id, 'full'); ?>
                    <?php if ($image_url) : ?>
                        <div class="infinity-image-item" draggable="true" data-id="<?php echo esc_attr($image_id); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="">
                            <button type="button" class="infinity-image-remove">&times;</button>
                            <input type="hidden" name="works_slider01_images[]" value="<?php echo esc_attr($image_id); ?>">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <button type="button" class="infinity-add-image" data-slider="slider01">
            <span class="dashicons dashicons-plus-alt"></span>
            画像を追加
        </button>
        <div class="infinity-slider-info">
            ドラッグ＆ドロップで並び替えができます。推奨サイズ: 横幅 800px以上
        </div>
    </div>

    <!-- スライダー02: 新規制作・立ち上げ成果事例 -->
    <div class="infinity-slider-section">
        <h3>
            スライダー02: 新規制作・立ち上げにおける成果事例
        </h3>
        <div class="infinity-image-list" id="slider02-list" data-slider="slider02">
            <?php if (empty($slider02_images)) : ?>
                <div class="infinity-empty-message">画像がありません。「画像を追加」ボタンで追加してください。</div>
            <?php else : ?>
                <?php foreach ($slider02_images as $image_id) : ?>
                    <?php $image_url = wp_get_attachment_image_url($image_id, 'medium'); ?>
                    <?php if ($image_url) : ?>
                        <div class="infinity-image-item" draggable="true" data-id="<?php echo esc_attr($image_id); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="">
                            <button type="button" class="infinity-image-remove">&times;</button>
                            <input type="hidden" name="works_slider02_images[]" value="<?php echo esc_attr($image_id); ?>">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <button type="button" class="infinity-add-image" data-slider="slider02">
            <span class="dashicons dashicons-plus-alt"></span>
            画像を追加
        </button>
        <div class="infinity-slider-info">
            ドラッグ＆ドロップで並び替えができます。推奨サイズ: 横幅 800px以上
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // メディアアップローダー
        var mediaUploader;

        $('.infinity-add-image').on('click', function(e) {
            e.preventDefault();

            var slider = $(this).data('slider');
            var listContainer = $('#' + slider + '-list');

            mediaUploader = wp.media({
                title: '画像を選択',
                button: { text: '選択した画像を追加' },
                multiple: true
            });

            mediaUploader.on('select', function() {
                var attachments = mediaUploader.state().get('selection').toJSON();

                // 空メッセージを削除
                listContainer.find('.infinity-empty-message').remove();

                attachments.forEach(function(attachment) {
                    var imageUrl = attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;

                    var html = '<div class="infinity-image-item" draggable="true" data-id="' + attachment.id + '">' +
                        '<img src="' + imageUrl + '" alt="">' +
                        '<button type="button" class="infinity-image-remove">&times;</button>' +
                        '<input type="hidden" name="works_' + slider + '_images[]" value="' + attachment.id + '">' +
                    '</div>';

                    listContainer.append(html);
                });
            });

            mediaUploader.open();
        });

        // 削除ボタン
        $(document).on('click', '.infinity-image-remove', function(e) {
            e.preventDefault();
            e.stopPropagation();

            if (!confirm('この画像を削除しますか？')) {
                return;
            }

            var item = $(this).closest('.infinity-image-item');
            var listContainer = item.closest('.infinity-image-list');

            item.fadeOut(200, function() {
                $(this).remove();

                // 画像がなくなったら空メッセージを表示
                if (listContainer.find('.infinity-image-item').length === 0) {
                    listContainer.append('<div class="infinity-empty-message">画像がありません。「画像を追加」ボタンで追加してください。</div>');
                }
            });
        });

        // ドラッグ＆ドロップ
        var draggedItem = null;

        $(document).on('dragstart', '.infinity-image-item', function(e) {
            draggedItem = this;
            $(this).addClass('is-dragging');
            e.originalEvent.dataTransfer.effectAllowed = 'move';
        });

        $(document).on('dragend', '.infinity-image-item', function() {
            $(this).removeClass('is-dragging');
            $('.infinity-image-list').removeClass('is-dragging');
            draggedItem = null;
        });

        $(document).on('dragover', '.infinity-image-list', function(e) {
            e.preventDefault();
            $(this).addClass('is-dragging');
        });

        $(document).on('dragleave', '.infinity-image-list', function() {
            $(this).removeClass('is-dragging');
        });

        $(document).on('drop', '.infinity-image-list', function(e) {
            e.preventDefault();
            $(this).removeClass('is-dragging');

            if (!draggedItem) return;

            var listContainer = $(this);
            var items = listContainer.find('.infinity-image-item').not(draggedItem);
            var mouseY = e.originalEvent.clientY;
            var insertBefore = null;

            items.each(function() {
                var rect = this.getBoundingClientRect();
                var itemCenter = rect.top + rect.height / 2;
                if (mouseY < itemCenter && !insertBefore) {
                    insertBefore = this;
                }
            });

            if (insertBefore) {
                $(draggedItem).insertBefore(insertBefore);
            } else {
                listContainer.append(draggedItem);
            }
        });
    });
    </script>

    <?php
}

/**
 * メタボックスのデータを保存
 */
function infinity_save_works_slider_metabox($post_id) {
    // nonceチェック
    if (!isset($_POST['infinity_works_slider_nonce_field']) ||
        !wp_verify_nonce($_POST['infinity_works_slider_nonce_field'], 'infinity_works_slider_nonce')) {
        return;
    }

    // 自動保存時はスキップ
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // スライダー01の画像を保存
    if (isset($_POST['works_slider01_images'])) {
        $slider01_images = array_map('absint', $_POST['works_slider01_images']);
        update_post_meta($post_id, '_works_slider01_images', $slider01_images);
    } else {
        delete_post_meta($post_id, '_works_slider01_images');
    }

    // スライダー02の画像を保存
    if (isset($_POST['works_slider02_images'])) {
        $slider02_images = array_map('absint', $_POST['works_slider02_images']);
        update_post_meta($post_id, '_works_slider02_images', $slider02_images);
    } else {
        delete_post_meta($post_id, '_works_slider02_images');
    }
}
add_action('save_post', 'infinity_save_works_slider_metabox');

/**
 * 管理画面でメディアアップローダーのスクリプトを読み込む
 */
function infinity_enqueue_admin_scripts($hook) {
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        wp_enqueue_media();
        wp_enqueue_style('dashicons');
    }
}
add_action('admin_enqueue_scripts', 'infinity_enqueue_admin_scripts');

// =====================================================
// スライダー画像取得ヘルパー関数
// =====================================================

/**
 * スライダー01の画像を取得
 *
 * @param int|null $post_id 投稿ID（省略時はフロントページ）
 * @return array 画像データの配列
 */
function infinity_get_works_slider01($post_id = null) {
    if ($post_id === null) {
        $post_id = get_option('page_on_front');
    }

    $image_ids = get_post_meta($post_id, '_works_slider01_images', true);

    if (!is_array($image_ids) || empty($image_ids)) {
        return array();
    }

    $images = array();
    foreach ($image_ids as $image_id) {
        $url = wp_get_attachment_url($image_id);
        if ($url) {
            $images[] = array(
                'id' => $image_id,
                'url' => $url
            );
        }
    }

    return $images;
}

/**
 * スライダー02の画像を取得
 *
 * @param int|null $post_id 投稿ID（省略時はフロントページ）
 * @return array 画像データの配列
 */
function infinity_get_works_slider02($post_id = null) {
    if ($post_id === null) {
        $post_id = get_option('page_on_front');
    }

    $image_ids = get_post_meta($post_id, '_works_slider02_images', true);

    if (!is_array($image_ids) || empty($image_ids)) {
        return array();
    }

    $images = array();
    foreach ($image_ids as $image_id) {
        $url = wp_get_attachment_url($image_id);
        if ($url) {
            $images[] = array(
                'id' => $image_id,
                'url' => $url
            );
        }
    }

    return $images;
}
