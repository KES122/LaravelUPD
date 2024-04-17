<html>
    <head>
        <title>Поиск задач</title>
        <link rel="stylesheet" href="./static/taskFind.css"/>
        <link rel="stylesheet" href="./static/air-datepicker.css"/>
        <script src="./static/air-datepicker.js"></script>
        
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous">
        </script>
    </head>
    
    <body>
        <main>
            <div>
                <h2>Поиск задач</h2>
                
                <nav>
                    <a href="./index.php" class="home">Главная</a>
                    <p>/</p>
                    <p>Поиск задач</p>
                </nav>
            </div>

            <div>
                <div class="task_properties">
                    <div>
                        <div class="responsible_box">
                            <p>Ответственный</p>

                            <label class="open_and_close_btn">
                                <input type="text" class="selection_btn" readonly="readonly"/>
                            </label>

                            <div class="selection_lst responsible_lst">
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
                                
                                <div>
                                    <p>Подменю 5</p>
                                </div>
                            </div>
                        </div>

                        <div class="project_box">
                            <p>Проект</p>

                            <label class="open_and_close_btn">
                                <input type="text" class="selection_btn" readonly="readonly"/>
                            </label>

                            <div class="selection_lst project_lst">
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
                                
                                <div>
                                    <p>Подменю 5</p>
                                </div>
                            </div>
                        </div>

                        <div class="tarrification_box">
                            <p>Тарификация</p>

                            <label class="open_and_close_btn">
                                <input type="text" class="selection_btn" value="Все" readonly="readonly"/>
                            </label>

                            <div class="selection_lst tarrification_lst">
                                <div>
                                    <p>Все</p>
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
                                
                                <div>
                                    <p>Подменю 5</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="start_date_box">
                            <p>Дата начала</p>

                            <div>
                                <input type="text" id="start_date"/>
                                <label for="start_date" class="date_btn">
                                    <?php require("./icons/Календарь.svg");?>
                                </label>
                            </div>
                        </div>

                        <div class="date_of_completion_box">
                            <p>Дата выполнения</p>

                            <div>
                                <input type="text" id="date_of_completion" class="date_of_completion_inp"/>
                                <label for="date_of_completion" class="date_btn">
                                    <?php require("./icons/Календарь.svg");?>
                                </label>
                            </div>
                        </div>

                        <div class="task_box">
                            <p>Задачи</p>
                            
                            <label class="open_and_close_btn">
                                <input type="text" class="selection_btn" value="Закрытые" readonly="readonly"/>
                            </label>

                            <div class="selection_lst task_lst">
                                <div>
                                    <p>Закрытые</p>
                                </div>

                                <div>
                                    <p>Открытые</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <input type="button" value="Показать задачи" class="show_task"/>
                        </div>
                    </div>
                </div>

                <div class="all_responsible">
                    <div>
                        <p>Все ответственные</p>

                        <div class="close_time_plan_time_fact">
                            <div class="closed">
                                <div>
                                    <?php require("./icons/Два-Квадрата.svg");?>
                                </div>

                                <p>Закрыто:</p>
                                <p>696</p>
                            </div>
                            
                            <div class="time_plan">
                                <div>
                                    <?php require("./icons/Два-Квадрата.svg");?>
                                </div>

                                <p>Время план:</p>
                                <p>378.29</p>
                            </div>
                            
                            <div class="time_fact">
                                <div>
                                    <?php require("./icons/Часы.svg");?>
                                </div>

                                <p>Время факт:</p>
                                <p>559.93</p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="theme_table">
                            <div>
                                <div class="theme_btns">
                                    <input type="button" value="Copy">
                                    <input type="button" value="CSV">
                                    <input type="button" value="Excel">
                                    <input type="button" value="Print">
                                </div>

                                <div class="search">
                                    <p>Search:</p>
                                    <input type="text"/>
                                </div>
                            </div>

                            <div class="table">
                                <div class="table_head">
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>№</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Тема</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Ответственный</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Проект</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Дата<br>выполнения</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Время<br>запланированное</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Время<br>затраченное</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Кол-во или цена<br>выездов</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Связанность с<br>планом продаж</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>WIKI</span>
                                    </div>
                                    
                                    <div>
                                        <div class="sort_btns">
                                            <?php require("./icons/Стрелка.svg");?>
                                            <?php require("./icons/Стрелка.svg");?>
                                        </div>

                                        <span>Действия для <br>исключения<br>повтора<br>инцидента</span>
                                    </div>
                                </div>

                                <?php require("./tableDataAndPaginationBtns.php");?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="./static/selectionLstAndDatepicker.js"></script>
        <script src="./static/taskFind.js"></script>
    </body>
</html>