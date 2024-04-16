let calendarBtns = $(".calendar_btn"),
    directorLst = $(".director_lst")[0],
    executorLst = $(".executor_lst")[0],
    taskTypeLst = $(".task_type_lst")[0],
    projectsLst = $(".projects_lst")[0];


function setDatepickers() {
  [".date_inp_start", ".date_inp_completion", ".deadline_inp_date"].forEach((datepickerClass) => {
    new AirDatepicker(datepickerClass, {
      timepicker: true
    })
  })
}

function openAndCloseLst(e) {
  let lstBtn = e.currentTarget,
      lst = lstBtn.nextElementSibling;

  function checkAndCloseOthersLst() {
    let openedLst = $(".selection_lst").filter((_, lst) => {
      return getComputedStyle(lst).display !== "none";
    });

    for (let i = 0; i < openedLst.length; i++) {
      openedLst[i].previousElementSibling.classList.toggle("rotated");
      openedLst[i].removeAttribute("style");
    }
  }

  lstBtn.classList.toggle("rotated");

  if (getComputedStyle(lst).display === "none") {
    checkAndCloseOthersLst();
    lst.style.display = "flex";
  } else {
    lst.removeAttribute("style");
  }
}

function selectLstOption(option, input, lst) {
  let lstOptionTxt = option.innerText;

  if (lstOptionTxt === "Ничего") {
    input.value = "";
  } else {
    input.value = lstOptionTxt;
  }

  lst.style.display = "none";
  input.parentNode.classList.toggle("rotated");
}

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
setDatepickers();