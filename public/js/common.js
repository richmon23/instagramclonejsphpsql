
document.getElementById('show_hide_password').addEventListener('click', function() {
    var passwordField = document.getElementById('password');
    var showHideText = document.getElementById('show_hide_password');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        showHideText.textContent = 'Hide';
    } else {
        passwordField.type = 'password';
        showHideText.textContent = 'Show';
    }
});