<?php
/**
 * 契約前の事前ヒアリングフォーム - HTMLテンプレート
 * 
 * このファイルはフォームのHTMLマークアップを提供します。
 * デザインやフィールドの編集はこのファイルで行ってください。
 */

// 送信後の値を保持（エラー時に再表示するため）
$posted = array(
    'company_name' => isset($_POST['company_name']) ? esc_attr($_POST['company_name']) : '',
    'focus_area' => isset($_POST['focus_area']) ? esc_attr($_POST['focus_area']) : '',
    'text_ready' => isset($_POST['text_ready']) ? esc_attr($_POST['text_ready']) : '',
    'materials_ready' => isset($_POST['materials_ready']) ? esc_attr($_POST['materials_ready']) : '',
    'desired_date' => isset($_POST['desired_date']) ? esc_attr($_POST['desired_date']) : '',
    'budget' => isset($_POST['budget']) ? esc_attr($_POST['budget']) : '',
    'spec_ready' => isset($_POST['spec_ready']) ? esc_attr($_POST['spec_ready']) : '',
    'lp_content' => isset($_POST['lp_content']) ? esc_textarea($_POST['lp_content']) : '',
    'feature_detail' => isset($_POST['feature_detail']) ? esc_textarea($_POST['feature_detail']) : '',
    'target_cms' => isset($_POST['target_cms']) ? esc_attr($_POST['target_cms']) : '',
    'form_implementation' => isset($_POST['form_implementation']) ? esc_attr($_POST['form_implementation']) : '',
);
?>

<div class="hearing-form">
    <div class="hearing-form__container">
        <h2 class="hearing-form__title">契約前の事前ヒアリング</h2>
        
        <form method="post" action="" class="hearing-form__form">
            <?php wp_nonce_field('hearing_form_action', 'hearing_form_nonce'); ?>
            
            <!-- 基本情報セクション -->
            <section class="hearing-form__section">
                <h3 class="hearing-form__section-title">基本情報</h3>
                
                <!-- 会社名もしくは個人名 -->
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
                        placeholder="例）株式会社〇〇 / 山田 太郎"
                        value="<?php echo $posted['company_name']; ?>"
                        required
                    >
                </div>
                
                <!-- 重視する箇所 -->
                <div class="hearing-form__field">
                    <label class="hearing-form__label">重視する箇所</label>
                    <p class="hearing-form__description">制作に伴ってご提案を行う際の重視する箇所をお選びください。</p>
                    <div class="hearing-form__radio-group">
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="focus_area" 
                                value="クオリティー"
                                <?php checked($posted['focus_area'], 'クオリティー'); ?>
                                required
                            >
                            <span>クオリティー</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="focus_area" 
                                value="コスト"
                                <?php checked($posted['focus_area'], 'コスト'); ?>
                            >
                            <span>コスト</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="focus_area" 
                                value="速さ"
                                <?php checked($posted['focus_area'], '速さ'); ?>
                            >
                            <span>速さ</span>
                        </label>
                    </div>
                </div>
                
                <!-- テキストのご準備 -->
                <div class="hearing-form__field">
                    <label class="hearing-form__label">
                        テキストのご準備
                        <span class="hearing-form__required">*</span>
                    </label>
                    <div class="hearing-form__radio-group">
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="text_ready" 
                                value="あり"
                                <?php checked($posted['text_ready'], 'あり'); ?>
                                required
                            >
                            <span>あり</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="text_ready" 
                                value="なし"
                                <?php checked($posted['text_ready'], 'なし'); ?>
                            >
                            <span>なし</span>
                        </label>
                    </div>
                </div>
                
                <!-- 素材の有無 -->
                <div class="hearing-form__field">
                    <label class="hearing-form__label">
                        素材の有無(写真・ロゴ等)
                        <span class="hearing-form__required">*</span>
                    </label>
                    <div class="hearing-form__radio-group hearing-form__radio-group--triple">
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="materials_ready" 
                                value="あり"
                                <?php checked($posted['materials_ready'], 'あり'); ?>
                                required
                            >
                            <span>あり</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="materials_ready" 
                                value="なし(用意が必要)"
                                <?php checked($posted['materials_ready'], 'なし(用意が必要)'); ?>
                            >
                            <span>なし(用意が必要)</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="materials_ready" 
                                value="一部あり"
                                <?php checked($posted['materials_ready'], '一部あり'); ?>
                            >
                            <span>一部あり</span>
                        </label>
                    </div>
                </div>
                
                <!-- 希望納期 -->
                <div class="hearing-form__field">
                    <label for="desired_date" class="hearing-form__label">
                        希望納期
                        <span class="hearing-form__required">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="desired_date" 
                        name="desired_date" 
                        class="hearing-form__input hearing-form__input--date"
                        value="<?php echo $posted['desired_date']; ?>"
                        required
                    >
                </div>
                
                <!-- ご予算 -->
                <div class="hearing-form__field">
                    <label for="budget" class="hearing-form__label">
                        ご予算(日数)
                        <span class="hearing-form__required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="budget" 
                        name="budget" 
                        class="hearing-form__input" 
                        placeholder="例）30〜50万円 / 月額20万円 など"
                        value="<?php echo $posted['budget']; ?>"
                        required
                    >
                    <p class="hearing-form__description">金額や期間(例:月額/総額)を自由入力してください</p>
                </div>
            </section>
            
            <!-- 詳細情報セクション -->
            <section class="hearing-form__section">
                <h3 class="hearing-form__section-title">詳細情報</h3>
                
                <!-- 機能実装のご希望 -->
                <div class="hearing-form__field">
                    <label class="hearing-form__label">
                        機能実装のご希望
                        <span class="hearing-form__required">*</span>
                    </label>
                    <div class="hearing-form__radio-group hearing-form__radio-group--triple">
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="spec_ready" 
                                value="あり"
                                <?php checked($posted['spec_ready'], 'あり'); ?>
                                required
                            >
                            <span>あり</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="spec_ready" 
                                value="なし"
                                <?php checked($posted['spec_ready'], 'なし'); ?>
                            >
                            <span>なし</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="spec_ready" 
                                value="未定"
                                <?php checked($posted['spec_ready'], '未定'); ?>
                            >
                            <span>未定</span>
                        </label>
                    </div>
                </div>
                
                <!-- LPの内容 -->
                <div class="hearing-form__field">
                    <label for="lp_content" class="hearing-form__label">
                        LPの内容
                        <span class="hearing-form__required">*</span>
                    </label>
                    <textarea 
                        id="lp_content" 
                        name="lp_content" 
                        class="hearing-form__textarea" 
                        placeholder="美容クリニックの糸リフトLP"
                        rows="5"
                        required
                    ><?php echo $posted['lp_content']; ?></textarea>
                    <p class="hearing-form__description">なんのLPをお求めですか?</p>
                </div>
                
                <!-- 希望する機能の詳細 -->
                <div class="hearing-form__field">
                    <label for="feature_detail" class="hearing-form__label">希望する機能の詳細</label>
                    <textarea 
                        id="feature_detail" 
                        name="feature_detail" 
                        class="hearing-form__textarea" 
                        placeholder="例:会員登録、予約、決済、会員別表示など"
                        rows="4"
                    ><?php echo $posted['feature_detail']; ?></textarea>
                </div>
                
                <!-- 想定するCMS -->
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
                        placeholder="例:WordPress、Shopify、MakeShop など / 不明の場合は「不明」と入力"
                        value="<?php echo $posted['target_cms']; ?>"
                        required
                    >
                </div>
                
                <!-- フォーム実装 -->
                <div class="hearing-form__field">
                    <label class="hearing-form__label">
                        フォーム実装
                        <span class="hearing-form__required">*</span>
                    </label>
                    <div class="hearing-form__radio-group hearing-form__radio-group--triple">
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="form_implementation" 
                                value="あり"
                                <?php checked($posted['form_implementation'], 'あり'); ?>
                                required
                            >
                            <span>あり</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="form_implementation" 
                                value="なし"
                                <?php checked($posted['form_implementation'], 'なし'); ?>
                            >
                            <span>なし</span>
                        </label>
                        <label class="hearing-form__radio">
                            <input 
                                type="radio" 
                                name="form_implementation" 
                                value="未定"
                                <?php checked($posted['form_implementation'], '未定'); ?>
                            >
                            <span>未定</span>
                        </label>
                    </div>
                </div>
            </section>
            
            <!-- 送信ボタン -->
            <div class="hearing-form__submit">
                <button type="submit" name="hearing_form_submit" class="hearing-form__button">
                    送信する
                </button>
            </div>
        </form>
    </div>
</div>
