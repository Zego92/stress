// import smoothscroll from '../../node_modules/smoothscroll-polyfill/dist/smoothscroll.min';
window.$ = window.jquery = window.jQuery = require('jquery')
require('jquery-mask-plugin/dist/jquery.mask.min')
import smoothscroll from 'smoothscroll-polyfill';
require('./bootstrap');
smoothscroll.polyfill();
import lightbox from 'lightbox2/dist/js/lightbox.min'
lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true
})
jQuery(document).ready(function () {
    jQuery('.user-feedback-phone').mask('+380000000000')
})


document.addEventListener('DOMContentLoaded', function () {

    const headerSearch = document.getElementById('header-search');
    const subMenuMoreBtns = document.querySelectorAll('.sub-menu-more');
    const subItem = document.querySelectorAll('.sub-menu-item');
    const burgerMenuBtn = document.getElementById('mob-menu-open');
    const closeMenuBtn = document.getElementById('mob-menu-close');
    const mainMenu = document.getElementById('main-menu');
    const body = document.getElementsByTagName('body')[0];
    const selectCountryItem = document.getElementById('select-country-item');
    const selectCountry = document.getElementById('select-country');
    const selectCountryDropdown = document.getElementById('select-country-dropdown');
    const countryItem = document.querySelectorAll('.select-country__lists-item');
    const removeCountryBtn = document.getElementById('remove-selected-country');
    const selectCountryValue = document.getElementById('select-country-value');
    const selectCountryIcon = document.getElementById('select-country-icon');
    const selectInput = document.querySelectorAll('.select-input');
    const selectOption = document.querySelectorAll('.select-option');
    const sortItemSelect = document.getElementById('sort-item-select');
    const sortDropdown = document.getElementById('sort-dropdown');
    const sortOptionsItem = document.querySelectorAll('.sort-option');
    const closeCountryModal = document.getElementById('close-country-dropdown');
    const langItem = document.querySelectorAll('.lang-item');
    const sidebar = document.querySelector('.post-sidebar');
    const textMore = document.querySelectorAll('.more-text-button');



    //Custom Functions

    let uaTwo = window.navigator.userAgent;
    let isIETwo = /MSIE|Trident/.test(uaTwo);

    if (isIETwo) {
        body.classList.add('ie');
        if (sidebar) {
            const offset = sidebar.getBoundingClientRect();
            window.addEventListener('scroll', function () {
                if (window.pageYOffset > offset.top - 30) {
                    sidebar.classList.add('fixed');
                } else {
                    sidebar.classList.remove('fixed');
                }
            });
        }

    }

    function openMobileMenu() {
        mainMenu.classList.add('active');
        body.classList.add('menu-is-open');
    }

    function closeMobileMenu() {
        mainMenu.classList.remove('active');
        body.classList.remove('menu-is-open');
    }

    function countryDropdownToggle(e) {
        if (!removeCountryBtn.contains(e.target)) {
            if (selectCountry.classList.contains('active')) {
                selectCountry.classList.remove('active');
                body.classList.remove('select-country-open');
            } else {
                selectCountry.classList.add('active');
                body.classList.add('select-country-open');
            }
        }
    }


    function sortDropdownToggle(e) {
        if (sortDropdown.classList.contains('active')) {
            sortDropdown.classList.remove('active');
        } else {
            sortDropdown.classList.add('active');
        }
    }

    function removeSelectedCountry() {
        const defaultIconPath = selectCountryIcon.getAttribute('data-default-path');
        const allSelectItem = selectCountryItem.closest('.select-country').querySelectorAll('.select-country__lists-item');
        selectCountryValue.value = '';
        selectCountryIcon.innerHTML = `<img src="${defaultIconPath}" alt=""/>`;
        selectCountryItem.classList.remove('selected');
        for (let j = 0; j < allSelectItem.length; j++) {
            allSelectItem[j].classList.remove('selected');
        }
        window.location.href = '/search';
    }

    function countryModalClose() {
        selectCountry.classList.remove('active');
        body.classList.remove('select-country-open');
    }

    function checkTargetHundler(e) {
        const target = e.target;

        if (headerSearch && !headerSearch.contains(target)) {
            headerSearch.classList.remove('active');
        }

        if (sortDropdown && !sortDropdown.contains(target)) {
            sortDropdown.classList.remove('active');
        }

        if (selectCountryDropdown && !selectCountryDropdown.contains(target) && !selectCountryItem.contains(target)) {
            selectCountry.classList.remove('active');
            body.classList.remove('select-country-open');
        }


        // for (let i = 0; i < selectInput.length; i++) {
        //     if (!selectInput[i].contains(target) && !selectInput[i].nextElementSibling.contains(target)) {
        //         selectInput[i].parentElement.classList.remove('active');
        //     }
        // }

        for (let i = 0; i < subItem.length; i++) {
            if (!subItem[i].contains(target)) {
                subItem[i].classList.remove('active');
            }
        }

    }

    for (let i = 0; i < subMenuMoreBtns.length; i++) {
        subMenuMoreBtns[i].addEventListener('click', function() {
            const parentItem = subMenuMoreBtns[i].parentElement;
            if (parentItem.classList.contains('active')) {
                parentItem.classList.remove('active');
            } else {
                parentItem.classList.add('active');
            }
        });
    }

    for (let i = 0; i < textMore.length; i++) {
        textMore[i].addEventListener('click', function () {
            const textMoreLabel = {
                ru : {
                    'more': 'БОЛЬШЕ',
                    'less': 'МЕНЬШЕ',
                },
                en : {
                    'more': 'MORE',
                    'less': 'LESS',
                }
            }

            const currentTextMore = document.getElementById(textMore[i].dataset.id);
            console.log(textMore[i].dataset.loc)
            if(currentTextMore){
                if(currentTextMore.style.display === 'none') {
                    currentTextMore.style.display = 'block'
                    textMore[i].innerText = textMoreLabel[textMore[i].dataset.loc]['less']
                }
                else {
                    textMore[i].innerText = textMoreLabel[textMore[i].dataset.loc]['more'];
                    currentTextMore.style.display = 'none';
                }
            }
        });
    }

    for (let i = 0; i < langItem.length; i++) {
        langItem[i].addEventListener('click', function () {
            const allItems = langItem[i].parentElement.querySelectorAll('.lang-item');
            for (let j = 0; j < allItems.length; j++) {
                allItems[j].classList.remove('active');
            }
            langItem[i].classList.add('active');
        });
    }

    for (let i = 0; i < selectOption.length; i++) {
        selectOption[i].addEventListener('click', function () {
            const value = selectOption[i].innerHTML;
            const currentSelect = selectOption[i].closest('.select');
            const selectOptions = currentSelect.querySelectorAll('.select-option');
            currentSelect.querySelector('.select-input__value').innerHTML = value;
            currentSelect.classList.remove('active');
            for (let j = 0; j < selectOptions.length; j++) {
                selectOptions[j].classList.remove('selected');
            }
            selectOption[i].classList.add('selected');
        });
    }

    for (let i = 0; i < countryItem.length; i++) {
        countryItem[i].addEventListener('click', function () {
            const countryName = countryItem[i].querySelector('.country-name').textContent;
            const countryFlag = countryItem[i].querySelector('.flag-img').innerHTML;
            const selectOptions = selectCountryDropdown.querySelectorAll('.select-country__lists-item');
            if (countryName && countryFlag) {
                for (let j = 0; j < selectOptions.length; j++) {
                    selectOptions[j].classList.remove('selected');
                }
                countryItem[i].classList.add('selected');
                selectCountryValue.value = countryName;
                selectCountryIcon.innerHTML = countryFlag;
                selectCountryItem.classList.add('selected');
                selectCountry.classList.remove('active');
                body.classList.remove('select-country-open');
            }

        });
    }

    for (let i = 0; i < sortOptionsItem.length; i++) {
        sortOptionsItem[i].addEventListener('click', function () {
            const value = sortOptionsItem[i].querySelector('.sort-option__value').innerHTML;
            const selectOptions = sortDropdown.querySelectorAll('.sort-option');
            for (let j = 0; j < selectOptions.length; j++) {
                selectOptions[j].classList.remove('selected');
            }
            sortOptionsItem[i].classList.add('selected');
            sortItemSelect.querySelector('.sort-item-value').innerHTML = value;
            sortDropdown.classList.remove('active')
        });
    }

    document.addEventListener('mouseup', checkTargetHundler);
    if (burgerMenuBtn) {
        burgerMenuBtn.addEventListener('click', openMobileMenu);
    }
    if (closeMenuBtn) {
        closeMenuBtn.addEventListener('click', closeMobileMenu);
    }
    if (removeCountryBtn) {
        removeCountryBtn.addEventListener('click', removeSelectedCountry);
    }
    if (selectCountryItem) {
        selectCountryItem.addEventListener('click', countryDropdownToggle);
    }
    if (sortItemSelect) {
        sortItemSelect.addEventListener('click', sortDropdownToggle);
    }
    if (closeCountryModal) {
        closeCountryModal.addEventListener('click', countryModalClose);
    }

    const waypoint = document.querySelectorAll('.waypoint');
    const trackItems = document.querySelectorAll('.track-item');

    for (let i = 0; i < trackItems.length; i++) {
        trackItems[i].addEventListener('click', function(e) {
            e.preventDefault();
            const yOffset = -30;
            const id = trackItems[i].dataset.track;
            const element = document.getElementById(id);
            const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;
            window.scroll({
                top: y,
                behavior: 'smooth'
            });

        });
    }

    for (let i = 0; i < waypoint.length; i++) {
        new Waypoint({
            element: waypoint[i],
            handler: function (direction) {
                const currentPointId = this.element.id;
                for (let j = 0; j < trackItems.length; j++) {
                    const trackItemAnchor = trackItems[j].dataset.track;
                    if (currentPointId === trackItemAnchor) {
                        for (let k = 0; k < trackItems.length; k++) {
                            trackItems[k].classList.remove('active');
                        }
                        if (j === 0 && direction === 'up' || direction === 'down') {
                            trackItems[j].classList.add('active');
                        } else {
                            trackItems[j - 1].classList.add('active');
                        }
                    }
                }
            },
            offset: 30
        })
    }


    // Accordion
    const accordTitles = document.querySelectorAll('.accordion-title');
    const accordItems = document.querySelectorAll('.accordion-item');
    const accordContent = document.querySelectorAll('.accordion-content');

    function clearAccordion() {
        for (var i = 0; i < accordItems.length; i++) {
            accordItems[i].classList.remove('accordion-active');
        }
        for (var i = 0; i < accordContent.length; i++) {
            accordContent[i].style.display = 'none';
        }
    }
    for (let index = 0; index < accordTitles.length; index++) {
        accordTitles[index].addEventListener('click', function () {
            const blockFaq = accordTitles[index].parentElement;
            if (!blockFaq.classList.contains('accordion-active')) {
                clearAccordion();
                blockFaq.classList.add('accordion-active');
                blockFaq.querySelector('.accordion-content').style.display = 'block';
            } else {
                clearAccordion();
            }
        });
    }

    const allTooltip = document.querySelectorAll('.tooltip');
    if (allTooltip) {
        // tippy(allTooltip, {
        //     content(reference) {
        //         const id = reference.getAttribute('data-template');
        //         const template = document.getElementById(id);
        //         return template.innerHTML;
        //     },
        //     trigger: 'click',
        //     allowHTML: true,
        //     placement: 'bottom',
        //     maxWidth: 242
        // });
    }

    // Modal
    const modalTriggers = document.querySelectorAll('.popup-trigger')
    const modalCloseTrigger = document.querySelectorAll('.popup-modal__close')
    const bodyBlackout = document.querySelector('.body-blackout')

    function closeModal() {
        document.querySelector('.popup-modal.is--visible').classList.remove('is--visible')
        bodyBlackout.classList.remove('is-blacked-out')
    }

    // bodyBlackout.addEventListener('click', () => {
    //     closeModal()
    // })

    modalCloseTrigger.forEach(trigger => {
        trigger.addEventListener('click', () => {
            closeModal()
        })
    })
    var print = document.querySelector('#print');
    if (print){
        print.addEventListener('click',  () => {
            window.print();
        })
    }

    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault()
            const { popupTrigger } = trigger.dataset
            const popupModal = document.querySelector(`[data-popup-modal="${popupTrigger}"]`)
            var text = document.getElementById("inputText");
            text.select();
            document.execCommand("copy");
            popupModal.classList.add('is--visible')
            bodyBlackout.classList.add('is-blacked-out')

        })
    })

    const closeCookieBtns = document.querySelectorAll('.close-cookie')
    const acceptCookieBtns = document.querySelectorAll('.accept-cookie')
    const popupCookie = document.querySelector('.popup-cookie')

    closeCookieBtns.forEach(closeCookieBtn => {
        closeCookieBtn.addEventListener('click', () => {
            document.cookie = 'cookie-accepted=false'
            // popupCookie.classList.remove('is--visible')
        })
    })
    acceptCookieBtns.forEach(acceptCookieBtns => {
        acceptCookieBtns.addEventListener('click', () => {
            document.cookie = 'cookie-accepted=true'
            popupCookie.classList.remove('is--visible')
        })
    })
    if (document.cookie.split(';').filter((item) => item.includes('cookie-accepted')).length) {
        popupCookie.classList.remove('is--visible');
    } else {
        // popupCookie.classList.add('is--visible');
    }

});

// Dynamic Adapt v.1
// HTML data-da="where(uniq class name),position(digi),when(breakpoint)"
// e.x. data-da="item,2,992"

'use strict';

(function () {
    let originalPositions = [];
    let daElements = document.querySelectorAll('[data-da]');
    let daElementsArray = [];
    let daMatchMedia = [];
    //Заполняем массивы
    if (daElements.length > 0) {
        let number = 0;
        for (let index = 0; index < daElements.length; index++) {
            const daElement = daElements[index];
            const daMove = daElement.getAttribute('data-da');
            if (daMove != '') {
                const daArray = daMove.split(',');
                const daPlace = daArray[1] ? daArray[1].trim() : 'last';
                const daBreakpoint = daArray[2] ? daArray[2].trim() : '767';
                const daType = daArray[3] === 'min' ? daArray[3].trim() : 'max';
                const daDestination = document.querySelector('.' + daArray[0].trim())
                if (daArray.length > 0 && daDestination) {
                    daElement.setAttribute('data-da-index', number);
                    //Заполняем массив первоначальных позиций
                    originalPositions[number] = {
                        "parent": daElement.parentNode,
                        "index": indexInParent(daElement)
                    };
                    //Заполняем массив элементов
                    daElementsArray[number] = {
                        "element": daElement,
                        "destination": document.querySelector('.' + daArray[0].trim()),
                        "place": daPlace,
                        "breakpoint": daBreakpoint,
                        "type": daType
                    }
                    number++;
                }
            }
        }
        dynamicAdaptSort(daElementsArray);

        //Создаем события в точке брейкпоинта
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daBreakpoint = el.breakpoint;
            const daType = el.type;

            daMatchMedia.push(window.matchMedia("(" + daType + "-width: " + daBreakpoint + "px)"));
            daMatchMedia[index].addListener(dynamicAdapt);
        }
    }
    //Основная функция
    function dynamicAdapt(e) {
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daElement = el.element;
            const daDestination = el.destination;
            const daPlace = el.place;
            const daBreakpoint = el.breakpoint;
            const daClassname = "_dynamic_adapt_" + daBreakpoint;

            if (daMatchMedia[index].matches) {
                //Перебрасываем элементы
                if (!daElement.classList.contains(daClassname)) {
                    let actualIndex = indexOfElements(daDestination)[daPlace];
                    if (daPlace === 'first') {
                        actualIndex = indexOfElements(daDestination)[0];
                    } else if (daPlace === 'last') {
                        actualIndex = indexOfElements(daDestination)[indexOfElements(daDestination).length];
                    }
                    daDestination.insertBefore(daElement, daDestination.children[actualIndex]);
                    daElement.classList.add(daClassname);
                }
            } else {
                //Возвращаем на место
                if (daElement.classList.contains(daClassname)) {
                    dynamicAdaptBack(daElement);
                    daElement.classList.remove(daClassname);
                }
            }
        }
        //customAdapt();
    }

    //Вызов основной функции
    dynamicAdapt();

    //Функция возврата на место
    function dynamicAdaptBack(el) {
        const daIndex = el.getAttribute('data-da-index');
        const originalPlace = originalPositions[daIndex];
        const parentPlace = originalPlace['parent'];
        const indexPlace = originalPlace['index'];
        const actualIndex = indexOfElements(parentPlace, true)[indexPlace];
        parentPlace.insertBefore(el, parentPlace.children[actualIndex]);
    }
    //Функция получения индекса внутри родителя
    function indexInParent(el) {
        var children = Array.prototype.slice.call(el.parentNode.children);
        return children.indexOf(el);
    }
    //Функция получения массива индексов элементов внутри родителя
    function indexOfElements(parent, back) {
        const children = parent.children;
        const childrenArray = [];
        for (let i = 0; i < children.length; i++) {
            const childrenElement = children[i];
            if (back) {
                childrenArray.push(i);
            } else {
                //Исключая перенесенный элемент
                if (childrenElement.getAttribute('data-da') == null) {
                    childrenArray.push(i);
                }
            }
        }
        return childrenArray;
    }
    //Сортировка объекта
    function dynamicAdaptSort(arr) {
        arr.sort(function (a, b) {
            if (a.breakpoint > b.breakpoint) {
                return -1
            } else {
                return 1
            }
        });
        arr.sort(function (a, b) {
            if (a.place > b.place) {
                return 1
            } else {
                return -1
            }
        });
    }
    //Дополнительные сценарии адаптации
    function customAdapt() {
        //const viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    }
}());

// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
window.addEventListener('resize', () => {
    // We execute the same script as before
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});

