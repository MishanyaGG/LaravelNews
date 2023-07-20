var listFilter = document.getElementById('listFilter');

function onchangeSelectFilter(){
    if (listFilter.value == 'new')
        window.location.href = '/';
    if (listFilter.value == 'old')
        window.location.href = '../old';
}

// Получаем кнопку с удалением категории
var btnDelete = document.getElementById('btnDelete');

// Записываем в переменную текст из кнопки, который по умолчанию
var contentBtnDelete = btnDelete.textContent;

// Записываем в переменную ссылку кнопки, который по умолчанию
var hrefBtnDelete = btnDelete.href;

// Что бы при запуске страницы корректно работала кнопка с удалением
btnDelete.href = '/';

// Получаем кнопку с изменением категории
var btnUpdate = document.getElementById('btnUpdate');

// Записываем в переменную текст из кнопки, который по умолчанию
var contentBtnUpdate = btnUpdate.textContent;

// Записываем в переменную ссылку кнопки, который по умолчанию
var hrefbtnUpdate = btnUpdate.href;

// Что бы при запуске страницы корректно работала кнопка с изменением
btnUpdate.href = '/';

// Получаем список категорий
var categories = document.getElementById('id_categories');

function onchancheCategory(){

    // Записываем ссылку, которая по умолчанию была на кнопке
    btnUpdate.href = hrefbtnUpdate;

    // Записываем текст, который был по умолчанию на кнопке (необходим для обнуления значения)
    btnUpdate.textContent = contentBtnUpdate;

    // Записываем ссылку, которая по умолчанию была на кнопке
    btnDelete.href = hrefBtnDelete;

    // Записываем текст, который был по умолчанию на кнопке (необходим для обнуления значения)
    btnDelete.textContent = contentBtnDelete;

    // Получаем значение выбранного элемента
    var value = categories.value;

    // Получаем текст выбранного элемента
    var text = categories.options[categories.selectedIndex].text;

    // Добавляем к кнопке текст
    btnUpdate.textContent += " ("+ text + ")";
    // Изменяем ссылку кнопки
    btnUpdate.href += "/"+value;

    // Добавляем к кнопке текст
    btnDelete.textContent += " ("+ text + ")";

    // Изменяем ссылку кнопки
    btnDelete.href += "/"+value;
}
