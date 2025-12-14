<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        h1 {
            margin: 0;
            font-size: 28px;
        }
        
        .subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin-top: 8px;
        }
        
        .tasks-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 30px;
        }
        
        .task {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 25px;
            border-left: 5px solid #2575fc;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .task:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        
        .task h2 {
            color: #2575fc;
            margin-top: 0;
            font-size: 20px;
        }
        
        .task-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }
        
        .example {
            background-color: #eef4ff;
            padding: 12px;
            border-radius: 6px;
            font-size: 14px;
            margin: 15px 0;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }
        
        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #6a11cb;
            box-shadow: 0 0 0 2px rgba(106, 17, 203, 0.1);
        }
        
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        .btn {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
        }
        
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f0f9ff;
            border-radius: 6px;
            border-left: 4px solid #2575fc;
            font-weight: 500;
            display: none;
        }
        
        .result.show {
            display: block;
            animation: fadeIn 0.5s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .perfect-numbers-list {
            font-family: monospace;
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            font-size: 14px;
        }
        
        footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 14px;
            border-top: 1px solid #eee;
        }
        
        @media (max-width: 768px) {
            .tasks-container {
                grid-template-columns: 1fr;
            }
            
            header {
                padding: 20px;
            }
            
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Решение трех задач на PHP</h1>
            <div class="subtitle">Введите данные для каждой задачи и получите результат</div>
        </header>
        
        <div class="tasks-container">
            <div class="task">
                <h2>Задача 1: Алфавитный порядок</h2>
                <div class="task-description">
                    Функция <code>alphabeticalOrder(str)</code> возвращает переданную строку с буквами в алфавитном порядке.
                </div>
                <div class="example">
                    <strong>Пример:</strong> 'alphabetical' → 'aaabcehilipt'
                </div>
                
                <form method="POST">
                    <div class="input-group">
                        <label for="str1">Введите строку:</label>
                        <input type="text" id="str1" name="str1" placeholder="alphabetical" value="<?php echo isset($_POST['str1']) ? htmlspecialchars($_POST['str1']) : ''; ?>">
                    </div>
                    
                    <button type="submit" name="task1" class="btn">Выполнить задачу 1</button>
                    
                    <?php
                    if (isset($_POST['task1']) && !empty($_POST['str1'])) {
                        $str = $_POST['str1'];
                        $result1 = alphabeticalOrder($str);
                        echo '<div class="result show">Результат: <strong>' . htmlspecialchars($result1) . '</strong></div>';
                    }
                    ?>
                </form>
            </div>
            
            <div class="task">
                <h2>Задача 2: Идеальные числа</h2>
                <div class="task-description">
                    Найти идеальные числа в массиве. Идеальное число — положительное целое число, равное сумме своих положительных делителей (исключая само число).
                </div>
                
                <form method="POST">
                    <div class="input-group">
                        <label for="numbers">Введите числа через запятую:</label>
                        <input type="text" id="numbers" name="numbers" placeholder="6, 12, 28, 10, 496" value="<?php echo isset($_POST['numbers']) ? htmlspecialchars($_POST['numbers']) : ''; ?>">
                    </div>
                    
                    <button type="submit" name="task2" class="btn">Найти идеальные числа</button>
                    
                    <?php
                    if (isset($_POST['task2']) && !empty($_POST['numbers'])) {
                        $input = $_POST['numbers'];
                        $numbersArray = array_map('intval', array_map('trim', explode(',', $input)));
                        $perfectNumbers = findPerfectNumbers($numbersArray);
                        
                        echo '<div class="result show">';
                        if (empty($perfectNumbers)) {
                            echo 'В массиве нет идеальных чисел';
                        } else {
                            echo 'Найдены идеальные числа: <div class="perfect-numbers-list">' . implode(', ', $perfectNumbers) . '</div>';
                            echo '<div style="margin-top:10px; font-size:14px;">';
                            foreach ($perfectNumbers as $num) {
                                $divisors = getDivisors($num);
                                $divisorsSum = array_sum($divisors) - $num;
                                echo "Число $num: делители (" . implode(', ', $divisors) . "), сумма делителей без числа = $divisorsSum<br>";
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                    ?>
                </form>
            </div>
            
            <div class="task">
                <h2>Задача 3: Самое частое слово</h2>
                <div class="task-description">
                    Найти самое часто встречающееся слово в тексте. Текст должен содержать не более 1000 символов.
                </div>
                
                <form method="POST">
                    <div class="input-group">
                        <label for="text">Введите текст (до 1000 символов):</label>
                        <textarea id="text" name="text" placeholder="Введите текст для анализа" maxlength="1000"><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea>
                    </div>
                    
                    <button type="submit" name="task3" class="btn">Найти самое частое слово</button>
                    
                    <?php
                    if (isset($_POST['task3']) && !empty($_POST['text'])) {
                        $text = $_POST['text'];
                        if (strlen($text) > 1000) {
                            echo '<div class="result show" style="border-left-color:#ff4757;">Текст превышает 1000 символов. Пожалуйста, введите текст короче.</div>';
                        } else {
                            $mostFrequent = mostRecent($text);
                            echo '<div class="result show">Самое частое слово: <strong>' . htmlspecialchars($mostFrequent['word']) . '</strong><br>';
                            echo 'Количество повторений: <strong>' . $mostFrequent['count'] . '</strong></div>';
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
        
        <footer>
            <p>Решение трех задач на PHP &copy; 2023</p>
        </footer>
    </div>

    <?php
    function alphabeticalOrder($str) {
        $chars = str_split($str);
        sort($chars);
        return implode('', $chars);
    }
    
    function isPerfectNumber($num) {
        if ($num <= 1) return false;
        
        $divisorsSum = 0;
        for ($i = 1; $i <= $num / 2; $i++) {
            if ($num % $i == 0) {
                $divisorsSum += $i;
            }
        }
        
        return $divisorsSum == $num;
    }
    
    function getDivisors($num) {
        $divisors = [];
        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {
                $divisors[] = $i;
            }
        }
        return $divisors;
    }
    
    function findPerfectNumbers($numbers) {
        $perfectNumbers = [];
        foreach ($numbers as $number) {
            if (isPerfectNumber($number)) {
                $perfectNumbers[] = $number;
            }
        }
        return $perfectNumbers;
    }
    
    function mostRecent($text) {
        $cleanText = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text);
        $cleanText = mb_strtolower($cleanText, 'UTF-8');
        
        $words = preg_split('/\s+/', $cleanText, -1, PREG_SPLIT_NO_EMPTY);
        
        $wordCount = [];
        foreach ($words as $word) {
            if (!empty($word)) {
                if (isset($wordCount[$word])) {
                    $wordCount[$word]++;
                } else {
                    $wordCount[$word] = 1;
                }
            }
        }
        
        $maxCount = 0;
        $mostFrequentWord = '';
        
        foreach ($wordCount as $word => $count) {
            if ($count > $maxCount) {
                $maxCount = $count;
                $mostFrequentWord = $word;
            }
        }
        
        return ['word' => $mostFrequentWord, 'count' => $maxCount];
    }
    ?>
</body>
</html>