/* ================= Script Here ================= */
let btn_create_post = document.getElementsByClassName('btn-create')[0];
let btn_close = document.getElementsByClassName("close")[0];

btn_create_post.addEventListener('click', () => {
    document.getElementById("modal-create").style.display = "block";
})


btn_close.addEventListener('click', () => {
    document.getElementById("modal-create").style.display = "none";
})


let modal_create = document.getElementById('modal-create');

modal_create.addEventListener("click", (e) => {
    if (!document.getElementById("modal-container").contains(e.target)) {
        document.getElementById("modal-create").style.display = "none";
    }
})