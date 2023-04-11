

//kkjk
let addBtn = document.getElementById('btn-add')
let cleanBtn = document.getElementById('btn-clean')
let uploadBtn = document.getElementById('btn-upload')
let filesForm = document.getElementById('files-form')
let listUploadedFiles = document.getElementById('list-uploaded-files')
let fileContent = document.getElementById('bridge-file-content')


let fileCounter = 1


addBtn.addEventListener("click", () => {
  let e = document.createElement('div')
  e.className = "list-group-item"
  e.innerHTML = '<input type="file" name="file-'+(fileCounter++)+'" class="form-control">'
  filesForm.appendChild(e)
})

cleanBtn.addEventListener("click", () => {
  listUploadedFiles.innerHTML = ""
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
