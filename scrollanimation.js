// OBSERVER QUE FAZ OS ITEMS EMANESCEREM E DESMANESCEREM
const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            console.log(entry)
            if (entry.isIntersecting) {
                setTimeout(() =>{
                    entry.target.classList.add('show');
                }, entry.target.dataset.delay)
            } else {
                entry.target.classList.remove('show');
            }
        })
})

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observer.observe(el))

// OBSERVER DAS LINHAS

const lineObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            setTimeout(() =>{
                entry.target.classList.add('divisor');
            }, 100)
        }
    })
})

const lineWidth = document.querySelectorAll('.line0');
lineWidth.forEach((el) => lineObserver.observe(el))