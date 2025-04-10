<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1-ma'ruza mashg'uloti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(to bottom right, #e3f2fd, #ffffff);
            color: #333;
        }

        .header {
            background-color: #1976d2;
            color: white;
            padding: 16px 24px;
            font-size: 22px;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .main {
            display: flex;
            flex-wrap: wrap;
            padding: 24px;
            gap: 20px;
        }

        .left-section {
            flex: 2;
            display: flex;
            flex-direction: column;
            gap: 20px;
            min-width: 300px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .card p {
            margin-bottom: 12px;
            font-weight: 600;
        }

        .card label {
            display: block;
            margin: 8px 0;
            cursor: pointer;
        }

        .card input[type="radio"] {
            margin-right: 8px;
        }

        .right-section {
            flex: 1;
            min-width: 250px;
        }

        .answer-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .answer-title {
            font-weight: 700;
            margin-bottom: 16px;
            font-size: 18px;
        }

        .circles {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .circle {
            width: 36px;
            height: 36px;
            background-color: white;
            border: 2px solid #1976d2;
            border-radius: 50%;
            text-align: center;
            line-height: 32px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .circle.active {
            background-color: #1976d2;
            color: white;
        }

        .finish-btn {
            background-color: #1976d2;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.2s ease-in-out;
        }

        .finish-btn:hover {
            background-color: #145aa8;
        }

        @media (max-width: 768px) {
            .main {
                flex-direction: column;
            }

            .right-section {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="header">1-ma'ruza mashg'uloti.</div>

    <div class="main">
        <div class="left-section">
            <div class="card">
                <p>1. Какой элемент компьютерной системы используется для временного хранения данных?</p>
                <label><input type="radio" name="q1" onclick="selectAnswer(1)"> I/O</label>
                <label><input type="radio" name="q1" onclick="selectAnswer(1)"> CPU</label>
                <label><input type="radio" name="q1" onclick="selectAnswer(1)"> RAM</label>
                <label><input type="radio" name="q1" onclick="selectAnswer(1)"> ROM</label>
            </div>

            <div class="card">
                <p>2. Какой из нижеследующих элементов не является устройством хранения данных?</p>
                <label><input type="radio" name="q2" onclick="selectAnswer(2)"> АЛУ</label>
                <label><input type="radio" name="q2" onclick="selectAnswer(2)"> КЭШ</label>
                <label><input type="radio" name="q2" onclick="selectAnswer(2)"> ОЗУ</label>
                <label><input type="radio" name="q2" onclick="selectAnswer(2)"> Регистр</label>
            </div>

            <div class="card">
                <p>3. Какой элемент компьютерной системы используется для связи системы с внешними устройствами?</p>
                <label><input type="radio" name="q3" onclick="selectAnswer(3)"> I/O</label>
                <label><input type="radio" name="q3" onclick="selectAnswer(3)"> CPU</label>
                <label><input type="radio" name="q3" onclick="selectAnswer(3)"> RAM</label>
                <label><input type="radio" name="q3" onclick="selectAnswer(3)"> ROM</label>
            </div>
        </div>

        <div class="right-section">
            <div class="answer-box">
                <p class="answer-title">Javoblar</p>
                <div class="circles">
                    <span class="circle" id="c1">1</span>
                    <span class="circle" id="c2">2</span>
                    <span class="circle" id="c3">3</span>
                    <span class="circle" id="c4">4</span>
                    <span class="circle" id="c5">5</span>
                    <span class="circle" id="c6">6</span>
                </div>
                <button class="finish-btn">Yakunlash</button>
            </div>
        </div>
    </div>

    <script>
        function selectAnswer(questionNum) {
            const circle = document.getElementById('c' + questionNum);
            if (circle) {
                circle.classList.add('active');
            }
        }
    </script>
</body>

</html>