<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width;height=device-height"/>
        <link rel="stylesheet" href="./static/taskFind.css"/>
    </head>
    <body>
        <header>
            <h1>Поиск задач</h1>
            
            <div>
                <a>Главная</a>
                <p>/</p>
                <p>Поиск задач</p>
            </div>
        </header>

        <main>
            <div class="project">
                <div>
                    <div>
                        <p>Ответственный</p>
                        <select></select>
                    </div>

                    <div>
                        <p>Проект</p>
                        <select></select>
                    </div>

                    <div>
                        <p>Тарификация</p>
                        <select>
                            <option>Все</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <div>
                        <p>Дата начала</p>
                        <input type="date"/>
                    </div>

                    <div>
                        <p>Дата выполнения</p>
                        <input type="date"/>
                    </div>

                    <div>
                        <p>Задачи</p>
                        <select>
                            <option>Закрытые</option>
                        </select>
                    </div>

                    <input type="button" value="Показать задачи"/>
                </div>
            </div>

            <div class="responsible">
                <div class="responsible_header">
                    <p>Все ответственные</p>
                    
                    <div>
                        <div>
                            <p>Закрыто: 777</p>
                        </div>
                        
                        <div>
                            <p>Время план: 466.4</p>
                        </div>
                        
                        <div>
                            <p>Время факт: 637.63</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="./static/taskFind.js"></script>
    </body>
</html>