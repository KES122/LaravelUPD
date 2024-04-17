let selectionBtns = $(".open_and_close_btn"),
    selectionLists = $(".selection_lst"),
    datepickerArr = ["#start_date", "#date_of_completion"];

itemsArr = [
  [
    "100497", 
    "Проверка переноса старой папки Projects с 173 на 200",
    "Зиверт Артур",
    "",
    "2024-04-16 23:59:00",
    "0.33",
    "0.33",
    "0",
    "Нет",
    "",
    ""
  ]
]

function addEvent() {
  selectionBtns.each((_, btn) => {
    btn.addEventListener("click", openAndCloseLst);
  })

  selectionLists.each((_, lst) => {
    [...lst.children].forEach((option) => {
      let input = selectionBtns[selectionLists.index(lst)].querySelector("input");

      option.addEventListener("click", () => {
        selectLstOption(option, input, lst);
      })
    })
  })
}

addEvent();
setDatepickers(datepickerArr);
renderTable(itemsArr);