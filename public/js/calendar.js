var actualDate = new Date(); // Date actuelle

var numWeeks = 6; // Nombre de semaines à afficher

//Renvoie l'URL complète de la page web actuelle et .split pour séparer l'url
const splitURL = window.location.href.split("/");
//Selectionne le dernier élément séparé par .split plus haut et le stock
const courseName = splitURL[splitURL.length-1];

var startTime = new Date(); // Heure de début pour les créneaux horaires
startTime.setHours(8, 0, 0); // Définit l'heure de début à 8h00

var timeSlots = []; // Tableau pour stocker les créneaux horaires

// Boucle pour générer les créneaux horaires de 30 minutes
while(startTime.getHours()<18 || startTime.getMinutes()<30){

var startTime_hours = startTime.getHours() > 9 ? startTime.getHours() : "0"+startTime.getHours();
var startTime_minutes = startTime.getMinutes() > 9 ? startTime.getMinutes() : "0"+startTime.getMinutes();

timeSlots.push(startTime_hours+":"+startTime_minutes);

startTime.setMinutes(startTime.getMinutes() + 30);
}


// ***** CHANGE COLORS BUTTONS *****

function setPaymentButtonColor(paymentMethodContainer, courseName) {
    const spanChild = paymentMethodContainer.querySelector('.radio-button__custom');
    const pTestElement = paymentMethodContainer.querySelector('.p-test'); 

    switch(courseName) {
        case "atelier-de-portage":
            spanChild.classList.add("blue2");
            paymentMethodContainer.classList.add("blue2");
            pTestElement.classList.add("blue2");
            break;
        case "consultation-d-allaitement":
            spanChild.classList.add("purple2");
            paymentMethodContainer.classList.add("purple2");
            pTestElement.classList.add("purple2");
            break;
        case "rituel-rebozo":
            spanChild.classList.add("orange2");
            paymentMethodContainer.classList.add("orange2");
            pTestElement.classList.add("orange2");
            break;
        case "cercle-mamans-bebes":
            spanChild.classList.add("red2");
            paymentMethodContainer.classList.add("red2");
            pTestElement.classList.add("red2");
            break;
        default:
            break;
    }
}
// *******************


// Appel de la fonction pour générer le calendrier
generateCalendar();

// Fonction pour générer le calendrier
function generateCalendar() {

var calendar = document.getElementById("calendar");

calendar.innerHTML = `
<h2 id='calendar-title'>Réservez votre cours</h2>
<div id="calendar-container">

    <div id="month-container">
        <div id="prev-month-calandar-selector" class="month-selector"><</div>
        <h3 id="current-month"></h3>
        <div id="next-month-calandar-selector" class="month-selector">></div>
    </div>

    <table>
        <thead>
            <tr>
                <th>L</th>
                <th>M</th>
                <th>M</th>
                <th>J</th>
                <th>V</th>
                <th>S</th>
                <th>D</th>
            </tr>
        </thead>
        <tbody id="calendar-body">
        </tbody>
    </table>

</div>

<div id="slot-container">
</div>

<form method='POST' action="/save_reservation" id="calendar-form">
    <input type="hidden" name="courseName" value="${courseName}">
    <input type="hidden" name="slotDate" id="calendar-form-date" value="">
    <input type="hidden" name="slotTime" id="calendar-form-time" value="">
    <h4 id="payment-method-title">Choisissez votre moyen de paiement</h4>
    <div id='payment-method-container'>

        <div class='payment-method radio-button'>
            <input type="radio" name="payment-method" id="payment-sur-place" class="radio radio-button__input" value="payment-sur-place">
                <label for='payment-sur-place' class="radio-button__label"> 
                    <span class="radio-button__custom"></span>
                    <p class="p-test">Sur place</p>
                </label>
        </div>

        <div class='payment-method radio-button'>
            <input type="radio" name="payment-method" id="payment-online" class="radio radio-button__input" value="payment-online" checked>
                <label for='payment-online' class="radio-button__label"> 
                    <span class="radio-button__custom"></span>
                    <p class="p-test">En ligne</p>
                </label>
        </div>

    </div>
    <button type="submit" id="calendar-submit-button" disabled>Réserver</button>
</form>`;

// Appel de la fonction pour afficher le contenu du calendrier
displayCalendarContent();


// ***** CLEAR ALL CLASSES *****

function clearAllClasses() {
    const customButtons = document.querySelectorAll('.radio-button__custom');
    const labels = document.querySelectorAll('.radio-button__label');
    const pTestElements = document.querySelectorAll('.p-test');
    
    customButtons.forEach(elem => {
        elem.classList.remove("blue2", "orange2", "purple2", "red2"); 
    });

    labels.forEach(elem => {
        elem.classList.remove("blue2", "orange2", "purple2", "red2"); 
    });

    pTestElements.forEach(elem => {
        elem.classList.remove("blue2", "orange2", "purple2", "red2");
    });
}

// *****


const paymentMethodElements = document.querySelectorAll('.radio-button__label');
paymentMethodElements.forEach(element => {
    element.addEventListener("click", function() {
        clearAllClasses(); 
        setPaymentButtonColor(element, courseName);
    });
});
// *****



// Écouteurs d'événements pour naviguer dans le calendrier
const prevMonthSelector = document.getElementById("prev-month-calandar-selector");
const nextMonthSelector = document.getElementById("next-month-calandar-selector");

prevMonthSelector.addEventListener("click", function(){
    goBackOneMonth();
})

nextMonthSelector.addEventListener("click", function(){
    advanceOneMonth();
})

}

// Fonction pour obtenir le nom du mois à partir de son index
function getMonthName(monthIndex) {
var monthNames = [
    "Janvier",
    "Février",
    "Mars",
    "Avril",
    "Mai",
    "Juin",
    "Juillet",
    "Août",
    "Septembre",
    "Octobre",
    "Novembre",
    "Décembre",
];

return monthNames[monthIndex];
}

// Fonction pour afficher le contenu du calendrier
// requête AJAX pour récupérer les jours non disponibles à partir du serveur
function displayCalendarContent(){

// formater la date
const actualDateParam = formatDate(actualDate);

// Créer une requête XMLHttpRequest
var request = new XMLHttpRequest();
request.open("POST", "/days_unavailable/"+courseName);
request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// Gérer le changement d'état de la requête
request.onreadystatechange = function() {
    
    // Vérifie si la requête est terminée et la réponse est (200)
    if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
        
        // Analyser la réponse JSON pour obtenir les jours non disponibles
        var unavailableDays = JSON.parse(request.responseText);
        console.log(unavailableDays);


        // ***** Change for hover .calandar-unit.selected colors *****
        var calendarElement = document.getElementById("calendar"); // Récupére l'élément #calendar

            // Reset des classes précédentes pour éviter des conflits
            calendarElement.className = '';

            switch(courseName) {
                case "atelier-de-portage":
                    calendarElement.classList.add("atelier-de-portage");
                    break;
                case "consultation-d-allaitement":
                    calendarElement.classList.add("consultation-d-allaitement");
                    break;
                case "rituel-rebozo":
                     calendarElement.classList.add("rituel-rebozo");
                    break;
                case "cercle-mamans-bebes":
                    calendarElement.classList.add("cercle-mamans-bebes");
                    break;
            }
            // ******


        //Définir le premier jour à afficher dans le calendrier
        startDate = new Date(actualDate);
        //Exemple : nous somme le 12 => 12 - 12 + 1 = 1
        startDate.setDate(actualDate.getDate() - actualDate.getDate() + 1);
        //Exemple : nous sommes le 3eme jour de la semaine => 1 - 3 + 1 = -2 jours après le premier jour du mois
        startDate.setDate(startDate.getDate() - (startDate.getDay()==0?7:startDate.getDay()) + 1);

        // Récupère l'élément avec l'ID "calendar-body" 
        var calendarBody = document.getElementById("calendar-body");
        // Efface son contenu actuel en utilisant la propriété innerHTML et en le définissant comme une chaîne vide.
        calendarBody.innerHTML = "";

        // Récupère l'élément avec l'ID "current-month" qui affiche le mois et l'année actuels du calendrier.
        // Met à jour son contenu en utilisant la fonction getMonthName pour obtenir le nom du mois à partir de 
        // l'indice du mois (0-11) et en ajoutant l'année.
        document.getElementById("current-month").innerHTML = getMonthName(actualDate.getMonth()) + " " + actualDate.getFullYear();
        
        // Initialise une nouvelle date currentDate avec la valeur de startDate, qui est la première date à afficher dans le calendrier.
        // Récupère la valeur de l'attribut "value" de l'élément avec l'ID "calendar-form-date", qui est la date sélectionnée 
        // dans le formulaire du calendrier.
        var currentDate = new Date(startDate);
        var selectedDate = document.getElementById("calendar-form-date").getAttribute("value");

        // Parcourt le nombre de semaines défini par la variable numWeeks pour générer les lignes du calendrier.
        for (var i = 0; i < numWeeks; i++) {

            var row = document.createElement("tr");

            for (var j = 0; j < 7; j++) {
                // À l'intérieur de chaque ligne, crée une cellule de calendrier (<td>) et un élément <div> pour afficher la date.
                var td = document.createElement("td");
                var cell = document.createElement("div");

                // Configure la date de la cellule en utilisant currentDate.getDate() pour obtenir le jour du mois.
                td.appendChild(cell);
                cell.innerHTML = currentDate.getDate();
                cell.classList.add("calandar-unit");
                // Ajoute un attribut data-date à la cellule pour stocker la date correspondante.
                cell.setAttribute("data-date", currentDate);

                //Formate la date
                var currentDateParam = formatDate(currentDate);

                // Ajoute les classes CSS appropriées à la cellule
                if(currentDateParam==selectedDate){
                    cell.classList.add("selected");
                }

                if(currentDate.getMonth()!=actualDate.getMonth()){
                    cell.classList.add("mitigate");
                }

                if(unavailableDays.includes(`${currentDate.getDate()}`)){
                    cell.classList.add("unavailable");
                }
                // Ajoute des écouteurs d'événements de clic pour les cellules qui sont sélectionnables.
                else if(!cell.classList.contains("mitigate")){
                    cell.addEventListener("click", selectUnit);
                }
                else if(cell.classList.contains("mitigate")){
                    if(currentDate.getMonth()<actualDate.getMonth()){
                        cell.addEventListener("click", goBackOneMonth);
                    }
                    else{
                        cell.addEventListener("click", advanceOneMonth);
                    }
                }

                // Ajoute la cellule à la ligne courante et met à jour la date courante pour passer à la prochaine date.
                row.appendChild(td);
                currentDate.setDate(currentDate.getDate() + 1);
            }
            calendarBody.appendChild(row);
        }
    }
};

// Prépare les données à envoyer dans la requête AJAX. Dans ce cas, la variable actualDateParam est encodée 
// et ajoutée à la chaîne de requête avec le paramètre "date".
var data = "date=" + encodeURIComponent(actualDateParam);
// Envoie la requête AJAX avec les données préparées.
request.send(data);
}

// Fonction pour revenir d'un mois en arrière
function goBackOneMonth(){
actualDate.setMonth(actualDate.getMonth() - 1);
displayCalendarContent();
}

// Fonction pour avancer d'un mois
function advanceOneMonth(){
actualDate.setMonth(actualDate.getMonth() + 1);
displayCalendarContent();
}

// Fonction pour sélectionner une unité de calendrier (jour)
function selectUnit(e){

if(e.target.classList.contains("selected")){
    return false;
}

// Récupére la date de l'unité cliquée et la formate
var date = new Date(e.target.getAttribute("data-date")); 
var dateParam = formatDate(date); 

// Désactive le bouton de soumission du formulaire du calendrier
document.getElementById("calendar-submit-button").setAttribute("disabled", "");

// Réinitialise le champ de sélection de l'heure
document.getElementById("calendar-form-time").setAttribute("value", "");

// Récupére toutes les unités du calendrier
var calendarUnits = document.querySelectorAll(".calandar-unit");
// Boucle sur toutes les unités pour enlever la classe 'selected'
for (var i = 0; i < calendarUnits.length; i++) {
    calendarUnits[i].classList.remove("selected");
}
// Ajoute la classe 'selected' à l'unité cliquée
e.target.classList.add("selected");

// Met à jour le champ date du form avec la date de l'unité sélectionnée
document.getElementById("calendar-form-date").setAttribute("value", dateParam);

var slotList = document.getElementById("slot-list");
if(slotList){
    slotList.remove();
}

// Récupére le conteneur des créneaux horaires
const timeSlotsContainer = document.getElementById("slot-container");

// Créé le titre de la liste des créneaux horaires
const timSlotTitle = document.createElement("h3");
timSlotTitle.setAttribute("id", "slot-title");
// Créé la liste des créneaux horaires
const timeSlotsList = document.createElement("ul");
timeSlotsList.setAttribute("id", "slot-list");

// Création d'une nouvelle requête XMLHttpRequest pour récupérer les créneaux indisponibles
var request = new XMLHttpRequest();
request.open("POST", "/course_unavailability/"+courseName);
request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// Callback à exécuter quand la requête change d'état
request.onreadystatechange = function() {

    // Si la requête est terminée et que la réponse est 200 (OK
    if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
        
        // On récupére la liste des créneaux indisponibles à partir de la réponse de la requête
        var unavailableSlots = JSON.parse(request.responseText);
        console.log(unavailableSlots);
        
        // Vide le conteneur des créneaux horaires+
        timeSlotsContainer.innerHTML = "";

        // Met à jour le titre de la liste des créneaux horaires
        timSlotTitle.innerHTML = "Choisissez votre créneau horaire";
        timeSlotsList.innerHTML = "";

        // Ajoute le titre et la liste des créneaux horaires au conteneur
        timeSlotsContainer.appendChild(timSlotTitle);
        timeSlotsContainer.appendChild(timeSlotsList);

        // Boucle sur tous les créneaux horaires
        for (var k = 0; k < timeSlots.length; k++) {

            // Créé un élément de la liste pour chaque créneau horaire
            var slot = document.createElement("li");
            slot.classList.add("slot");
            slot.innerHTML = timeSlots[k];

            // Si le créneau est dans la liste des créneaux indisponibles ou tous indisponibles, ajouter la classe 'unavailable'. 
            if(unavailableSlots.includes(timeSlots[k]) || unavailableSlots.includes("all day")){
                slot.classList.add("unavailable");
            }
            // Sinon, ajoute la classe 'available'.
            else{
                slot.classList.add("available");
            }
            // Ajoute le créneau à la liste
            timeSlotsList.appendChild(slot);
            // Ajoute un écouteur d'événement pour gérer le click sur le créneau
            slot.addEventListener("click", selectTimeSlot);
        }

    }

};

// Prépare les données à envoyer avec la requête
var data = "date=" + encodeURIComponent(dateParam);
// Envoye la requête avec les données
request.send(data);
}

// Fonction pour sélectionner un créneau horaire
function selectTimeSlot(event) {

var selectedSlot = event.target;

var slots = document.querySelectorAll(".available");
for (var i = 0; i < slots.length; i++) {
    slots[i].classList.remove("selected");
}

if (selectedSlot.classList.contains("available")) {

    // Sélectionne le créneau horaire cliqué
    selectedSlot.classList.add("selected");

    // Enregistre le créneau sélectionné dans le champ de formulaire caché
    document.getElementById("calendar-form-time").setAttribute("value", selectedSlot.innerHTML);
    // document.getElementById("selected-slot").value = selectedSlot.innerHTML;

    document.getElementById("calendar-submit-button").removeAttribute("disabled");
}
}

function formatDate(date) {
// Extrait l'année de l'objet Date et la stocke dans la variable year.
var year = date.getFullYear();
// Extrait le mois de Date et lui ajotue 1 (11 + 1 pour avoir les 12) le convertit en string et lui 
// ajoute un 0 au début, on slice à -2 pour garder que les 2 derneirs (pour avoir que 2 chiffres)
var month = ("0" + (date.getMonth() + 1)).slice(-2);
var day = ("0" + date.getDate()).slice(-2);
return year + "-" + month + "-" + day;
}



















//Parcour la liste des jours créer et leurs donne la classe slot pour les afficher et avaible, si le jour est 
//selectionné ou est déjà dans la lsite unavailable il a la class unavailable a la place.

// une fois un slot selectionner ca affiche les heures - avec le suite

// Parcour la liste des heures var startTime = new Date(); // Heure de début pour les créneaux horaires
// startTime.setHours(8, 0, 0);  Définit l'heure de début à 8h00

// var timeSlots = [];  Tableau pour stocker les créneaux horaires

// Boucle pour générer les créneaux horaires de 30 minutes
// while(startTime.getHours()<18 || startTime.getMinutes()<30){

//     var startTime_hours = startTime.getHours() > 9 ? startTime.getHours() : "0"+startTime.getHours();
//     var startTime_minutes = startTime.getMinutes() > 9 ? startTime.getMinutes() : "0"+startTime.getMinutes();

//     timeSlots.push(startTime_hours+":"+startTime_minutes);

//     startTime.setMinutes(startTime.getMinutes() + 30);
// }

// Même système pour les horaires, parcours les horaires et voit si elles sont unavailable ou non, donne les class en conséquznces 
// et les ajoutes dans le form caché a envoyer avec le jour 