<html>
    <head>
        <title>Добавить задачу</title>
        <link rel="stylesheet" href="./static/addTask.css"/>
    </head>
    <body>
        <div class="task_adding_form">
            <div class="task_name">
                <p>Название задачи</p>
                <?php require("./icons/Знак-вопроса.svg");?>
            </div>
            <input type="text" class="task_name_inp"/>

            <div class="time_spent_and_planned">
                <div class="time_spent">
                    <p>Время затраченное</p>
                    <input type="text"/>
                </div>

                <div class="time_planned">
                    <p>Время запланированное</p>
                    <input type="text" placeholder="0.33"/>
                </div>
            </div>

            <div class="director">
                <p>Постановщик</p>
                <?php require("./icons/Знак-вопроса.svg");?>
            </div>

            <label class="opened_and_close_btn">
                <input type="text" class="director_inp"/>
            </label>
        </div>

        <script src="./static/addTask.js"></script>
    </body>
</html>