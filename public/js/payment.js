// This is your test publishable API key.
const stripe = Stripe("pk_test_51NAwNZJWIv9Iz53oUTcDu6QGU8c29nvuRPQ0jLe4WNom3WJmqPBi4FTYmVfEq32lGuLGZQtc4voWr1iSbipNP5ce00ZSG7OWON");


// Ces lignes récupèrent des valeurs d'identifiant de réservation et de courriel d'utilisateur à partir d'éléments HTML sur la page.
const reservationId = document.getElementById('reservationId').getAttribute('value');
// const userMail = document.getElementById('userMail').getAttribute('value');

let elements;

initialize();
checkStatus();

// Cette ligne ajoute un écouteur d'événement 'submit' au formulaire de paiement. Quand le formulaire est soumis, la fonction handleSubmit() est appelée.
document
.querySelector("#payment-form")
.addEventListener("submit", handleSubmit);

// AJAX
// La fonction initialize() :

// Elle fait une requête POST à l'endpoint /create-payment-intent du serveur pour récupérer le clientSecret du PaymentIntent créé.
// Elle initialise les éléments Stripe avec ce clientSecret.
// Elle crée un élément de paiement (paymentElement) avec certaines options (comme désactiver Google Pay et Apple Pay, et préremplir l'e-mail de l'utilisateur). Cet élément est alors monté dans le DOM à l'endroit identifié par #payment-element
async function initialize() {
                              // API
const { clientSecret } = await fetch("/create-payment-intent", {
  method: "POST",
  headers: { "Content-Type": "application/json" },
  body: JSON.stringify({ reservationId }),
}).then((r) => r.json());

elements = stripe.elements({ clientSecret });

//   const linkAuthenticationElement = elements.create("linkAuthentication");
//   linkAuthenticationElement.mount("#link-authentication-element");

const paymentElementOptions = {
  layout: "tabs",
  defaultValues: {
      //Pour préremplir le mail de l'user
      billingDetails: {
          // email: userMail
      }
  },
  wallets: {
      googlePay: "never",
      applePay: "never",
  }

};

const paymentElement = elements.create("payment", paymentElementOptions);
paymentElement.mount("#payment-element");
}

// La fonction handleSubmit() est appelée lorsque le formulaire de paiement est soumis. 
// Elle fait appel à stripe.confirmPayment() pour confirmer le paiement avec Stripe. 
// Si le paiement est confirmé avec succès, l'utilisateur sera redirigé vers l'URL que spécifiée dans return_url (ici c'est http://localhost:8000/payment-success).
// Si une erreur se produit (comme une erreur de carte ou une erreur de validation), un message d'erreur est affiché.
async function handleSubmit(e) {
e.preventDefault();
setLoading(true);

const { error } = await stripe.confirmPayment({
  elements,
  confirmParams: {
    // Make sure to change this to your payment completion page
    return_url: ('http://localhost:8000/payment-success/'+window.location.href.split('/').pop()),
  },
});

// This point will only be reached if there is an immediate error when
// confirming the payment. Otherwise, your customer will be redirected to
// your `return_url`. For some payment methods like iDEAL, your customer will
// be redirected to an intermediate site first to authorize the payment, then
// redirected to the `return_url`.
if (error.type === "card_error" || error.type === "validation_error") {
  showMessage(error.message);
} else {
  showMessage("Une erreur a été trouvé.");
}

setLoading(false);
}

//  La fonction checkStatus() vérifie le statut de l'intention de paiement en interrogeant Stripe. En fonction du statut, 
// un message différent est affiché à l'utilisateur.
async function checkStatus() {
const clientSecret = new URLSearchParams(window.location.search).get(
  "payment_intent_client_secret"
);

if (!clientSecret) {
  return;
}

const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);
switch (paymentIntent.status) {
  case "succeeded":
    showMessage("Payment succeeded!");
    break;
  case "processing":
    showMessage("Your payment is processing.");
    break;
  case "requires_payment_method":
    showMessage("Your payment was not successful, please try again.");
    break;
  default:
    showMessage("Something went wrong.");
    break;
}
}

// ------- UI helpers -------

//La fonction showMessage() affiche un message à l'utilisateur en le mettant dans l'élément HTML #payment-message.
function showMessage(messageText) {
const messageContainer = document.querySelector("#payment-message");

messageContainer.classList.remove("hidden");
messageContainer.textContent = messageText;

setTimeout(function () {
  messageContainer.classList.add("hidden");
  messageContainer.textContent = "";
}, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
if (isLoading) {
  // Disable the button and show a spinner
  document.querySelector("#submit").disabled = true;
  document.querySelector("#spinner").classList.remove("hidden");
  document.querySelector("#button-text").classList.add("hidden");
} else {
  document.querySelector("#submit").disabled = false;
  document.querySelector("#spinner").classList.add("hidden");
  document.querySelector("#button-text").classList.remove("hidden");
}
}