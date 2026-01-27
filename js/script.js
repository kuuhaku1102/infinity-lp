'use strict';

{
  // ---------------------------------------
  // トップのスライダ
  // ---------------------------------------
  const topSlider = new Swiper('.js-topSlider', {
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 100000,
      disableOnInteraction: false,
    },
    speed: 500,
    slidesPerView: 3.6, // SP default
    pagination: {
      el: '.top__slider-pagination',
      clickable: true,
    },
    breakpoints: {
      800: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 5,
      },
    },
  });

  // ---------------------------------------
  // サービスセクション
  // ---------------------------------------
  const serviceToggleBtn = document.querySelector('#js-serviceButton');
  serviceToggleBtn.addEventListener('click', () => {
    serviceToggleBtn.classList.toggle('is-active');

    const parentTechnology = serviceToggleBtn.closest('.service__technology');
    if (!parentTechnology) return;

    parentTechnology.classList.toggle('is-open');
  });

  // ---------------------------------------
  // トップのスライダ
  // ---------------------------------------
  lottie.loadAnimation({
    container: document.querySelector('#lottie-animation'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: './anm/puzzle.json' // jsonのパス
  });

  // ---------------------------------------
  // Intersection Observer
  // ---------------------------------------
  const targets = document.querySelectorAll('.js-anm');
  function callback(entries, obs) {
    entries.forEach(entry => {
      if(!entry.isIntersecting) {
        return;
      }
        entry.target.classList.add('is-appear');
        obs.unobserve(entry.target);
    });
  }

  const options = { threshold: 0.2,};
  const observer = new IntersectionObserver(callback, options);
  targets.forEach(target => {
    observer.observe(target);
  });

  // ---------------------------------------
  // 実績のスライダー
  // ---------------------------------------

  /**
   * スライドを複製する
   */
  const duplicateSlides = (sliderEl) => {
    const slides = Array.from(sliderEl.querySelectorAll('.swiper-slide'));
    const wrapper = sliderEl.querySelector('.swiper-wrapper');

    slides.forEach((slide) => {
      const cloned = slide.cloneNode(true);
      const slideWrapper = document.createElement('div');
      slideWrapper.classList.add('swiper-slide');
      slideWrapper.innerHTML = cloned.innerHTML;
      wrapper.appendChild(slideWrapper);
    });

    return slides.length; // 元の枚数を返す
  };

  /**
   * Works Slider 初期化
   */
  const initWorksSlider = ({
    selector,
    spaceBetween = { base: 10, md: 20, lg: 40 },
    autoplayDelay = 3000,
  }) => {
    const sliderEl = document.querySelector(selector);
    if (!sliderEl) return;

    // ① 必ず複製
    const originalSlideCount = duplicateSlides(sliderEl);

    // ② Swiper 初期化
    const swiper = new Swiper(selector, {
      centeredSlides: true,
      slidesPerView: 'auto',
      loop: true,
      autoplay: {
        delay: autoplayDelay,
      },
      spaceBetween: spaceBetween.base,
      pagination: {
        el: sliderEl.querySelector('.swiper-pagination'),
        clickable: true,
        renderBullet(index, className) {
          if (index < originalSlideCount) {
            return `<span class="${className}"></span>`;
          }
          return '';
        },
      },
      breakpoints: {
        800: {
          spaceBetween: spaceBetween.md,
        },
        1200: {
          spaceBetween: spaceBetween.lg,
        },
      },
    });

    // ③ pagination active 制御
    swiper.on('slideChange', function () {
      const paginationIndex = this.realIndex % originalSlideCount;

      swiper.pagination.bullets.forEach((bullet, index) => {
        bullet.classList.toggle(
          'swiper-pagination-bullet-active',
          index === paginationIndex
        );
      });
    });
  };

  initWorksSlider({
    selector: '.js-worksSlider01',
  });

  initWorksSlider({
    selector: '.js-worksSlider02',
  });


  // ---------------------------------------
  // particleアニメーションのためのspanを複製
  // ---------------------------------------
  const wrap = document.querySelector('.js-particle');
  let COUNT = 1000;

  if (window.innerWidth <= 600) {
    COUNT = 300;
  } else if (window.innerWidth <=1000) {
    COUNT = 600;
  }

  for (let i = 0; i < COUNT; i++) {
    const div = document.createElement('div');
    div.className = 'c';

    // 0〜1 の位置情報（グラデーション用）
    const t = i / (COUNT - 1);

    // CSS変数をセット
    div.style.setProperty('--t', t);
    div.style.setProperty('--angle', `${i * (360 / COUNT)}deg`);

    wrap.appendChild(div);
  }
}
