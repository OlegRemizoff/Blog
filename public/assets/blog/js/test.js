
// Данные приложения
const knowledgeBase = {
    themes: [
        {
            id: 1,
            name: "Тема 1",
            subthemes: [
                { id: 1.1, name: "Подтема 1.1" },
                { id: 1.2, name: "Подтема 1.2" },
                { id: 1.3, name: "Подтема 1.3" }
            ]
        },
        {
            id: 2,
            name: "Тема 2",
            subthemes: [
                { id: 2.1, name: "Подтема 2.1" },
                { id: 2.2, name: "Подтема 2.2" },
                { id: 2.3, name: "Подтема 2.3" }
            ]
        }
    ]
};
// DOM элементы
const themeList = document.getElementById('theme-list');
const subthemeList = document.getElementById('subtheme-list');
const contentArea = document.getElementById('content-area');

// Текущий выбор
let currentTheme = null;
let currentSubtheme = null;

// Обработчики событий
themeList.addEventListener('click', (e) => {
    if (e.target.classList.contains('theme-item')) {
        // Удаляем активный класс у всех тем
        document.querySelectorAll('.theme-item').forEach(item => {
            item.classList.remove('active');
        });

        // Добавляем активный класс к выбранной теме
        e.target.classList.add('active');

        // Получаем ID выбранной темы
        const themeId = parseFloat(e.target.getAttribute('data-theme'));
        currentTheme = knowledgeBase.themes.find(t => t.id === themeId);
        currentSubtheme = null;

        // Отображаем подтемы
        renderSubthemes();

        // Очищаем содержимое
        contentArea.innerHTML = '<div class="placeholder">Выберите подтему для просмотра содержимого</div>';
    }
});

subthemeList.addEventListener('click', (e) => {
    if (e.target.classList.contains('subtheme-item')) {
        // Удаляем активный класс у всех подтем
        document.querySelectorAll('.subtheme-item').forEach(item => {
            item.classList.remove('active');
        });

        // Добавляем активный класс к выбранной подтеме
        e.target.classList.add('active');

        // Получаем ID выбранной подтемы
        const subthemeId = parseFloat(e.target.getAttribute('data-subtheme'));
        currentSubtheme = currentTheme.subthemes.find(st => st.id === subthemeId);

        // Отображаем содержимое
        renderContent();
    }
});

// Функции рендеринга
function renderSubthemes() {
    if (!currentTheme) return;

    let html = '';
    currentTheme.subthemes.forEach(subtheme => {
        html += `<div class="item subtheme-item" data-subtheme="${subtheme.id}">${subtheme.name}</div>`;
    });

    subthemeList.innerHTML = html;
}

function renderContent() {
    if (!currentSubtheme) return;

    contentArea.innerHTML = `
                <p>Некий текст, привязанный к ${currentSubtheme.name}</p>
                <p>Это учебное содержимое для демонстрации работы приложения.</p>
                <p>Выбранная тема: ${currentTheme.name}</p>
                <p>Выбранная подтема: ${currentSubtheme.name}</p>
            `;
}