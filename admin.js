

//kkjk
let addBtn = document.getElementById('btn-add');
let filesForm = document.getElementById('files-form');

let fileCounter = 1;


addBtn.addEventListener("click", () => {
  let e = document.createElement('div');
  e.className = "list-group-item"; 
  e.innerHTML = '<input type="file" name="file-'+(fileCounter++)+'" id="">';
  filesForm.appendChild(e);
});