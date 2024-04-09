<link rel="stylesheet" href="./static/wrapper.css"/>

<div class="wrapper">
    <div class="task_window">
        <div class="task_window_header">
            <div class="header_information_task">
                <p>№ 95732 / Автор: Астахов Павел Владимирович / Создана: 18.01.2024</p>
            </div>
                    
            <div class="close_task">
                <?php require("./icons/Закрыть.svg");?>
            </div>
        </div>

        <div class="task_window_content">
            <div>
                <div>
                    <p class="task_name">тестовая задача 3</p>
                    <textarea></textarea>
                    <p>Текущий статус:</p>
                    <p class="next_steps">След. шаги:</p>
                    <textarea></textarea>
                </div>

                <div class="task_comment">
                    <div class="task_comment_window"></div>
                    <textarea placeholder="Комментировать..." class="comment_input"></textarea>
                    <div class="upload_file_and_accept">
                        <label for="file_upload" class="custom_file_upload">
                            <?php require("./icons/Скрепка.svg");?>
                        </label>

                        <input id="file_upload" type="file">

                        <div class="upload_win">
                            <p>Перетащите сюда файлы для загрузки</p>
                        </div>

                        <div class="accept_comment">
                            <p>Отправить</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="primary_task">
                    <input type="checkbox"/>
                    <p>Важная задача</p>
                </div>
                
                <div class="customer">
                    
                </div>
                
                <div class="status"></div>
                
                <div></div>
            </div>
        </div>
    </div>
</div>

<script src="./static/wrapper.js"></script>