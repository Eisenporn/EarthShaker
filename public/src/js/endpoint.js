var id = window.location.pathname.split("/").pop();
console.log(id);
var albumData;
var compositionData;

fetch("/api/endpoint/" + id, {
    method: "GET",
    headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Content-type": "application/json",
    },
})
    .then((response) => response.json())
    .then((data) => {
        albumData = data.album;
        compositionData = data.composition;
        ShowAlbum(albumData);
        ShowComposition(compositionData);
    })
    .catch((error) => {
        console.log(error);
    });

function ShowAlbum(data) {
    console.log(data);
}

function ShowComposition(data) {
    console.log(data);
}
