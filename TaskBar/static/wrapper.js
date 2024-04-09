let uploadWin = $(".upload_win")[0],
    fd = new FormData();

function addEvent() {
  ["dragover", "drop"].forEach((event) => {
    uploadWin.addEventListener(event, (e) => {
    e.stopPropagation();
    e.preventDefault();
    })
  });
  
  ["dragleave", "dragenter"].forEach((event) => {
    uploadWin.addEventListener(event, dragDropAndEnter);
  })
}

addEvent();