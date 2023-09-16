// Icon from Orion Icon https://orioniconlibrary.com/
let searchIcon = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="title"
aria-describedby="desc" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
  <title>Search</title>
  <desc>Search This Website</desc>
  <path data-name="layer2"
  fill="none" stroke="#202020" stroke-miterlimit="10" stroke-width="2" d="M39.049 39.049L56 56"
  stroke-linejoin="round" stroke-linecap="round"></path>
  <circle data-name="layer1" cx="27" cy="27" r="17" fill="none" stroke="#202020"
  stroke-miterlimit="10" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></circle>
</svg>`;

let searchEl = `<div class="search-icon header-actions-action--social header-nav-wrapper">
  <a class="icon" href="/search">${searchIcon}</a>
</div>`;
let referenceEl = document.querySelector(".header-actions");

referenceEl.insertAdjacentHTML("afterbegin", searchEl);

//Mobile HTML
let mobileSearchEl = `<div class="search-icon header-menu-actions-action header-menu-actions-action--social">
<a class="icon" href="/search">${searchIcon}</a>
</div>`;
let mobileReferenceEl = document.querySelector('[data-folder="root"] .header-menu-actions');

mobileReferenceEl.insertAdjacentHTML("afterbegin", mobileSearchEl);