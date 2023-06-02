// function displayImage(event) {
//     var input = event.target;
//     var imageElement = document.getElementById('image-element');
//     var file = input.files[0];

//     var reader = new FileReader();
//     reader.onload = function(e) {
//         imageElement.src = e.target.result;
//     };
//     reader.readAsDataURL(file);
// }

document.getElementById("imageInput").onchange = function (event) {
    var input = event.target;
    var imageElement = document.getElementById("image-element");
    var file = input.files[0];

    var reader = new FileReader();
    reader.onload = function (e) {
        imageElement.src = e.target.result;
    };
    reader.readAsDataURL(file);

    event.preventDefault();

    var file = event.target.files[0];

    var formData = new FormData();
    formData.append("avatar_image", file);

    let getIdUser = document.getElementById("getIdUser");
    let idUser = getIdUser.value;
    formData.append("idUser", idUser);

    fetch("/api/UploadImageProfile", {
        method: "POST",
        body: formData,
    })
        .then(function (response) {
            if (!response.ok) {
                throw new Error(
                    "Ошибка " + response.status + ": " + response.statusText
                );
            }
            return response.json();
        })
        .then(function (data) {
            // console.log(data);
            console.log(data.message);
        })
        .catch(function (error) {
            console.error(error);
            alert("Произошла ошибка при загрузке изображения");
        });
};
