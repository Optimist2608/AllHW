<?php
require __DIR__ . '/vendor/autoload.php';

$nums = [
    "num1" => 0,
    "num2" => 0,
];
$operator = "+";
$result = 0;
$outputStr = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nums = [
        "num1" => $_POST["num1"],
        "num2" => $_POST["num2"]];

    foreach ($nums as $num) {
        if (is_null($num)) {
            throw  new ValueError("Ничего не передано");
        }
        if (!is_numeric($num)) {
            throw new TypeError("$num не является числом");
        }
    }
    $operator = $_POST["operator"];

    if ((int)$nums["num2"] === 0 && $operator === "/") {
        $result = "На ноль делить нельзя!";
    } else {
        $result = calculate($nums, $operator);
    }
    $outputStr = $nums["num1"] . " + " . $nums["num2"] . " = " . $result;
}
$optionChangeStatus = static function (string $currentOperator) use ($operator): string {
    return $operator === $currentOperator ? "selected" : "";
}
// пока что не трогал сам сайт туда не смотрите
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
    <link rel="stylesheet" href="/style/style.css"/>
    <link rel="stylesheet" href="/style/calc.css"/>
</head>
<body>
<?php require __DIR__ . '/components/header.php'; ?>
<main>
    <div class="calculator-container">
        <div class="calculator-title">✨ Калькулятор ✨</div>
        <form action="" method="post" class="calculator-form">
            <input id="num1" type="number" name="num1" class="calculator-input" placeholder="Число 1" required
                   value="<?= htmlspecialchars($nums["num1"]) ?>">
            <!-- Тип number закрывает много задач, при этом нельзя отправлять на сервер не верные результаты я считаю это плюсом -->

            <button type="button" class="calculator-input calc-btn" style="cursor: pointer" data-operation="+">+
            </button>
            <button type="button" class="calculator-input calc-btn" style="cursor: pointer" data-operation="-">-
            </button>
            <button type="button" class="calculator-input calc-btn" style="cursor: pointer" data-operation="*">*
            </button>
            <button type="button" class="calculator-input calc-btn" style="cursor: pointer" data-operation="/">/
            </button>

            <!-- <select name="operator" class="calculator-select">
                <option value="+" <?= htmlspecialchars($optionChangeStatus("+")) ?> >+</option>
                <option value="-" <?= htmlspecialchars($optionChangeStatus("-")) ?>>-</option>
                <option value="*" <?= htmlspecialchars($optionChangeStatus("*")) ?>>*</option>
                <option value="/" <?= htmlspecialchars($optionChangeStatus("/")) ?>>/</option>
            </select> -->

            <input id="num2" type="number" name="num2" class="calculator-input" placeholder="Число 2" required
                   value="<?= htmlspecialchars($nums["num2"]) ?>">
            <button type="submit" class="calculator-button">=</button>
            <input type="text" readonly name="result" class="calculator-input" placeholder="Результат"
                   value="<?= htmlspecialchars($result) ?>">
        </form>
        <p class="out-str"><?= htmlspecialchars($outputStr) ?></p>
    </div>
</main>
<script>
    const resultInput = document.querySelector('input[name="result"]');
    if (resultInput && resultInput.value) {
        resultInput.classList.add('result-animation');
        setTimeout(() => {
            resultInput.classList.remove('result-animation');
        }, 500);
    }

    //==================================================

    window.onload = function () {
        const buttons = document.querySelectorAll(".calc-btn")
        buttons.forEach(button => {
            button.addEventListener("click", () => {
                const num1 = document.querySelector("#num1").value;
                const num2 = document.querySelector("#num2").value;
                const operation = button.getAttribute("data-operation");
                (
                    async () => {
                        const response = await fetch(`?num1=${num1}&num2=${num2}&operator=${encodeURIComponent(operation)}&ajax`)
                        const result = await response.text()
                        console.log(result)
                    }
                )()
            })
        })

    }
</script>
</body>
</html>