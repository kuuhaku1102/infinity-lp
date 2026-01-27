# 契約前の事前ヒアリングフォーム - 実装ガイド

## 📋 概要

このドキュメントは、「契約前の事前ヒアリング」フォームをWordPressテーマに実装するための手順を説明します。

フォームはショートコード `[hearing_form]` で表示でき、front-pageやその他の固定ページに簡単に追加できます。

---

## 🗂️ ファイル構成

```
infinity-lp/
├── inc/
│   ├── hearing-form.php                    # フォーム機能のメインファイル
│   └── functions-integration.txt           # functions.phpへの追加コード
├── template-parts/
│   └── hearing-form-template.php           # フォームHTMLテンプレート
├── sass/
│   ├── _hearing-form.scss                  # フォーム専用スタイル
│   └── style.scss                          # メインSCSSファイル(インポート追加済み)
└── HEARING_FORM_SETUP.md                   # このファイル
```

### ファイルの役割

| ファイル | 役割 | 編集頻度 |
|---------|------|---------|
| `inc/hearing-form.php` | ショートコード登録、メール送信、バリデーション処理 | 低 |
| `template-parts/hearing-form-template.php` | フォームのHTMLマークアップ | **高** |
| `sass/_hearing-form.scss` | フォームのデザイン・スタイル | **高** |

---

## 🚀 実装手順

### 1. functions.phpへの追加

テーマの `functions.php` に以下のコードを追加してください。

```php
/**
 * 契約前の事前ヒアリングフォームの読み込み
 */
require_once get_template_directory() . '/inc/hearing-form.php';
```

**追加位置**: `functions.php` の末尾、または他の `require_once` 文の近くに追加することを推奨します。

---

### 2. SCSSのコンパイル

フォームのスタイルを反映させるため、SCSSをコンパイルしてください。

```bash
# プロジェクトディレクトリで実行
sass sass/style.scss css/style.css
```

または、使用しているビルドツール(Gulp、Webpackなど)でコンパイルしてください。

---

### 3. ショートコードの使用

#### front-pageに追加する場合

`front-page.php` の任意の位置に以下のコードを追加します。

```php
<?php echo do_shortcode('[hearing_form]'); ?>
```

**推奨位置**: CTAセクションの前後、またはページの下部など、ユーザーが情報を確認した後にアクセスしやすい場所。

#### 固定ページに追加する場合

WordPress管理画面から固定ページを編集し、以下のショートコードを挿入します。

```
[hearing_form]
```

**ブロックエディタの場合**: 「ショートコード」ブロックを追加して、上記のコードを入力してください。

---

## ✏️ カスタマイズ方法

### フォームフィールドの編集

フォームの項目を追加・削除・変更する場合は、以下の2つのファイルを編集します。

#### 1. HTMLの編集

**ファイル**: `template-parts/hearing-form-template.php`

**例**: 新しいフィールドを追加する場合

```php
<!-- 電話番号フィールドの追加例 -->
<div class="hearing-form__field">
    <label for="phone" class="hearing-form__label">
        電話番号
        <span class="hearing-form__required">*</span>
    </label>
    <input 
        type="tel" 
        id="phone" 
        name="phone" 
        class="hearing-form__input" 
        placeholder="例)03-1234-5678"
        value="<?php echo $posted['phone']; ?>"
        required
    >
</div>
```

#### 2. PHPロジックの編集

**ファイル**: `inc/hearing-form.php`

新しいフィールドを追加した場合は、以下の箇所を更新してください。

**A. データ取得部分** (`hearing_form_process_submission` 関数内)

```php
$data = array(
    'company_name' => sanitize_text_field($_POST['company_name'] ?? ''),
    // ... 既存のフィールド ...
    'phone' => sanitize_text_field($_POST['phone'] ?? ''), // 追加
);
```

**B. バリデーション部分** (`hearing_form_validate` 関数内)

```php
if (empty($data['phone'])) {
    $errors[] = '電話番号は必須です。';
}
```

**C. メール本文** (`hearing_form_build_email_body` 関数内)

```php
$body .= "【電話番号】\n";
$body .= $data['phone'] . "\n\n";
```

---

### デザインのカスタマイズ

**ファイル**: `sass/_hearing-form.scss`

#### 主要な変更ポイント

| 変更内容 | 該当クラス | 例 |
|---------|-----------|---|
| メインカラーの変更 | `.hearing-form__title`, `.hearing-form__button` など | `#e74c3c` を別の色に変更 |
| フォーム幅の変更 | `.hearing-form__container` | `max-width: 800px;` を変更 |
| ボタンサイズの変更 | `.hearing-form__button` | `padding`, `min-width` を調整 |
| 入力欄の高さ | `.hearing-form__input` | `padding` を調整 |

**例**: メインカラーを青系に変更

```scss
// 赤色(#e74c3c)を青色(#3498db)に一括置換
.hearing-form__title {
    border-bottom: 2px solid #3498db; // 変更
}

.hearing-form__button {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); // 変更
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3); // 変更
}
```

変更後は必ずSCSSをコンパイルしてください。

---

## 📧 メール送信設定

### 送信先の変更

デフォルトでは、WordPressの管理者メールアドレス(`admin_email`)に送信されます。

送信先を変更する場合は、`inc/hearing-form.php` の `hearing_form_send_email` 関数を編集してください。

```php
function hearing_form_send_email($data) {
    // 固定のメールアドレスに変更する場合
    $admin_email = 'info@example.com'; // ここを変更
    
    // ... 以下省略 ...
}
```

### メール件名・本文のカスタマイズ

**件名の変更**: `hearing_form_send_email` 関数内の `$subject` 変数を編集

```php
$subject = '【お問い合わせ】新規ヒアリング依頼'; // 変更例
```

**本文のカスタマイズ**: `hearing_form_build_email_body` 関数を編集

---

## 🧪 動作確認

### チェックリスト

- [ ] フォームが正しく表示される
- [ ] 必須項目を空欄にすると送信できない
- [ ] すべての項目を入力して送信できる
- [ ] 送信後に成功メッセージが表示される
- [ ] 管理者メールアドレスにメールが届く
- [ ] メール本文に入力内容が正しく記載されている
- [ ] スマートフォンで表示が崩れない

### テスト用データ

```
会社名: テスト株式会社
重視する箇所: クオリティー
テキストのご準備: あり
素材の有無: あり
希望納期: 2026-03-01
ご予算: 50万円
機能実装のご希望: あり
LPの内容: テスト用LP
希望する機能の詳細: 会員登録、決済機能
想定するCMS: WordPress
フォーム実装: あり
```

---

## 🔧 トラブルシューティング

### フォームが表示されない

**原因1**: `functions.php` への追加が正しくない
- 解決策: `inc/hearing-form.php` が正しく読み込まれているか確認

**原因2**: ショートコードの記述ミス
- 解決策: `[hearing_form]` が正しく記述されているか確認(スペースや全角文字がないか)

### スタイルが反映されない

**原因1**: SCSSがコンパイルされていない
- 解決策: `sass/style.scss` をコンパイルして `css/style.css` を更新

**原因2**: キャッシュが残っている
- 解決策: ブラウザのキャッシュをクリア、またはスーパーリロード(Ctrl+Shift+R)

### メールが届かない

**原因1**: WordPressのメール送信機能が正しく動作していない
- 解決策: SMTP設定プラグイン(WP Mail SMTPなど)を導入

**原因2**: 迷惑メールフォルダに入っている
- 解決策: 迷惑メールフォルダを確認

**原因3**: サーバーのメール送信制限
- 解決策: サーバー管理者に確認、またはSMTPサービスを利用

---

## 📝 補足情報

### セキュリティ対策

- **Nonce検証**: フォーム送信時にWordPressのnonce機能で検証
- **データサニタイズ**: すべての入力値を適切にサニタイズ
- **エスケープ処理**: 出力時にエスケープ処理を実施

### レスポンシブ対応

フォームは以下のブレークポイントでレスポンシブ対応しています。

- モバイル: 〜767px
- タブレット・PC: 768px〜

### ブラウザ対応

- Chrome(最新版)
- Firefox(最新版)
- Safari(最新版)
- Edge(最新版)

---

## 🆘 サポート

ご不明な点がございましたら、以下をご確認ください。

1. このドキュメントの「トラブルシューティング」セクション
2. WordPressの公式ドキュメント
3. 各ファイルのコメント

---

**作成日**: 2026年1月27日  
**バージョン**: 1.0.0
