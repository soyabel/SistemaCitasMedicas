$(document).ready(function () {
    obtenerTotalCitas();
});

function obtenerTotalCitas() {
    $.ajax({
        url: "../../controller/home.php?op=obtenerTotalCitas",
        method: "GET",
        success: function (total) {
            $("#totalCitas").text("Total de: " + total);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
    $.ajax({
        url: "../../controller/home.php?op=obtenerTotalPagadas",
        method: "GET",
        success: function (total) {
            $("#totalCitasPagadas").text(total);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
    $.ajax({
        url: "../../controller/home.php?op=obtenerTotalNoPagadas",
        method: "GET",
        success: function (total) {
            $("#totalCitasNoPagadas").text(total);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
    $.ajax({
        url: "../../controller/home.php?op=obtenerMedicos",
        method: "GET",
        success: function (total) {
            $("#totalMedicos").text(total);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
    $.ajax({
        url: "../../controller/home.php?op=obtenerPacientes",
        method: "GET",
        success: function (total) {
            $("#totalPacientes").text(total);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}



