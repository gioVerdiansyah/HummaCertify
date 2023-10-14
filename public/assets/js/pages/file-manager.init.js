function getChartColorsArray(e) { if (null !== document.getElementById(e)) return e = document.getElementById(e).getAttribute("data-colors"), (e = JSON.parse(e)).map(function(e) { var t = e.replace(" ", ""); return -1 === t.indexOf(",") ? getComputedStyle(document.documentElement).getPropertyValue(t) || t : 2 == (e = e.split(",")).length ? "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")" : t }) }
var options, chart, chartDonutBasicColors = getChartColorsArray("simple_dount_chart"),
    url = (chartDonutBasicColors && (options = { series: [27.01, 20.87, 33.54, 37.58], chart: { height: 330, type: "donut" }, legend: { position: "bottom" }, labels: ["Documents", "Media", "Others", "Free Space"], dataLabels: { dropShadow: { enabled: !1 } }, colors: chartDonutBasicColors }, (chart = new ApexCharts(document.querySelector("#simple_dount_chart"), options)).render()), "assets/json/"),
    allFileList = "",
    editFlag = !1,
    getJSON = function(e, t) {
        var l = new XMLHttpRequest;
        l.open("GET", url + e, !0), l.responseType = "json", l.onload = function() {
            var e = l.status;
            t(200 === e ? null : e, l.response)
        }, l.send()
    };

function loadFileData(e) {
    document.querySelector("#file-list").innerHTML = "", Array.from(e).forEach(function(e, t) {
        var l = e.fileName.includes(".") ? function(e) {
                switch (e) {
                    case "png":
                    case "jpg":
                        return '<i class="ri-gallery-fill align-bottom text-success"></i>';
                    case "pdf":
                        return '<i class="ri-file-pdf-fill align-bottom text-danger"></i>';
                    default:
                        return '<i class="ri-file-text-fill align-bottom text-secondary"></i>'
                }
            }(e.fileName.split(".")[1]) : '<i class="ri-folder-2-fill align-bottom text-warning"></i>',
            i = e.starred ? "active" : "";
        document.querySelector("#file-list").innerHTML += '<tr>        <td>            <input class="form-control filelist-id" type="hidden" value="' + e.id + '" id="filelist-' + e.id + '">            <div class="d-flex align-items-center">                <div class="flex-shrink-0 fs-17 me-2 filelist-icon">' + l + '</div>                <div class="flex-grow-1 filelist-name">' + e.fileName + '</div>                <div class="d-none filelist-type">' + e.filetype + "</div>            </div>        </td>        <td>" + e.fileItem + '</td>        <td class="filelist-size">' + e.fileSize + '</td>        <td class="filelist-create">' + e.date + '</td>        <td>          <div class="d-flex gap-3 justify-content-center">            <button type="button" class="btn btn-ghost-primary btn-icon btn-sm favourite-btn ' + i + '">                  <i class="ri-star-fill fs-13 align-bottom"></i>            </button>            <div class="dropdown">              <button class="btn btn-light btn-icon btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">              <i class="ri-more-fill align-bottom"></i>              </button>              <ul class="dropdown-menu dropdown-menu-end">                <li><a class="dropdown-item viewfile-list" href="#">View</a></li>                <li><a class="dropdown-item edit-list" href="#createFileModal" data-bs-toggle="modal" data-edit-id=' + e.id + ' role="button">Rename</a></li>                <li class="dropdown-divider"></li>                <li><a class="dropdown-item remove-list" href="#removeFileItemModal" data-id=' + e.id + ' data-bs-toggle="modal" role="button">Delete</a></li>              </ul>            </div>          </div>        </td>      </tr>', favouriteBtn(), removeSingleItem(), editFileList(), fileDetailShow()
    })
}

function favouriteBtn() { Array.from(document.querySelectorAll(".favourite-btn")).forEach(function(e) { e.addEventListener("click", function() { e.classList.contains("active") ? e.classList.remove("active") : e.classList.add("active") }) }) }
getJSON("filemanager-filelist.json", function(e, t) { null !== e ? console.log("Something went wrong: " + e) : loadFileData(allFileList = t) }), favouriteBtn(), Array.from(document.querySelectorAll(".file-manager-menu a")).forEach(function(i) {
    i.addEventListener("click", function() {
        var e, t = document.querySelector(".file-manager-menu a.active"),
            l = (t && t.classList.remove("active"), i.classList.add("active"), i.querySelector(".file-list-link").innerHTML);
        document.getElementById("file-list").innerHTML = "", document.getElementById("filetype-title").innerHTML = "My Drive" != l ? l : "Recent file", "My Drive" != l && "Important" != l && "Recents" != l ? (e = allFileList.filter(e => e.filetype === l), document.getElementById("folder-list").style.display = "none") : "Important" == l ? (e = allFileList.filter(e => 1 == e.starred), document.getElementById("folder-list").style.display = "none") : (e = allFileList, document.getElementById("folder-list").style.display = "block"), "Recents" == l && (document.getElementById("folder-list").style.display = "none"), loadFileData(e)
    })
});
var createFolderForms = document.querySelectorAll(".createfolder-form");

function editFolderList() {
    Array.from(document.querySelectorAll(".folder-card")).forEach(function(l) {
        Array.from(l.querySelectorAll(".edit-folder-list")).forEach(function(e) {
            e.addEventListener("click", function(e) {
                var t = l.querySelector(".card").getAttribute("id").split("-")[1];
                t == l.querySelector(".form-check .form-check-input").getAttribute("id").split("_")[1] && (editFlag = !0, document.getElementById("addNewFolder").innerHTML = "Save", document.getElementById("createFolderModalLabel").innerHTML = "Folder Rename", document.getElementById("folderid-input").value = "folder-" + t, document.getElementById("foldername-input").value = l.querySelector(".folder-name").innerHTML)
            })
        })
    })
}
Array.prototype.slice.call(createFolderForms).forEach(function(i) {
    i.addEventListener("submit", function(e) {
        var t, l;
        i.checkValidity() ? (e.preventDefault(), t = document.getElementById("foldername-input").value, l = Math.floor(100 * Math.random()), folderlisthtml = '<div class="col-xxl-3 col-sm-6 folder-card">        <div class="card bg-light shadow-none" id="folder-' + l + '">            <div class="card-body">                <div class="d-flex mb-1">                    <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">                        <input class="form-check-input" type="checkbox" value="" id="folderlistCheckbox_' + l + '">                        <label class="form-check-label" for="folderlistCheckbox_' + l + '"></label>                    </div>                    <div class="dropdown">                        <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">                            <i class="ri-more-2-fill fs-16 align-bottom"></i>                        </button>                        <ul class="dropdown-menu dropdown-menu-end">                            <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Open</a></li>                            <li><a class="dropdown-item edit-folder-list" href="#createFolderModal" data-bs-toggle="modal" role="button">Rename</a></li>                            <li><a class="dropdown-item" href="#removeFolderModal" data-bs-toggle="modal" role="button">Delete</a></li>                        </ul>                    </div>                </div>                <div class="text-center">                <div class="mb-2">                    <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>                </div>                    <h6 class="fs-15 folder-name">' + t + '</h6>                </div>                <div class="hstack mt-4 text-muted">                    <span class="me-auto"><b>0</b> Files</span>                    <span><b>0</b>GB</span>                </div>            </div>        </div>    </div>', "" === t || editFlag ? "" !== t && editFlag && (l = 0, l = document.getElementById("folderid-input").value, document.getElementById(l).querySelector(".folder-name").innerHTML = t, document.getElementById("addFolderBtn-close").click(), editFlag = !1, document.getElementById("addNewFolder").innerHTML = "Add Folder", document.getElementById("createFolderModalLabel").innerHTML = "Create Folder", document.getElementById("folderid-input").value = "", document.getElementById("foldername-input").value = "") : (document.getElementById("folderlist-data").insertAdjacentHTML("afterbegin", folderlisthtml), document.getElementById("addFolderBtn-close").click(), editFolderList()), document.getElementById("folderid-input").value = "", document.getElementById("foldername-input").value = "") : (e.preventDefault(), e.stopPropagation()), i.classList.add("was-validated")
    }, !1)
}), editFolderList();
var removeProduct = document.getElementById("removeFolderModal"),
    date = (removeProduct && removeProduct.addEventListener("show.bs.modal", function(t) { document.getElementById("remove-folderList").addEventListener("click", function(e) { t.relatedTarget.closest(".folder-card").remove(), document.getElementById("close-removeFoldermodal").click() }) }), (new Date).toUTCString().slice(5, 16));

function editFileList() {
    var l;
    Array.from(document.querySelectorAll(".edit-list")).forEach(function(t) { t.addEventListener("click", function(e) { l = t.getAttribute("data-edit-id"), allFileList = allFileList.map(function(e) { return e.id == l && (editFlag = !0, document.getElementById("addNewFile").innerHTML = "Save", document.getElementById("createFileModalLabel").innerHTML = "File Rename", document.getElementById("filename-input").value = e.fileName, document.getElementById("fileid-input").value = e.id), e }) }) })
}
Array.from(document.querySelectorAll(".createFile-modal")).forEach(function(e) { e.addEventListener("click", function(e) { document.getElementById("addNewFile").innerHTML = "Create", document.getElementById("createFileModalLabel").innerHTML = "Create File", document.getElementById("filename-input").value = "", document.getElementById("fileid-input").value = "", document.getElementById("createfile-form").classList.remove("was-validated") }) }), Array.from(document.querySelectorAll(".create-folder-modal")).forEach(function(e) { e.addEventListener("click", function(e) { document.getElementById("addNewFolder").innerHTML = "Add Folder", document.getElementById("createFolderModalLabel").innerHTML = "Create Folder", document.getElementById("folderid-input").value = "", document.getElementById("foldername-input").value = "", document.getElementById("createfolder-form").classList.remove("was-validated") }) });
var createFileForms = document.querySelectorAll(".createfile-form");

function fetchIdFromObj(e) { return parseInt(e.id) }

function sortElementsById() { loadFileData(allFileList.sort(function(e, t) { e = fetchIdFromObj(e), t = fetchIdFromObj(t); return t < e ? -1 : e < t ? 1 : 0 })) }

function removeSingleItem() {
    var l;
    Array.from(document.querySelectorAll(".remove-list")).forEach(function(t) {
        t.addEventListener("click", function(e) {
            l = t.getAttribute("data-id"), document.getElementById("remove-fileitem").addEventListener("click", function() {
                var t;
                t = l, loadFileData(allFileList = allFileList.filter(function(e) { return e.id != t })), document.getElementById("close-removefilemodal").click(), document.getElementById("file-overview").style.display = "none", document.getElementById("folder-overview").style.display = "block"
            })
        })
    })
}

function fileDetailShow() {
    var d = document.getElementsByTagName("body")[0],
        t = (Array.from(document.querySelectorAll(".close-btn-overview")).forEach(function(e) { e.addEventListener("click", function() { d.classList.remove("file-detail-show") }) }), Array.from(document.querySelectorAll("#file-list tr")).forEach(function(r) {
            r.querySelector(".viewfile-list").addEventListener("click", function() {
                d.classList.add("file-detail-show"), document.getElementById("file-overview").style.display = "block", document.getElementById("folder-overview").style.display = "none";
                var e = r.querySelector(".filelist-id").value,
                    t = r.querySelector(".filelist-icon i").className,
                    l = r.querySelector(".filelist-name").innerHTML,
                    i = r.querySelector(".filelist-size").innerHTML,
                    n = r.querySelector(".filelist-create").innerHTML,
                    o = r.querySelector(".filelist-type").innerHTML;
                document.querySelector("#file-overview .file-icon i").className = t, Array.from(document.querySelectorAll("#file-overview .file-name")).forEach(function(e) { e.innerHTML = l }), Array.from(document.querySelectorAll("#file-overview .file-size")).forEach(function(e) { e.innerHTML = i }), Array.from(document.querySelectorAll("#file-overview .create-date")).forEach(function(e) { e.innerHTML = n }), document.querySelector("#file-overview .file-type").innerHTML = o, document.querySelector("#file-overview .remove-file-overview").setAttribute("data-remove-id", e), r.querySelector(".favourite-btn").classList.contains("active") ? document.querySelector("#file-overview .favourite-btn").classList.add("active") : document.querySelector("#file-overview .favourite-btn").classList.remove("active")
            })
        }), !1),
        l = document.getElementsByClassName("file-manager-sidebar");
    Array.from(document.querySelectorAll(".file-menu-btn")).forEach(function(e) { e.addEventListener("click", function() { Array.from(l).forEach(function(e) { e.classList.add("menubar-show"), t = !0 }) }) }), window.addEventListener("click", function(e) { document.querySelector(".file-manager-sidebar").classList.contains("menubar-show") && (t || document.querySelector(".file-manager-sidebar").classList.remove("menubar-show"), t = !1) })
}

function removefileOverview() {
    var l;
    Array.from(document.querySelectorAll(".remove-file-overview")).forEach(function(t) {
        t.addEventListener("click", function(e) {
            l = t.getAttribute("data-remove-id"), document.getElementById("remove-fileitem").addEventListener("click", function() {
                var t;
                t = l, loadFileData(allFileList = allFileList.filter(function(e) { return e.id != t })), document.getElementById("close-removefilemodal").click(), document.getElementsByTagName("body")[0].classList.remove("file-detail-show")
            })
        })
    })
}

function windowResize() { document.documentElement.clientWidth < 1400 ? document.body.classList.remove("file-detail-show") : document.body.classList.add("file-detail-show") }
Array.prototype.slice.call(createFileForms).forEach(function(n) {
    n.addEventListener("submit", function(e) {
        var t, l, i;
        n.checkValidity() ? (e.preventDefault(), t = document.getElementById("filename-input").value, l = Math.floor(100 * Math.random()), "" === t || editFlag ? "" !== t && editFlag && (i = 0, i = document.getElementById("fileid-input").value, allFileList = allFileList.map(function(e) { return e.id == i ? { id: e.id, fileName: document.getElementById("filename-input").value, filetype: e.filetype, fileItem: e.fileItem, fileSize: e.fileSize, date: e.date, starred: e.starred } : e }), editFlag = !1, document.getElementById("addFileBtn-close").click()) : (allFileList.push({ id: l, fileName: t + ".txt", filetype: "Documents", fileItem: "01", fileSize: "0 KB", date: date, starred: !1 }), sortElementsById(), document.getElementById("addFileBtn-close").click()), loadFileData(allFileList), document.getElementById("addNewFile").innerHTML = "Create", document.getElementById("createFileModalLabel").innerHTML = "Create File") : (e.preventDefault(), e.stopPropagation()), n.classList.add("was-validated")
    }, !1)
}), removefileOverview(), windowResize(), window.addEventListener("resize", windowResize);