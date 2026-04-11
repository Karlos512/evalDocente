function Delete_Marca(id) {
    console.log(id);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/panel/delete-marca",
        method: "POST",
        data: {
            id,
        },
        success: function (data) {
            if (data != "") {
                location.href = "/panel/lista-marcas";
            }
        },
    });
}
