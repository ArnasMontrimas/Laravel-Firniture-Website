require('./bootstrap');


//Small script to remove the alert tag on click
if(document.querySelector(".exit-button") != null) {
    document.querySelector(".exit-button").addEventListener('click', () => {
        let alertSuccess = document.querySelector(".success-alert-container");
        let alertDanger = document.querySelector(".alert-container");

        if(alertDanger == null) {
            alertSuccess.remove();
        }
        else if(alertSuccess == null) {
            alertDanger.remove();
        }

    });
};
    