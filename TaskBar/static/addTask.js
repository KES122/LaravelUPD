let calendarBtns = $(".calendar_btn"),
    directorLst = $(".director_lst")[0],
    executorLst = $(".executor_lst")[0],
    taskTypeLst = $(".task_type_lst")[0],
    projectsLst = $(".projects_lst")[0],
    datepickerArr = [".date_inp_start", ".date_inp_completion", ".deadline_inp_date"];

function selectExecutor(e) {
  let selectedLi = e.currentTarget,
      activeExecutor = executorLst.querySelector(".active_executor");

  if (activeExecutor !== null) {
    if (selectedLi === activeExecutor) {
      selectedLi.removeAttribute("class");
    } else {
      selectedLi.classList.add("active_executor");
      activeExecutor.removeAttribute("class");
    }
  } else {
    selectedLi.classList.add("active_executor");
  }
}

function addEvent() {
  [directorLst, executorLst, taskTypeLst, projectsLst].forEach((lst) => {
    let openAndCloseBtn = lst.previousElementSibling,
        input = openAndCloseBtn.querySelector("input");

    openAndCloseBtn.addEventListener("click", openAndCloseLst);

    [...lst.children].forEach((option) => {
      if (option.nodeName === "UL") {
        let i = 0;
        while (i < option.children.length) {
          option.children[i].addEventListener("click", selectExecutor);
          i++;
        }
      } else {
        option.addEventListener("click", () => {
          selectLstOption(option, input, lst);
        })
      }
    })
  })
}

addEvent();
setDatepickers(datepickerArr, {timepicker: true});