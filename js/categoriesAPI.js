document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    // Получаем значения из полей ввода
    const name = document.getElementById('name').value;

    // Создаем URL для API
    const apiUrl = `http://testproject/api/categories.php/?name=${encodeURIComponent(name)}`;

    // Открываем новую страницу с результатами
    window.open(apiUrl, '_blank');
});
