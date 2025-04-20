let addArticle = document.querySelector('#addArticle');

let observerArticle = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        addArticle.classList.remove('opacity-0');
        addArticle.classList.add('opacity-100');
      }, 1000);
    }
  });
});
// INSERITO NELLA DARK MODE



//INIZIO DEL CODICE PER LA DARK-MODE

let btnlight = document.querySelectorAll('.btnlight')
let dashboard_btn = document.querySelector('.dashboard_btn')
let textElements = document.querySelectorAll('h1:not(footer *):not(.dark), p:not(footer *), h2:not(.typewriter):not(footer *), h3:not(footer *), h4:not(.typewriter-text):not(footer *):not(.card-title):not(.typewriter), h5:not(.typewriter-text2):not(footer *), h6:not(.dark):not(footer *), span:not(.fa-solid):not(.dark), button:not(.btnlight):not(footer *):not(.btn):not(.dashboard_btn), a:not(.nav-link):not(footer *):not(.dropdown-item):not(.dark):not(.page-link');
let footer = document.querySelector('footer')
let containerDetail = document.querySelector('#data-container-detail')
let nightmodeIcon = document.querySelector('#nightmodeIcon')

// funzione che setta nel localStorage la dark se la trova impostata oppure non la mette se non la trova
function setDark() {
  if (document.body.classList.contains('dark-mode')) {
    localStorage.setItem('darkMode', 'true');
  } else {
    localStorage.setItem('darkMode', 'false');
  }
}

// Funzione per controllare se la dark-mode è attiva o no al caricamento della pagina
function checkDarkMode() {
  let darkMode = localStorage.getItem('darkMode');
  if (darkMode === 'true') {
    document.body.classList.add('dark-mode');
    document.body.style.visibility = 'visible';
    if (footer) {
      footer.classList.toggle('dark-mode-footer');
    }
    if (containerDetail) {
      containerDetail.classList.toggle('data-container-detail-c2');
    }
    btnlight.forEach(el => {
      el.classList.toggle('button-clicked');
      el.firstElementChild.classList.add('icon-clicked');
    })
    nightmodeIcon.classList.toggle('fa-moon')
    nightmodeIcon.classList.toggle('fa-sun')
    textElements.forEach(el => {
      el.style.color = '#F5DEBA';  // Colore chiaro
    })
    if (dashboard_btn.classList.contains('dashboard_btn')) {
      dashboard_btn.classList.toggle('c-5');
      dashboard_btn.style.color = '#F5DEBA';  // Colore chiaro
    }
  }
}

// Esegui la funzione di check al caricamanto degli asset html
document.addEventListener('DOMContentLoaded', () => {
  document.body.style.visibility = 'visible';
  checkDarkMode();

  // observer che fa apparire il btn aggiungi articolo, deve stare qui altrimenti il codice non lo legge e va in bug
  observerArticle.observe(addArticle);
});

btnlight.forEach(el => {
  el.addEventListener('click', () => {
    // Toggle della classe per il corpo e il bottone
    document.body.classList.toggle('dark-mode');
    if (footer) {
      footer.classList.toggle('dark-mode-footer');
    }
    // bottone dashboard dashboard_btn
    if (dashboard_btn) {
      dashboard_btn.classList.toggle('c-5');
      dashboard_btn.classList.toggle('c-2');
      console.log('entraaaa2');
    }
    if (containerDetail) {
      containerDetail.classList.toggle('data-container-detail-c2');
    }
    el.classList.toggle('button-clicked');
    nightmodeIcon.classList.toggle('fa-moon')
    nightmodeIcon.classList.toggle('fa-sun')
    el.firstElementChild.classList.toggle('icon-clicked');

    // Memorizza lo stato della modalità scura nel localStorage
    setDark()

    textElements.forEach(el => {
      if (document.body.classList.contains('dark-mode')) {
        el.style.color = '#F5DEBA';  // Colore chiaro
      } else {
        if (!el.classList.contains('c-7')) {
          el.style.color = '#2c2c31';  // Colore scuro
        } else {
          el.style.color = '#595856';  // Colore grigio chiaro
        }
      }
    });
  })
});