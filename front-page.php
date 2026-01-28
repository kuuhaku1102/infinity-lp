<?php
/*
Template Name: フロントページ
*/
get_header();
?>

<section class="mv">
  <div class="mv__top">
    <div class="mv__inner inner">
      <h1 class="mv__logo"><img src="<?= get_theme_file_uri() ?>/img/logo.webp" alt="InfinityDesignのロゴ"></h1>
      <div class="mv__content">
        <h2 class="mv__title js-anm">
          AI時代のLPデザイン。<br>
          <span class="mv__title-marker js-anm">ハイオクリティー</span>な<br>
          LPを作ります
        </h2>
        <p class="mv__text">
          デザインとコーディングの常識を塗り替える<br>高度な専門家チームが、CVRを最大化するための<br>差別化された制作を実現します。
        </p>
        <div class="mv__button commonBtn">
          <span class="commonBtn__bubble">CVRを極限まで高める</span>
          <a href="" class="mv__button-link commonBtn__link">まずはLPの課題を相談する</a>
        </div>
      </div>

      <div class="mv__loop">
        <div class="mv__loop-plane">
          <div class="mv__loop-track">
            <img src="<?= get_theme_file_uri() ?>/img/mv_loop.webp" alt="">
            <img src="<?= get_theme_file_uri() ?>/img/mv_loop.webp" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="inner">
    <div class="mv__slider js-topSlider">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide01.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide02.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide03.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide04.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide05.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide06.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide07.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide08.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide09.webp" alt=""></div>
        <div class="swiper-slide"><img src="<?= get_theme_file_uri() ?>/img/top_slide10.webp" alt=""></div>
      </div>

      <div class="swiper-pagination top__slider-pagination"></div>
    </div>
  </div>
</section>

<!-- サービス
------------------------------------------------------------>
<section class="service">
  <div class="inner">
    <div class="service__head commonTitle">
      <span class="commonTitle__label">Design & Coding</span>
      <h2 class="commonTitle__title">
        品質を支える<span class="is-red">二本柱</span>
      </h2>
      <div class="service__title">
        <span>Design</span>
        <span>Coding</span>
      </div>
      <p class="commonTitle__lead">
        <span>ノーコードの限界を超え、</span>
        <span>CVRに直結するデザイン品質と</span>
        <span>技術的な安定性を提供します。</span>
      </p>
    </div>
    <div class="service__body">
      <div class="service__content js-anm is-design">
        <div class="service__content-inner">
          <h3 class="title">デザイン</h3>
          <p class="lead">成果に直結するUI/UX設計</p>
  
          <ul class="service__list">
            <li class="service__item">
              <img src="<?= get_theme_file_uri() ?>/img/service_design01.webp" alt="">
              <div class="service__item-text">
                <h4>戦略的なUI/UX</h4>
                <p>視線設計により離脱を防ぎ<br>CVRを最大化</p>
              </div>
            </li>
            <li class="service__item">
              <img src="<?= get_theme_file_uri() ?>/img/service_design02.webp" alt="">
              <div class="service__item-text">
                <h4>完全オリジナル</h4>
                <p>テンプレートに頼らない<br>差別化デザイン</p>
              </div>
            </li>
            <li class="service__item">
              <img src="<?= get_theme_file_uri() ?>/img/service_design03.webp" alt="">
              <div class="service__item-text">
                <h4>専門家チーム</h4>
                <p>業界特化デザイナーが<br>品質を担保</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="service__content js-anm is-coding">
        <div class="service__content-inner">
          <h3 class="title">コーディング</h3>
          <p class="lead">成果を支える技術実装</p>
  
          <ul class="service__list">
            <li class="service__item">
              <img src="<?= get_theme_file_uri() ?>/img/service_coding01.webp" alt="">
              <div class="service__item-text">
                <h4>高速表示</h4>
                <p>初期描画を高速化し<br>離脱を防止</p>
              </div>
            </li>
            <li class="service__item">
              <img src="<?= get_theme_file_uri() ?>/img/service_coding02.webp" alt="">
              <div class="service__item-text">
                <h4>高度な機能実装</h4>
                <p>ノーコードでは<br>不可能な実装</p>
              </div>
            </li>
            <li class="service__item">
              <img src="<?= get_theme_file_uri() ?>/img/service_coding03.webp" alt="">
              <div class="service__item-text">
                <h4>アニメーションLP</h4>
                <p>体験価値を高める演出</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="service__technology">
      <p class="service__technology-head" id="js-serviceButton">技術仕様・拡張機能を見る</p>
      <div class="service__technology-body">
        <ul>
          <li>API連携（REST / Webhook）</li>
          <li>A/Bテスト対応</li>
          <li>運用・改善しやすい構造</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 特徴
------------------------------------------------------------>
<section class="features">
  <div class="commonTitle">
    <span class="commonTitle__label">Design & Coding</span>
    <h2 class="commonTitle__title">
      <span>ノーコードでは実現できない</span><span class="is-red">機能性の高いLP</span>
    </h2>
    <p class="commonTitle__lead"><span>テンプレートに縛られない実装が</span><span>成果と差別化を生みます</span></p>
  </div>

  <ul class="features__list">
    <li class="features__item js-anm">
      <div class="features__item-title">
        <span class="num">1</span>
        <h3>差別化を生む<br>高度な技術</h3>
      </div>
      <p>ノーコードでは難しいデータ連携や動的体験を提供します。</p>
      <img src="<?= get_theme_file_uri() ?>/img/features01.webp" alt="">
      <h4>API連携LP</h4>
      <p class="detail">外部サービスとスムーズに接続し、CRM・MAツールなどとも連携可能。マーケティング施策を強化します。</p>
      <h4>アンケート型LP</h4>
      <p class="detail">条件分岐やスコアリングなどのロジックを実装。高品質なリード獲得を実現。</p>
    </li>
    <li class="features__item js-anm">
      <div class="features__item-title">
        <span class="num">2</span>
        <h3>EC・予約の<br>即時コンバージョン</h3>
      </div>
      <p>LP内で購入や予約が完結。機会損失を防ぎます。</p>
      <img src="<?= get_theme_file_uri() ?>/img/features02.webp" alt="">
      <h4>ECサイト連携LP</h4>
      <p class="detail">カート・決済・在庫管理・定期購入など柔軟に対応。広告→決済までを短縮。</p>
      <h4>予約機能付きLP</h4>
      <p class="detail">Googleカレンダー連携による空き枠表示、予約受付～リマインド通知まで自動化。</p>
    </li>
    <li class="features__item js-anm">
      <div class="features__item-title">
        <span class="num">3</span>
        <h3>拡張性・柔軟性</h3>
      </div>
      <p>課題や目的に合わせて7つの機能モジュールを自由に組み合わせて提案・実装可能。</p>
      <img src="<?= get_theme_file_uri() ?>/img/features03.webp" alt="">
      <h4>アニメーションLP</h4>
      <p class="detail">GSAPやLottieアニメーション、パララックス、スクロールトリガーなどによるブランド体験の強化。</p>
      <h4>カウントダウン付きLP</h4>
      <p class="detail">迷っているユーザーの背中を押しCVR（成約率）が向上。</p>
    </li>
  </ul>

  <p class="features__message">
    このような高度なLP構築は、<br class="display-600">ノーコードでは不可能。<br>Infinity Designだからこその強みです。
  </p>

  <div class="features__btn commonBtn">
    <span class="commonBtn__bubble">ノーコードでは実現不可の高機能LP</span>
    <a href="" class="commonBtn__link">自社に合う実装を相談する</a>
  </div>
</section>

<!-- 実績
------------------------------------------------------------>
<section class="works">
  <div class="commonTitle">
    <span class="commonTitle__label">Works</span>
    <h2 class="commonTitle__title">制作実績<span class="is-red">400</span>件超え</h2>
    <p class="commonTitle__lead">成果にこだわるLP改善事例</p>
  </div>

  <div class="works__content">
    <h3 class="commonContentTitle works__content-title">広告数値からの改善実績<br class="display-600">（CVR・CPA・ROAS向上）</h3>

    <div class="works__slider js-worksSlider01">
      <?php $slides = infinity_get_works_slider01(); ?>
      <?php if (!empty($slides)) : ?>
      <div class="swiper-wrapper">
        <?php foreach ($slides as $slide) : ?>
        <div class="swiper-slide">
          <img src="<?= esc_url($slide['url']); ?>" alt="">
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>

  <div class="works__content">
    <h3 class="commonContentTitle works__content-title">新規制作・立ち上げにおける<br class="display-600">成果事例</h3>

    <div class="works__slider js-worksSlider02">
      <?php $slides = infinity_get_works_slider02(); ?>
      <?php if (!empty($slides)) : ?>
      <div class="swiper-wrapper">
        <?php foreach ($slides as $slide) : ?>
        <div class="swiper-slide">
          <img src="<?= esc_url($slide['url']); ?>" alt="">
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>

<!-- お客様の声
------------------------------------------------------------>
<section class="voice">
  <div class="inner">
    <div class="commonTitle">
      <span class="commonTitle__label">User Voice</span>
      <h2 class="commonTitle__title">お客様の声</h2>
    </div>

    <ul class="voice__list">
      <li class="voice__item">
        <div class="voice__item-head">
          <img src="<?= get_theme_file_uri() ?>/img/voice01.webp" alt="">
          <div class="voice__item-head-text">
            <span>美容系EC企業</span>
            <span>広告担当</span>
          </div>
        </div>
        <div class="voice__item-result">
          <span class="before">ROAS 130%</span>
          <span class="after is-red" style="padding-left: 2em;"><span class="is-large">280</span>%</span>
        </div>
        <p class="voice__item-comment">LPを変えただけで、ここまでROASが伸びるとは正直驚きました。</p>
      </li>
      <li class="voice__item">
        <div class="voice__item-head">
          <img src="<?= get_theme_file_uri() ?>/img/voice02.webp" alt="">
          <div class="voice__item-head-text">
            <span>BtoB SaaS企業</span>
            <span class="is-small">マーケティング責任者</span>
          </div>
        </div>
        <div class="voice__item-result">
          <span class="before">CPA 6,800円</span>
          <span class="after is-red" style="padding-left: 2em;"><span class="is-large">3,200</span>円</span>
        </div>
        <p class="voice__item-comment">CPAが高止まりしていたのですが、LP改善後は数値が安定し、商談の質も明らかに変わりました。</p>
      </li>
      <li class="voice__item">
        <div class="voice__item-head">
          <img src="<?= get_theme_file_uri() ?>/img/voice03.webp" alt="">
          <div class="voice__item-head-text">
            <span>新規開業 整体院</span>
            <span>院長</span>
          </div>
        </div>
        <div class="voice__item-result">
          <span class="before">初月予約</span>
          <span><span class="is-large is-red">16件</span><span class="is-black">(広告経由)</span></span>
        </div>
        <p class="voice__item-comment">実績ゼロの状態からでも<br class="hidden-600">しっかり予約を獲得できました。</p>
      </li>
    </ul>

    <div class="commonBtn voice__button">
      <span class="commonBtn__bubble">実績の理由、あなたのLPでも確認しませんか？</span>
      <a href="" class="commonBtn__link">まずはお気軽にご相談ください</a>
    </div>
  </div>
</section>

<!-- カスタマイズ
------------------------------------------------------------>
<section class="customize">
  <div class="commonTitle">
    <span class="commonTitle__label">Customize</span>
    <h2 class="commonTitle__title">高度なカスタマイズと制作体制</h2>
    <p class="commonTitle__lead">
      <span>ビジネス課題に合わせて、</span>
      <span>最適な機能と体制で成果を最大化します</span>
    </p>
  </div>

  <div class="customize__content">
    <h3 class="commonContentTitle custmize__content-title">機能は選べる・組み合わせられる</h3>
    <span class="commonContentLead customize__content-lead js-anm is-pc">
      <span>
        目的に合わせて7種の機能を自由に組み合わせて実装可能
      </span>
    </span>
    <div class="commonContentLead customize__content-lead is-sp js-anm">
      <span>目的に合わせて7種の機能を</span>
      <span>自由に組み合わせて実装可能</span>
    </div>

    <ul class="customize__content-list">
      <li class="customize__card">
        <div class="customize__card-inner">
          <div class="customize__card-front">
            <img src="<?= get_theme_file_uri() ?>/img/customize01.webp" alt="">
            <h4>アンケート</h4>
          </div>
          <div class="customize__card-back">
            <p>ユーザーとの対話形式で 興味関心を引き出し、 最適な提案へ誘導</p>
          </div>
        </div>
      </li>
      <li class="customize__card">
        <div class="customize__card-inner">
          <div class="customize__card-front">
            <img src="<?= get_theme_file_uri() ?>/img/customize02.webp" alt="">
            <h4>予約機能</h4>
          </div>
          <div class="customize__card-back">
            <p>Googleカレンダー連携で予約・コンバージョンを即完結</p>
          </div>
        </div>
      </li>
      <li class="customize__card">
        <div class="customize__card-inner">
          <div class="customize__card-front">
            <img src="<?= get_theme_file_uri() ?>/img/customize03.webp" alt="">
            <h4>EC連携</h4>
          </div>
          <div class="customize__card-back">
            <p>LP上で商品購入まで完結できるスムーズな導線設計で購入率を向上</p>
          </div>
        </div>
      </li>
      <li class="customize__card">
        <div class="customize__card-inner">
          <div class="customize__card-front">
            <img src="<?= get_theme_file_uri() ?>/img/customize04.webp" alt="">
            <h4>CMS実装（WP）</h4>
          </div>
          <div class="customize__card-back">
            <p>専門知識なしでもコンテンツを編集できるWordPress実装</p>
          </div>
        </div>
      </li>
      <li class="customize__card">
        <div class="customize__card-inner">
          <div class="customize__card-front">
            <img src="<?= get_theme_file_uri() ?>/img/customize05.webp" alt="">
            <h4>カウントダウン</h4>
          </div>
          <div class="customize__card-back">
            <p>緊急性と限定感を演出し、購買決定を強力に後押し</p>
          </div>
        </div>
      </li>
      <li class="customize__card">
        <div class="customize__card-inner">
          <div class="customize__card-front">
            <img src="<?= get_theme_file_uri() ?>/img/customize06.webp" alt="">
            <h4>アニメーション</h4>
          </div>
          <div class="customize__card-back">
            <p>【動きのある表現でブランド体験を最大化し、記憶に残るLPへ</p>
          </div>
        </div>
      </li>
      <li class="customize__card">
        <div class="customize__card-inner">
          <div class="customize__card-front">
            <img src="<?= get_theme_file_uri() ?>/img/customize07.webp" alt="">
            <h4>KW連動バナー</h4>
          </div>
          <div class="customize__card-back">
            <p>検索キーワードに応じて最適なバナーを自動表示</p>
          </div>
        </div>
      </li>
        <li>
          <img src="<?= get_theme_file_uri() ?>/img/customize_img.webp" alt="">
        </li>
    </ul>

    <p class="customize__exampleLead">例えば</p>

    <div class="customize__example">
      <div class="customize__example-image">
        <div class="card">
          <img src="<?= get_theme_file_uri() ?>/img/customize03.webp" alt="">
          <h4>EC連携</h4>
        </div>
        <img src="<?= get_theme_file_uri() ?>/img/icon_plus.svg" alt="+" class="plus">
        <div class="card">
          <img src="<?= get_theme_file_uri() ?>/img/customize05.webp" alt="">
          <h4>カウントダウン</h4>
        </div>
        <img src="<?= get_theme_file_uri() ?>/img/icon_plus.svg" alt="+" class="plus">
        <div class="card">
          <img src="<?= get_theme_file_uri() ?>/img/customize06.webp" alt="">
          <h4>アニメーション</h4>
        </div>
      </div>

      <img src="<?= get_theme_file_uri() ?>/img/customize_example-arrow.webp" alt="" class="customize__example-arrow">
      <p class="customize__example-result">ROAS・購入率向上と没入感のある<br class="display-600">ブランド体験の実現</p>
    </div>
  </div>

  <!-- 流れ
  ------------------------------------------------------------>
  <div class="flow">
    <h3 class="commonContentTitle">成果を出すための制作体制</h3>
    <p class="commonContentLead"><span>複数業者とのやり取り不要！</span><span>Infinity Designで完結</span></p>

    <div class="flow__list js-anm">
      <div class="flow__item">
        <img src="<?= get_theme_file_uri() ?>/img/flow01.webp" alt="">
        <p>ライティング</p>
      </div>
      <div class="flow__item">
        <img src="<?= get_theme_file_uri() ?>/img/flow02.webp" alt="">
        <p>デザイン</p>
      </div>
      <div class="flow__item">
        <img src="<?= get_theme_file_uri() ?>/img/flow03.webp" alt="">
        <p>コーディング</p>
      </div>
      <div class="flow__item">
        <img src="<?= get_theme_file_uri() ?>/img/flow04.webp" alt="">
        <p>ライティング</p>
      </div>
      <div class="flow__arrow">
        <img src="<?= get_theme_file_uri() ?>/img/flow_arrow.svg" alt="">
        <img src="<?= get_theme_file_uri() ?>/img/flow_arrow.svg" alt="">
        <img src="<?= get_theme_file_uri() ?>/img/flow_arrow.svg" alt="">
      </div>
    </div>
    <p class="flow__result">※納品後1ヵ月テキスト修正無償対応</p>
  </div>
</section>

<!-- plan
------------------------------------------------------------>
<section class="plan">
  <div class="commonTitle">
    <span class="commonTitle__label">Plan</span>
    <h2 class="commonTitle__title">プラン・料金体系</h2>
    <p class="commonTitle__lead">
      <span>ご予算・目的・必要な機能に応じて</span>
      <span>最適なプランをご提案します。</span>
      <span style="width: 100%; text-align: center;">※成果を生むための「投資」としてご相談ください。</span>
    </p>
  </div>

  <div class="plan__content">
    <h3 class="commonContentTitle">基本制作プラン</h3>
    <ul class="plan__list">
      <li class="planCard">
        <div class="planCard__title">
          <h4>スピード重視プラン</h4>
          <p>検証を急ぎたい方向け</p>
        </div>
        <div class="planCard__price">
          <h5>料金目安</h5>
          <span><span class="amount">10</span>万円〜</span>
        </div>
        <div class="planCard__deadline">
          <h5>納期目安</h5>
          <span>最短<span class="amount">2</span>日〜</span>
        </div>
        <div class="planCard__features">
          <h5 >主な特徴</h5>
          <ul>
            <li>テンプレ構築</li>
            <li>原稿支給<span class="is-small">（ライティングなし）</span></li>
            <li>高速検証</li>
          </ul>
        </div>
      </li>
      <li class="planCard is-recommended">
        <div class="planCard__title">
          <h4>デザイン重視プラン</h4>
          <p>ブランドとCVを両立したい方向け</p>
        </div>
        <div class="planCard__price">
          <h5>料金目安</h5>
          <span><span class="amount">30</span>万円〜</span>
        </div>
        <div class="planCard__deadline">
          <h5>納期目安</h5>
          <span>約<span class="amount">3</span>週間〜</span>
        </div>
        <div class="planCard__features">
          <h5 >主な特徴</h5>
          <ul>
            <li>完全オリジナル</li>
            <li>ライティング支援</li>
            <li>ブランディング</li>
          </ul>
        </div>
      </li>
      <li class="planCard">
        <div class="planCard__title">
          <h4>機能充実プラン</h4>
          <p>本格運用・拡張を見据える方向け</p>
        </div>
        <div class="planCard__price">
          <h5>料金目安</h5>
          <span><span class="amount">50</span>万円〜</span>
        </div>
        <div class="planCard__deadline">
          <h5>納期目安</h5>
          <span>約<span class="amount">1.5</span>ヶ月〜</span>
        </div>
        <div class="planCard__features">
          <h5 >主な特徴</h5>
          <ul>
            <li>高度機能実装</li>
            <li>API/予約/EC</li>
            <li>CMS構築</li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <!-- 機能別アドオン（拡張パーツ）
  ------------------------------------------------------------>
  <div class="extends">
    <h3 class="commonContentTitle">機能別アドオン（拡張パーツ）</h3>
    <p class="commonContentLead">ノーコードではできない高機能LPのため<br class="display-800">必要な機能だけを、柔軟に追加できます</p>

    <div class="extends__listWrap">
      <img src="<?= get_theme_file_uri() ?>/img/extends_grid-bg4x2.webp" alt="" class="extends__listbg is-wide">
      <img src="<?= get_theme_file_uri() ?>/img/extends_grid-bg3x3.webp" alt="" class="extends__listbg is-medium">
      <img src="<?= get_theme_file_uri() ?>/img/extends_grid-bg2x4.webp" alt="" class="extends__listbg is-narrow">
      <ul class="extends__list">
        <li class="extends__item">
          <h4>アンケート型機能</h4>
          <img src="<?= get_theme_file_uri() ?>/img/customize01.webp" alt="">
          <div class="extends__item-detail">
            <p class="extends__item-price">
              <span class="label">料金</span>
              <span>+5万円〜</span>
            </p>
            <p class="extends__item-period">
              <span class="label">工期</span>
              <span>+3日</span>
            </p>
          </div>
        </li>
        <li class="extends__item">
          <h4>予約システム連携</h4>
          <img src="<?= get_theme_file_uri() ?>/img/customize02.webp" alt="">
          <div class="extends__item-detail">
            <p class="extends__item-price">
              <span class="label">料金</span>
              <span>+8万円〜</span>
            </p>
            <p class="extends__item-period">
              <span class="label">工期</span>
              <span>+5日</span>
            </p>
          </div>
        </li>
        <li class="extends__item">
          <h4>ECカート連携</h4>
          <img src="<?= get_theme_file_uri() ?>/img/customize03.webp" alt="">
          <div class="extends__item-detail">
            <p class="extends__item-price">
              <span class="label">料金</span>
              <span>+10万円〜</span>
            </p>
            <p class="extends__item-period">
              <span class="label">工期</span>
              <span>+7日</span>
            </p>
          </div>
        </li>
        <li class="extends__item">
          <h4>CMS実装（WP）</h4>
          <img src="<?= get_theme_file_uri() ?>/img/customize04.webp" alt="">
          <div class="extends__item-detail">
            <p class="extends__item-price">
              <span class="label">料金</span>
              <span>+8万円〜</span>
            </p>
            <p class="extends__item-period">
              <span class="label">工期</span>
              <span>+5日</span>
            </p>
          </div>
        </li>
        <li class="extends__item">
          <h4 class="is-small">カウントダウンタイマー</h4>
          <img src="<?= get_theme_file_uri() ?>/img/customize05.webp" alt="">
          <div class="extends__item-detail">
            <p class="extends__item-price">
              <span class="label">料金</span>
              <span>+2万円〜</span>
            </p>
            <p class="extends__item-period">
              <span class="label">工期</span>
              <span>+1日</span>
            </p>
          </div>
        </li>
        <li class="extends__item">
          <h4>アニメーション演出</h4>
          <img src="<?= get_theme_file_uri() ?>/img/customize06.webp" alt="">
          <div class="extends__item-detail">
            <p class="extends__item-price">
              <span class="label">料金</span>
              <span>+5万円〜</span>
            </p>
            <p class="extends__item-period">
              <span class="label">工期</span>
              <span>+4日</span>
            </p>
          </div>
        </li>
        <li class="extends__item">
          <h4>KW連動バナー</h4>
          <img src="<?= get_theme_file_uri() ?>/img/customize07.webp" alt="">
          <div class="extends__item-detail">
            <p class="extends__item-price">
              <span class="label">料金</span>
              <span>+3万円〜</span>
            </p>
            <p class="extends__item-period">
              <span class="label">工期</span>
              <span>+2日</span>
            </p>
          </div>
        </li>
        <li id="lottie-animation"></li>
      </ul>
    </div>

    <p class="extends__note">※機能の複雑さにより変動いたします。<br>※多言語対応は別途お見積もりとなります。</p>
  </div>

  <!-- オプションパック
  ------------------------------------------------------------>
  <div class="option">
    <div class="inner">
      <h3 class="commonContentTitle">お得なオプションパック</h3>
      <p class="commonContentLead">
        <span>セットでご依頼いただくことで</span>
        <span>割引が適用されます</span>
      </p>

      <ul class="option__list">
        <li class="option__item">
          <div class="option__item-head"><h3>プロライティング</h3></div>
          <div class="option__item-body">
            <img src="<?= get_theme_file_uri() ?>/img/option01.webp" alt="">
            <p>成果に直結する訴求設計</p>
          </div>
        </li>
        <li class="option__item">
          <div class="option__item-head"><h3>GTM / GA4設定</h3></div>
          <div class="option__item-body">
            <img src="<?= get_theme_file_uri() ?>/img/option02.webp" alt="">
            <p>計測・改善までサポート</p>
          </div>
        </li>
        <li class="option__item">
          <div class="option__item-head"><h3>広告バナー制作</h3></div>
          <div class="option__item-body">
            <img src="<?= get_theme_file_uri() ?>/img/option03.webp" alt="">
            <p>広告→LPの一貫設計</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <div class="plan__message">
    <p class="highlight">まずはお気軽にご相談ください</p>
    <p><span>お客様の課題に合わせて</span><span>柔軟にプランニングいたします。</span></p>
  </div>
</section>

<!-- cta
------------------------------------------------------------>
<section class="cta">
  <div class="cta__particle wrap js-particle"></div>
  <div class="cta__body">
    <div class="cta__title">
      <span>AI時代のLPデザインに必要なのは、</span>
      <span>単なるテンプレートではなく、</span>
      <span><span>戦略的なライティングと</span><span>高度なプログラミングの融合。</span></span>
    </div>

    <p class="cta__text">
      高品質なLP制作で競合を圧倒的に差別化しませんか？<br>無料相談でご要望の機能実装も承ります。<br>お気軽にご相談ください。
    </p>
  </div>

  <div class="cta__button commonBtn">
    <span class="commonBtn__bubble">無理な営業なし</span>
    <a href="" class="commonBtn__link">無料相談で具体的な改善案を聞いてみる</a>
  </div>
</section>

<?php get_footer(); ?>