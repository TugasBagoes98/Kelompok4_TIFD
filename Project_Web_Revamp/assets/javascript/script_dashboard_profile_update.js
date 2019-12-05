var linkHeaderProfile = document.getElementById('linkHeaderProfileUser');
var linkHeaderCart = document.getElementById('linkHeaderProfileKeranjang');
var linkHeaderHistory = document.getElementById('linkHeaderProfileHistori');

profileActive();

function profileActive()
{
    linkHeaderProfile.classList.add('active');
    linkHeaderCart.classList.remove('active');
    linkHeaderHistory.classList.remove('active');
}

/* Parameter Validator */

var regexOnlyLetter = new RegExp("^[a-zA-Z\ ]+$");
var regexOnlyNumber = new RegExp("^[0-9]+$");
var regexNumberAndLetter = new RegExp("^[a-zA-Z0-9\ ]+$");
var regexNumberLetterAndCharacter = new RegExp("^[a-zA-Z0-9\ .,]+$");
var regexEmail = new RegExp("^[a-zA-Z0-9.!#$%&'*+=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");

/* Utility Function */
function isEmpty(value)
{
    if(value === '')
    {
        return true;
    }else
    {
        return false;
    }
}