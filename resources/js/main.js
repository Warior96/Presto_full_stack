// console.log('hello word');
// let typewriter1 = document.querySelector('.typewriter1');
// let typewriter2 = document.querySelector('.typewriter2');
// let addArticle = document.querySelector('#addArticle');

// setTimeout(() => {
//     typewriter1.classList.add('typewriter');
//     typewriter1.classList.remove('invisible');
// }, 2000);
// setTimeout(() => {
//     typewriter1.style.border = 'none';
// }, 4850);
// setTimeout(() => {
//     typewriter2.classList.add('typewriter');
//     typewriter2.classList.remove('invisible');
// }, 5000);
// setTimeout(() => {
//     typewriter2.style.border = 'none';
// }, 7600);
// setTimeout(() => {
//     addArticle.classList.remove('opacity-0');
//     addArticle.classList.add('opacity-100');
// }, 7700);




// let typewriter1 = document.querySelectorAll('.typewriter1');
// let typewriter2 = document.querySelectorAll('.typewriter2');
let addArticle = document.querySelector('#addArticle');

// typewriter1.forEach(el => {
//     setTimeout(() => {
//         el.classList.add('typewriter');
//         el.classList.remove('invisible');
//     }, 2000);
//     setTimeout(() => {
//         el.style.border = 'none';
//     }, 4850);
// });

// typewriter1.forEach((el, index) => {
//     if (index === 0) {
//         setTimeout(() => {
//             el.classList.add('typewriter');
//             el.classList.remove('invisible');
//         }, 2000);
//         setTimeout(() => {
//             el.style.border = 'none';
//         }, 4850);
//     } else {
//             // el.classList.add('typewriter');
//             el.classList.remove('invisible');
//             // el.style.border = 'none';
//     }
// });

let typeWriters = document.querySelectorAll('.typewriter');

typeWriters.forEach((el, index) => {
    let text = el.innerText;
    el.style.visibility = "hidden";
    if (index === 0) {
        setTimeout(() => {
            el.style.visibility = "visible";
            el.style.setProperty('--characters', text.length);
        }, 2000);
    }else{
            el.classList.remove('typewriter')
            el.style.visibility = "visible";
            el.style.setProperty('--characters', text.length);
    }});


    let typeWriters2 = document.querySelectorAll('#typewriter-text2');

    typeWriters2.forEach((el, index) => {
        let text = el.innerText;
        el.style.visibility = "hidden";
        if (index === 0) {
            setTimeout(() => {
                el.classList.add('typewriter')
                el.style.visibility = "visible";
                el.style.setProperty('--characters', text.length);
            }, 5000);
        }else {
            const observer = new IntersectionObserver((entries, observer) => {
              entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                  el.classList.add('typewriter');
                  el.style.visibility = "visible";
                  el.style.setProperty('--characters', text.length);
                  observer.disconnect();
                }, 2000);
                }
              });
            });
            observer.observe(el);
          }
        });




// let intervallo2 = (time1, time2) => new IntersectionObserver(entries => {
//     entries.forEach(entry => {
//         if (entry.isIntersecting) {
//             let el = entry.target;
//             setTimeout(() => {
//                 el.classList.remove('invisible');
//                 el.classList.add('typewriter');
//             }, time1);
//             setTimeout(() => {
//                 el.style.border = 'none';
//             }, time2);
//         }
//     })
// })
// typewriter2.forEach(el, index => {
//     if (index === 0) {
//         intervallo2(5000, 20600).observe(el);
//     } else {
//         intervallo2(1000, 15600).observe(el);
//     }
// });

// let intervallo2 = (time1, time2) => new IntersectionObserver(entries => {
//     entries.forEach(entry => {
//         if (entry.isIntersecting) {
//             let el = entry.target;
//             setTimeout(() => {
//                 el.classList.remove('invisible');
//                 el.classList.add('typewriter');
//             }, time1);
//             setTimeout(() => {
//                 el.style.border = 'none';
//             }, time2);
//         }
//     });
// });

// Creiamo un singolo osservatore per ciascuna configurazione di tempo
// let observer1 = intervallo2(5000, 20600);
// let observer2 = intervallo2(1000, 15600);

// typewriter2.forEach((el, index) => {
//     if (index === 0) {
//         observer1.observe(el);
//     } else {
//         observer2.observe(el);
//     }
// });



// setTimeout(() => {
//     typewriter1.classList.add('typewriter');
//     typewriter1.classList.remove('invisible');
// }, 2000);
// setTimeout(() => {
//     typewriter1.style.border = 'none';
// }, 4850);
// setTimeout(() => {
//     typewriter2.classList.add('typewriter');
//     typewriter2.classList.remove('invisible');
// }, 5000);
// setTimeout(() => {
//     typewriter2.style.border = 'none';
// }, 7600);

setTimeout(() => {
    addArticle.classList.remove('opacity-0');
    addArticle.classList.add('opacity-100');
}, 7700);
