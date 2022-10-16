function buy_ressources() {
    const buttons = document.getElementsByTagName("button");

    var construction = "";

    const pressed_button = e => {
        construction = e.target.id;

        for (let button of buttons) {
            button.removeEventListener("click", pressed_button);
        }

        $.ajax({
            type: 'POST',
            url: "pages/buy_ressources.php",
            data: {construction: construction},
            success: function(result) {
                console.log(result);
            }
        })
    }

    for (let button of buttons) {
        button.addEventListener("click", pressed_button);
    }
}