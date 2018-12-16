$(document).ready(function () {

    sessionStorage.setItem('selected',"")

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    updateList()
    
})

const updateList = function () {  
    updateListGejala()
    updateListPenyakit()
    updateListSelGejala()
}

const updateListSelGejala=function (page=1) { 
    $.ajax({
        url: "index.php/api/selgejala",
        data:{
            data: $("#search3").val(),
            page: page
        },
        success: function (result) {
            $("#list3").html("")
            result['data'].forEach(function (datum) {
                var list = `<button class="list-group-item btn-outline-primary" onclick="deselectGejala(${datum["id"]})">${datum["name"]}</button>`
                $("#list3").append(list)
            });
            $("#pagination3").html("")
            $("#pagination3").append(
                $("<li></li>").addClass("page-item").addClass((result["links"]["prev"] == null) ? "disabled" : "").append(
                    $("<button></button>").addClass("page-link").text("Prev").attr("onclick", `updateListSelGejala(${result["meta"]["current_page"] - 1})`)
                )
            )

            for (var i = 1; i <= result["meta"]["last_page"]; i++) {
                $("#pagination3").append(
                    $("<li></li>").addClass("page-item").addClass((i == result["meta"]["current_page"]) ? "active" : "").append(
                        $("<button></button>").addClass("page-link").text(i).attr("onclick", `updateListSelGejala(${i})`)
                    )
                )
            }

            $("#pagination3").append(
                $("<li></li>").addClass("page-item").addClass((result["links"]["next"] == null) ? "disabled" : "").append(
                    $("<button></button>").addClass("page-link").text("Next").attr("onclick", `updateListSelGejala(${result["meta"]["current_page"] + 1})`)
                )
            )
        }
    });
}

const updateListPenyakit=function(page=1){
    $.ajax({
        url: "index.php/api/penyakit",
        data:{
            page:page,
            data: $("#search1").val()
        },
        success: function (result) {

            $("#list1").html("")
            result['data'].forEach(function (datum) {
                var list = `<a href="penyakit/${datum["id"]}" class="list-group-item btn-outline-primary">${datum["name"]}</a>`
                $("#list1").append(list)
            });
            $("#pagination1").html("")
            $("#pagination1").append(
                $("<li></li>").addClass("page-item").addClass((result["links"]["prev"]==null)?"disabled":"").append(
                    $("<button></button>").addClass("page-link").text("Prev").attr("onclick", `updateListPenyakit(${result["meta"]["current_page"] - 1})`)
                )
            )

            for (var i = 1; i <= result["meta"]["last_page"];i++){
                $("#pagination1").append(
                    $("<li></li>").addClass("page-item").addClass((i==result["meta"]["current_page"])?"active":"").append(
                        $("<button></button>").addClass("page-link").text(i).attr("onclick", `updateListPenyakit(${i})`)
                    )
                )
            }

            $("#pagination1").append(
                $("<li></li>").addClass("page-item").addClass((result["links"]["next"] == null) ? "disabled" : "").append(
                    $("<button></button>").addClass("page-link").text("Next").attr("onclick", `updateListPenyakit(${result["meta"]["current_page"] + 1})`)
                )
            )
            
        }
    });
}

const updateListGejala=function(page=1){
    $.ajax({
        url: "index.php/api/gejala/",
        data: {
            page: page,
            data: $("#search2").val()
        },
        success: function (result) {
            $("#list2").html("")
            result['data'].forEach(function (datum) {
                var list = `<button class="list-group-item btn-outline-primary" onclick="selectGejala(${datum["id"]})">${datum["name"]}</button>`
                $("#list2").append(list)
            });
            $("#pagination2").html("")
            $("#pagination2").append(
                $("<li></li>").addClass("page-item").addClass((result["links"]["prev"] == null) ? "disabled" : "").append(
                    $("<button></button>").addClass("page-link").text("Prev").attr("onclick", `updateListGejala(${result["meta"]["current_page"] - 1})`)
                )
            )

            for (var i = 1; i <= result["meta"]["last_page"]; i++) {
                $("#pagination2").append(
                    $("<li></li>").addClass("page-item").addClass((i == result["meta"]["current_page"]) ? "active" : "").append(
                        $("<button></button>").addClass("page-link").text(i).attr("onclick", `updateListGejala(${i})`)
                    )
                )
            }

            $("#pagination2").append(
                $("<li></li>").addClass("page-item").addClass((result["links"]["next"] == null) ? "disabled" : "").append(
                    $("<button></button>").addClass("page-link").text("Next").attr("onclick", `updateListGejala(${result["meta"]["current_page"] + 1})`)
                )
            )
        }
    });
}

const selectGejala= function(id){
    data = JSON.parse("["+getCookie("selected")+"]")
    if (data.indexOf(id)===-1){
        data.push(id)
        setCookie("selected", data,1)
        updateList()
    }
    
}
const deselectGejala = function (id) {
    data = JSON.parse("[" + getCookie("selected") + "]")
    if (data.indexOf(id) !== -1) {
        data.splice(data.indexOf(id),1)
        setCookie("selected",data,1)
        updateList()
    }

}

const setCookie = function (cname, cvalue, exmin) {
    var d = new Date();
    d.setTime(d.getTime() + (exmin * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

const getCookie= function(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}