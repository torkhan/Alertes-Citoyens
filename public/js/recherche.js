function triRecherche() {

    [].forEach.call( document.getElementsByClassName("table-responsive"), function(tableau) {
        let titre = tableau.getElementsByTagName("tr")[0];
        let xx = 1;

        [].forEach.call( titre.querySelectorAll("th"), function(Th) {
            Th.addEventListener("click", triTableau, false);
            Th.setAttribute("data-pos", xx);

            // Tri par défaut
            if (Th.className==="selection") {
                Th.click();
            }
            xx++;
        });
    });
}

function Initialise() {
    triRecherche();
}
function ready(maFonction) {
    if (document.readyState !== "loading"){
        maFonction();
    } else {
        document.addEventListener("DOMContentLoaded", maFonction);
    }
}
ready(Initialise);

function triTableau() {

    let col = this.getAttribute("data-tri");
    this.setAttribute("data-tri", (col==="0") ? "1" : "0");

    [].forEach.call( this.parentNode.querySelectorAll(".th"), function(Th) {Th.classList.remove("selection");});

    this.className = "selection";

    let tbody = this.parentNode.parentNode.parentNode.getElementsByTagName("tbody")[0];
    let ligne = tbody.rows;
    let nbrLigne = ligne.length;
    let colonne = [], i, j, oCel;
    for(i = 0; i < nbrLigne; i++) {
        oCel = ligne[i].cells;
        colonne[i] = [];
        for(j = 0; j < oCel.length; j++){
            colonne[i][j] = oCel[j].innerHTML;
        }
    }
    //


    let toto = this.getAttribute("data-pos");

    let fonctionTri = (this.getAttribute("data-type")=="num") ? "compareNombres" : "compareLocale";
    // Tri
    colonne.sort(eval(fonctionTri));

    function compareNombres(a, b) {return a[toto-1] - b[toto-1];}

    function compareLocale(a, b) {return a[toto-1].localeCompare(b[toto-1]);}

    if (col===0) colonne.reverse();


    for(i = 0; i < nbrLigne; i++){
        colonne[i] = "<td>"+colonne[i].join("</td><td>")+"</td>";
    }


    tbody.innerHTML = "<tr>"+colonne.join("</tr><tr>")+"</tr>"; //l'affiche
}

