/**
 * 契約前の事前ヒアリングフォーム - スライダー式
 * 見積もり自動計算機能付き
 */

(function() {
    'use strict';

    // 料金設定
    const PRICING = {
        base: 100000,              // 基本料金: 10万円
        textReady: 50000,          // テキスト準備なし: +5万円
        specReady: 50000,          // 機能実装あり: +5万円
        cms: 50000,                // CMS導入: +5万円
        formImplementation: 20000, // フォーム実装あり: +2万円
        urgentDelivery: 70000      // 納期1ヶ月以内: +7万円
    };

    let currentStep = 1;
    const totalSteps = 5;

    // DOM要素
    const form = document.getElementById('hearingForm');
    const steps = document.querySelectorAll('.hearing-form__step');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressBar = document.getElementById('progressBar');
    const currentStepText = document.getElementById('currentStep');

    // 初期化
    function init() {
        if (!form) return;

        updateProgress();
        setupEventListeners();
        calculateEstimate(); // 初期見積もり計算
    }

    // イベントリスナーの設定
    function setupEventListeners() {
        // 次へボタン
        nextBtn.addEventListener('click', function() {
            if (validateCurrentStep()) {
                nextStep();
            }
        });

        // 戻るボタン
        prevBtn.addEventListener('click', function() {
            prevStep();
        });

        // 見積もり計算トリガー
        const priceInputs = form.querySelectorAll('[data-price], [data-price-trigger]');
        priceInputs.forEach(input => {
            input.addEventListener('change', calculateEstimate);
        });

        // 日付入力の変更イベント
        const dateInput = document.getElementById('desired_date');
        if (dateInput) {
            dateInput.addEventListener('change', calculateEstimate);
        }

        // CMS入力の変更イベント
        const cmsInput = document.getElementById('target_cms');
        if (cmsInput) {
            cmsInput.addEventListener('input', calculateEstimate);
        }
    }

    // 現在のステップのバリデーション
    function validateCurrentStep() {
        const currentStepElement = steps[currentStep - 1];
        const requiredInputs = currentStepElement.querySelectorAll('[required]');
        
        let isValid = true;
        requiredInputs.forEach(input => {
            if (input.type === 'radio') {
                const radioGroup = currentStepElement.querySelectorAll(`[name="${input.name}"]`);
                const isChecked = Array.from(radioGroup).some(radio => radio.checked);
                if (!isChecked) {
                    isValid = false;
                }
            } else if (!input.value.trim()) {
                isValid = false;
                input.classList.add('error');
            } else {
                input.classList.remove('error');
            }
        });

        if (!isValid) {
            alert('必須項目をすべて入力してください。');
        }

        return isValid;
    }

    // 次のステップへ
    function nextStep() {
        if (currentStep < totalSteps) {
            steps[currentStep - 1].style.display = 'none';
            currentStep++;
            steps[currentStep - 1].style.display = 'block';
            
            // ステップ5(確認画面)の場合、入力内容を表示
            if (currentStep === 5) {
                displayConfirmation();
            }
            
            updateProgress();
            updateButtons();
            calculateEstimate();
            
            // スクロールをトップに
            window.scrollTo({
                top: document.querySelector('.hearing-form').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    }

    // 前のステップへ
    function prevStep() {
        if (currentStep > 1) {
            steps[currentStep - 1].style.display = 'none';
            currentStep--;
            steps[currentStep - 1].style.display = 'block';
            
            updateProgress();
            updateButtons();
            
            // スクロールをトップに
            window.scrollTo({
                top: document.querySelector('.hearing-form').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    }

    // 進捗バーの更新
    function updateProgress() {
        const progress = (currentStep / totalSteps) * 100;
        progressBar.style.width = progress + '%';
        currentStepText.textContent = currentStep;
    }

    // ボタンの表示/非表示
    function updateButtons() {
        // 戻るボタン
        if (currentStep === 1) {
            prevBtn.style.display = 'none';
        } else {
            prevBtn.style.display = 'inline-block';
        }

        // 次へボタンと送信ボタン
        if (currentStep === totalSteps) {
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'inline-block';
        } else {
            nextBtn.style.display = 'inline-block';
            submitBtn.style.display = 'none';
        }
    }

    // 見積もり計算
    function calculateEstimate() {
        let total = PRICING.base;
        const options = [];

        // テキスト準備なし
        const textReady = form.querySelector('input[name="text_ready"]:checked');
        if (textReady && textReady.value === 'なし') {
            total += PRICING.textReady;
            options.push({ label: 'テキスト作成', price: PRICING.textReady });
        }

        // 機能実装あり
        const specReady = form.querySelector('input[name="spec_ready"]:checked');
        if (specReady && specReady.value === 'あり') {
            total += PRICING.specReady;
            options.push({ label: '機能実装', price: PRICING.specReady });
        }

        // CMS導入
        const targetCms = form.querySelector('#target_cms');
        if (targetCms && targetCms.value.trim() && targetCms.value.trim() !== '不明') {
            total += PRICING.cms;
            options.push({ label: 'CMS導入', price: PRICING.cms });
        }

        // フォーム実装あり
        const formImpl = form.querySelector('input[name="form_implementation"]:checked');
        if (formImpl && formImpl.value === 'あり') {
            total += PRICING.formImplementation;
            options.push({ label: 'フォーム実装', price: PRICING.formImplementation });
        }

        // 納期1ヶ月以内(特急料金)
        const desiredDate = form.querySelector('#desired_date');
        if (desiredDate && desiredDate.value) {
            const selectedDate = new Date(desiredDate.value);
            const oneMonthLater = new Date();
            oneMonthLater.setMonth(oneMonthLater.getMonth() + 1);
            
            if (selectedDate <= oneMonthLater) {
                total += PRICING.urgentDelivery;
                options.push({ label: '特急料金(1ヶ月以内)', price: PRICING.urgentDelivery });
            }
        }

        // 見積もり表示を更新
        updateEstimateDisplay(options, total);
    }

    // 見積もり表示の更新
    function updateEstimateDisplay(options, total) {
        const estimateOptions = document.getElementById('estimateOptions');
        const totalPrice = document.getElementById('totalPrice');
        const finalTotalPrice = document.getElementById('finalTotalPrice');

        if (estimateOptions) {
            estimateOptions.innerHTML = '';
            options.forEach(option => {
                const row = document.createElement('div');
                row.className = 'hearing-form__estimate-row';
                row.innerHTML = `
                    <span class="hearing-form__estimate-label">${option.label}</span>
                    <span class="hearing-form__estimate-value">¥${option.price.toLocaleString()}</span>
                `;
                estimateOptions.appendChild(row);
            });
        }

        if (totalPrice) {
            totalPrice.textContent = '¥' + total.toLocaleString();
        }

        if (finalTotalPrice) {
            finalTotalPrice.textContent = '¥' + total.toLocaleString();
        }
    }

    // 確認画面の表示
    function displayConfirmation() {
        const confirmContent = document.getElementById('confirmContent');
        if (!confirmContent) return;

        const formData = new FormData(form);
        const data = {};
        for (let [key, value] of formData.entries()) {
            if (key !== 'hearing_form_nonce' && key !== '_wp_http_referer') {
                data[key] = value;
            }
        }

        const labels = {
            company_name: '会社名もしくは個人名',
            focus_area: '重視する箇所',
            text_ready: 'テキストのご準備',
            materials_ready: '素材の有無',
            lp_content: 'LPの内容',
            spec_ready: '機能実装のご希望',
            feature_detail: '希望する機能の詳細',
            target_cms: '想定するCMS',
            form_implementation: 'フォーム実装',
            desired_date: '希望納期'
        };

        let html = '';
        for (let key in data) {
            if (labels[key]) {
                html += `
                    <div class="hearing-form__confirm-row">
                        <div class="hearing-form__confirm-label">${labels[key]}</div>
                        <div class="hearing-form__confirm-value">${data[key] || '未入力'}</div>
                    </div>
                `;
            }
        }

        confirmContent.innerHTML = html;
    }

    // DOMContentLoaded後に初期化
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
