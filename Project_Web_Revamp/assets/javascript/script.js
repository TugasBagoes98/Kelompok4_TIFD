/* Register  */

var formRegister = document.querySelector("#formRegister");
var namaUser = formRegister.namaUser;
var alamatUser = formRegister.alamatUser;
var notelpUser = formRegister.notelpUser;
var emailUser = formRegister.emailUser;
var passwordUser = formRegister.passwordUser;
var confPassword = formRegister.confPasswordUser;
var fotoProfilUser = formRegister.fotoProfilUser;

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

/* Validasi Register */

/* Nama User */
namaUser.onblur = function()
{
    if(isEmpty(namaUser.value))
    {
        namaUser.classList.remove('is-valid');
        namaUser.classList.add('is-invalid');
        document.getElementById('invalidName').innerText = "Nama User tidak boleh kosong.";
    }else if(!regexOnlyLetter.test(namaUser.value))
    {
        namaUser.classList.remove('is-valid')
        namaUser.classList.add('is-invalid');
        document.getElementById('invalidName').innerText = "Nama User hanya boleh berisi huruf saja.";
    }else
    {
        namaUser.classList.remove('is-invalid');
        namaUser.classList.add('is-valid');
    }
};

/* Alamat User */
alamatUser.onblur = function()
{

    if(isEmpty(alamatUser.value))
    {
        alamatUser.classList.remove('is-valid');
        alamatUser.classList.add('is-invalid');
        document.getElementById('invalidAddress').innerText = "Alamat User tidak boleh kosong.";
    }else if(!regexNumberLetterAndCharacter.test(alamatUser.value))
    {
        alamatUser.classList.remove('is-valid');
        alamatUser.classList.add('is-invalid');
        document.getElementById('invalidAddress').innerText = "Alamat User hanya boleh berisi huruf dan angka.";
    }else
    {
        alamatUser.classList.remove('is-invalid');
        alamatUser.classList.add('is-valid');
    }

};

/* No. Telp User */
notelpUser.onblur = function()
{

    if(isEmpty(notelpUser.value))
    {
        notelpUser.classList.remove('is-valid');
        notelpUser.classList.add('is-invalid');
        document.getElementById('invalidPhoneNum').innerText = "No. Telp tidak boleh kosong.";
    }else if(!regexOnlyNumber.test(notelpUser.value))
    {

        notelpUser.classList.remove('is-valid');
        notelpUser.classList.add('is-invalid');
        document.getElementById('invalidPhoneNum').innerText = "No. Telp hanya boleh berisi angka.";
    }else
    {
        notelpUser.classList.remove('is-invalid');
        notelpUser.classList.add('is-valid');
    }

};

/* Email */

emailUser.onblur = function()
{

    if(isEmpty(emailUser.value))
    {
        emailUser.classList.remove('is-valid');
        emailUser.classList.add('is-invalid');
        document.getElementById('invalidEmail').innerText = "Email User tidak boleh kosong.";
    }else if(!regexEmail.test(emailUser.value))
    {
        emailUser.classList.remove('is-valid');
        emailUser.classList.add('is-invalid');
        document.getElementById('invalidEmail').innerText = "Email User tidak valid.";
    }else
    {
        emailUser.classList.remove('is-invalid');
        emailUser.classList.add('is-valid');
    }

};

/* Password */

passwordUser.onblur = function()
{

    if(isEmpty(passwordUser.value))
    {
        passwordUser.classList.remove('is-valid');
        passwordUser.classList.add('is-invalid');
        document.getElementById('invalidPassword').innerText = "Password User tidak boleh kosong.";
    }else if(!regexNumberAndLetter.test(passwordUser.value))
    {
        passwordUser.classList.remove('is-valid');
        passwordUser.classList.add('is-invalid');
        document.getElementById('invalidPassword').innerText = "Password User hanya boleh berisi huruf dan angka.";
    }else if(passwordUser.value.toLowerCase().match("kosong"))
    {
        passwordUser.classList.remove('is-valid');
        passwordUser.classList.add('is-invalid');
        document.getElementById('invalidPassword').innerText = "Password User tidak boleh kosong.";
    }else
    {
        passwordUser.classList.remove('is-invalid');
        passwordUser.classList.add('is-valid');
    }

};

/* Confirm Password */

confPassword.onfocus = function()
{
    if(passwordUser.classList.contains('is-invalid'))
    {
        confPassword.classList.remove('is-valid');
        confPassword.classList.add('is-invalid');
        document.getElementById('invalidConfirmPassword').innerText = "Password salah, harap diperbaiki terlebih dahulu.";
    }else
    {
        if(isEmpty(passwordUser.value))
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Password kosong, harap isi terlebih dahulu.";
        }else
        {
            confPassword.classList.remove('is-invalid');
        }
    }
};

confPassword.onblur = function()
{

    if(passwordUser.classList.contains('is-invalid'))
    {
        confPassword.classList.remove('is-valid');
        confPassword.classList.add('is-invalid');
        document.getElementById('invalidConfirmPassword').innerText = "Password salah, harap diperbaiki terlebih dahulu.";
    }else
    {
        if(isEmpty(confPassword.value))
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Confirm password tidak boleh kosong.";
        }else if(!regexNumberAndLetter.test(confPassword.value))
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Confirm password hanya boleh berisi huruf dan angka.";
        }else if(confPassword.value !== passwordUser.value)
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Password tidak sesuai.";
        }else
        {
            confPassword.classList.remove('is-invalid');
            confPassword.classList.add('is-valid');
        }
    }

};