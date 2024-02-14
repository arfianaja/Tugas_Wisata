var button = document.querySelectorAll('.wrapper button')
var table = document.querySelectorAll('body table')
let a;


button.forEach((e, i) => {
    e.addEventListener('click', () => {
        console.log(i)
        if( i == 0){
            table[0].classList.remove('hide')
            table[1].classList.add('hide')
            table[2].classList.add('hide')
        } else if(i == 1) {
            table[0].classList.add('hide')
            table[1].classList.remove('hide')
            table[2].classList.add('hide')
        } else if( i == 2 ) {
            table[0].classList.add('hide')
            table[1].classList.add('hide')
            table[2].classList.remove('hide')
        } else if( i == 3){
            document.location.href = './fungsi/logout.php'
        }

    })
})