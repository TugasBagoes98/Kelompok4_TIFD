var link = window.location.href.split("?").pop().split("=");

checkError(link);

function checkError(value)
{

    //File Error
    if(value.includes("error","fileexceed"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Ukuran file melebihi kapasitas server saat ini, harap periksa kembali file anda.";      
    }else if(value.includes("error","filemaxexceed"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Ukuran file melebihi batas maksimal file, harap periksa kembali file anda.";
    }else if(value.includes("error","partialupload"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Hanya sebagian file yang terupload, harap melakukan proses upload ulang.";
    }else if(value.includes("error","nofile"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Tidak ada file yang di upload.";
    }else if(value.includes("error","notempdir"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Temporary Directory tidak ditemukan, harap coba beberapa saat lagi.";
    }else if(value.includes("error","failedtowrite"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Gagal menyalin file kedalam server, harap coba beberapa saat lagi.";
    }else if(value.includes("unknown","true"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Terjadi sebuah kesalahan, harap coba beberapa saat lagi.";
    }

    



}