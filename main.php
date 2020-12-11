<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="node_modules/chart.js/dist/Chart.js"></script>
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <script src="main.js"></script> -->
    <script src="vue.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" id="test">
        <div class="form-group">
            <label for="inputDate">Введите дату начала:</label>
            <input type="date" class="form-control" id="start" v-model="min">
        </div>
        <div class="form-group">
            <label for="inputDate">Введите дату конца:</label>
            <input type="date" class="form-control" id="end" v-model="max">
        </div>
        <button class="btn btn-primary" v-on:click="chart">Проверка</button>
        <canvas id="myChart" width="200" height="200"></canvas></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>
        //Работаем  с данными и с DOM страницы через vue.js, это дает рекативность и удобный доступ к слушателям onclikc и т.д.
        var data = new Vue({
            el: '#test',
            data: {
                period: [],
                Amount: [],
                min: '',
                max: '',
            },
            methods: {
                chart: function() {
                    // 1. Создаём новый XMLHttpRequest-объект
                    let xhr = new XMLHttpRequest();
                    var date_arr = []; //Массив периодов
                    var prod = [];//массив значений
                    let formData = new FormData()
                    formData.append('min', data.min); // добавляем поле
                    formData.append('max', data.max); // добавляем поле
                    // 2. Настраиваем его: GET-запрос по URL /article/.../load
                    xhr.open('POST', '/getorderbydate');
                    xhr.responseType = 'json';
                    // 3. Отсылаем запрос
                    xhr.send(formData);

                    // 4. Этот код сработает после того, как мы получим ответ сервера
                    xhr.onload = function() {
                        if (xhr.status != 200) { 
                            // анализируем HTTP-статус ответа, если статус не 200, то произошла ошибка
                            alert(`Ошибка ${xhr.status}: ${xhr.statusText}`); // Например, 404: Not Found
                        } else { 
                            //Сервер не выдал ошибки
                            xhr.response.forEach(function(item, i, arr) { //распределяем полученные данные по массивам
                                date_arr.push(item.Period.date);
                                prod.push(item.Sum)
                            });
                            data.period = date_arr;//Рективируем данные во vue
                            data.Amount = prod//Рективируем данные во vue

                            //Строим график
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: data.period,//Данные из vue
                                    datasets: [{
                                        label: 'Сумма продаж',
                                        data: data.Amount,//Данные из vue
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        }
                    };
                    xhr.onerror = function() {
                        console.log("Запрос не удался");
                    };
                }
            }
        })
    </script>

</body>

</html>