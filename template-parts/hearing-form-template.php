<?php
/**
 * 契約前の事前ヒアリングフォーム - スライダー式テンプレート
 */

// 送信済みデータの取得(エラー時の再表示用)
$posted = array(
    'company_name' => $_POST['company_name'] ?? '',
    'focus_area' => $_POST['focus_area'] ?? '',
    'text_ready' => $_POST['text_ready'] ?? '',
    'materials_ready' => $_POST['materials_ready'] ?? '',
    'desired_date' => $_POST['desired_date'] ?? '',
    'lp_content' => $_POST['lp_content'] ?? '',
    'spec_ready' => $_POST['spec_ready'] ?? '',
    'feature_detail' => $_POST['feature_detail'] ?? '',
    'target_cms' => $_POST['target_cms'] ?? '',
    'form_implementation' => $_POST['form_implementation'] ?? '',
);
?>

<div class="hearing-form">
    <div class="hearing-form__container">
        
        <h2 class="hearing-form__title">契約前の事前ヒアリング</h2>
        <p class="hearing-form__description">
            ご希望の内容に合わせて、最適なプランをご提案いたします。<br>
            各ステップで必要な情報をご入力ください。
        </p>

        <!-- 進捗バー -->
        <div class="hearing-form__progress">
            <div class="hearing-form__progress-bar" id="progressBar"></div>
            <div class="hearing-form__progress-text">
                <span id="currentStep">1</span> / <span id="totalSteps">5</span>
            </div>
        </div>

        <!-- フォーム本体 -->
        <form method="post" action="" class="hearing-form__form" id="hearingForm">
            <?php wp_nonce_field('hearing_form_action', 'hearing_form_nonce'); ?>

            <!-- ステップ1: 基本情報 -->
            <div class="hearing-form__step" data-step="1">
                <h3 class="hearing-form__step-title">基本情報</h3>

                <div class="hearing-form__field">
                    <label for="company_name" class="hearing-form__label">
                        会社名もしくは個人名
                        <span class="hearing-form__required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="company_name" 
                        name="company_name" 
                        class="hearing-form__input" 
                        placeholder="例) 株式会社○○ / 山田 太郎"
                        value="<?php echo esc_attr($posted['company_name']); ?>"
                        required
                    >
                </div>

                <div class="hearing-form__field">
                    <label class="hearing-form__label">重視する箇所</label>
                    <p class="hearing-form__help">制作に伴ってご提案を行う際の重視する箇所をお選びください。</p>
                    <div class="hearing-form__radio-group">
                        <label class="hearing-form__radio">
                            <input type="radio" name="focus_area" value="クオリティー" <?php checked($posted['focus_area'], 'クオリティー'); ?>>
                            <span class="hearing-form__radio-label">クオリティー</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="focus_area" value="コスト" <?php checked($posted['focus_area'], 'コスト'); ?>>
                            <span class="hearing-form__radio-label">コスト</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="focus_area" value="速さ" <?php checked($posted['focus_area'], '速さ'); ?>>
                            <span class="hearing-form__radio-label">速さ</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- ステップ2: 制作内容 -->
            <div class="hearing-form__step" data-step="2" style="display: none;">
                <h3 class="hearing-form__step-title">制作内容</h3>

                <div class="hearing-form__field">
                    <label class="hearing-form__label">
                        テキストのご準備
                        <span class="hearing-form__required">*</span>
                    </label>
                    <div class="hearing-form__radio-group">
                        <label class="hearing-form__radio">
                            <input type="radio" name="text_ready" value="あり" data-price="0" <?php checked($posted['text_ready'], 'あり'); ?> required>
                            <span class="hearing-form__radio-label">あり</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="text_ready" value="なし" data-price="50000" <?php checked($posted['text_ready'], 'なし'); ?>>
                            <span class="hearing-form__radio-label">なし <span class="hearing-form__price-tag">+5万円</span></span>
                        </label>
                    </div>
                </div>

                <div class="hearing-form__field">
                    <label class="hearing-form__label">
                        素材の有無(写真・ロゴ等)
                        <span class="hearing-form__required">*</span>
                    </label>
                    <div class="hearing-form__radio-group">
                        <label class="hearing-form__radio">
                            <input type="radio" name="materials_ready" value="あり" <?php checked($posted['materials_ready'], 'あり'); ?> required>
                            <span class="hearing-form__radio-label">あり</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="materials_ready" value="なし(用意が必要)" <?php checked($posted['materials_ready'], 'なし(用意が必要)'); ?>>
                            <span class="hearing-form__radio-label">なし(用意が必要)</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="materials_ready" value="一部あり" <?php checked($posted['materials_ready'], '一部あり'); ?>>
                            <span class="hearing-form__radio-label">一部あり</span>
                        </label>
                    </div>
                </div>

                <div class="hearing-form__field">
                    <label for="lp_content" class="hearing-form__label">
                        LPの内容
                        <span class="hearing-form__required">*</span>
                    </label>
                    <p class="hearing-form__help">なんのLPをお求めですか?</p>
                    <textarea 
                        id="lp_content" 
                        name="lp_content" 
                        class="hearing-form__textarea" 
                        rows="5"
                        placeholder="例) 美容クリニックの糸リフトLP"
                        required
                    ><?php echo esc_textarea($posted['lp_content']); ?></textarea>
                </div>
            </div>

            <!-- ステップ3: 機能要件 -->
            <div class="hearing-form__step" data-step="3" style="display: none;">
                <h3 class="hearing-form__step-title">機能要件</h3>

                <div class="hearing-form__field">
                    <label class="hearing-form__label">
                        機能実装のご希望
                        <span class="hearing-form__required">*</span>
                    </label>
                    <div class="hearing-form__radio-group">
                        <label class="hearing-form__radio">
                            <input type="radio" name="spec_ready" value="あり" data-price="50000" <?php checked($posted['spec_ready'], 'あり'); ?> required>
                            <span class="hearing-form__radio-label">あり <span class="hearing-form__price-tag">+5万円</span></span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="spec_ready" value="なし" data-price="0" <?php checked($posted['spec_ready'], 'なし'); ?>>
                            <span class="hearing-form__radio-label">なし</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="spec_ready" value="未定" data-price="0" <?php checked($posted['spec_ready'], '未定'); ?>>
                            <span class="hearing-form__radio-label">未定</span>
                        </label>
                    </div>
                </div>

                <div class="hearing-form__field">
                    <label for="feature_detail" class="hearing-form__label">希望する機能の詳細</label>
                    <p class="hearing-form__help">例: 会員登録、予約、決済、会員別表示など</p>
                    <textarea 
                        id="feature_detail" 
                        name="feature_detail" 
                        class="hearing-form__textarea" 
                        rows="4"
                        placeholder="例) 会員登録、予約、決済、会員別表示など"
                    ><?php echo esc_textarea($posted['feature_detail']); ?></textarea>
                </div>

                <div class="hearing-form__field">
                    <label for="target_cms" class="hearing-form__label">
                        想定するCMS
                        <span class="hearing-form__required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="target_cms" 
                        name="target_cms" 
                        class="hearing-form__input" 
                        placeholder="例) WordPress、Shopify、MakeShop など / 不明の場合は「不明」と入力"
                        value="<?php echo esc_attr($posted['target_cms']); ?>"
                        data-price-trigger="cms"
                        required
                    >
                    <p class="hearing-form__help">CMS導入の場合は+5万円が加算されます(「不明」を除く)</p>
                </div>

                <div class="hearing-form__field">
                    <label class="hearing-form__label">
                        フォーム実装
                        <span class="hearing-form__required">*</span>
                    </label>
                    <div class="hearing-form__radio-group">
                        <label class="hearing-form__radio">
                            <input type="radio" name="form_implementation" value="あり" data-price="20000" <?php checked($posted['form_implementation'], 'あり'); ?> required>
                            <span class="hearing-form__radio-label">あり <span class="hearing-form__price-tag">+2万円</span></span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="form_implementation" value="なし" data-price="0" <?php checked($posted['form_implementation'], 'なし'); ?>>
                            <span class="hearing-form__radio-label">なし</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input type="radio" name="form_implementation" value="未定" data-price="0" <?php checked($posted['form_implementation'], '未定'); ?>>
                            <span class="hearing-form__radio-label">未定</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- ステップ4: スケジュール・予算 + 見積もり -->
            <div class="hearing-form__step" data-step="4" style="display: none;">
                <h3 class="hearing-form__step-title">スケジュール・予算</h3>

                <div class="hearing-form__field">
                    <label for="desired_date" class="hearing-form__label">
                        希望納期
                        <span class="hearing-form__required">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="desired_date" 
                        name="desired_date" 
                        class="hearing-form__input" 
                        value="<?php echo esc_attr($posted['desired_date']); ?>"
                        data-price-trigger="date"
                        required
                    >
                    <p class="hearing-form__help">1ヶ月以内の納期の場合、特急料金+7万円が加算されます</p>
                </div>

                <!-- 見積もり表示エリア -->
                <div class="hearing-form__estimate">
                    <h4 class="hearing-form__estimate-title">お見積もり</h4>
                    <div class="hearing-form__estimate-body">
                        <div class="hearing-form__estimate-row">
                            <span class="hearing-form__estimate-label">基本料金</span>
                            <span class="hearing-form__estimate-value">¥100,000</span>
                        </div>
                        <div id="estimateOptions"></div>
                        <div class="hearing-form__estimate-total">
                            <span class="hearing-form__estimate-total-label">合計金額</span>
                            <span class="hearing-form__estimate-total-value" id="totalPrice">¥100,000</span>
                        </div>
                    </div>
                    <p class="hearing-form__estimate-note">
                        ※こちらは概算見積もりです。詳細なお見積もりは、ヒアリング後に改めてご提示いたします。
                    </p>
                </div>
            </div>

            <!-- ステップ5: 確認・送信 -->
            <div class="hearing-form__step" data-step="5" style="display: none;">
                <h3 class="hearing-form__step-title">入力内容の確認</h3>

                <div class="hearing-form__confirm" id="confirmContent">
                    <!-- JavaScriptで動的に生成 -->
                </div>

                <div class="hearing-form__estimate hearing-form__estimate--final">
                    <h4 class="hearing-form__estimate-title">最終見積もり</h4>
                    <div class="hearing-form__estimate-total hearing-form__estimate-total--large">
                        <span class="hearing-form__estimate-total-label">合計金額</span>
                        <span class="hearing-form__estimate-total-value" id="finalTotalPrice">¥100,000</span>
                    </div>
                </div>

                <p class="hearing-form__confirm-note">
                    上記の内容でよろしければ、送信ボタンを押してください。
                </p>
            </div>

            <!-- ナビゲーションボタン -->
            <div class="hearing-form__navigation">
                <button 
                    type="button" 
                    class="hearing-form__button hearing-form__button--prev" 
                    id="prevBtn"
                    style="display: none;"
                >
                    ← 戻る
                </button>
                <button 
                    type="button" 
                    class="hearing-form__button hearing-form__button--next" 
                    id="nextBtn"
                >
                    次へ →
                </button>
                <button 
                    type="submit" 
                    class="hearing-form__button hearing-form__button--submit" 
                    id="submitBtn"
                    name="hearing_form_submit"
                    style="display: none;"
                >
                    送信する
                </button>
            </div>
        </form>

    </div>
</div>
