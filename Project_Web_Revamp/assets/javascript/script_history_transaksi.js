var linkHeaderProfile = document.getElementById('linkHeaderProfileUser');
var linkHeaderCart = document.getElementById('linkHeaderProfileKeranjang');
var linkHeaderHistory = document.getElementById('linkHeaderProfileHistori');

historyActive();

function historyActive()
{
    linkHeaderHistory.classList.add('active');
    linkHeaderProfile.classList.remove('active');
    linkHeaderCart.classList.remove('active');
}