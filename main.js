function LD() {
    // 1. Создаём новый XMLHttpRequest-объект
    let xhr = new XMLHttpRequest();
    var date_arr = [];
    var prod = [];
    let result = [];

    // 2. Настраиваем его: GET-запрос по URL /article/.../load
    xhr.open('POST', '/getorderbydate');
    xhr.responseType = 'json';
    // 3. Отсылаем запрос
    xhr.send();
    // 4. Этот код сработает после того, как мы получим ответ сервера
    xhr.onload = function() {
        if (xhr.status != 200) { // анализируем HTTP-статус ответа, если статус не 200, то произошла ошибка
            alert(`Ошибка ${xhr.status}: ${xhr.statusText}`); // Например, 404: Not Found
        } else { // если всё прошло гладко, выводим результат
            console.log('Удачно'); // response -- это ответ сервера
            xhr.response.forEach(function(item, i, arr) {
                date_arr.push(item.Period.date);
                prod.push(item.Sum)
            });
        }
    };



    console.log(date_arr.sort());
    console.log(prod.sort());
    xhr.onerror = function() {
        alert("Запрос не удался");
    };
    result.push(date_arr);
    result.push(prod);
    return result;
}