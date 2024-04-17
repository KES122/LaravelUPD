<html>
    <head>
        <title>Добавить задачу</title>
        <link rel="stylesheet" href="./static/addTask.css"/>
        <link rel="stylesheet" href="./static/air-datepicker.css"/>
        <link rel="stylesheet" type="text/css" media="all"
              href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css"/>

        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous">
        </script>

        <script src="./static/air-datepicker.js"></script>
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

            <label class="open_and_close_btn_director">
                <input type="text" class="director_inp"/>
            </label>

            <div class="selection_lst director_lst">
                <div>
                    <p>Ничего</p>
                </div>

                <div>
                    <p>Подменю 1</p>
                </div>

                <div>
                    <p>Подменю 2</p>
                </div>

                <div>
                    <p>Подменю 3</p>
                </div>

                <div>
                    <p>Подменю 4</p>
                </div>
            </div>

            <div class="executor">
                <p id="open_and_close_executor">Исполнители</p>
                
                <label for="open_and_close_executor">
                    <?php require("./icons/Треугольник2.svg");?>
                </label>
            </div>

            <div class="selection_lst executor_lst">
                <ul>
                    <li>Подменю 1</li>
                    <li>Подменю 2</li>
                    <li>Подменю 3</li>
                    <li>Подменю 4</li>
                    <li>Подменю 5</li>
                </ul>
            </div>

            <div class="start_and_completion_date">
                <div class="start_date">
                    <p>Дата начала</p>
                    
                    <div>
                        <input type="text" class="date_inp_start" id="date_start"/>
                        <label for="date_start" class="calendar_btn"></label>
                    </div>
                </div>

                <div class="completion_date">
                    <p>Дата выполнения</p>
                    
                    <div>
                        <input type="text" class="date_inp_completion" id="date_completion"/>
                        <label for="date_completion" class="calendar_btn"></label>
                    </div>
                </div>
            </div>

            <div class="deadline_date">
                <p>Дедлайн</p>

                <div>
                    <input type="text" class="deadline_inp_date", id="date_deadline"/>
                    <label for="date_deadline" class="calendar_btn"></label>
                </div>
            </div>

            <div class="description_box">
                <div>
                    <p class="description">Описание</p>
                    <input type="checkbox"/>
                    <p>Выезд</p>
                    <input type="checkbox"/>
                    <p>Важно</p>
                    <input type="checkbox"/>
                    <p>Продажи</p>
                    <input type="checkbox">
                    <p>Бэклог</p>
                </div>

                <textarea></textarea>
            </div>

            <p class="task_type">Тип задачи</p>

            <label class="open_and_close_type_task">
                <input type="text" class="task_type_inp"/>
            </label>

            <div class="selection_lst task_type_lst">
                <div>
                    <p>Ничего</p>
                </div>
                
                <div>
                    <p>Подменю 1</p>
                </div>
                
                <div>
                    <p>Подменю 2</p>
                </div>
                
                <div>
                    <p>Подменю 3</p>
                </div>
                
                <div>
                    <p>Подменю 4</p>
                </div>
            </div>

            <p class="projects">Проекты</p>

            <label class="open_and_close_projects">
                <input type="text" class="projects_inp"/>
            </label>

            <div class="selection_lst projects_lst">
                <div>
                    <p>Ничего</p>
                </div>
                
                <div>
                    <p>Подменю 1</p>
                </div>
                
                <div>
                    <p>Подменю 2</p>
                </div>
                
                <div>
                    <p>Подменю 3</p>
                </div>
                
                <div>
                    <p>Подменю 4</p>
                </div>
            </div>

            <p class="tarrification">Тарификация</p>
            <div class="tarrification_box">
                <div>
                    <input type="radio"/>
                    <p>Договор</p>
                </div>
                
                <div>
                    <input type="radio"/>
                    <p>Почасовая без сверхурочных</p>
                </div>
                
                <div>
                    <input type="radio"/>
                    <p>Почасовая со сверхурочными</p>
                </div>
            </div>

            <div class="create_task_btn">
                <p>Создать задачу</p>
            </div>
        </div>

        <script src="./static/selectionLstAndDatepicker.js"></script>
        <script src="./static/addTask.js"></script>
    </body>
</html>