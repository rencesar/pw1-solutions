const poke_card = document.querySelectorAll('.poke-min-card')
const poke_ids = document.querySelector('#poke-card-ids')

let p = []

Array.from(poke_card)
    .map( (card, i) => {
        card.addEventListener('click', () => {
            if (card.style.border == 'none' && p.length < 6) {
                card.setAttribute("style", "border: 1px solid red;")
                p.push(card.id)
                poke_ids.value = p
                console.log(poke_ids.value)
            } else {
                card.setAttribute("style", "border: none;");
                p = p.filter( v => v != card.id)
                poke_ids.value = p
                console.log(poke_ids.value)
            }    
        })    
    }
)

