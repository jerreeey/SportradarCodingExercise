function filterFixtures() {

   let select = document.getElementById("selectSports");
   let table = document.getElementById("fixturesTable");
   let rows = table.getElementsByTagName("tr"); //get rows
   let filter = select.value;//get Value of Dropdown


    for (let row of rows) {
        cells = row.getElementsByTagName("td"); //get cells of each row
        sports = cells[1] || null; //search in the 2nd cell for sports

        if (filter === "All competitions" || !sports || (filter === sports.textContent)) { //show row when value of dropdown equals ALL or one specific competition
            row.style.display = "";
        }
        else { //else hide row
            row.style.display = "none";
        }
    }
}