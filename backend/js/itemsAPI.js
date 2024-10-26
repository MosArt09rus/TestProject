document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    // Получаем значения из полей ввода
    const name = document.getElementById('name').value;
    const page = document.getElementById('page').value;

    // Создаем URL для API
    const apiUrl = `http://testproject/api/items.php/?name=${encodeURIComponent(name)}&page=${encodeURIComponent(page)}`;

    // Открываем новую страницу с результатами
    window.open(apiUrl, '_blank');
});
