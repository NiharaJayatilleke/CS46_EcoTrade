let text = document.getElementById('text');
let leaf = document.getElementById('leaf');
let hill1 = document.getElementById('hill1');
let hill4 = document.getElementById('hill4');
let hill5 = document.getElementById('hill5');

window.addEventListener('scroll', () => {
    let value = window.scrollY;

    // Corrected the style property
    leaf.style.top = value * -1.05 + 'px';
    leaf.style.left = value * 1.05 + 'px';
    hill5.style.left = value * 1.05 + 'px';
    hill4.style.left = value * -1.05 + 'px';

    // Reduce opacity of text when scrolling down
    text.style.opacity = 1.1 - value /  window.innerHeight;

    // Make text opacity 0 after it disappears
    if (value >= window.innerHeight) {
        text.style.opacity = 0;
    }
});
