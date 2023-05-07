

let addBtn = document.getElementById('btn-add')
let cleanBtn = document.getElementById('btn-clean')
let uploadBtn = document.getElementById('btn-upload')
let filesForm = document.getElementById('files-inputs')
let listUploadedFiles = document.getElementById('list-uploaded-files')
let fileContent = document.getElementById('bridge-file-content')





addBtn.addEventListener("click", () => {
  let e = document.createElement('div')
  e.className = "list-group-item  border-0 p-1"
  e.innerHTML = '<input type="file" name="files[]" form="upload-form" class="form-control" required multiple>' 

  filesForm.appendChild(e)
})

cleanBtn.addEventListener("click", () => {
  //listUploadedFiles.innerHTML = ""
  // alert("clean btn is clicked")
})

uploadBtn.addEventListener("click", () => {
  let filenamesArr = document.getElementById('bridge-file-content').innerText.split('\n')
  // filenamesArr.forEach(element => {
  //   console.log(element)
  //   let li = document.createElement('li')
  //   li.className = "list-group-item"
  //   li.innerText = element
  //   listUploadedFiles.appendChild(li)
  // })
  let li = document.createElement('li')
  li.className = "list-group-item"
  li.innerText = "eleffffffffment"
  listUploadedFiles.appendChild(li)
})
