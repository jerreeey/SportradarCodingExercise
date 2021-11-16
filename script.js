$(document).ready(function () {

    $("#AddGamesForm").submit(function (event) { //Sends post request to save added games and displays all fixtures again
        event.preventDefault();
        var form= $(this);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "action.php",
            data: form.serialize(),
            success: function (data) {
               location.reload();
            }
        });
    });
filter();
});

function filterFixtures() { //Filters dsplayed fixtures based on selected sports

   let select = document.getElementById("selectSports");
   let table = document.getElementById("fixturesTable");
   let rows = table.getElementsByTagName("tr");
   let filter = select.value;//get Value of Dropdown

    for (let row of rows) {
        cells = row.getElementsByTagName("td");
        sports = cells[1] || null;

        if (filter === "All sports" || !sports || (filter === sports.textContent)) {
            row.style.display = "";
        }
        else { //else hide row
            row.style.display = "none";
        }
    }
}

function filter(){
    filterComp();
    filterTeams();
}

function filterComp() { //Filters displayed competition options based on selected sports

    let compSelect = document.getElementById("compSelect");
    let options = compSelect.getElementsByTagName("option");
    let filter = $('#sportsSelect option:selected').attr('id');

    for (let option of options) {


        if (filter === option.id) {
            option.style.display = "";
        }
        else { //else hide row
            option.style.display = "none";
        }
    }
}

function filterTeams() { //Filters displayed teams options based on selected sports

    let selectHome = document.getElementById("selectHome");
    let selectGuest = document.getElementById("selectGuest");
    let optionsHome = selectHome.getElementsByTagName("option");
    let optionsGuest = selectGuest.getElementsByTagName("option");
    let filter = $('#sportsSelect option:selected').attr('id');

    for (let option of optionsHome) {
        if (filter === option.id) {
            option.style.display = "";
        }
        else { //else hide row
            option.style.display = "none";
        }
    }
    for (let option of optionsGuest) {
        if (filter === option.id) {
            option.style.display = "";
        }
        else { //else hide row
            option.style.display = "none";
        }
    }
}