/* Berfungsi sebagai counter */
var slideIndex = 1;
showSlide(slideIndex);

/* Berfungsi untuk next dan prev */
function plusSlide(n)
{
    showSlide(slideIndex += n);
}

/* Berfungsi untuk mengganti slide secara langsung */
function currentSlide(n)
{
    showSlide(slideIndex = n);
}

/* Berfungsi untuk menampilkan slide */
function showSlide(n)
{

    /* Sebagai Counter */
    var i;
    /* Mendapatkan semua slide yang ada dalam index */
    var slides = document.getElementsByClassName("mySlide");
    /* Mendapatkan semua marker yang ada dalam index */
    var markers = document.getElementsByClassName("marker");

    /* Jika n lebih besar dari panjang / jumlah slide */
    if(n > slides.length)
    {
        slideIndex = 1;
    }else if (n < 1)
    {
        /* Jika n memiliki nilai kurang dari satu / kembali ke slide paling akhir */
        slideIndex = slides.length;
    }

    /* Berfungsi untuk menyembunyikan slide */
    for(i = 0; i < slides.length; i++)
    {
        slides[i].style.display = "none";
    }

    /* Berfungsi untuk menghapus class active dari marker */
    for(i = 0; i < markers.length; i++)
    {
        markers[i].className = markers[i].className.replace(" active", "");
    }

    /* Berfungsi untuk menampilkan slide */
    slides[slideIndex - 1].style.display = "block";
    /* Berfungsi untuk menyalakan marker */
    markers[slideIndex - 1].className += " active";

}