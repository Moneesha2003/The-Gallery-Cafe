document.getElementById('show-register').addEventListener('click', function() {
    document.querySelector('.sign-in-container').style.display = 'none';
    document.querySelector('.sign-up-container').style.display = 'block';
});

document.getElementById('show-login').addEventListener('click', function() {
    document.querySelector('.sign-up-container').style.display = 'none';
    document.querySelector('.sign-in-container').style.display = 'block';
});