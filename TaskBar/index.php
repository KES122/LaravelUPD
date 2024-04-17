<html>
    <head>
        <title>Задачи</title>
        
        <link rel="stylesheet" href="./static/index.css"/>
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
                <div class="amount_of_unshipped_goods">
                    <div class="ruble">
                        <p>₽</p>
                    </div>

                    <div>
                        <p>Сумма неотгруженных товаров</p>
                        <p class="amount">0</p>
                    </div>
                </div>
            </div>
          
            <div>
                <div class="task_form">
                    <div class="task_search">
                        <p>Search:</p>
                        <input type="text" class="task_search_inp"/>
                    </div>

                    <div class="tasks_table">
                        <div class="table_head">
                            <div class="sort_btns">
                                <?php require("./icons/Стрелка.svg");?>
                                <?php require("./icons/Стрелка.svg");?>
                            </div>

                            <div class="task_num">
                                <p>№</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="theme">
                                <p>Тема</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="status">
                                <p>Статус задачи</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="date_of_completion">
                                <p>Дата выполнения</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="customer">
                                <p>Покупатель</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="note">
                                <p>Примечание</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="sales_plan">
                                <p>План продажа</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="check">
                                <p>Счет</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="implementation">
                                <p>Реализация</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="quarter">
                                <p>Квартал</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>

                            <div class="year">
                                <p>Год</p>

                                <div class="sort_btns">
                                    <?php require("./icons/Стрелка.svg");?>
                                    <?php require("./icons/Стрелка.svg");?>
                                </div>
                            </div>
                        </div>

                        <?php require("./tableDataAndPaginationBtns.php");?>
                    </div>
                </div>

                <div class="task_date_form"></div>
            </div>
        </main>

        <script src="./static/index.js"></script>
    </body>
</html>