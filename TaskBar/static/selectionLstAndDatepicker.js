function setDatepickers(datepickerArr, options = null) {
  datepickerArr.forEach((datepickerClass) => {
    new AirDatepicker(datepickerClass, options);
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