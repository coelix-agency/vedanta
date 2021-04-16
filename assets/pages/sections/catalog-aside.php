<aside class="catalog-aside">
	<div class="catalog-aside-mobile-btns">
		<div class="show-btn show-filter-btn">Фильтр</div>
		<div class="show-btn show-sort-btn">Сортировка</div>
	</div>
	<!--/.catalog-aside-mobile-btns-->
	<div class="catalog-body-sort">
		<div class="close">
			<img src="images/icons/arrow-mobile-filter.svg" alt="" title="" class="svg"> Сортировка
		</div>
		<div class="wrapper">
			<div class="sort-header">
				<div class="sort-title">Сортировка:</div>
				<div class="sort-name">По умолчанию</div>
				<img src="./images/icons/promo-right-arrow.svg" alt="" class="svg">
			</div>
			<div class="sort-list-wrap">
				<div class="sort-list">
					<a href="#">По умолчанию</a>
					<a href="#">От дешевых к дорогим</a>
					<a href="#">От дорогих к дешевым</a>
					<a href="#">Новинки</a>
					<a href="#">Популярные</a>
					<a href="#">Акционные</a>
				</div>
			</div>
		</div>
	</div>
	<!--/.catalog-body-sort-->
	<div class="catalog-body-filter">
		<div class="close">
			<img src="images/icons/arrow-mobile-filter.svg" alt="" title="" class="svg"> Фильтр
		</div>
		<div class="wrapper">
			<div class="catalog-body-filter-item filter-price">
				<div class="title">Стоимость авто ($):</div>
				<div class="inputs">
					<input name="min" type="text" value="12000">
					<input name="max" type="text" value="134800">
				</div>
				<div class="range">
					<div class="range-body">
						<div class="range-line"></div>
						<span class="range-handler range-min"></span>
						<span class="range-handler range-max"></span>
					</div>
				</div>
			</div>
			<div class="catalog-body-filter-item filter-year">
				<div class="title">Год выпуска:</div>
				<div class="inputs">
					<input name="min" type="text" value="2005">
					<input name="max" type="text" value="2020">
				</div>
				<div class="range">
					<div class="range-body">
						<div class="range-line"></div>
						<span class="range-handler range-min"></span>
						<span class="range-handler range-max"></span>
					</div>
				</div>
			</div>
			<div class="catalog-body-filter-item filter-probeg">
				<div class="title">Пробег:</div>
				<div class="inputs">
					<input name="min" type="text" value="34500">
					<input name="max" type="text" value="255555">
				</div>
				<div class="range">
					<div class="range-body">
						<div class="range-line"></div>
						<span class="range-handler range-min"></span>
						<span class="range-handler range-max"></span>
					</div>
				</div>
			</div>
			<div class="catalog-body-filter-item filter-status">
				<div class="title">Статус:</div>
				<div class="radio-list">
					<input id="status-all" type="radio" name="title" value="all" checked>
					<label for="status-all">Любой</label>
					<input id="status-in" type="radio" name="title" value="in">
					<label for="status-in">В наличии (24)</label>
					<input id="status-out" type="radio" name="title" value="out">
					<label for="status-out">В пути (114)</label>
				</div>
			</div>
			<div class="catalog-body-filter-item filter-marka">
				<div class="title">Марка авто:</div>
				<ul class="checkbox-list">
					<li><label><input type="checkbox">Kia (13)</label></li>
					<li><label><input type="checkbox">hyundai (22) </label></li>
					<li><label><input type="checkbox">genesis (4)</label></li>
					<li><label><input type="checkbox">Renault Samsung (8)</label></li>
					<li><label><input type="checkbox">Renault (64)</label></li>
					<li><label><input type="checkbox">Chevrolet (25)</label></li>
					<li><label><input type="checkbox">Volkswagen (36)</label></li>
				</ul>
			</div>
			<div class="catalog-body-filter-item filter-type">
				<div class="title">Тип кузова:</div>
				<ul class="checkbox-list">
					<li><label><input type="checkbox">Минивэн (22)</label></li>
					<li><label><input type="checkbox">Кроссовер (16)</label></li>
					<li><label><input type="checkbox">Внедорожник (43)</label></li>
					<li><label><input type="checkbox">Седан (94)</label></li>
					<li><label><input type="checkbox">Хэтчбек (38)</label></li>
					<li><label><input type="checkbox">Купе (2)</label></li>
				</ul>
			</div>
			<div class="catalog-body-filter-item filter-chassis">
				<div class="title">Тип привода:</div>
				<ul class="checkbox-list">
					<li><label><input type="checkbox">Полный (8)</label></li>
					<li><label><input type="checkbox">Задний (19)</label></li>
					<li><label><input type="checkbox">Передний (21)</label></li>
				</ul>
			</div>
			<div class="catalog-body-filter-item filter-fuel">
				<div class="title">Марка авто:</div>
				<ul class="checkbox-list">
					<li><label><input type="checkbox">Бензин (8)</label></li>
					<li><label><input type="checkbox">Газ (19)</label></li>
					<li><label><input type="checkbox">Дизель (21)</label></li>
					<li><label><input type="checkbox">Электро (21)</label></li>
				</ul>
			</div>
			<div class="catalog-filter-reset">
				Сбросить все
			</div>
		</div>
	</div>
	<!--/.catalog-body-filter-->
</aside>
<!--/.catalog-aside-->
