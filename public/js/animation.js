window.addEventListener('load', function () { //les fonctions fonctionnent que si la page est completement chargé css et images.

    const container = document.getElementById('isLoad');
    const loader = document.getElementById('loader');
    setTimeout(() => {
        loader.style.display = 'none';
        container.style.display = 'block';
    }, 1000);

    const carrousselContainer = document.getElementById('carrouselItems');
    //console.log(carrousselContainer);
    const point = document.getElementById("point");
    let numberImage = 0;

    //console.log(point);

    for (let nbrImage = 0; nbrImage < carrousselContainer.children.length; nbrImage++) {
        let span = document.createElement('span');
        span.setAttribute('id', 'imagePrecise');
        span.classList.add('dot');
        span.onclick = function () {
            point.children[numberImage].style.backgroundColor="#bbb";
            numberImage = nbrImage
            afficherImage();
        }
        point.appendChild(span);
    }

    for (let nbrImage = 0; nbrImage < carrousselContainer.children.length; nbrImage++) {
        carrousselContainer.children[nbrImage].classList.add('hidden');
    }
    carrousselContainer.children[0].classList.remove('hidden');

    function afficherImage() {
        for (let nbrImage = 0; nbrImage < carrousselContainer.children.length; nbrImage++) {
            carrousselContainer.children[nbrImage].classList.add('hidden');
        }
        carrousselContainer.children[numberImage].classList.remove('hidden');
        point.children[numberImage].style.backgroundColor="black";

    }

    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    next.addEventListener('click', nextImage);
    prev.addEventListener('click', prevImage);

    function nextImage() {
        point.children[numberImage].style.backgroundColor="#bbb";

        numberImage += 1;
        tempo = numberImage % (carrousselContainer.children.length);
        numberImage = tempo;
        afficherImage();
    }

    function prevImage() {
        point.children[numberImage].style.backgroundColor="#bbb";
        numberImage -= 1;
        tempo = numberImage % (carrousselContainer.children.length);
        numberImage = tempo;
        if (numberImage === -1) {
            numberImage = 2;
        }
        afficherImage();
    }

    setInterval(() => { nextImage(); }, 4000);

    const sections = document.querySelectorAll('.section');
    function revealOnScroll() {
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const sectionBottom = section.getBoundingClientRect().bottom;
            if (sectionTop < window.innerHeight && sectionBottom >= 0) {
                section.classList.add('visible');
            } else {
                section.classList.remove('visible');
            }
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();
});
