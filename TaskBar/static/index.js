let testItems,
    taskBar = $(".task_bar_box_content")[0],
    taskBarHeader = $(".task_bar_box_header")[0],
    taskBarBoxContent = $(".task_bar_box_content")[0],
    taskBarHeaderColumnWidth = getTaskBarHeaderColumnsWidth();



function getTaskBarHeaderColumnsWidth() {
  return [...taskBarHeader.children].map(column => getComputedStyle(column).width);  
}

testItems = [
    {
        num: 96752,
        theme: "Тест 01-02-34",
        status: "0. Формирование предложения",
        dateOfCompletion: "2024-02-03",
        customer: "ABC Реклама",
        node: "Текущий статус: След. шаги",
        salePlan: "",
        account: "",
        sales: "",
        quarter: "1Q-2",
        year: "2024"
    }
];

function addItemsInTaskContent() {
  for (let i = 0; i < testItems.length; i++) {
    task = document.createElement("div");
    task.classList.add("task");

    let j = 0;
    for (value of Object.values(testItems[i])) {
      divColumn = document.createElement("div");  
      p = document.createElement("p");
      
      p.innerText = value;
      divColumn.style.width = taskBarHeaderColumnWidth[j];

      divColumn.appendChild(p);
      task.appendChild(divColumn);
      j++;
    }

    taskBarBoxContent.appendChild(task);
  }
}

function dragDropAndEnter(e) {
  if (e.type === "dragenter") {
    this.classList.add("active_upload_win");
  }

  if (e.type === "dragleave") {
    this.classList.remove("active_upload_win");
  }
}

function addEvent() {

}

addItemsInTaskContent();
addEvent();