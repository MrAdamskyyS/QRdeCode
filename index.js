const wrapper = document.querySelector(".wrapper");
const form = document.querySelector("form");
const fileInp = document.querySelector("input");
const infoText = document.querySelector("p");
const closeBtn = document.querySelector(".close");
const copyBtn = document.querySelector(".copy");


// Fetch Data From Api
function fetchRequest(file, formData) {
    infoText.innerText = "Skanowanie kodu w trakcie...";
    fetch("http://api.qrserver.com/v1/read-qr-code/", {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(result => {
            result = result[0].symbol[0].data;
            infoText.innerText = result ? "Przeciągnij i upuść lub Kliknij by załadować kod QR" : "Nie udało się odczytać kodu";
            if (!result) return;
            document.querySelector("textarea").innerText = result;
            form.querySelector("img").src = URL.createObjectURL(file);
            wrapper.classList.add("active");
             // Wywołanie kolejnego żądania AJAX, aby zapisać wartość result w bazie danych
             fetch("insert.php", {
                method: 'POST',
                body: JSON.stringify({ result: result })
            })
                .then(response => response.text())
                .then(response => {
                    console.log(response); // Odpowiedź z serwera backendowego
                })
                .catch(() => {
                    console.log("Błąd podczas zapisywania zmiennej result w bazie danych.");
                });
        })
        .catch(() => {
            infoText.innerText = "Nie udało się odczytać kodu.";
        });
}

// Send QR Code File With Request To Api
fileInp.addEventListener("change", async e => {
    let file = e.target.files[0];
    if (!file) return;
    let formData = new FormData();
    formData.append('file', file);
    fetchRequest(file, formData);
});

// Handle file drag and drop
form.addEventListener("dragover", e => {
    e.preventDefault();
    form.classList.add("dragover");
});

form.addEventListener("dragleave", e => {
    e.preventDefault();
    form.classList.remove("dragover");
});

form.addEventListener("drop", e => {
    e.preventDefault();
    form.classList.remove("dragover");
    let file = e.dataTransfer.files[0];
    if (!file) return;
    let formData = new FormData();
    formData.append('file', file);
    fetchRequest(file, formData);
});

// Copy Text To Clipboard
copyBtn.addEventListener("click", () => {
    let text = document.querySelector("textarea").textContent;
    navigator.clipboard.writeText(text);
});

// Trigger fileInp click event when the form is clicked
form.addEventListener("click", () => fileInp.click());

closeBtn.addEventListener("click", () => wrapper.classList.remove("active"));
