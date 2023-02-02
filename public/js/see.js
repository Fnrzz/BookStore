function see()
{
    var input = document.getElementById("password");
    const see1 = document.getElementById("see1");
    const see2 = document.getElementById("see2");

    if (input.type === "password") {
    see1.classList.toggle('d-none');
    see2.classList.toggle('d-none');
    input.type = "text";
    } else {
    see1.classList.toggle('d-none');
    see2.classList.toggle('d-none');
    input.type = "password";
    }
}      