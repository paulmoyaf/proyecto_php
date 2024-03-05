window.onload = function() {
    // Get all image options
    var imageOptions = document.querySelectorAll('.image-option');
    imageOptions.forEach(function(option) {
        option.addEventListener('click', function() {
            imageOptions.forEach(function(otherOption) {
                otherOption.classList.remove('selected');
            });
            option.classList.add('selected');
            option.querySelector('input').click();
        });

        // Check if this option is selected
        if (option.querySelector('input').checked) {
            option.classList.add('selected');
        }
    });
};