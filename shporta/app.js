const ul = document.getElementById("shporta_list");
let shporta = [];
if(localStorage.getItem("shport")) {
    shporta = JSON.parse(localStorage.getItem("shport"));
}

let output = "";
shporta.forEach(function(s) {
    output += '<li>' + s.kodi + " " + s.cmimi + "Leke me sasi " + s.sasi + `</li><button id="${s.kodi}" class="delete_btn">Delete</button><br><br>`; 
});
ul.innerHTML = output;

const delete_btns = document.querySelectorAll(".delete_btn");
delete_btns.forEach(function(btn) {
    btn.addEventListener("click", function(e) {
        const new_shporta = shporta.filter(function(i) {
            return i.kodi !== e.target.id;
        });
        localStorage.setItem("shport", JSON.stringify(new_shporta));
        window.location.reload();
    })
})

