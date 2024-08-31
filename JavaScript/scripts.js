document.getElementById('upload-btn').addEventListener('click', function() {
    document.getElementById('file-upload').click();
});

document.getElementById('file-upload').addEventListener('change', function(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const img = document.getElementById('profile-image');
        img.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
});

document.getElementById('remove-btn').addEventListener('click', function() {
    const img = document.getElementById('profile-image');
    img.src = 'default-user-icon.png';
    document.getElementById('file-upload').value = ''; // Clear the file input
});