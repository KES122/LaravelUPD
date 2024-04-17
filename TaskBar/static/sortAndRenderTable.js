let prev = $(".prev")[0],
    next = $(".next")[0],
    activePag = $(".active_pag")[0],
    activePagVal = +activePag.innerText,
    tableSize = 4,
    pagCount;

function getItemsCount() {
  let itemsCount = 15;

  // $.ajax() Получить кол-во всех элементов таблицы;

  pagCount = Math.ceil(itemsCount / tableSize);
}

function getTableAjaxData() {
  return {
    limit: tableSize,
    offset: (activePagVal - 1) * tableSize
  }
}

function changePagInf() {
  let [currentPag, endPag, size] = $(".pag_inf span");
  
  currentPag.innerText = activePagVal;
  endPag.innerText = pagCount;
  size.innerText = pagCount;
}

function checkActivePag() {
  if (activePagVal === 1 || prev.classList.contains("disabled_pag")) {
    prev.classList.toggle("disabled_pag");
  }

  if (activePagVal === pagCount || next.classList.contains("disabled_pag")) {
    next.classList.toggle("disabled_pag");
  }
}

function switchActivePag(e) {
  if (e.currentTarget === prev) activePagVal--;
  if (e.currentTarget === next) activePagVal++;

  activePag.innerText = activePagVal;
  getTableData("/getTableData", getTableAjaxData());

  checkActivePag();
  changePagInf();
}

function getTableData(url, ajaxData) {
  /*
    $.ajax({
      url: url,
      method: "POST",
      data: ajaxData,
      success(itemsArr) {   */
        renderTable(itemsArr);
  /*  }
    })
  */
}

function renderTable(itemsArr) {
  let table = $(".table_data")[0],
      headColumnsWidth = getHeadColumnsWidth();

  function getHeadColumnsWidth() {
    return $(".table_head").children().map((_, div) => getComputedStyle(div).width);
  }

  if (table.children.length > 0) {
    table.innerHTML = "";
  }

  itemsArr.forEach((item) => {
    let itemRow = document.createElement("div");

    itemRow.classList.add("item_row");

    item.forEach((itemStr, ind) => {
      let itemDiv = document.createElement("div"),
          itemP = document.createElement("p");

      itemP.innerText = itemStr;
      itemDiv.style.width = headColumnsWidth[ind];

      itemDiv.appendChild(itemP);
      itemRow.appendChild(itemDiv);
    });

    table.appendChild(itemRow);
    //table.style.width = getComputedStyle($(".table_head")[0]).width;
  })
}

function addEvent() {
  prev.addEventListener("click", switchActivePag);
  next.addEventListener("click", switchActivePag);  
}

addEvent();
getItemsCount();
changePagInf();
checkActivePag();
//getTableData("/getTableData", getTableAjaxData());