document.addEventListener('DOMContentLoaded', () => {

	let showFilterBtn = document.querySelector('.show-filter-btn'),
		showSortBtn = document.querySelector('.show-sort-btn'),
	 	catalogBodySort = document.querySelector('.catalog-body-sort'),
	 	catalogBodyFilter = document.querySelector('.catalog-body-filter');
	//начало - временно - открытие модалки для лизинга
	let banksMoreBtn = document.querySelectorAll('.banks.about-section .btn-more');
	let popupBank = document.querySelector('.popup-bank');
	//конец - временно
	const pageMain = document.querySelector('.hero');
	const burger = document.querySelector('.burger');
	const popupBg = document.querySelector('.pop-up');
	const mobileMenu = document.querySelector('.mobile-menu');
	const popupCheck = document.querySelector('.popup-check');
	const cartCheckingBuy = document.querySelector('.cart-checking-buy');

	let sortAside = document.querySelector('.sort-header');
	let filterArray = document.querySelectorAll('.filter .filter-item-wrapper');
	let closeArray = document.querySelectorAll('.close');

	let filterRangeArray = document.querySelectorAll('.filterRange');

	//начало - временно - открытие модалки для лизинга
	if(!!banksMoreBtn.length) {
		banksMoreBtn.forEach(item => {
			item.addEventListener('click', showMoreLizing);
		})
	}

	function showMoreLizing() {
		openModalsWindow();
		popupBank.classList.add('active');
	}

	function hideMoreLizing() {
		popupBank.classList.remove('active');
	}
	//конец - временно

	//делаем перебор всех инпутов с двойным ползунком
	if(!!filterRangeArray.length) {
		filterRangeArray.forEach(item => {
			let handlesSlider = item.querySelector('.range');

			if(handlesSlider) {
				//=======================как пример!! !!!!
				//see https://refreshless.com/nouislider/
				let minInputValue = item.querySelector("input[name='min']"),
				 maxInputValue = item.querySelector("input[name='max']");
				let inputValues = [
					minInputValue,
					maxInputValue
				];
				let startInputRange = +minInputValue.value;
				let finishInputRange = +maxInputValue.value;
				let maxInputRange = +maxInputValue.value;
				let doubleInputRange =  noUiSlider.create(handlesSlider, {
					start: [startInputRange, finishInputRange],
					connect: true,
					step: 1,
					range: {
						'min': [startInputRange],
						'max': [maxInputRange]
					},
					format: wNumb({
						decimals: 0,
						thousand: '',
					})
				});

				// let nonLinearStepSliderValueElement = document.getElementById('filterRangeYear');


				handlesSlider.noUiSlider.on('update', function (values, handle) {
					inputValues[handle].value = values[handle];
				});

				//устанавливаем значения инпута в поле-вывода для пользователя
				handlesSlider.noUiSlider.on('update', function (values, handle) {
					inputValues[handle].textContent = values[handle];
				});

				// Listen to keydown events on the input field.
				inputValues.forEach(function (input, handle) {

					input.addEventListener('change', function () {
						handlesSlider.noUiSlider.setHandle(handle, this.value);
					});
				});
				//=========================пример!!!!!
			}
		})
	}

	//close event modals window
	if(!!closeArray.length){
		closeArray.forEach(item =>{
			item.addEventListener('click', closeModalsWindow);
		})
	}

	//filters button in catalog
	if(showFilterBtn) {
		showFilterBtn.addEventListener('click', showFilterCatalog);
		showSortBtn.addEventListener('click', showSortCatalog);
	}

	//open check car popup
	if(cartCheckingBuy){
		cartCheckingBuy.addEventListener('click', openPopupCheck);
	}

	//open check car popup
	function openPopupCheck() {
		openModalsWindow();
		popupCheck.classList.add('active');
	}

	function closePopupCheck() {
		popupCheck.classList.remove('active');
	}

	function showFilterCatalog() {
		openModalsWindow();
		catalogBodyFilter.classList.add('active');
	}
	function showSortCatalog() {
		openModalsWindow();
		catalogBodySort.classList.add('active');
	}

	function hideFilterCatalog() {
		catalogBodyFilter.classList.remove('active');
	}
	function hideSortCatalog() {
		catalogBodySort.classList.remove('active');
	}

	burger.addEventListener('click', openMobileMenu);

	if(popupBg) {
        // popupBg.addEventListener('click', toggleMobileMenu);
        popupBg.addEventListener('click', closeModalsWindow);
    }
    if(mobileMenu) {
        // mobileMenu.addEventListener('click', openMobileMenu);
    }

    function openModalsWindow() {
		popupBg.classList.add('active');
		document.body.classList.add('hidden-body');
	}
    function closeModalsWindow() {
		popupBg.classList.remove('active');
		document.body.classList.remove('hidden-body');
		closeMobileMenu();
		closePopupCheck();
		hideMoreLizing();
		if(catalogBodyFilter) {
			hideFilterCatalog();
		}
		if(catalogBodySort) {
			hideSortCatalog();
		}
	}

    function openMobileMenu() {
		openModalsWindow();
		burger.classList.add('active');
		mobileMenu.classList.add('active');
	}
	function closeMobileMenu() {
		burger.classList.remove('active');
		mobileMenu.classList.remove('active');
	}
    //боковое меню навигации
	function toggleMobileMenu() {
		if(burger.classList.contains('active')){
			closeModalsWindow();
			closeMobileMenu();
		} else {
			openModalsWindow();
			openMobileMenu();
		}
	}

	if(sortAside){
		sortAside.addEventListener('click', toogleSort);

		let catologSortLinks = document.querySelectorAll('.catalog-body-sort .sort-list a');
		catologSortLinks.forEach(item =>{
			item.addEventListener('click', changeSortName);
		})
	}

	function changeSortName(e){
		e.preventDefault();
		let target = e.target;
		const name = target.textContent;
		let title = document.querySelector('.catalog-body .sort-name')
		title.textContent = name;
		toogleSort(e);
	}
	//open-close sort block
	function toogleSort(e){
		let target = e.target;
		let bodySort = target.closest('.catalog-body-sort');
		if(bodySort.classList.contains('active-show')){
			bodySort.classList.remove('active-show');
		} else {
			bodySort.classList.add('active-show');
		}
	}

	//if(catalog) {
		var heroSwiper = new Swiper('.catalog-brands .swiper-container', {
			// speed: 400,
			spaceBetween: 18,
			loop: true,
			slidesPerView: 5,
			navigation: {
				nextEl: '.catalog-brands .swiper-button-next',
				prevEl: '.catalog-brands .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 640px
				1700: {
					slidesPerView: 5,
					spaceBetween: 18,
				},
				// when window width is >= 640px
				1200: {
					slidesPerView: 4,
				},
				700: {
					slidesPerView: 3,
					spaceBetween: 10,
				},
				350: {
					slidesPerView: 2,
				},
				320: {
					slidesPerView: 1,
					spaceBetween: 5,
				},
			},
		});
	//}


	//if(cartPage) {
		//swiper cart thumb
		var cartGalleryThumbs = new Swiper('.gallery-thumbs', {
			spaceBetween: 20,
			slidesPerView: 3,
			direction: 'vertical',
			freeMode: true,
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
			breakpoints: {
				// when window width is >= 640px
				1468: {
					slidesPerView: 3,
					spaceBetween: 20,
				},
				// when window width is >= 640px
				769: {
					slidesPerView: 3,
					spaceBetween: 15,
					direction: 'vertical',
				},
				// 700: {
				// 	slidesPerView: 3,
				// 	spaceBetween: 10,
				// },
				320: {
					slidesPerView: 4,
					spaceBetween: 5,
					direction: 'horizontal',
				},
			},
		});
		var cartGalleryTop = new Swiper('.gallery-top', {
			slidesPerView: 1,
			navigation: {
				nextEl: '.cart-slider .swiper-button-next',
				prevEl: '.cart-slider .swiper-button-prev',
			},
			thumbs: {
				swiper: cartGalleryThumbs

			}
		});
	//}

	if(pageMain) {
		let sliderGoodsBlock;
		//goods swipers elem
		let goodCurrentSlide;
		let goodTotalSlides;
		let goodShowCurrentSlide;
		let goodShowTotalSlides;
		let goodSwiperLine;
		let swiperGoodsReady;
		let swiperGoodsPost;
		//клонирование повторяющихся эл-ов внутри одной секции
		$(".information-clone").clone().appendTo(".information .mobile-clone");
		$(".faq-clone").clone().appendTo(".faq .mobile-clone");

		// let calculatorBtnArr = document.querySelectorAll('.calculator');
		//
		// calculatorBtnArr.forEach(item=>{
		// 	item.addEventListener('click', (e)=>{
		// 		console.log(e.target);
		// 	})
		// })

		filterArray.forEach(function(item){
			item.addEventListener('click', toggleFiltersDropdown);
		});

		function toggleFiltersDropdown(e) {
			const target = e.target;
            const parent = e.parentElement;

			if(target.closest('.filter-dropdown')) return;
			if(this.classList.contains('active')){
				this.classList.remove('active');
                this.parentElement.classList.remove('open');
			} else {
				closeOpenMainFilters();
				this.classList.add('active');
                this.parentElement.classList.add('open');
			}
		}

		let frontBanner = new Swiper('.hero .swiper-container', {
			speed: 400,
			loop: true,
			autoplay: {
				delay: 5000,
			},
			pagination: {
				el: '.hero .swiper-pagination',
				clickable: true,
			},
		});

		var heroSwiper = new Swiper('.hero__brands .swiper-container', {
			// speed: 400,
			spaceBetween: 35,
			direction: 'vertical',
			loop: true,
			slidesPerView: 5,
			navigation: {
				nextEl: '.hero__brands .swiper-button-next',
				// prevEl: '.swiper-button-prev',
			},
			breakpoints: {
				1368: {
					slidesPerView: 5,
					spaceBetween: 35,
				},
				768: {
					slidesPerView: 5,
					spaceBetween: 15,
				},
			},
		});

		swiperGoodsReady = new Swiper('.goods-currently .swiper-container', {
			slidesPerView: 3,
			spaceBetween: 35,
			pagination: {
				el: '.goods-currently .goods-ready-pagination',
				type: 'fraction',
			},
			navigation: {
				nextEl: '.goods-currently .goods-ready-next',
				prevEl: '.goods-currently .goods-ready-prew',
			},
			breakpoints: {
				// when window width is >= 640px
				1800: {
					slidesPerView: 3,
					spaceBetween: 32
				},
				1700: {
					slidesPerView: 3,
					spaceBetween: 32
				},
				// when window width is >= 640px
				1000: {
					slidesPerView: 2,
					spaceBetween: 16
				},
				768: {
					slidesPerView: 1,
					spaceBetween: 10,
					direction: 'horizontal',
					allowTouchMove: true,
				},
				320: {
					slidesPerView: 3,
					spaceBetween: 10,
					direction: 'vertical',
					allowTouchMove: false,
				},
			},
			on: {
				init: function () {
					setTimeout(()=> {
						goodsElements(swiperGoodsReady)
					}, 500);
				},
			}
		});

		swiperGoodsPost = new Swiper('.goods-post .swiper-container', {
			slidesPerView: 3,
			spaceBetween: 35,
			pagination: {
				el: '.goods-post .goods-ready-pagination',
				type: 'fraction',
			},
			navigation: {
				nextEl: '.goods-post .goods-ready-next',
				prevEl: '.goods-post .goods-ready-prew',
			},
			breakpoints: {
				// when window width is >= 640px
				1800: {
					slidesPerView: 3,
					spaceBetween: 32
				},
				1700: {
					slidesPerView: 3,
					spaceBetween: 32
				},
				// when window width is >= 640px
				1000: {
					slidesPerView: 2,
					spaceBetween: 16
				},
				768: {
					slidesPerView: 1,
					spaceBetween: 10,
					direction: 'horizontal',
					allowTouchMove: true,
				},
				320: {
					slidesPerView: 3,
					spaceBetween: 10,
					direction: 'vertical',
					allowTouchMove: false,
				},
			},
			on: {
				init: function () {
					setTimeout(()=>{
						goodsElements(swiperGoodsPost);
					} , 500);
				},
			}
		});

		//красивая панель навигации слайдера
		if(swiperGoodsReady){
			swiperGoodsReady.on('slideChange', goodsElements);
			swiperGoodsPost.on('slideChange', goodsElements);
		}

		function goodsElements(e){
			if(e) {
				if(!!e.el.closest('.goods-currently')){
					sliderGoodsBlock = e.el.closest('.goods-currently');
				} else if (!!e.el.closest('.goods-post')) {
					sliderGoodsBlock = e.el.closest('.goods-post');
				}
				goodShowCurrentSlide = sliderGoodsBlock.querySelector('.goods-ready-control-current');
				goodShowTotalSlides = sliderGoodsBlock.querySelector('.goods-ready-control-total');
				goodSwiperLine = sliderGoodsBlock.querySelector('.goods-ready-control-row .section-slider-control__outline');
				goodCurrentSlide = +sliderGoodsBlock.querySelector('.goods-ready-control-row .swiper-pagination-current').textContent;
				goodTotalSlides = +sliderGoodsBlock.querySelector('.goods-ready-control-row .swiper-pagination-total').textContent;
				goodShowCurrentSlide.textContent = goodCurrentSlide >=10 ? goodCurrentSlide : '0' + goodCurrentSlide;
				goodShowTotalSlides.textContent = goodTotalSlides >=10 ? goodTotalSlides : '0' + goodTotalSlides;
				goodSwiperLine.style.width = goodCurrentSlide / goodTotalSlides * 100 + '%';
			}
		}

		var swiperTeam = new Swiper('.team .swiper-container', {
			slidesPerView: 5,
			loop: true,
			centeredSlides: true,
			pagination: {
				el: '.team .swiper-pagination',
				clickable: true,
			},
			breakpoints: {
				// when window width is >= 640px
				1350: {
					slidesPerView: 5,
				},
				// when window width is >= 640px
				900: {
					slidesPerView: 3,
				},
				550: {
					slidesPerView: 2,
					centeredSlides: true,
				},
				320: {
					slidesPerView: 1,
					centeredSlides: false,
				},
			},
		});
	}

	let questionBtns = document.querySelectorAll(".faq .question");

	//раскрывающийся список для секции вопросов
	if(questionBtns) {
		for (let i = 0; i < questionBtns.length; i++) {
			questionBtns[i].addEventListener("click", function() {
				this.classList.toggle("active");
				let panel = this.nextElementSibling;
				if (panel.style.maxHeight){
					panel.style.maxHeight = null;
				} else {
					panel.style.maxHeight = panel.scrollHeight + "px";
				}
			});
		}
	}

	//footer
	//$(".nav-top .nav__list").clone().appendTo(".footer-nav-bottom");
	//$(".footer-socials").clone().appendTo(".map-social .name");
	$(".header-bottom .sub-nav").clone().appendTo(".mobile-menu .mobile-bottom-nav");
	$(".header-top .nav-top").clone().appendTo(".mobile-menu .mobile-top-nav");
	$(".header-top .lang").clone().appendTo(".mobile-menu .mobile-lang");
	$(".work-mode").clone().appendTo(".mobile-menu .mobile-worktime");
	$(".header-top .social").clone().appendTo(".mobile-menu .mobile-social");

	//преобразовывает img.svg -> svg
	jQuery('img.svg').each(function(){
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');

		jQuery.get(imgURL, function(data) {
			// Get the SVG tag, ignore the rest
			var $svg = jQuery(data).find('svg');

			// Add replaced image ID to the new SVG
			if(typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
			// Add replaced image classes to the new SVG
			if(typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass+' replaced-svg');
			}

			// Remove any invalid XML tags as per http://validator.w3.org
			$svg = $svg.removeAttr('xmlns:a');

			// Check if the viewport is set, if the viewport is not set the SVG wont't scale.
			if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
				$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
			}

			// Replace image with new SVG
			$img.replaceWith($svg);

		}, 'xml');

	});

	function closeOpenMainFilters() {
		filterArray.forEach(item => {
			item.classList.remove('active');
			// if(item.classList.contains('active')){
			// 	item.classList.remove('active');
			// }
		})
	}

	//когда клиент жмет где-либо - что-то прячем
	document.body.addEventListener('click', documentGlobalFunction);

	function documentGlobalFunction(e) {
		const target = e.target;
		if(!!filterArray.length) {
			if(!target.closest('.filter-item-wrapper')) {
				closeOpenMainFilters();
			}
		}
	}
});
