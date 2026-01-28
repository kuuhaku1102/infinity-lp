<?php
/**
 * 契約前の事前ヒアリングフォーム
 * 
 * このファイルはショートコード [hearing_form] を登録し、
 * フォームの表示とメール送信機能を提供します。
 */

// JavaScriptとCSSの読み込み
function hearing_form_enqueue_scripts() {
    if (has_shortcode(get_post()->post_content, 'hearing_form')) {
        wp_enqueue_script(
            'hearing-form-slider',
            get_template_directory_uri() . '/js/hearing-form-slider.js',
            array(),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'hearing_form_enqueue_scripts');

// ショートコードの登録
add_shortcode('hearing_form', 'hearing_form_shortcode');

/**
 * ショートコード関数
 */
function hearing_form_shortcode() {
    ob_start();
    
    // フォームが送信された場合の処理
    if (isset($_POST['hearing_form_submit']) && check_admin_referer('hearing_form_action', 'hearing_form_nonce')) {
        $result = hearing_form_process_submission();
        if ($result['success']) {
            echo '<div class="hearing-form__message hearing-form__message--success">' . esc_html($result['message']) . '</div>';
        } else {
            echo '<div class="hearing-form__message hearing-form__message--error">' . esc_html($result['message']) . '</div>';
        }
    }
    
    // フォームのHTMLを読み込み
    include(get_template_directory() . '/template-parts/hearing-form-template.php');
    
    return ob_get_clean();
}

/**
 * フォーム送信処理
 */
function hearing_form_process_submission() {
    // 送信データの取得とサニタイズ
    $data = array(
        'company_name' => sanitize_text_field($_POST['company_name'] ?? ''),
        'focus_area' => sanitize_text_field($_POST['focus_area'] ?? ''),
        'text_ready' => sanitize_text_field($_POST['text_ready'] ?? ''),
        'materials_ready' => sanitize_text_field($_POST['materials_ready'] ?? ''),
        'desired_date' => sanitize_text_field($_POST['desired_date'] ?? ''),
        'budget' => sanitize_text_field($_POST['budget'] ?? ''),
        'spec_ready' => sanitize_text_field($_POST['spec_ready'] ?? ''),
        'lp_content' => sanitize_textarea_field($_POST['lp_content'] ?? ''),
        'feature_detail' => sanitize_textarea_field($_POST['feature_detail'] ?? ''),
        'target_cms' => sanitize_text_field($_POST['target_cms'] ?? ''),
        'form_implementation' => sanitize_text_field($_POST['form_implementation'] ?? ''),
    );
    
    // バリデーション
    $errors = hearing_form_validate($data);
    if (!empty($errors)) {
        return array(
            'success' => false,
            'message' => '入力内容に不備があります。必須項目をご確認ください。'
        );
    }
    
    // メール送信
    $mail_sent = hearing_form_send_email($data);
    
    if ($mail_sent) {
        return array(
            'success' => true,
            'message' => 'お問い合わせありがとうございます。内容を確認次第、担当者よりご連絡いたします。'
        );
    } else {
        return array(
            'success' => false,
            'message' => '送信中にエラーが発生しました。お手数ですが、もう一度お試しください。'
        );
    }
}

/**
 * バリデーション
 */
function hearing_form_validate($data) {
    $errors = array();
    
    // 必須項目のチェック
    if (empty($data['company_name'])) {
        $errors[] = '会社名もしくは個人名は必須です。';
    }
    
    if (empty($data['focus_area'])) {
        $errors[] = '重視する箇所は必須です。';
    }
    
    if (empty($data['text_ready'])) {
        $errors[] = 'テキストのご準備は必須です。';
    }
    
    if (empty($data['materials_ready'])) {
        $errors[] = '素材の有無は必須です。';
    }
    
    if (empty($data['desired_date'])) {
        $errors[] = '希望納期は必須です。';
    }
    
    if (empty($data['budget'])) {
        $errors[] = 'ご予算は必須です。';
    }
    
    if (empty($data['spec_ready'])) {
        $errors[] = '機能実装のご希望は必須です。';
    }
    
    if (empty($data['lp_content'])) {
        $errors[] = 'LPの内容は必須です。';
    }
    
    if (empty($data['target_cms'])) {
        $errors[] = '想定するCMSは必須です。';
    }
    
    if (empty($data['form_implementation'])) {
        $errors[] = 'フォーム実装は必須です。';
    }
    
    return $errors;
}

/**
 * メール送信
 */
function hearing_form_send_email($data) {
    // 管理者メールアドレス
    $admin_email = get_option('admin_email');
    
    // メール件名
    $subject = '【契約前の事前ヒアリング】新規お問い合わせ';
    
    // メール本文
    $message = hearing_form_build_email_body($data);
    
    // メールヘッダー
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $admin_email . '>'
    );
    
    // メール送信
    return wp_mail($admin_email, $subject, $message, $headers);
}

/**
 * メール本文の生成
 */
function hearing_form_build_email_body($data) {
    $body = "契約前の事前ヒアリングフォームから新規お問い合わせがありました。\n\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    $body .= "■ 基本情報\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
    
    $body .= "【会社名もしくは個人名】\n";
    $body .= $data['company_name'] . "\n\n";
    
    $body .= "【重視する箇所】\n";
    $body .= $data['focus_area'] . "\n\n";
    
    $body .= "【テキストのご準備】\n";
    $body .= $data['text_ready'] . "\n\n";
    
    $body .= "【素材の有無(写真・ロゴ等)】\n";
    $body .= $data['materials_ready'] . "\n\n";
    
    $body .= "【希望納期】\n";
    $body .= $data['desired_date'] . "\n\n";
    
    $body .= "【ご予算(日数)】\n";
    $body .= $data['budget'] . "\n\n";
    
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    $body .= "■ 詳細情報\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
    
    $body .= "【機能実装のご希望】\n";
    $body .= $data['spec_ready'] . "\n\n";
    
    $body .= "【LPの内容】\n";
    $body .= $data['lp_content'] . "\n\n";
    
    $body .= "【希望する機能の詳細】\n";
    $body .= (!empty($data['feature_detail']) ? $data['feature_detail'] : '(未記入)') . "\n\n";
    
    $body .= "【想定するCMS】\n";
    $body .= $data['target_cms'] . "\n\n";
    
    $body .= "【フォーム実装】\n";
    $body .= $data['form_implementation'] . "\n\n";
    
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    $body .= "送信日時: " . current_time('Y年m月d日 H:i:s') . "\n";
    $body .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    
    return $body;
}
