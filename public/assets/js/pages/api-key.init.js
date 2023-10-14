var checkAll = document.getElementById("checkAll"),
    perPage = (checkAll && (checkAll.onclick = function() {
        for (var e = document.querySelectorAll('.form-check-all input[type="checkbox"]'), t = document.querySelectorAll('.form-check-all input[type="checkbox"]:checked').length, n = 0; n < e.length; n++) e[n].checked = this.checked, e[n].checked ? e[n].closest("tr").classList.add("table-active") : e[n].closest("tr").classList.remove("table-active");
        document.getElementById("remove-actions").style.display = 0 < t ? "none" : "block"
    }), 8),
    options = { valueNames: ["id", "name", "createBy", "apikey", "status", "create_date", "expiry_date"], page: perPage, pagination: !0, plugins: [ListPagination({ left: 2, right: 2 })] },
    apiKeyList = new List("apiKeyList", options).on("updated", function(e) {
        0 == e.matchingItems.length ? document.getElementsByClassName("noresult")[0].style.display = "block" : document.getElementsByClassName("noresult")[0].style.display = "none";
        var t = 1 == e.i,
            n = e.i > e.matchingItems.length - e.page;
        document.querySelector(".pagination-prev.disabled") && document.querySelector(".pagination-prev.disabled").classList.remove("disabled"), document.querySelector(".pagination-next.disabled") && document.querySelector(".pagination-next.disabled").classList.remove("disabled"), t && document.querySelector(".pagination-prev").classList.add("disabled"), n && document.querySelector(".pagination-next").classList.add("disabled"), e.matchingItems.length <= perPage ? document.querySelector(".pagination-wrap").style.display = "none" : document.querySelector(".pagination-wrap").style.display = "flex", e.matchingItems.length == perPage && document.querySelector(".pagination.listjs-pagination").firstElementChild.children[0].click(), 0 < e.matchingItems.length ? document.getElementsByClassName("noresult")[0].style.display = "none" : document.getElementsByClassName("noresult")[0].style.display = "block"
    });
const xhttp = new XMLHttpRequest;

function isStatus(e) {
    switch (e) {
        case "Disable":
            return '<span class="badge bg-danger-subtle text-danger">' + e + "</span>";
        case "Active":
            return '<span class="badge bg-success-subtle text-success">' + e + "</span>"
    }
}
xhttp.onload = function() {
    var e = JSON.parse(this.responseText);
    Array.from(e).forEach(function(e) { apiKeyList.add({ id: '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' + e.id + "</a>", name: e.name, createBy: e.createBy, apikey: '<input type="text" class="form-control apikey-value" readonly value="' + e.apikey + '">', status: isStatus(e.status), create_date: e.create_date, expiry_date: e.expiry_date }), apiKeyList.sort("id", { order: "desc" }), "Active" == e.status ? document.querySelector(".disable-btn").innerHTML = "Disable" : "Disable" == e.status && (document.querySelector(".disable-btn").innerHTML = "Enable"), refreshCallbacks() }), apiKeyList.remove("id", '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a>')
}, xhttp.open("GET", "assets/json/api-key-list.json"), xhttp.send(), document.getElementById("api-key-modal").addEventListener("show.bs.modal", function(e) { e.relatedTarget.classList.contains("edit-item-btn") ? (document.getElementById("exampleModalLabel").innerHTML = "Rename API name", document.getElementById("api-key-modal").querySelector(".modal-footer").style.display = "block", document.getElementById("add-btn").style.display = "none", document.getElementById("createApi-btn").style.display = "none", document.getElementById("edit-btn").style.display = "block") : e.relatedTarget.classList.contains("create-btn") ? (document.getElementById("exampleModalLabel").innerHTML = "Create API Key", document.getElementById("api-key-modal").querySelector(".modal-footer").style.display = "block", document.getElementById("edit-btn").style.display = "none", document.getElementById("createApi-btn").style.display = "block", document.getElementById("add-btn").style.display = "none") : e.relatedTarget.classList.contains("regenerate-api-btn") && (document.getElementById("exampleModalLabel").innerHTML = "Regenerate API", document.getElementById("api-key-modal").querySelector(".modal-footer").style.display = "block", document.getElementById("add-btn").style.display = "none", document.getElementById("createApi-btn").style.display = "none", document.getElementById("edit-btn").style.display = "block") });
var idField = document.getElementById("apikeyId"),
    apiKeyNameField = document.getElementById("api-key-name"),
    apiKeyField = document.getElementById("api-key"),
    addBtn = document.getElementById("add-btn"),
    editBtn = document.getElementById("edit-btn"),
    removeBtns = document.getElementsByClassName("remove-item-btn"),
    editBtns = document.getElementsByClassName("edit-item-btn");

function generateApiID() { var n = (new Date).getTime(); return window.performance && "function" == typeof window.performance.now && (n += performance.now()), "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(e) { var t = (n + 16 * Math.random()) % 16 | 0; return n = Math.floor(n / 16), ("x" == e ? t : 3 & t | 8).toString(16) }) }
refreshCallbacks(), ischeckboxcheck(), document.getElementById("api-key-modal").addEventListener("hidden.bs.modal", function() { clearFields() }), document.querySelector("#apiKeyList").addEventListener("click", function() { ischeckboxcheck() }), document.querySelectorAll(".create-btn").forEach(function(e) { e.addEventListener("click", function() { document.getElementById("api-key").value = generateApiID() }) });
var now = new Date,
    current = now.toUTCString().slice(5, 16),
    nextDate = (now.setMonth(now.getMonth() + 6), now.toUTCString().slice(5, 16)),
    count = 13;

function ischeckboxcheck() {
    Array.from(document.getElementsByName("chk_child")).forEach(function(n) {
        n.addEventListener("change", function(e) {
            1 == n.checked ? e.target.closest("tr").classList.add("table-active") : e.target.closest("tr").classList.remove("table-active");
            var t = document.querySelectorAll('[name="chk_child"]:checked').length;
            e.target.closest("tr").classList.contains("table-active"), document.getElementById("remove-actions").style.display = 0 < t ? "block" : "none"
        })
    })
}

function refreshCallbacks() {
    Array.from(editBtns).forEach(function(e) {
        e.addEventListener("click", function(e) {
            e.target.closest("tr").children[1].innerText, itemId = e.target.closest("tr").children[1].innerText;
            e = apiKeyList.get({ id: itemId });
            Array.from(e).forEach(function(e) {
                var t = (isid = (new DOMParser).parseFromString(e._values.id, "text/html")).body.firstElementChild.innerHTML;
                t == itemId && (document.getElementById("apikey-element").style.display = "block", idField.value = t, apiKeyNameField.value = e._values.name, apiKeyField.value = (new DOMParser).parseFromString(e._values.apikey, "text/html").body.querySelector(".apikey-value").value)
            })
        })
    }), Array.from(document.querySelectorAll(".regenerate-api-btn")).forEach(function(e) {
        e.addEventListener("click", function(e) {
            e.target.closest("tr").children[1].innerText, itemId = e.target.closest("tr").children[1].innerText;
            e = apiKeyList.get({ id: itemId });
            Array.from(e).forEach(function(e) {
                var t = (isid = (new DOMParser).parseFromString(e._values.id, "text/html")).body.firstElementChild.innerHTML;
                t == itemId && (document.getElementById("apikey-element").style.display = "block", idField.value = t, apiKeyNameField.value = e._values.name, apiKeyField.value = generateApiID())
            })
        })
    }), Array.from(removeBtns).forEach(function(e) {
        e.addEventListener("click", function(e) {
            e.target.closest("tr").children[1].innerText, itemId = e.target.closest("tr").children[1].innerText;
            e = apiKeyList.get({ id: itemId });
            Array.from(e).forEach(function(e) {
                var t = (deleteid = (new DOMParser).parseFromString(e._values.id, "text/html")).body.firstElementChild;
                deleteid.body.firstElementChild.innerHTML == itemId && document.getElementById("delete-record").addEventListener("click", function() { apiKeyList.remove("id", t.outerHTML), document.getElementById("deleteRecord-close").click() })
            })
        })
    })
}

function clearFields() { apiKeyNameField.value = "", apiKeyField.value = "", document.getElementById("apikey-element").style.display = "none", document.getElementById("add-btn").style.display = "none" }

function deleteMultiple() {
    ids_array = [];
    var e, t = document.querySelectorAll(".form-check [value=option1]");
    for (i = 0; i < t.length; i++) 1 == t[i].checked && (e = t[i].parentNode.parentNode.parentNode.querySelector("td a").innerHTML, ids_array.push(e));
    "undefined" != typeof ids_array && 0 < ids_array.length ? Swal.fire({ title: "Are you sure?", text: "You won't be able to revert this!", icon: "warning", showCancelButton: !0, confirmButtonClass: "btn btn-primary w-xs me-2 mt-2", cancelButtonClass: "btn btn-danger w-xs mt-2", confirmButtonText: "Yes, delete it!", buttonsStyling: !1, showCloseButton: !0 }).then(function(e) {
        if (e.value) {
            for (i = 0; i < ids_array.length; i++) apiKeyList.remove("id", '<a href="javascript:void(0);" class="fw-medium link-primary">' + ids_array[i] + "</a>");
            document.getElementById("remove-actions").style.display = "none", document.getElementById("checkAll").checked = !1, Swal.fire({ title: "Deleted!", text: "Your data has been deleted.", icon: "success", confirmButtonClass: "btn btn-info w-xs mt-2", buttonsStyling: !1 })
        }
    }) : Swal.fire({ title: "Please select at least one checkbox", confirmButtonClass: "btn btn-info", buttonsStyling: !1, showCloseButton: !0 })
}
document.getElementById("createApi-btn").addEventListener("click", function(e) {
    var t;
    if (0 == apiKeyNameField.value.length) return (t = document.getElementById("api-key-error-msg")).classList.remove("d-none"), setTimeout(() => document.getElementById("api-key-error-msg").classList.add("d-none"), 2e3), !(t.innerHTML = "Please enter api key name");
    0 < apiKeyNameField.value.length && (document.getElementById("apikey-element").style.display = "block", e.target.style.display = "none", document.getElementById("add-btn").style.display = "block")
}), addBtn.addEventListener("click", function(e) { var t = document.getElementById("api-key-error-msg"); if (t.classList.remove("d-none"), setTimeout(() => document.getElementById("api-key-error-msg").classList.add("d-none"), 2e3), 0 == apiKeyNameField.value.length) return !(t.innerHTML = "Please enter api key name"); "" !== apiKeyNameField.value && "" !== apiKeyField.value && (apiKeyList.add({ id: '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' + count + "</a>", name: apiKeyNameField.value, createBy: document.querySelector("#page-header-user-dropdown .user-name-text").innerHTML, apikey: '<input type="text" class="form-control apikey-value" readonly value="' + apiKeyField.value + '">', status: isStatus("Active"), create_date: current, expiry_date: nextDate }), apiKeyList.sort("id", { order: "desc" }), document.getElementById("close-modal").click(), clearFields(), refreshCallbacks(), count++, Swal.fire({ position: "center", icon: "success", title: "Application inserted successfully!", showConfirmButton: !1, timer: 2e3, showCloseButton: !0 })) }), editBtn.addEventListener("click", function(e) {
    document.getElementById("exampleModalLabel").innerHTML = "Rename API name";
    var t = apiKeyList.get({ id: idField.value });
    Array.from(t).forEach(function(e) {
        (isid = (new DOMParser).parseFromString(e._values.id, "text/html")).body.firstElementChild.innerHTML == itemId && e.values({ id: '<a href="javascript:void(0);" class="fw-medium link-primary">#VZ' + idField.value + "</a>", name: apiKeyNameField.value, createBy: e._values.createBy, apikey: '<input type="text" class="form-control apikey-value" readonly value="' + apiKeyField.value + '">', status: e._values.status, create_date: e._values.create_date, expiry_date: e._values.expiry_date }), document.getElementById("close-modal").click()
    }), Swal.fire({ position: "center", icon: "success", title: "API name updated Successfully!", showConfirmButton: !1, timer: 2e3, showCloseButton: !0 })
}), document.querySelector(".pagination-next").addEventListener("click", function() { document.querySelector(".pagination.listjs-pagination") && document.querySelector(".pagination.listjs-pagination").querySelector(".active") && document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click() }), document.querySelector(".pagination-prev").addEventListener("click", function() { document.querySelector(".pagination.listjs-pagination") && document.querySelector(".pagination.listjs-pagination").querySelector(".active") && document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click() });