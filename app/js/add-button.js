const btn = document.getElementById('addBtn');
const label = btn.querySelector('.btn-label');

const defaultText = 'Add to Lunchbox';
const addedText = 'Added';

let resetTimer;

function splitText(text, direction) {
  label.innerHTML = '';
  label.classList.add('is-split');

  text.split('').forEach((char, i) => {
    const span = document.createElement('span');
    span.classList.add('char', `char-${direction}`);
    span.style.setProperty('--i', i);

    if (char === ' ') {
      span.classList.add('char-space');
      span.innerHTML = '&nbsp;';
    } else {
      span.textContent = char;
    }

    label.appendChild(span);
  });
}

btn.addEventListener('click', () => {

  if (btn.classList.contains('is-added')) return;

  btn.classList.add('is-added');

  splitText(addedText, 'up');

  clearTimeout(resetTimer);

  resetTimer = setTimeout(() => {
    btn.classList.remove('is-added');
    splitText(defaultText, 'down');
  }, 5000);

});